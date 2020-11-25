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
  </head>
  <body>
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
      echo "<br>Train ID: ".$train_id;
      echo "<br>Date of Running: ".$_SESSION['datee'];
      $_SESSION['remain_ac']=$row['remain_AC_seats'];
      $_SESSION['remain_sl']=$row['remain_SL_seats'];
      echo "<br>Available AC coachs: ".$row['remain_AC_seats'];
      echo "<br>Available Sleeper Coachs: ".$row['remain_SL_seats'];
      echo "<br><a href='book.php'>Proceed for Booking the Seats</a>";

    }
    }


    if(isset($_POST['button'])){
    // echo $todays_date;
    $todaysdate=$_SESSION['datee'];
  $sql3=mysqli_query($conn,"SELECT * FROM train_desc_future WHERE date_of_journey='$todaysdate'")  or die("Error2");
  echo "<br>Available Trains on Date: ". $_SESSION['datee'];


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
    echo"</table>";
  }

     ?>
