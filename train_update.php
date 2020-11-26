<?php
session_start();
include('connect.php');
error_reporting(0);

 ?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <title>Update Train</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@500&display=swap" rel="stylesheet">
        <style>
            * {
                font-family: 'Baloo Bhai 2', cursive;
            }

            body {
                display: flex;
                justify-content: center;
                align-items: center;
                background-image: url("https://cdn.pixabay.com/photo/2012/10/10/05/04/train-60539_1280.jpg");
                /* background-repeat: repeat-y; */
                background-repeat: no-repeat;
                background-size: cover;
            }

            .imp {
                font-size: large;
                color: black;
                background-color: #cbcac8a8;
                text-align: center;
                width: 45%;
                display: inline-block;
                margin-top: 38px;
                padding: 20px;
                border: 2px solid black;
                border-radius: 15px;
            }

            h1 {
                margin: 0px;
                padding: 0px;
                color: brown;
                text-align: center;
            }

            input {
                border: 2px solid black;
                font-size: 24px;
                text-align: center;
                height: 31px;
                border-radius: 10px;
                width: 100%;
                margin: auto;
            }

            button {
                border: 3px solid black;
                margin-left: auto;
                font-size: 24px;
                text-align: center;
                height: 40px;
                border-radius: 10px;
                width: 60%;
                margin-top: 10px;
            }

            label {
                font-size: 31px;
            }

            a {
                text-decoration: none;
                background-color: rgb(155, 155, 155, 0.6);
                color: rgb(0, 0, 0);
            }
            a:hover {
                text-decoration: none;
                background-color: black;
                color: rgb(255, 255, 255);
                border-radius: 5px;
                padding: 7px;
                margin-top: 10px;
            }
        </style>
    </head>

    <body>
        <div class=imp>
            <h1>Insert Train</h1>
            <form class="" action="train_update.php" method="post">
                <div class="">
                    <label for="">Enter Train ID:</label><br>
                    <input type="text" name="train_id" value="">
                </div>
                <div class="">
                    <label for="">Select Date of running:</label><br>
                    <input type="date" name="date_id" value="">
                </div>
                <div class="">
                    <label for="">Number of AC Coachs:</label><br>
                    <input type="text" name="ac_value" value="">
                </div>
                <div class="">
                    <label for="">Number of Sleeper Coachs:</label><br>
                    <input type="text" name="sl_value" value="">
                </div>
                <button type="submit" class="button button1" name="submit">Insert Train Into System</button>
            </form>
            <form class="" action="train_update.php" method="post">
                <button type="submit" name="button">Update Database</button>
            </form>
            <div style="margin-top:10px">
                <a href='log_out.php'>Log Out</a></br>
            </div>


        </div>



    </body>

    </html>
    <?php

if(isset($_POST['button']))
{
  $date = date('Y/m/d');
  $arr=explode("/",$date);
  $date=$arr[0].$arr[1].$arr[2];
  echo "todays date is:". $date;

  $sql1="CALL EOD('$date')";

  if ($conn->query($sql1) === TRUE) {
    echo "<div class=imp>Database Updated</div>";
  } else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
  }

}
//write $query
if(isset($_POST['submit']))
{
  $date = date('Y/m/d');
  $arr=explode("/",$date);
  $date=$arr[0].$arr[1].$arr[2];



  $train_id=$_POST['train_id'];
  $todaysdate=$_POST['date_id'];

  $arr=explode("-",$todaysdate);
  $todaysdate=$arr[0].$arr[1].$arr[2];

  $ac=$_POST['ac_value'];
  $sl=$_POST['sl_value'];
  //add query
  $remain_ac=18*$ac;
  $remain_sl=24*$sl;
  $price_ac=0.0;
  $price_sl=0.0;
  $train_status='0';
  if($date>=$todaysdate)
  {
    echo "<div class=imp><h4>Error: Cannot insert no previous Date</h4></div>";
  }
  else{
  //$sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";
  $sql="INSERT INTO
train_desc_future
  VALUES
(
'$train_id',
'$todaysdate',
'$ac',
'$sl',
'$remain_ac',
'$remain_sl',
'$price_ac',
'$price_sl',
    $train_status
)";

  if ($conn->query($sql) === TRUE) {
    //echo "New train inserted successfully";
    echo "    <div class=imp>Train Inserted successfully<hr><a href='train_update.php'>Insert New Train</a></br></div>";

  } else {
    echo "<div class=imp>Error: " . $sql . "<br>" . $conn->error."</div>";
  }

}
}


 ?>
