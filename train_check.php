<?php
include('connect.php');
error_reporting(0);
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Take Attendence</title>
    <link rel="stylesheet" href="">
    <!-- <script type="text/javascript" src="script.js"></script> -->
    <style>
        * {
          margin: 0;
          padding: 0;
            font-family: 'Baloo Bhai 2', cursive;
        }

        body {
            display: grid;
            /* justify-content: center; */
            align-items: center;
            background-image: url("https://cdn.pixabay.com/photo/2018/09/14/22/46/rail-3678287_1280.jpg");
            /* background-repeat: repeat-y; */
            background-repeat: no-repeat;
            background-size: cover;
        }

        .imp {
          margin-left: auto;
          margin-right: auto;
            font-size: large;
            color: black;
            background-color: #cbcac8a8;
            text-align: center;
            width: 70%;
            display: block;
            margin-top: 8px;
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
            /* margin: 10px 0px; */
            display: inline;
        }

        input[type="radio"] {
            height: 2em;
            width: 3%;
            display: inline;
            margin: 0px;
            /* border: 2px solid black; */
        }

        button {
            border: 3px solid black;
            margin: auto;
            font-size: 24px;
            text-align: center;
            height: 40px;
            border-radius: 10px;
            width: 60%;
            margin-top: 10px;
            display: block;
        }

        label {
            display: block;
            margin-top: 20px;
            font-size: 31px;
        }

        form {
            margin-top: 20px;
        }

        a {
            position: relative;
            top: 10px;
            /* text-decoration: none; */
            background-color: rgb(255, 255, 255, 0.6);
            color: rgb(0, 0, 0);
        }

        button:hover {
            height: 50px;
            border-radius: 10px;
            width: 70%;
            cursor: pointer;
            background-color: black;
            color: rgb(255, 255, 255);
        }

        a:hover {
            text-decoration: none;
            background-color: black;
            color: rgb(255, 255, 255);
            border-radius: 5px;
            padding: 7px;
            margin-top: 10px;
        }

        p {
            display: inline;
            margin: 0px;
            color: rgb(255, 0, 0);
        }

        .ac {
            display: inline;
            /* margin-right: 121px; */
        }

        .sleeper {
            display: inline;
            /* margin-right: 53px; */
        }

        .trouble {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="imp">
        <h1>Check Available Trains</h1>
        <form class="formm" action="train_check.php" method="post">
            <div class="input_date">
                <label for="">Select Date:-</label>
                <input type="date" name="date_id" value="">
                <!-- <input type="date" name="date_id"> -->
                <!-- <button onclick="myFunction1()">A</button> -->
                <button type="submit" class="button button1" name="button">submit</button>
            </div>
        </form>
        <form class="formm" action="train_check.php" method="post">
            <div class="input_train">
                <label for="">Insert Train ID:-</label>
                <input type="text" name="train_id" value="">


                <button type="submit" class="button button1" name="button2">Check Status</button>
            </div>
            <div class="">

            </div>

        </form>

    </div>

</body>

</html>

<?php
$todaysdate=$_POST['date_id'];
if($todaysdate!="")
{
$arr=explode("-",$todaysdate);
$todaysdate=$arr[0].$arr[1].$arr[2];
$_SESSION['datee']=$todaysdate;
}
if(isset($_POST['button2']))
{
  $train_id=$_POST['train_id'];

  $_SESSION['train_id']=$train_id;
  $todaysdate=$_SESSION['datee'];
  $sql2=mysqli_query($conn,"select * from train_desc_future where train_id='$train_id' && date_of_journey='$todaysdate' && train_status='0' ")  or die("Error2");
  //print_r($sql2);
  while($row=mysqli_fetch_array($sql2))
  {
  echo "<div class=imp>Train ID: ".$train_id;
  echo "<br>Date of Running: ".$_SESSION['datee'];
  $_SESSION['remain_ac']=$row['remain_AC_seats'];
  $_SESSION['remain_sl']=$row['remain_SL_seats'];
  $_SESSION['total_ac']=$row['number_of_AC_coach'];
  $_SESSION['total_sl']=$row['number_of_SL_coach'];
  echo "<br>Available AC coachs: ".$row['remain_AC_seats'];
  echo "<br>Available Sleeper Coachs: ".$row['remain_SL_seats'];
  echo "<br><a href='book.php'>Proceed for Booking the Seats</a></div>";

}
}


if(isset($_POST['button'])){
// echo $todays_date;
$todaysdate=$_SESSION['datee'];
$sql3=mysqli_query($conn,"SELECT * FROM train_desc_future WHERE date_of_journey='$todaysdate' && train_status='0' ")  or die("Error2");
echo "<div class=imp>Available Trains on Date: ". $_SESSION['datee'];


echo "<table border='1'>
<tr>
<th>Train_ID</th>
<th>Train Names </th>

</tr>";
while($row = mysqli_fetch_array($sql3)) {
  echo "<tr>";
echo "<td>" . $row['train_id'] . "</td>";
// echo "<td>" . $row['doctor'] . "</td>";
echo "</tr>";

}
echo"</table></div>";
}

 ?>
