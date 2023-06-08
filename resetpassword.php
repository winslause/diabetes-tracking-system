<?php
session_start();
error_reporting(0);
include('config.php');

if (isset($_POST['reset'])) {
    // Get user email from form
    $email = $_POST['email'];

    function generateRandomString($n)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }


 
    $new_password = generateRandomString(8);

    // Hash the new password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Update the user's password in the database
    $query = $dbh->prepare("UPDATE tblusers SET password1 = :password WHERE email = :email");
    $query->bindParam(':password', $new_password);
    $query->bindParam(':email', $email);
    $query->execute();

    // Send an email with the new password to the user
    $to = $email;
    $subject = 'Password Reset';
    $message = "Your new password is: " . $new_password;
    $headers = 'From: winslause.busale@students.kyu.ac.ke' . "\r\n" .
    'Reply-To: winslause.busale@students.kyu.ac.ke' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);

    // Redirect to login page
    header('Location: login.php');

    




    
}

?>


<html>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>reset password</title>
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

        <h3> Resest Password</h3>

        <div>
            <form action="" method="post">
                <label for="fname">Enter Email</label><br>
                <input type="email" id="fname" name="email" placeholder="enter email.."><br>





                <input type="submit" name="reset" value="Submit">
            </form><br>
            <button class="btn btn-success"><a style="color:white" href="login.php"> Login</a></button>


        </div>
    </center>


</body>


</html>