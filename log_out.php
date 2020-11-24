<?php
session_start();
include('connect.php');
error_reporting(0);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script language="javascript" type="text/javascript">
      window.history.forward();
    </script>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <script>
  if(confirm("Confirm Log Out!!!"))
  {
    <?php
    session_start();
    session_unset();
     ?>
    location="index.php";
  }
  else
  {
  location="index.php";
  }
</script>

  </body>
</html>
