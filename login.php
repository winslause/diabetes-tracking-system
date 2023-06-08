<?php
session_start();
error_reporting(0);
include('config.php');



try {


  if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tblusers WHERE username = :username AND password1 = :password";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      // Login Success 
      echo "Login Successful";
      header("location: data.php");
    } else {
      // Login Failed 
      echo "<script>alert('Your username/password is wrong. Try again')</script>";
    }
  }
} catch (PDOException $e) {
  die("Error: " . $e->getMessage());
}
?>




<html>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>login</title>
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

<body>

  <?php
  // include "header.php";


  ?>
  <center>

    <h3>LOGIN</h3>

    <div>
      <form action="" method="post">

        <label>Username</label><br>
        <input type="text" name="username" placeholder="username"><br>

        <label>First password</label><br>
        <input type="password" name="password" placeholder="password" required><br>



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
              image2(4.jpeg<img src="./image/<?php echo htmlentities($result->simage); ?>" alt="image" width="200" height="200">

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



        <input type="submit" name="login" value="login">
      </form><br>
      <button class="btn btn-secondary"><a style="color:white" href="resetpassword.php">Forgot password?</a></button>

      <button class="btn btn-success"><a style="color:white" href="index.php">Dont have an account: Register</a></button>


    </div>
  </center>


</body>


</html>