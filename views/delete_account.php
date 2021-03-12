
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete account</title>
    <!--this is the link which allows apply bootstrap style on the html and below is the css link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>


<body bg-light>
    <!--NAVBAR STARTS-->
    <nav class="navbar navbar-expand-lg navbar-light bg-danger sticky-top">
        <a class="navbar-brand text-white" href="">Carpool</a>
    </nav>

<div class="container mt-5">
    <div class="col">
    <div class="card bg-light border-secondary " style="filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));">
        <div class="card bg-light border-secondary">
            <div class="card-body ml-5 mr-5">
                <form method="POST" action="../components/delete_profile.php">
                <div class="form-group">
                <center>
                    <h4 class="text-danger">IF YOU WANT TO DELETE YOUR ACCOUNT:</h4>
                </center>
                    <label class="text-danger">Type your email</label>
                    <input type="email" class="form-control border border-danger" name="email" >
                </div>
                <div class="form-group">
                    <label class="text-danger">Type your password</label>
                    <input type="password" class="form-control border border-danger" name="password">
                </div>
                <center>
                <button type="submit" class="btn btn-danger">Delete</button>
                </center>
                </form>
            </div>
            <a href="../components/show_profile.php" class="btn btn-secondary text-center">Go back</a>
        </div>
    </div>
</div>
<?php include('../includes/footer.php'); ?>
