<?php
session_start();
error_reporting(0);
include('config.php');
include "header.php";

if (isset($_POST['data'])) {
  $date = $_POST['date'];
  $time1 = $_POST['time1'];
  $bbreakfast = $_POST['bbreakfast'];
  $time2 = ($_POST['time2']);
  $breakfast = ($_POST['breakfast']);
  $time3 = ($_POST['time3']);
  $lunch = ($_POST['lunch']);
  $time4 = ($_POST['time4']);
  $dinner = ($_POST['dinner']);
  $level = $_POST['level'];


  $sql = "INSERT INTO  tbldata(date,time1,beforebreakfast,time2,breakfast,time3,lunch,time4,dinner,afterdinner) VALUES(:date,:time1,:bbreakfast,:time2,:breakfast,:time3,:lunch,:time4,:dinner,:level)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':date', $date, PDO::PARAM_STR);
  $query->bindParam(':time1', $time1, PDO::PARAM_STR);
  $query->bindParam(':bbreakfast', $bbreakfast, PDO::PARAM_STR);
  $query->bindParam(':time2', $time2, PDO::PARAM_STR);
  $query->bindParam(':breakfast', $breakfast, PDO::PARAM_STR);
  $query->bindParam(':time3', $time3, PDO::PARAM_STR);
  $query->bindParam(':lunch', $lunch, PDO::PARAM_STR);
  $query->bindParam(':time4', $time4, PDO::PARAM_STR);
  $query->bindParam(':dinner', $dinner, PDO::PARAM_STR);
  $query->bindParam(':level', $level, PDO::PARAM_STR);

  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if ($lastInsertId) {
    echo "<script>alert('Your data has been saved successfully');</script>";
    header("location: diabetisdata.php");
  } else {
    echo "<script>alert('Something went wrong. Please try again');</script>";
  }
}

?>


<html>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>diabetis data</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<style>
  input[type=text],
  input[type=email],
  input[type=number],
  input[type=password],
  select {
    width: 40%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #2fb645e1;
    border-radius: 4px;
    box-sizing: border-box;
  }

  input[type=time] {
    width: 10%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #2fb645e1;
    border-radius: 4px;
    box-sizing: border-box;

  }

  input[type=date],
  input[type=number] {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #2fb645e1;
    border-radius: 4px;
    box-sizing: border-box;

  }

  input[type=submit] {
    width: 40%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  input[type=submit]:hover {
    background-color: #45a049;
  }

  div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
  }
</style>

<body>
  <center>

    <h3>FILL OUT DIABETIS RELATED DATA</h3>

    <div>
      <form method="post" action="diabetisdata.php">

        <label>Date</label><br>
        <input type="date" name="date" placeholder=""><br>



        <label> Time and Blood sugar Level/Fasting before Breakfast</label><br>
        <input type="time" id="appt" name="time1">
        <input type="text" id="fname" name="bbreakfast" placeholder="time and what you ate before breakfast"><br>

        <label>Time and What you ate for Breakfast</label><br>
        <input type="time" id="appt" name="time2">
        <input type="text" name="breakfast" placeholder="time and what you ate for breakfast"><br>

        <label>Time and What you ate for Lunch</label><br>
        <input type="time" id="appt" name="time3">
        <input type="text" name="lunch" placeholder="time and what you ate for lunch"><br>

        <label>Time and What you ate for Dinner</label><br>
        <input type="time" id="appt" name="time4">
        <input type="text" name="dinner" placeholder="time and what you ate for dinner"><br>

        <label>Blood sugar level 2 hrs after eating dinner</label><br>
        <input type="number" name="level"><br>





        <input type="submit" name="data" value="Submit">
      </form><br>


    </div>
  </center>

</body>

</html>