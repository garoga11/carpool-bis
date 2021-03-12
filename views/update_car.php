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
    <title>Personal Information</title>
    <!-- linking bootstrap "css" section -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<!-- putting the background color -->
<body class="bg-light">

    <!-- putting a navbar -->
    <nav class="navbar bg-success text-white sticky-top">
        <span class="navbar-brand mb-0 h1">CARPOOL</span>
    </nav>

    <!-- putting the title box-->
    <header class="container border border-success bg-white text-center w-25 mt-5">
        <h2>Car Information</h2>
    </header>

    <!-- making a formulary -->
    <div class="container border border-success p-5">

        <!-- putting 2 columns -->
        <div class="row">

            <!-- first column -->
            <form method="POST" action="../components/insert_car.php" class="col pl-5 pr-5">
                <!-- putting inputs -->
                <div class="form-group">
                    <label for="formGroupExampleInput">Car model</label>
                    <input type="text" class="form-control" name="car_model" id="formGroupExampleInput" placeholder="For figo">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Car color</label>
                    <input type="text" class="form-control" name="car_color" id="formGroupExampleInput" placeholder="Gray">
                </div>

                <p>Availability</p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="availability" id="exampleRadios1" value="YES">
                    <label class="form-check-label" for="exampleRadios1">
                    YES
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="availability" id="exampleRadios2" value="NO">
                    <label class="form-check-label" for="exampleRadios2">
                    NO
                    </label>
                </div>
            </form>

            <form method="POST" action="../components/insert_car.php" class="col pl-5 pr-5">
                <!-- putting inputs -->
                <div class="form-group">
                    <label for="formGroupExampleInput">Ride cost</label>
                    <input type="number" class="form-control" name="ride_cost" id="formGroupExampleInput" placeholder="$40.00">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Number of passengers</label>
                    <input type="number" class="form-control" name="passengers" id="formGroupExampleInput" placeholder="3">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Limit of passengers</label>
                    <input type="number" class="form-control" name="limit_passengers" id="formGroupExampleInput" value="4">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Car plates</label>
                    <input type="text" class="form-control" name="car_plates" id="formGroupExampleInput" placeholder="JKL-89-00">
                </div>

                <!-- submit button -->
                <div class="form-group text-center ">
                    <input type="submit" class="btn btn-success btn-lg text-center" value="Update">
                </div>
                <div class="form-group text-center ">
                    <button type="button" class="btn btn-danger"><a class="text-white text-decoration-none" href="home.php">Cancel</a></button>
                </div>
            </form>

        </div>
    </div>  
    <!-- putting the footer -->
    <div class="card fixed-bottom">
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