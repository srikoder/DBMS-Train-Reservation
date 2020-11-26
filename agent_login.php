<?php
session_start();
include('connect.php');
error_reporting(0);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Take Attendence</title>
    <link rel="stylesheet" href="">
    <!-- <script type="text/javascript" src="script.js"></script> -->
    <style>
        * {
            font-family: 'Baloo Bhai 2', cursive;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url("https://cdn.pixabay.com/photo/2016/03/05/23/02/blur-1239439_1280.jpg");
            /* background-repeat: repeat-y; */
            background-repeat: no-repeat;
            background-size: cover;
        }

        .imp {
            font-size: large;
            color: black;
            background-color: #cbcac8a8;
            text-align: center;
            width: 45%;
            display: block;
            margin-top: 108px;
            padding: 20px;
            border: 2px solid black;
            border-radius: 15px;
        }

        h1 {
            margin: 0px;
            padding: 0px;
            color: brown;
            text-align: center;
        }

        input {
            border: 2px solid black;
            font-size: 24px;
            text-align: center;
            height: 31px;
            border-radius: 10px;
            width: 100%;
            margin: 10px 0px;
            display: inline;
        }

        input[type="radio"] {
            height: 2em;
            width: 3%;
            display: inline;
            margin: 0px;
            /* border: 2px solid black; */
        }

        button {
            border: 3px solid black;
            margin: auto;
            font-size: 24px;
            text-align: center;
            height: 40px;
            border-radius: 10px;
            width: 60%;
            margin-top: 10px;
            display: block;
        }

        label {
            display: block;
            margin-top: 20px;
            font-size: 31px;
        }

        form {
            margin-top: 20px;
        }

        a {
            position: relative;
            top: 10px;
            text-decoration: none;
            /* background-color: rgb(155, 155, 155, 0.6); */
            color: rgb(0, 0, 0);
        }

        button:hover {
            height: 50px;
            border-radius: 10px;
            width: 70%;
            cursor: pointer;
            background-color: black;
            color: rgb(255, 255, 255);
        }

        a:hover {
            text-decoration: none;
            background-color: black;
            color: rgb(255, 255, 255);
            border-radius: 5px;
            padding: 7px;
            margin-top: 10px;
        }

        p {
            display: inline;
            margin: 0px;
            color: rgb(255, 0, 0);
        }

        .ac {
            display: inline;
            /* margin-right: 121px; */
        }

        .sleeper {
            display: inline;
            /* margin-right: 53px; */
        }

        .trouble {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="imp">
        <form action="agent_login.php" method="post">
            <!-- <div>
         <img src="logo.png">
      </div> -->


            <h1><b>Agent Login</b></h1>
            <div class="formcontainer">
                <hr>
                <div class="container">

                    <input type="text" placeholder="Agent ID" name="user" required>
                    <br>
                    <input type="password" placeholder="Password" name="psw" required>
                </div>
                <button type="submit" name="submit">Login</button>
                <span class="pssw"><a href="#"> Forgot password?</a></span>
                <span class="pssw"><a href="index.php"> Go Back?</a></span>

        </form>
        </div>

</body>

</html>

<?php
if(isset($_POST['submit'])){
$user=$_POST['user'];
$psw=$_POST['psw'];
if($user!="" && $psw!="" )
{

// $query="SELECT * FROM USERINFO WHERE 1";

$query="SELECT * FROM agent WHERE agent_id='$user' && agent_password='$psw'";

$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);
// echo $total;

if($total>0)  //After Accepted
{
  header('location:train_check.php');
  $_SESSION['agent_id']=$user;
  /*
  Enter Code here
  */
}
else if($total==0)
{
  echo "<h5>Plz enter correct username or password</h5>";
}


}
}

 ?>
