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
$passanger=$_SESSION['passanger'];
$coach_no=$_SESSION['coach_no'];
if($_SESSION['select']=='1')
{
  $coach_type='AC';

}
if($_SESSION['select']=='2')
{
  $coach_type='SL';
}
  //run ticket query
  $sql="INSERT INTO
  ticket_desc_future
  VALUES
  (
    '$pnr',
		'$todaysdate',
		'$train_id',
		'$agent_id',
		'$passanger',
		'$coach_type'
  )";

  if ($conn->query($sql) === TRUE) {
    echo "New ticket with PNR No.".$pnr." generated successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  while($passanger>0)
  {
    // run individual queries
    $name=$_POST['pass'.$passanger];
    $age=$_POST['age'.$passanger];
    $gender=$_POST['$gen'.$passanger];


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
    echo "passanger On board successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  //  echo $x;
    $passanger--;
  }
  echo "<a href='pnr_status.php'>Check PNR Status</a>"
 ?>
