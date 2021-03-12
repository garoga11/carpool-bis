<?php
session_start();
include('conection.php');
$car_model = $_POST['car_model'];
$car_color = $_POST['car_color'];
$ride_cost =  $_POST['ride_cost'];
$passengers =  $_POST['passengers'];
$car_plates = $_POST['car_plates'];
$new_route = $_POST['route'];
$user_id_ = $_SESSION['user_id'];


if(!empty($car_model) && !empty($car_color) && !empty($ride_cost) && !empty($passengers) && !empty($car_plates) && !empty($new_route) && !empty($user_id_)){
    $query="SELECT car_id FROM ride_joins WHERE user_id='$user_id_' AND is_driver= 1";
    $result=$conection->query($query);
    if($result){
        $row_=mysqli_fetch_array($result);
        if($row_){
            $car_id=$row_[0];
            //////////////////////////////////////////////////////////////////////////////
            $car_modelUpper=strtoupper($car_model);
            $car_platesUpper=strtoupper($car_plates);
            $car_colorUpper=strtoupper($car_color);

            $query3 = "UPDATE car_account SET car_model = '$car_modelUpper', car_color = '$car_colorUpper', ride_cost = '$ride_cost', limit_passengers = '$passengers', car_plates = '$car_platesUpper' WHERE  car_id = '$car_id'"; 
            //requesting query    
            $result3 = $conection->query($query3);

            //If the query couldn't get results:
            if (!$result3) {
                echo "<script>
                alert('Something was wrong');
                window.location.href='../views/update_car_id.html';
                </script>"; 

            }elseif ($result3){
                $query4= "SELECT route_id FROM route WHERE route_link = '$new_route'";
                $result4 = $conection->query($query4);
                $row4=mysqli_fetch_array($result4, MYSQLI_NUM);
                if(!empty($row4)){
                    echo "<script>
                    alert(' Data changed');
                    window.location.href='../views/home.php';
                    </script>";

                }elseif(empty($row4)){
                    $query5= "INSERT INTO route (route_link) VALUES ('$new_route')";
                    $result5 = $conection->query($query5);
                    if($result5){
                        $query6= "SELECT * FROM route WHERE route_link = '$new_route'";
                        $result6 = $conection->query($query6);
                        $row = mysqli_fetch_array($result6, MYSQLI_BOTH);
                        if($row){
                            $newroute_id=$row[0];
                            $query7="UPDATE ride_joins SET route_id = '$newroute_id' WHERE car_id = '$car_id'";
                            $result7 = $conection->query($query7);
                            if($result7){
                                echo "<script>
                                alert(' Data changed ');
                                window.location.href='../views/home.php';
                                </script>";
                            }else{
                                echo "<script>
                                alert('something was wrong result7 ');
                                window.location.href='../views/home.php';
                                </script>"; 
                            }
                        }else{
                            echo "<script>
                            alert('something was wrong row');
                            window.location.href='../views/home.php';
                            </script>";
                        }
                    }else{
                        echo "<script>
                        alert('Something was wrong result5');
                        window.location.href='../views/home.php';
                        </script>";
                    }
                }else{
                    echo "<script>
                    alert('Something was wrong result4');
                    window.location.href='../views/home.php';
                    </script>";  
                }

            }else{
                echo "<script>
                alert('Something was wrong result3');
                window.location.href='../views/update_car_id.php';
                </script>"; 
            } 
        }else{
            echo "<script>
            alert('row_');
            window.location.href='../views/update_car_id.php';
            </script>"; 
        }
    }else{
        echo "<script>
        alert('result');
        window.location.href='../views/update_car_id.php';
        </script>"; 
    }

}else{
    echo "<script>
        alert(' Empty fields');
        window.location.href='../views/update_car_id.php';
        </script>";
}

?>

