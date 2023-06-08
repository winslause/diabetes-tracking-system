<?php
session_start();
error_reporting(0);
include('config.php');

if (isset($_POST['register'])) {
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $mobile = $_POST['phone'];
  $birth = ($_POST['dob']);
  $username = ($_POST['uname']);
  $password1 = ($_POST['pass1']);
  $quiz1 = ($_POST['pass2']);
  $answer1 = ($_POST['answer1']);
  $quiz2 = ($_POST['pass3']);
  $answer2 = ($_POST['answer2']);
  $quiz3 = ($_POST['pass4']);
  $answer3 = ($_POST['answer3']);
  $pass5 = ($_POST['image']);



  $sql = "INSERT INTO  tblusers(fullname,email,phone,birth,username,password1,quiz1,password2,quiz2,password3,quiz3,password4,password5) VALUES(:fullname,:email,:mobile,:birth,:username,:password1,:quiz1,:answer1,:quiz2,:answer2,:quiz3,:answer3,:pass5)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':fullname', $fullname, PDO::PARAM_STR);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
  $query->bindParam(':birth', $birth, PDO::PARAM_STR);
  $query->bindParam(':username', $username, PDO::PARAM_STR);
  $query->bindParam(':password1', $password1, PDO::PARAM_STR);
  $query->bindParam(':quiz1', $quiz1, PDO::PARAM_STR);
  $query->bindParam(':answer1', $answer1, PDO::PARAM_STR);
  $query->bindParam(':quiz2', $quiz2, PDO::PARAM_STR);
  $query->bindParam(':answer2', $answer2, PDO::PARAM_STR);
  $query->bindParam(':quiz3', $quiz3, PDO::PARAM_STR);
  $query->bindParam(':answer3', $answer3, PDO::PARAM_STR);
  $query->bindParam(':pass5', $pass5, PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if ($lastInsertId) {
    echo "<script>alert('Registration successfull. Now you can login');</script>";
    header("location: login.php");
  } else {
    echo "<script>alert('Something went wrong. Please try again');</script>";
  }
}

?>


<html>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>register</title>
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
  // include "header.php";
  ?>

  <center>

    <h3>Register and create profile</h3>

    <div>
      <form action="index.php" method="post">
        <label for="fname">Full Name</label><br>
        <input type="text" id="fname" name="fullname" placeholder="Your full name.."><br>

        <label for="email">Email</label><br>
        <input type="email" id="email" name="email" placeholder="Your Email"><br>

        <label for="phone">Phone Number</label><br>
        <input type="number" id="phone" name="phone" placeholder="Your Phone number"><br>

        <label>Date of birth</label><br>
        <input type="date" name="dob" placeholder=""><br>

        <label>Username</label><br>
        <input type="text" name="uname" placeholder="username"><br>

        <label>First password</label><br>
        <input type="password" name="pass1" placeholder="password" minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Your password is weak. It must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>



        <label for="pass2">Second password(select any 3 question from the list)</label><br>
        <select id="pass2" name="pass2">
          <?php $ret = "select id,quiz from tblquiz";
          $query = $dbh->prepare($ret);
          //$query->bindParam(':id',$id, PDO::PARAM_STR);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);
          if ($query->rowCount() > 0) {
            foreach ($results as $result) {
          ?>
              <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->quiz); ?></option>
          <?php }
          } ?>
        </select><br>
        <label></label><br>
        <input type="text" name="answer1" placeholder="your first answer"><br>

        <select id="pass2" name="pass3">
          <?php $ret = "select id,quiz from tblquiz";
          $query = $dbh->prepare($ret);
          //$query->bindParam(':id',$id, PDO::PARAM_STR);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);
          if ($query->rowCount() > 0) {
            foreach ($results as $result) {
          ?>
              <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->quiz); ?></option>
          <?php }
          } ?>

        </select><br>
        <input type="text" name="answer2" placeholder="your second answer"><br>


        <select id="pass2" name="pass4"><br>


          <?php $ret = "select id,quiz from tblquiz";
          $query = $dbh->prepare($ret);
          //$query->bindParam(':id',$id, PDO::PARAM_STR);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);
          if ($query->rowCount() > 0) {
            foreach ($results as $result) {
          ?>
              <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->quiz); ?></option>
          <?php }
          } ?>
        </select><br>

        <input type="text" name="answer3" placeholder="your third answer"><br>
        OR
        <br>
        <button class="btn btn-primary"><a style="color:white" href="questions.php">Create your own question</a></button><br>

        <br>
        <label>Password 3</label><br>
        <label>
          <p>Please select one of the images below:</p>
        </label><br>
        <?php
        $sql = "SELECT * from tblimages";

        $query = $dbh->prepare($sql);

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {
          foreach ($results as $result) {

        ?>

            <div class="container" style="display:inline">

              image1(3.jpeg) <img src="./image/<?php echo htmlentities($result->fimage); ?>" alt="image" width="200" height="200">
              image2(4.jpeg)<img src="./image/<?php echo htmlentities($result->simage); ?>" alt="image" width="200" height="200">

              image3(5.jpeg)<img src="./image/<?php echo htmlentities($result->timage); ?>" alt="image" width="200" height="200">
            </div>
        <?php }
        } ?>
        <select name="image" id="">
          select one image as your password

          <?php $ret = "select id,fimage,simage,timage from tblimages";
          $query = $dbh->prepare($ret);
          //$query->bindParam(':id',$id, PDO::PARAM_STR);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);
          if ($query->rowCount() > 0) {
            foreach ($results as $result) {
          ?>
              <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->fimage); ?></option>
              <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->simage); ?></option>
              <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->timage); ?></option>
          <?php }
          } ?>
        </select><br>



        <input type="submit" name="register" value="Submit">
      </form><br>
      <button class="btn btn-success"><a style="color:white" href="login.php">Allready have an account: Login</a></button>


    </div>
  </center>


</body>


</html>