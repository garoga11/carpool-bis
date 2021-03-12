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
    <title>My driver</title>
    <!--this is the link which allows apply bootstrap style on the html and below is the css link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>


<body bg-light >

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
      <li class="nav-item">
        <a class="nav-link text-white" href="my_driver.php"><u>My driver</u></a>
      </li>
    </ul>
    <span class="navbar-text">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
            <a class="nav-link text-white " href="logout.php">Logout</a>
        </li>
      </ul>
    </span>
  </div>
</nav>

<?php
include('conection.php');
$user_id=$_SESSION['user_id'];


    
    $query2="SELECT car_id FROM ride_joins WHERE user_id='$user_id' AND is_driver=0";
    $result2= $conection->query($query2);
    if($result2){
        $row2=mysqli_fetch_array($result2, MYSQLI_NUM);
        if($row2){
            $dbcar_id = $row2[0];
            $query3="SELECT user_id FROM ride_joins WHERE car_id='$dbcar_id' AND is_driver=1";
            $result3= $conection->query($query3);
            if($result3){
                $row_number = mysqli_num_rows($result3);
                $row_data = $conection->query($query3);
                if($row_data){   
                    $i=0;
                    while($row = $row_data-> fetch_array()){
                        $array_ids[$i][0]=$row[0];
                        //echo $array_ids[$i][0];
                        $array_id=$array_ids[$i][0];
                        $query4="SELECT student_id, first_name, last_name, cellphone, email FROM user_account WHERE user_id = '$array_id'";
                        $result4= $conection->query($query4);
                        if($result4){
                            $row4= mysqli_fetch_array($result4, MYSQLI_BOTH);
                            if($row4){
                                $query5="SELECT car_model, car_color, ride_cost, car_plates FROM car_account WHERE car_id = '$dbcar_id'";
                                $result5= $conection->query($query5);
                                if($result5){
                                    $row5= mysqli_fetch_array($result5, MYSQLI_BOTH);
                                    if($row5){
?>
                            <center>
                                <div class="container">
                                    <div class="col-10">
                                        <div class=" container card bg-light mt-5 border-success mr-5 ml-5 mb-5 " style="max-width: 800px; filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));">
                                            <div class="card-body text-left" >
                                                <h5 class="card-title text-uppercase text-white text-center text-success">Driver</h5>
                                                <label>Student id</label>
                                                <input class="form-control" type="text" value=" <?php echo " $row4[0]"; ?> " readonly>
                                                <label>First name</label>
                                                <input class="form-control" type="text" value=" <?php echo " $row4[1]"; ?>" readonly> 
                                                <label>Last name</label>
                                                <input class="form-control" type="text" value=" <?php echo "$row4[2]"; ?> " readonly> 
                                                <label>Cellphone</label>
                                                <input class="form-control" type="text" value=" <?php echo "$row4[3]"; ?> " readonly>
                                                <label>E-mail</label>
                                                <input class="form-control" type="text" value=" <?php echo "$row4[4]"; ?> " readonly>
                                                <label>Car model</label>
                                                <input class="form-control" type="text" value=" <?php echo "$row5[0]"; ?> " readonly>
                                                <label>Car color</label>
                                                <input class="form-control" type="text" value=" <?php echo "$row5[1]"; ?> " readonly>
                                                <label>Price</label>
                                                <input class="form-control" type="text" value=" <?php echo "$row5[2]"; ?> " readonly>
                                                <label>Plates</label>
                                                <input class="form-control" type="text" value=" <?php echo "$row5[3]"; ?> " readonly>
                                                <br><br>
                                                <center>
                                                    <a href="delete_driver.php" class="btn btn-danger">Delete driver</a>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </center>
<?php
                                    }
                                    else{
                                        echo "<script>
                                        alert('Error row5');
                                        window.location.href='../views/home.php';
                                        </script>"; 
                                    }
                                }
                                else{
                                    echo "<script>
                                    alert('Error result5');
                                    window.location.href='../views/home.php';
                                    </script>"; 
                                }
                            }else{
                                echo "<script>
                                alert('Error row4');
                                window.location.href='../views/home.php';
                                </script>";  
                            }
                        }else{
                            echo "<script>
                            alert('Error result4');
                            window.location.href='../views/home.php';
                            </script>";  
                        }
                    } 
                }else{
                    echo "<script>
                    alert('Error row_data');
                    window.location.href='../views/home.php';
                    </script>"; 
                }

            }else{
                echo "<script>
                alert('Error result3');
                window.location.href='../views/home.php';
                </script>";  
            }
            
        }else{
            echo "<script>
            alert('You dont have driver');
            window.location.href='../views/home.php';
            </script>";   
        }
    }else{
        echo "<script>
        alert('Error result2');
        window.location.href='../views/home.php';
        </script>";  
    }

?>

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
