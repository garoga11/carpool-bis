<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- name of the tab -->
    <title>Car Information</title>
    <!-- linking bootstrap "css" section -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<!-- putting the background color -->
<body class="bg-light">

    <!-- putting a navbar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #28a745;" sticky-top>
        <a class="navbar-brand  text-white" href="home.php">Carpool </a>
        <button class="navbar-toggler ml-auto custom-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link text-white" href="../components/show_profile.php">Profile <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="register_car.php"><u>Add car</u> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="../components/update_car2.php">Car data</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="passengers.php">Passengers</a>
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

    <!-- putting the title box-->
    <!-- making a formulary -->
<div class="container mt-5">
    <div class="col">
      <div class="card bg-light border-secondary " style="filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));">
            <div class="card-body ml-5 mr-5">
                <br>
                <h3 class="card-title text-center text-success"><strong>Register car</strong></h3>
                <!-- second column -->
                <form method="POST" action="../components/insert_car.php" class="col pl-5">
                    <!-- putting inputs -->
                    <div class="form-group">
                        <br>
                        <label>Car model</label>
                        <input type="text" name="car_model" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label>Car color</label>
                        <input type="text" name="car_color" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Route</label>
                        <input type="text" name="route" class="form-control">
                        <small><a class="text-primary" href="https://youtu.be/hZntFhGNCEk" target="_blank">See how to put the map here<a></small>
                    </div>

                    <div class="form-group">
                        <label>Limit of passengers</label>
                        <input type="text" class="form-control" name="passengers" value="4">
                    </div>
                    <div class="form-group">
                        <label>Ride cost</label>
                        <input type="number" class="form-control" name="ride_cost" >
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Car plates</label>
                        <input type="text" class="form-control" name="car_plates">
                    </div>
                    <br><br>
                    <!-- submit button -->
                    <div class="form-group text-center ">
                        <input type="submit" class="btn btn-success btn-lg text-center" value="Register">
                    </div>
                    </div>
                        <a href="../views/home.php" class="btn btn-secondary text-center">Go back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>  
</div>
<br><br>
     <!-- putting the footer -->
<div class="card sticky-bottom">
    <div class="card-body">
        <p class="text-center">All rights reserved CARPOOL 2020</p>
    </div>
</div>
    <!-- linking bootstrap "separate" section -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>
</html>