<?php
session_start();
 include_once'conection.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $query = "SELECT student_id, university_id, first_name, last_name, gender, cellphone, email FROM user_account WHERE user_id = '$user_id'";
    $result = $conection->query($query);
    if($result){
        $row = mysqli_fetch_array($result);
        if($row){
            //SAVING THE ARRAY'S DATA IN THE NEXT VARIABLES
            $university_id = $row[1];
            $student_id =$row[0];
            $first_name = $row[2];
            $last_name = $row[3];
            $gender = $row[4];
            $cellphone = $row[5];
            $email = $row[6];
            $university = '';
    
            //DEFINING THE NAME OF EACH UNIVERSITY ID
            if($university_id == 1){
                $university = 'UTCH BIS';
            }elseif($university_id ==2){
                $university = 'South UTCH';
            }else{
                $university = 'North UTCH';
            }
    
            //echo("$name <br> $last_name <br> $cellphone <br> $email <br> $password");
            //header("Location: update_isaac_html.php");
        }else{
            echo "<script>
        alert('Row');
        window.location.href='../views/home.php';
        </script>";
        }
    }else{
        echo "<script>
        alert('Error, try again');
        window.location.href='../views/show_profile.php';
        </script>";
    }
}else{
    echo "<script>
    alert('Something was wrong');
    window.location.href='../views/home.php';
    </script>";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
        <a class="nav-link text-white" href="show_profile.php"><u>Profile</u></a>
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
      <li class="nav-item">
        <a class="nav-link text-white" href="../components/my_driver.php">My driver</a>
      </li>
    </ul>
    <span class="navbar-text">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
            <a class="nav-link text-white " href="../components/logout.php">Logout</a>
        </li>
      </ul>
    </span>
  </div>
</nav>

<div class="container mt-5">
    <div class="col">
      <div class="card bg-light border-secondary" style="filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));">
        <div class="card-body ml-5 mr-5">
            <h3 class="card-title text-center text-success"><strong>PROFILE</strong></h3>
            <ul class="list-group list-group-flush">
                <br>
                <li class="list-group-item text">Student ID: <?php echo ("$student_id"); ?> </li>
                <li class="list-group-item text">Name: <?php  echo ("$first_name"); ?> </li>
                <li class="list-group-item text">Last name: <?php echo ("$last_name"); ?> </li>
                <li class="list-group-item text">Email: <?php echo ("$email"); ?> </li>
                <li class="list-group-item text">Cellphone: <?php echo ("$cellphone"); ?> </li>
                <li class="list-group-item text">University:  <?php echo ("$university"); ?> </li>
            </ul>
            <div class="card-body text-center">
                <a href="update_user2.php" class="card-link text-primary">Edit profile</a>
                <a href="../views/delete_account.php" class="card-link text-danger">Delete account</a>
            </div>
        </div>
        <a href="../views/home.php" class="btn btn-secondary text-center">Go back</a>
      </div>
    </div>
</div>
<br><br>
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
