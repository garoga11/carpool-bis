<?php
session_start();
if(!isset($_SESSION['user_id'])){
  header('Location: login.php');
}else{
  include('conection.php');
  $user_id = $_SESSION['user_id'];

  if(!empty($user_id)){
      $query = "SELECT  student_id, cellphone, email, password FROM user_account WHERE user_id = $user_id";
      $result = mysqli_query($conection, $query);
      if($result){
          $row = mysqli_fetch_array($result, MYSQLI_BOTH);
          if($row){
              $student_id =$row[0];
              $cellphone = $row[1];
              $email = $row[2];
              $password = $row[3];
          }
      }else{
          echo "<script>
          alert('Wrong ID, try again');
          window.location.href='../views/update_user.php';
          </script>";
      }
  }else{
      echo "<script>
      alert('Empty values');
      window.location.href='../views/update_user.php';
      </script>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <!--this is the link which allows apply bootstrap style on the html and below is the css link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>


<body bg-light>
    <!--NAVBAR STARTS-->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #28a745;" sticky-top>
  <a class="navbar-brand  text-white" href="../views/home.php">Carpool </a>
  <button class="navbar-toggler ml-auto custom-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon "></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-white" href="show_profile.php">Profile <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="../views/register_car.php">Add car</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="update_car2.php">Car data</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="../views/passengers.php">Passengers</a>
      </li>
    </ul>
    <span class="navbar-text">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
            <a class="nav-link text-white " href="../views/logout.php">Logout</a>
        </li>
      </ul>
    </span>
  </div>
</nav>

<div class="container mt-5">
    <div class="col">
    <div class="card bg-light border-secondary " style="filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));">
      <div class="card bg-light border-secondary">
        <div class="card-body ml-5 mr-5">
            <h3 class="card-title text-center text-success"><strong>UPDATE PROFILE</strong></h3>
            <form action="update_user.php" method="POST" class="col pr-5">
            <!-- putting inputs -->
            <div class="form-group">
                <label for="formGroupExampleInput">User id</label>
                <input type="number" class="form-control" name="user_id" value="<?php echo "$student_id";  ?>">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Cellphone</label>
                <input type="number" class="form-control" name="cellphone" value="<?php echo "$cellphone";  ?>">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">E-mail</label>
                <input type="email" class="form-control" name="email" value= "<?php echo "$email"?>">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Password</label>
                <input type="password" class="form-control" name="password">
                <small>If you want to change your password, put a new one. If not, put the old one</small>
            </div><br>
            <div class="form-group text-center ">
                <button type="submit" class="btn btn-success text-center">Update</button>
            </div>
        </div>
        <a href="show_profile.php" class="btn btn-secondary text-center">Go back</a>
      </div>
    </div>
</div>

<div class="card fixed-bottom">
  <div class="card-body">
    <p class="text-center">All rights reserved CARPOOL 2020</p>
  </div>
</div>
  
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>