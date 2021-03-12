<?php
session_start();
if(isset($_SESSION['user_id'])){
    header('Location: home.php');
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

<body style="background-image: url('../images/bg.png');background-repeat: no-repeat;
background-attachment: fixed;">
    
    <!--NAVBAR STARTS-->
    <nav class="navbar navbar-expand-lg navbar-light bg-success sticky-top">
        <a class="navbar-brand text-white" href="">CARPOOL</a>
    </nav>
    <!--NAVBAR ENDS-->

    <!--LOGO ICON-->
    <img src="../images/uwu.svg" class="mt-3 text-center" alt="Logo-icon" style="filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));">
    <br>s
    <!--FORM STARTS--> 
    <center>
        <div class="container">
            <div class="card col-6 bg-light border border-secondary" style="filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));">
                <div class="class-block card-header">
                    <br><h2  class="text-center text-success">LOGIN</h2>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <form  method="post" action="../components/login.php">
                            <div class="form-group">
                                <label class="text-left">Email</label>
                                <br>
                                <input type="email" name="email" class="form-control text-center border border-success" aria-describedby="emailHelp" >
                            </div>
                            <div class="form-group">
                                <label class="text-left">PASSWORD</label>
                                <br>
                                <input type="password" name="password" class="form-control text-center border border-success">
                                <br>
                                <button type="submit" class="btn btn-success">Login</button>
                                <br><br>
                                <center>
                                    <label class="text-center">Register now! <a href="user_data_log.php" class="text-success">Click here</a></label>
                                </center>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </center>

    <!--FORM ENDS-->
    <!--Footer-->

    <br><br><br><br>
    <div class="card fixed-bottom">
        <div class="card-footer sticky-bottom">
        <p class="text-center">All rights reserved CARPOOL 2020</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
