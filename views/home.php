<?php
session_start();
include '../components/conection.php';
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
}

$user = $_SESSION['user_id'];
$query0 = "SELECT first_name FROM user_account WHERE user_id = '$user'";
$result0 = $conection->query($query0);
if($result0){
    $row0 = mysqli_fetch_array($result0, MYSQLI_BOTH);
    if($row0){
        $name = $row0[0];
    }
    else{
        echo "error row0";
    }
}
else{
    echo "error result0";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="../style.css">-->
    <link rel="stylesheet"href= "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
    
</head>
<body style="background-image: url('../images/bg.png');background-repeat: no-repeat;
background-attachment: fixed;">

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #28a745;" sticky-top>
  <a class="navbar-brand  text-white" href="home.php"><u>Carpool</u> </a>
  <button class="navbar-toggler ml-auto custom-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon "></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-white" href="../components/show_profile.php">Profile <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="register_car.php">Add car</a>
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
        <li class="nav-item">
            <label class="text-white pt-2 mx-5"><b>Welcome <?php echo "$name"; ?></b></label>
        </li>
        <li class="nav-item ">
            <a class="nav-link text-white " href="../components/logout.php">Logout</a>
        </li>
      </ul>
    </span>
  </div>
</nav>


<?php
include ('../components/conection.php');
//saving the number of drivers in the db, using the last ID
$query = "SELECT MAX(car_id) FROM car_account";
$result = $conection->query($query);
$row = mysqli_fetch_array($result, MYSQLI_BOTH);

//Checking if query was successful
if ($row){

    //selecting the data of each driver, using IDs one by one 
    for ($i=1; $i <= $row[0] ; $i++) { 
        $query2 = "SELECT * FROM car_account WHERE car_id = '$i' AND availability = 'YES'";
        $result2 = $conection->query($query2);
        
        if ($result2){
            $row2 = mysqli_fetch_array($result2, MYSQLI_BOTH);
        
            if ($row2){
                $query3 = "SELECT user_id, route_id FROM ride_joins WHERE car_id = '$i' AND is_driver = 1";
                $result3 = $conection->query($query3);
                
                if($result3){
                    $row3 = mysqli_fetch_array($result3, MYSQLI_BOTH);

                    if($row3){
                        $userrow = $row3[0];
                        $query4 = "SELECT first_name, last_name, cellphone, email FROM user_account WHERE user_id = '$userrow'";
                        $result4 = $conection->query($query4);
                        
                        if($result4){
                            $row4 = mysqli_fetch_array($result4, MYSQLI_BOTH);

                            if($row4){
                                $routerow = $row3[1];
                                $query5 = "SELECT route_link FROM route WHERE route_id = $routerow";
                                $result5 = $conection->query($query5);
                                if($result5){
                                    $row5 = mysqli_fetch_array($result5, MYSQLI_BOTH);

                                    if($row5){
                                        $card_fname = $row4[0]; 
                                        $card_lname = $row4[1];
                                        $card_phone = $row4[2];
                                        $card_email = $row4[3];
                                        $card_carmodel = $row2[1];
                                        $card_carcolor = $row2[2];
                                        $card_rcost = $row2[3];
                                        $card_npass = $row2[4];
                                        $card_rlink = $row5[0];
                                        
?>
                                    <center>
                                        <div class="container mt-5">
                                          <div class="card  mb-3 border border-secondary" style="max-width: 800px;  filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));">
                                            <div class="no-gutters">
                                              <img src="../images/driver.png" class="mx-auto d-block" alt="driver" style="width: 300px;" >
                                            <div class="card-body">
                                              <h5 class="card-title text-uppercase text-success text-center">Driver's info</h5>
                                              <div class="row justify-content-center">
                                                    <ul class=" list-group list-group-horizontal">
                                                      <li class="list-group-item text-success"> Name: <label class="text-dark"> <?php echo $card_fname, " ", $card_lname; ?></label></li>
                                                      <li class="list-group-item text-success"> Cellphone: <label class="text-dark"><?php echo $card_phone; ?></label></li>
                                                      <li class="list-group-item text-success"> Price: <label class="text-dark"><?php echo $card_rcost; ?></label></li>
                                                      <li class="list-group-item text-success"> Passengers in: <label class="text-dark"><?php echo $card_npass; ?></label></li>
                                                    </ul>
                                              </div>
                                              <div class="row justify-content-center">
                                                <ul class="list-group list-group-horizontal">
                                                  <li class="list-group-item text-success"> Car model: <label class="text-dark"><?php echo $card_carmodel; ?></label></li>
                                                  <li class="list-group-item text-success"> Car color: <label class="text-dark"><?php echo $card_carcolor; ?></label></li>
                                                  <li class="list-group-item text-success"> Email: <label class="text-dark"> <?php echo $card_email; ?></label></li>
                                                </ul>
                                              </div>
                                              </div> 
                                              <div>
                                                <p class= "text-center">Route: <a class="text-primary" href=" <?php echo $card_rlink;?>" target="_blank">See the map here<a></p>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </center>
<?php
                                    }
                                }
                            }
                        } 
                    }
                }
            }
        }
    }
}
else{
    echo "<script>
    alert(' Error, query');
    window.location.href='../views/home.html';
    </script>";
}

?>
<br>
<br>
<br>
<br>
<br>
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

