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
    <a href="log_out.php">Log Out!!!</a>
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
    echo "New ticket with PNR No.".$pnr." generated successfully<br>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  while($passenger>0)
  {
    // run individual queries
    $name=$_POST['pass'.$passenger];
    $age=$_POST['age'.$passenger];
    $gender=$_POST['gen'.$passenger];

//berth type...
if($coach_type=='SL'){
$sql3=mysqli_query($conn,"select * from coach_desc_sl where berth_number='$berth_number'")  or die("Error");
$coach_number+=$_SESSION['total_ac'];}
else if($coach_type=='AC'){
$sql3=mysqli_query($conn,"select * from coach_desc_ac where berth_number='$berth_number'")  or die("Error");
}
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
    echo "<br>passenger On board successfully";
  } else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
  }

  //  echo $x;
    $passenger--;
    $coach_no--;
    if($coach_type=='AC')
    {
        $coach_number=ceil($coach_no/18);
        $berth_number=($_SESSION['total_ac']*18-$coach_no)%18+1;
    }
    else if($coach_type=='SL')
    {
        $coach_number=ceil($coach_no/24);
        $berth_number=($_SESSION['total_sl']*24-$coach_no)%24+1;
    }
  }

  $sql4=mysqli_query($conn,"select * from train_desc_future where train_id='$train_id' && date_of_journey='$todaysdate' && train_status='0' ")  or die("Error2");
  while($row=mysqli_fetch_array($sql4))
  {
    if($row['remain_AC_seats']==0 && $row['remain_SL_seats']==0)
    {
      $sql5 = "UPDATE train_desc_future SET train_status='1' WHERE train_id='$train_id' && date_of_journey='$todaysdate'";

      if ($conn->query($sql5) === TRUE) {
        echo "<br>Train Full. No more Insertions Possible";
      } else {
        echo "Error updating record: " . $conn->error;
      }
    }
  }


  echo "<hr></br><a href='pnr_status.php'>Check PNR Status</a>"

 ?>
