<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- name of the tab -->
    <title>Insert user</title>
    <!-- linking bootstrap "css" section -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<!-- putting the background color -->
<body class="bg-light">

    <!-- putting a navbar -->
    <nav class="navbar bg-success text-white sticky-top">
        <span class="navbar-brand mb-0 h1">CARPOOL</span>
    </nav>
    <!-- making a formulary -->

    <div class="container mt-5 mb-5">
        <div class="col">
            <div class="card bg-light border-secondary" style="filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));">
                <div class="card-body ml-5 mr-5">
                    <h3 class="card-title text-center text-success"><strong>PROFILE</strong></h3>
                    <form method="POST" action="../components/insert_user.php">
                        <ul class="list-group list-group-flush">
                            <br>
                            <div class="form-group">
                            <li class="list-group-item text">Student ID</li>
                            <input type="number" name="user_id" class="form-control" placeholder="3519150000">
                            </div>
                            <div class="form-group">
                            <li class="list-group-item text">First name</li>
                            <input type="text" name="first_name" class="form-control" placeholder="Carlos">
                            </div>
                            <div class="form-group">
                            <li class="list-group-item text">Last name </li>
                            <input type="text" class="form-control" name="last_name" id="formGroupExampleInput" placeholder="Your last Name">
                            </div>
    
                            <p>Gender</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="M">
                                <label class="form-check-label" for="exampleRadios1">
                                Male
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="F">
                                <label class="form-check-label" for="exampleRadios2">
                                Female
                                </label>
                            </div>
                            <br>
                            <br>
                            <p>University</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="university" id="exampleRadios1" value="1">
                                <label class="form-check-label" for="exampleRadios1">
                                UTCH-BIS
                                </label>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                            <li class="list-group-item text">Cellphone</li>
                                <input type="number" class="form-control" name="cellphone" id="formGroupExampleInput" placeholder="Cellphone">
                            </div>
                            <div class="form-group">
                                <li class="list-group-item text">Email</li>
                                <input type="email" class="form-control" name="email" id="formGroupExampleInput" placeholder="youremail@email.com">
                            </div>
                            <div class="form-group">
                            <li class="list-group-item text">Password</li>
                                <input type="password" class="form-control" name="password" id="formGroupExampleInput" placeholder="Your password">
                            </div>
                        </ul>
                        <div class="form-group text-center ">
                        <button type="submit" class="btn btn-success btn-lg text-center" value="Register">Register</button>
                        </div>
                    </form>
                </div>
                <a href="../views/login.php" class="btn btn-secondary text-center">Go back</a>
            </div>
        </div>
    </div>
    <br>
    <br>
        <!-- putting the footer -->
     <div class="card fixed-bottom">
        <div class="card-body">
          <p class="text-center">All rights reserved CARPOOL 2020</p>
        </div>
    </div>
    </div>
    <!-- linking bootstrap "separate" section -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>
</html>