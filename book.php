<?php
include('connect.php');
error_reporting(0);
session_start();
//  $passenger=$_POST['passenger_count'];
  $train_id=$_SESSION['train_id'];
  $todaysdate=$_SESSION['datee'];

  // run query for ac seats;
  echo "<div class=imp1>Train ID: ".$train_id;
  echo "<br>Date of Running: ".$todaysdate;
  echo "<br>Available AC coachs: ".$_SESSION['remain_ac'];
  echo "<br>Available Sleeper Coachs: ".$_SESSION['remain_sl']."</div>";
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
            font-family: 'Baloo Bhai 2', cursive;
        }

        body {
            display: grid;
            /* justify-content: center; */
            align-items: center;
            background-image: url("https://cdn.pixabay.com/photo/2014/06/18/13/20/departure-platform-371218_1280.jpg");
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
            display: block;
            margin-top: 18px;
            margin-bottom: 18px;
            padding: 20px;
            border: 2px solid black;
            border-radius: 15px;
            margin-left: auto;
            margin-right: auto;
        }
        .imp1 {
          align-items: center;
            font-size: large;
            color: black;
            background-color: #cbcac8a8;
            text-align: center;
            width:40%;
            display: block;
            margin-top: 10px;
            padding: 20px;
            border: 2px solid black;
            border-radius: 15px;
            margin-left: auto;
            margin-right: auto;
        }
        .imp2 {
          align-items: center;
            font-size: large;
            color: black;
            background-color: #cbcac8a8;
            text-align: center;
            width:40%;
            display: block;
            margin-top: 10px;
            padding: 20px;
            border: 2px solid black;
            border-radius: 15px;
            margin-left: auto;
            margin-right: auto;
        }

        h1 {
            margin: 0px;
            padding: 0px;
            color: brown;
            text-align: center;
        }

        input[type="text"] {
            border: 2px solid black;
            font-size: 24px;
            text-align: center;
            height: 31px;
            border-radius: 10px;
            width: 100%;
            margin: auto;
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
            margin-left: auto;
            font-size: 24px;
            text-align: center;
            height: 40px;
            border-radius: 10px;
            width: 60%;
            margin-top: 10px;
        }

        button:hover {
            cursor: pointer;
            /* margin: 5px auto; */
            height: 50px;
            border-radius: 10px;
            width: 70%;
            background-color: black;
            color: rgb(255, 255, 255);
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
            text-decoration: none;
            /* background-color: rgb(155, 155, 155, 0.6); */
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
        <h1>Booking Details</h1>
        <form class="formm" action="book.php" method="post">

            <label for="">Total passengers:-</label>
            <input type="text" name="passenger_count" value="">


            <label for="">Seats Type:-</label>
            <div class="trouble">
                <div class="sleeper">
                    <input type='radio' name='seat' value='SL'>
                    <p> SLEEPER</p>
                </div>
                <div class="ac">
                    <input type='radio' name='seat' value='AC'>
                    <p>AC</p>
                </div>
            </div>

            <div>
                <!-- <input type="date" name="date_id"> -->
                <!-- <button onclick="myFunction1()">A</button> -->
                <button type="submit" class="button button1" name="button">Next</button>
            </div>
        </form>
        <a href="log_out.php">Log Out...</a>
    </div>

</body>

</html>
<?php
if(isset($_POST['button'])){
  $passenger=$_POST['passenger_count'];
  $_SESSION['passenger']=$passenger;
  $seat=$_POST['seat'];
  $berth_number="";
  $coach_number="";
  $_SESSION['seat']=$seat;
  $check=1;
  // check for passenger_count
  if($seat=='AC')
  {
    if($_SESSION['remain_ac']<$passenger)
    {
      echo "<div class=imp1>Error  <hr>".$passenger." Seats not Available</div>";
      $check=0;

    }
    else {
      $coach_no=$_SESSION['remain_ac'];
      $_SESSION['coach_no']=$coach_no;
      $coach_number=ceil($coach_no/18);
      $berth_number=$coach_no%18+1;

    }
  }
    else if($seat=='SL')
  {
    if($_SESSION['remain_sl']<$passenger)
    {
      echo "Error  <hr>".$passenger." Seats not Available";
      $check=0;
    }
    else {
      $coach_no=$_SESSION['remain_sl'];
      $_SESSION['coach_no']=$coach_no;
      $coach_number=ceil($coach_no/24)+$_SESSION['total_ac'];
      $berth_number=$coach_no%24+1;

    }
  }
  // generate PNR Number
  // insert Ticket into ticket mysql
  if($check){
  $pnr=$train_id.$todaysdate.$coach_number.$berth_number;
  $_SESSION['coach_number']=$coach_number;
  $_SESSION['berth_number']=$berth_number;

  $_SESSION['pnr']=$pnr;
  $x=$passenger;
  if($x>0){
  echo "<div class=imp2>Generated PNR no:-".$pnr."<br>";
  echo "<form action='booking_complete.php' method='post'>";
  while($x>0)
  {
    echo "<label>Name:-</label><input type='text' name='pass$x' value>";
    echo "<label> Age:-</label><input type='text' name='age$x' value>";
    echo "<label> Gender:-</label>
    <input type='radio' name='gen$x' value='M'> Male
    <input type='radio' name='gen$x' value='F'> Female
    ";
    $x--;
    echo"<br>";
  }
echo "<button type='submit' class='button button1' name='button'>Complete Registration</button>";
  echo "</form></div>";
}
}
}
    // insert data here
 ?>
