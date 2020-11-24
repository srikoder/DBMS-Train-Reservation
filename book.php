<?php
include('connect.php');
error_reporting(0);
session_start();
//  $passenger=$_POST['passenger_count'];
  $train_id=$_SESSION['train_id'];
  $todaysdate=$_SESSION['datee'];

  // run query for ac seats;
  echo "<hr><br>Train ID: ".$train_id;
  echo "<br>Date of Running: ".$todaysdate;
  echo "<br>Available AC coachs: ".$_SESSION['remain_ac'];
  echo "<br>Available Sleeper Coachs: ".$_SESSION['remain_sl'];
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
  <div class="passenger_no">
    <label for="">Total passengers:-</label>
    <input type="text" name="passenger_count" value="">
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
      echo "Error  <hr>".$passenger." Seats not Available";
      $check=0;

    }
    else {
      $coach_no=$_SESSION['remain_ac'];
      $_SESSION['coach_no']=$coach_no;
      $coach_number=$coach_no/18+1;
      $berth_number=$coach_no%18+1;

    }
  }
  if($seat=='SL')
  {
    if($_SESSION['remain_sl']<$passenger)
    {
      echo "Error  <hr>".$passenger." Seats not Available";
      $check=0;
    }
    else {
      $coach_no=$_SESSION['remain_sl'];
      $_SESSION['coach_no']=$coach_no;
      $coach_number=$coach_no/24+1;
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
  echo "Generated PNR no:-".$pnr."<br>";
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
  echo "</form>";
}
}
}
    // insert data here
 ?>
