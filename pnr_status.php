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
            display: grid;
            /* justify-content: center; */
            align-items: center;
            background-image: url("https://cdn.pixabay.com/photo/2019/08/24/13/25/tunnel-4427609_1280.jpg");
            /* background-repeat: repeat-y; */
            background-repeat: no-repeat;
            background-size: cover;
        }

        .imp {
            margin-left: auto;
            margin-right: auto;
            font-size: large;
            color: black;
            background-color: #cbcac8a8;
            text-align: center;
            width: 65%;
            display: block;
            margin-top: 8px;
            padding: 20px;
            border: 2px solid black;
            border-radius: 15px;
        }

        h2 {
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
            /* margin: 5px auto; */
            background-color: black;
            color: rgb(255, 255, 255);
        }

        a:hover {
            margin: 10px auto;
            text-decoration: none;
            background-color: black;
            color: rgb(255, 255, 255);
            border-radius: 5px;
            padding: 7px;
            /* margin-top: 10px; */
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
        <form class="" action="pnr_status.php" method="post">
            <div class="">
                <label for=""><h2> Enter PNR Number:</h2></label>
                <input type="text" name="pnr" value="">
            </div>
            <button type="submit" name="button">Generate Ticket</button>

        </form>
        <a href="index.php">Go Back!!!</a>
    </div>

</body>

</html>

<?php
if(isset($_POST['button']))

{
  $pnr=$_POST['pnr'];
  $sql=mysqli_query($conn,"select * from ticket_desc_future where PNR_number='$pnr'") or die("PNR number does not exist");
  while($row=mysqli_fetch_array($sql))
  {
    echo "<div class=imp>Status of Booking: Comfirmed";
    echo "<br>Train ID:\t".$row['train_id'];
    echo "<br>Date of Journey(YYYMMDD):\t".$row['date_of_journey'];
    echo "<br>PNR Number:\t".$row['PNR_number'];
    echo "<br>Total Passengers Onboard:\t".$row['passenger_count'];
    echo "<br> Coach Type:\t".$row['coach_type'];
    echo "<br>Agent ID:\t".$row['agent_id']."</div>";
  }
  echo "<div class=imp><h2>Passengers Details</h2>";

  $sql3=mysqli_query($conn,"SELECT * FROM passenger_desc_future WHERE PNR_number='$pnr'")  or die("Error2");

    echo "<table border='1'>
    <tr>
    <th>Passenger Name</th>
    <th>Age</th>
    <th>Gender</th>
    <th>Berth Number</th>
    <th>Berth Type</th>
    <th>Coach Number</th>

    </tr>";
    while($row = mysqli_fetch_array($sql3)) {
      echo "<tr>";
    echo "<td>" . $row['passenger_name'] . "</td>";
    echo "<td>" . $row['age'] . "</td>";
    echo "<td>" . $row['gender'] . "</td>";
    echo "<td>" . $row['berth_number'] . "</td>";
    echo "<td>" . $row['berth_type'] . "</td>";
    echo "<td>" . $row['coach_number'] . "</td>";
    // echo "<td>" . $row['doctor'] . "</td>";
    echo "</tr>";

    }
    echo"</table></div>";

}

 ?>
