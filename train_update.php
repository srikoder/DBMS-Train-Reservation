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
  </head>
  <body>
    <h1>Insert Train</h1>
    <form class="" action="train_update.php" method="post">
      <div class="">
        <label for="">Enter Train ID:</label>
        <input type="text" name="train_id" value="">
      </div>
      <div class="">
        <label for="">Select Date of running:</label>
        <input type="date" name="date_id" value="">
      </div>
      <div class="">
        <label for="">Number of AC Coachs:</label>
        <input type="text" name="ac_value" value="">
      </div>
      <div class="">
        <label for="">Number of Sleeper Coachs:</label>
        <input type="text" name="sl_value" value="">
      </div>
      <button type="submit" class="button button1"name="submit">Insert Train Into System</button>
    </form>
  </body>
</html>
<?php
//write $query
if(isset($_POST['submit']))
{
  $train_id=$_POST['train_id'];
  $todaysdate=$_POST['date_id'];
  $arr=explode("-",$todaysdate);
  $todaysdate=$arr[2].$arr[1].$arr[0];  
  $ac=$_POST['ac_value'];
  $sl=$_POST['sl_value'];
  //add query
  $remain_ac=18*$ac;
  $remain_sl=24*$sl;
  $price_ac=0;
  $price_sl=0;
  echo $train_id;

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
    '0'
	)";

  if ($conn->query($sql) === TRUE) {
    echo "New train inserted successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  echo "    <a href='train_update.php'>Insert New Train</a>";
  echo "    <a href='train_update.php'>Update Database</a>";
  echo "    <a href='log_out.php'>Log Out</a>";

}


 ?>
