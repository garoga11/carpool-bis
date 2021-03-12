<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
}else{
  include('conection.php');
  $user_id = $_SESSION['user_id'];


  if(!empty($user_id)){
      
      $query2="SELECT car_id FROM ride_joins WHERE user_id= '$user_id' AND is_driver=1";
      $result2 = $conection->query($query2);
      $row2 =mysqli_fetch_array($result2, MYSQLI_NUM);
      if ($row2) {
          $car_id = $row2[0];
          $query3 = "SELECT car_model, car_color, ride_cost, limit_passengers, car_plates, availability  FROM car_account WHERE car_id = '$car_id'";
          $result3 = $conection->query($query3);
          $row3 = mysqli_fetch_array($result3, MYSQLI_BOTH);
          if ($row3){
              $car_model = $row3[0];
              $car_color = $row3[1];
              $ride_cost = $row3[2];
              $limit_passengers = $row3[3];
              $car_plates = $row3[4];
              $availability = $row3[5];
              $query4="SELECT route_id FROM ride_joins WHERE car_id='$car_id'";
              $result4 = $conection->query($query4);
              $row4= mysqli_fetch_array($result4, MYSQLI_NUM);
              if($row4){
                  $route_id=$row4[0];
                  $query5= "SELECT route_link FROM route WHERE route_id ='$route_id'";
                  $result5 = $conection->query($query5);
                  $row5=mysqli_fetch_array($result5, MYSQLI_BOTH);
                  if($row5){
                      $route_link=$row5[0];
                  }else{
                      echo "<script>
                      alert('row5');
                      window.location.href='../views/update_car_id.php';
                      </script>"; 
                  }
              }else{
                  echo "<script>
                  alert('Something was wrong');
                  window.location.href='../views/update_car_id.php';
                  </script>"; 
              }
          }else{
              echo "<script>
              alert('row3');
              window.location.href='../views/update_car_id.php';
              </script>";  
          }
      }else{
          echo "<script>
          alert('You do not have a car');
          window.location.href='../views/home.php';
          </script>";  
      }

  }else{
      echo "<script>
      alert('Empty fields');
      window.location.href='../views/update_car_id.php';
      </script>"; 
  }    
}      
       
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update car</title>
    <!--this is the link which allows apply bootstrap style on the html and below is the css link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body bg-light>
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
        <a class="nav-link text-white" href="update_car2.php"><u>Car data</u></a>
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
            <h3 class="card-title text-center text-success"><strong>Update car</strong></h3>
            <form action="update_car.php" method="POST" class="col pr-5">
                <!-- putting inputs -->
                <div class="form-group">
                    <label for="formGroupExampleInput">Car model</label>
                    <input type="text" class="form-control" name="car_model" value="<?php echo "$car_model";  ?>">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Car color</label>
                    <input type="text" class="form-control" name="car_color" value="<?php echo "$car_color";  ?>">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Ride cost</label>
                    <input type="number" class="form-control" name="ride_cost" value= "<?php echo "$ride_cost"?>">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Limit of passengers</label>
                    <input type="number" class="form-control" name="passengers" value= "<?php echo "$limit_passengers"?>" >
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Car plates</label>
                    <input type="text" class="form-control" name="car_plates" value= "<?php echo "$car_plates"?>" >
                </div>
                
                <div class="form-group">
                    <label>Route</label>
                    <input type="text" name="route" class="form-control" value="<?php echo "$route_link"?>">
                </div>    
                <div class="form-group text-center ">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
                <div class="form-group text-center ">
                    <button type="button" class="btn btn-danger"><a class="text-white text-decoration-none" href="../components/delete_car.php">Delete car</a></button>
                </div>
            </form>
        </div>
        <a href="../views/home.php" class="btn btn-secondary text-center">Go back</a>
       </div>
    </div>
</div>
<br><br>
<div class="card sticky-bottom">
  <div class="card-body">
    <p class="text-center">All rights reserved CARPOOL 2020</p>
  </div>
</div>
  
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
