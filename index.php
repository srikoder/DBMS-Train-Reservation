<?php
include('connect.php');
error_reporting(0);

 ?>
<!DOCTYPE html>
<html>
  <head>
    <!-- <script language="javascript" type="text/javascript">
      window.history.forward();
    </script> -->
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      html, body {
      background-color: #f5f5f5;
      display: flex;
      justify-content: center;
      font-family: montserrat;
      font-size: 15px;
      }
      form {
      text-align: center;
      margin: 50px;
      width: 800px;
      height: 500px;
      background-color: #efe;
      border-radius: 20px;
      border: 5px solid #81fa63;
     box-shadow: 5px 10px 8px #dbd5d5;
      }
      input[type=text], input[type=password] {
      width: 70%;
      padding: 16px 8px;
      margin: 5px 15% ;
      display: block;
      border: none;
      border-bottom: 4px solid #8ebf42;
      font-size: 18px;
      /* text-align: center; */
       /* border: px solid #6cff69;  */
      box-sizing: border-box;

      }
      button {
      display: block;
      align-items: center;
      background-color: #8ebf42;
      color: white;
      padding: 10px;
      margin: 25px 25%;
      border: none;
      border-radius: 10px;
      outline: none;
      background-size: 200%;
      cursor: pointer;
      text-align: center;
      width: 50%;
    }
      h1 {
        /* text-shadow: 2px 2px 15px #80ff90; */
      color: #51cc61;
      text-align:center;
      font-size: 60px;
      padding-top: 2px;
      }
      br{
      	padding: 15px;
      }
      hr{
        border: 2px solid #51cc61;
      }
      h5{
        color: red;
      }
      button:hover {
      opacity: 0.8;

      }
      input:focus {
    background-color: lightblue;
  border: 1px solid #51cc61;
  }
     img
      {
        padding: 5px 5px;
        margin: 1%;
        display: inline-block;
        width: 150px;
        height: 150px;


      }
      .formcontainer {

      text-align: left;
      padding: 5px 5px;
      margin: 14px 50px 12px;
      }

      span.pssw {
        display: block;
      text-align:center;
      font-size: 15px;
      float: center;
      padding: 5px 0px;
      }

      /* Change styles for span on extra small screens */
      @media screen and (max-width: 300px) {
      }
      span.psw {
      display: block;
      float: none;
      }
    </style>
  </head>
  <body>

    <form action="index.php" method="post">
      <h1><b>Portal</b></h1>
      <div class="formcontainer">
      <button type="submit" name="submit1" ><h3>Admin Login</h3></button>
      <button type="submit" name="submit2" ><h3>Agent Login</h3></button>
      <button type="submit" name="submit3" ><h3>PNR No. Status</h3></button>

    </form>
  </body>
</html>



<?php
if(isset($_POST['submit1'])){
  header('location:admin_login.php');
}
if(isset($_POST['submit2']))
{
  header('location:agent_login.php');
}
if(isset($_POST['submit3']))
{
  header('location:pnr_status.php');
}

 ?>
