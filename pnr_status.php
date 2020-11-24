<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Check PNR Status</title>
  </head>
  <body>
    <form class="" action="pnr_status.php" method="post">
      <div class="">
        <label for="">Enter PNR Number</label>
        <input type="text" name="pnr" value="">
      </div>
      <button type="submit" name="button">Generate Ticket</button>

    </form>
  </body>
</html>
<?php
if(isset($_POST['button']))

{
  $pnr=$_POST['pnr'];

  $sql=mysqli_query("select * from ticket_desc_future where PNR_number=='$pnr'");
  $row=mysqli_fetch_array($sql);
  echo "<hr>";
  print_r($row);
}

 ?>
