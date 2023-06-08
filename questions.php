<?php
session_start();
error_reporting(0);
include('config.php');

if (isset($_POST['register'])) {
    $quiz = $_POST['question'];




    $sql = "INSERT INTO  tblquiz(quiz) VALUES(:quiz)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':quiz', $quiz, PDO::PARAM_STR);

    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
        echo "<script>alert(' Security question added successfully');</script>";
        header("location: login.php");
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
    }
}

?>


<html>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>create security question</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<style>
    input[type=text],
    input[type=email],
    input[type=number],
    input[type=date],
    input[type=password],
    select {
        width: 40%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
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

<body class="container">
    <?php
    include "header.php";
    ?>

    <center>

        <h3> create security question</h3>

        <div>
            <form action="" method="post">
                <label for="fname">Enter question</label><br>
                <input type="text" id="fname" name="question" placeholder="create question.."><br>





                <input type="submit" name="register" value="Submit">
            </form><br>
            <button class="btn btn-success"><a style="color:white" href="login.php">Allready have an account: Login</a></button>


        </div>
    </center>


</body>


</html>