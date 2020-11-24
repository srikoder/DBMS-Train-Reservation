<?php
include('connect.php');
error_reporting(0);
session_start();
//  $passanger=$_POST['passanger_count'];
  $train_id=$_SESSION['trainid'];
  $todaysdate=$_SESSION['datee'];

  // run query for ac seats;
  echo "<br>Train ID: ".$train_id;
  echo "<br>Date of Running: ".$todaysdate;
  echo "<br>Available AC coachs: ".$row['remain_AC_seats'];
  echo "<br>Available Sleeper Coachs: ".$row['remain_SL_seats'];
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Take Attendence</title>
    <link rel="stylesheet" href="">
    <!-- <script type="text/javascript" src="script.js"></script> -->
  </head>
  <body>
<h4>Booking Details</h4>
<form class="formm" action="book.php" method="post">
  <div class="passanger_no">
    <label for="">Total Passangers:-</label>
    <input type="text" name="passanger_count" value="">
  </div>
  <div>
    <label for="">Seats Type:-</label>
    <input type='radio' name='seat' value='SL'> Sleeper
    <input type='radio' name='seat' value='AC'> AC
  </div>
  <div>
    <!-- <input type="date" name="date_id"> -->
    <!-- <button onclick="myFunction1()">A</button> -->
    <button type="submit" class="button button1" name="button">Next</button>
  </div>
</form>
  </body>
</html>
<?php
  $passanger=$_POST['passanger_count'];
  $_SESSION['passanger']=$passanger;
  $seat=$_POST['seat'];
  $_SESSION['seat']=$seat;

  // check for passanger_count
  if($seat=='AC')
  {
    if($_SESSION['remain_ac']<$passanger)
    {
      echo "Kill ".$_SESSION['remain_ac']-$passanger." Passangers";
    }
    else {
      $coach_no=$_SESSION['remain_ac'];
      $_SESSION['select']='1';
      $_SESSION['coach_no']=$coach_no;

    }
  }
  if($seat=='SL')
  {
    if($_SESSION['remain_sl']<$passanger)
    {
      echo "Kill ".$_SESSION['remain_sl']-$passanger." Passangers";
    }
    else {
      $coach_no=$_SESSION['remain_sl'];
      $_SESSION['select']='2';
      $_SESSION['coach_no']=$coach_no;

    }
  }
  // generate PNR Number
  // insert Ticket into ticket mysql
  $pnr=$train_id.$name.$todaysdate.$coach_no;
  $_SESSION['pnr']=$pnr;
  $x=$passanger;
  if($x>0){
  echo "Generated PNR no:-".$pnr."<br>";
  echo "<form action='booking_complete.php' method='post'>";
  while($x>0)
  {
    echo "<label>Name:-</label><input type='text' name='pass$x' value>";
    echo "<label> Age:-</label><input type='text' name='age$x' value>";
    echo "<label> Gender:-</label>
    <input type='radio' name='gen$x' value='M'> Male
    <input type='radio' name='gen$x' value='F'>Female
    ";
    $x--;
    echo"<br>";
  }
echo "<button type='submit' class='button button1' name='button'>Complete Registration</button>";
  echo "</form>";
}
    // insert data here
 ?>
