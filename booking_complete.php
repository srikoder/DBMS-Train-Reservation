<?php
include('connect.php');
error_reporting(0);
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Hello</title>
  </head>
  <body>
    <a href="index.php">Go Back!!!</a>
    <br>
    <hr>
  </body>
</html>
<?php
$pnr=$_SESSION['pnr'];
$todaysdate=$_SESSION['datee'];
$train_id=$_SESSION['train_id'];
$agent_id=$_SESSION['agent_id'];
$passenger=$_SESSION['passenger'];
$coach_number=$_SESSION['coach_number'];
$coach_no=$_SESSION['coach_no'];
$coach_type=$_SESSION['seat'];
$berth_number=$_SESSION['berth_number'];
$berth_type="";
  //run ticket query
  $sql="INSERT INTO
  ticket_desc_future
  VALUES
  (
    '$pnr',
		'$todaysdate',
		'$train_id',
		'$agent_id',
		'$passenger',
		'$coach_type'
  )";

  if ($conn->query($sql) === TRUE) {
    echo "New ticket with PNR No.".$pnr." generated successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  while($passenger>0)
  {
    // run individual queries
    $name=$_POST['pass'.$passenger];
    $age=$_POST['age'.$passenger];
    $gender=$_POST['$gen'.$passenger];

//berth type...
if($coach_type=='SL'){
$sql3=mysqli_query($conn,"select * from coach_desc_sl where berth_number='$berth_number'")  or die("Error");}
if($coach_type=='AC'){
$sql3=mysqli_query($conn,"select * from coach_desc_ac where berth_number='$berth_number'")  or die("Error");}
while($row=mysqli_fetch_array($sql3))
{
  $berth_type=$row['berth_type'];
}


    $sql2="INSERT INTO
	passenger_desc_future
VALUES
	(
		'$name',
		'$age',
		'$gender',
		'$pnr',
		'$berth_number',
		'$berth_type',
		'$coach_number'
	)";
  if ($conn->query($sql2) === TRUE) {
    echo "passenger On board successfully";
  } else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
  }

  //  echo $x;
    $passenger--;
    $coach_no--;
    if($coach_type=='AC')
    {
        $coach_number=$coach_no/18+1;
        $berth_number=$coach_no%18+1;
    }
    if($coach_type=='SL')
    {
        $coach_number=$coach_no/24+1;
        $berth_number=$coach_no%24+1;
    }
  }
  echo "</br><a href='pnr_status.php'>Check PNR Status</a>"
 ?>
