<?php 
session_start();
include('conection.php');

$user_id = $_SESSION['user_id'];
$car_model = $_POST['car_model'];
$car_color = $_POST['car_color'];
$ride_cost = $_POST['ride_cost'];
$passengers = $_POST['passengers'];
$car_plates = $_POST['car_plates'];
$route = $_POST['route'];

if(!empty($user_id)){
    $query1 = "SELECT is_driver FROM ride_joins WHERE user_id = '$user_id'";
    $result1 = $conection->query($query1);
    if($result1){
        $row = mysqli_fetch_array($result1, MYSQLI_NUM);
        if($row){
            $is_driver = $row[0];
            if($is_driver == 0){
                if(!empty($car_model) && !empty($route) && !empty($car_color) && !empty($ride_cost) && !empty($passengers) && !empty($car_plates)){
                    //putting in uppercase the names
                    $car_modelUpper=strtoupper($car_model);
                    $car_platesUpper=strtoupper($car_plates);
                    $car_colorUpper=strtoupper($car_color);
                    //creating the query of the car:
                    $query0 = "INSERT INTO car_account (car_model, car_color, ride_cost, num_passengers, car_plates, availability, limit_passengers) VALUES ('$car_modelUpper', '$car_colorUpper', '$ride_cost', 0, '$car_platesUpper', 'YES', '$passengers')"; 
                    //requesting query
                    $result0= $conection->query($query0);
                
                    //$result = mysqli_query($conection, $query);
                    if($result0){
                        $query2 = "SELECT car_id FROM car_account WHERE car_plates ='$car_platesUpper'";
                        $result2= $conection->query($query2);
                        //$result2 = ($conection, $query2);
                        if($result2){
                            $row2 = mysqli_fetch_array($result2, MYSQLI_NUM);
                            if($row2){
                                $dbcar_id =$row2[0];
                                $query6="INSERT INTO route (route_link) VALUES ($route)";
                                $result6 = $conection->query($query6);
                                if($result6){
                                    $query10="SELECT route_id FROM route WHERE route_link='$route'";
                                    $result10=$conection->query($query10);
                                    if($result10){
                                        $row4 = mysqli_fetch_array($result10, MYSQLI_NUM);
                                        $dbroute2_id = $row10[0];
                                        $query7 = "INSERT INTO ride_joins (user_id, car_id, route_id, is_driver) VALUES ('$user_id', '$dbcar_id', '$dbroute2_id', 1)";
                                        $result7 = $conection->query($query7);
                                        if($result7){
                                            $query8="SELECT car_id FROM ride_joins WHERE user_id= '$user_id' AND is_driver = 0";
                                            $result8 =$conection->query($query8);
                                            if($result8){
                                                $row8= mysqli_fetch_array($result8);
                                                if($row8){
                                                    $car_id_ride=$row8[0];
                                                    $query9="DELETE FROM ride_joins WHERE user_id= '$user_id' AND is_driver = 0 AND car_id='$car_id_ride'";
                                                    $result9 =$conection->query($query9);
                                                    if($result9){
                                                        $query11="UPDATE car_account SET num_passengers = num_passengers - 1 WHERE car_id = '$car_id_ride";
                                                        $result11=$conection->query($query11);
                                                        if($result11){
                                                            echo "<script>  
                                                            alert('Car added successfully');
                                                            window.location.href='../views/home.php';
                                                            </script>";  
                                                        }else{
                                                            echo "<script>  
                                                            alert('result10');
                                                            window.location.href='../views/home.php';
                                                            </script>"; 
                                                        }
                                                    }else{
                                                        echo "<script>  
                                                        alert('result9');
                                                        window.location.href='../views/home.php';
                                                        </script>"; 
                                                    }
                                                }else{
                                                    echo "<script>  
                                                    alert('row8');
                                                    window.location.href='../views/home.php';
                                                    </script>"; 
                                                }
                                            }else{
                                                echo "<script>  
                                                alert('result8');
                                                window.location.href='../views/home.php';
                                                </script>"; 
                                            }
                                            
                                        }else{
                                            echo "<script>  
                                            alert('result7');
                                            window.location.href='../views/register_car.php';
                                            </script>"; 
                                        }
                                    }else{
                                        echo "<script>  
                                        alert('Something was wrong result10');
                                        window.location.href='../views/register_car.php';
                                        </script>"; 
                                    }
                                }elseif(!$result6){
                                //if para ver si la ruta ya exuiste
                                    $query3 = "INSERT INTO route (route_link) VALUES ('$route')";
                                    $result3 = $conection->query($query3);
                                    //$result3 = ($conection, $query3);
                                    if($result3){
                                        $query4 = "SELECT route_id FROM route WHERE route_link = '$route'";
                                        $result4 = $conection->query($query4);
                                    // $result4 = ($conection, $query4);
                                        if($result4){
                                            $row3 = mysqli_fetch_array($result4, MYSQLI_NUM);
                                            if($row3){
                                                $dbroute_id = $row3[0];
                                                $query5 = "INSERT INTO ride_joins (user_id, car_id, route_id, is_driver) VALUES ('$user_id', '$dbcar_id', '$dbroute_id', 1)";
                                                $result5 = $conection->query($query5);
                                                //$result5 = ($conection, $query5);
                                                if($result5){
    
                                                    echo "<script>  
                                                    alert('Car added successfully');
                                                    window.location.href='../views/home.php';
                                                    </script>"; 
                                                }else{
                                                    echo "<script>  
                                                    alert('Something was wrong result 5');
                                                    window.location.href='../views/register_car.php';
                                                    </script>"; 
                                                }
                                            }else{
                                                echo "<script>  
                                                alert('Something was wrong row3');
                                                window.location.href='../views/register_car.php';
                                                </script>"; 
                                            }
                                        }else{
                                            echo "<script>  
                                            alert('Something was wrong result4');
                                            window.location.href='../views/register_car.php';
                                            </script>"; 
                                        }
                                    }else{
                                        echo "<script>  
                                        alert('Something was wrong result3');
                                        window.location.href='../views/register_car.php';
                                        </script>"; 
                                    }   
                                }else{
                                    echo "<script>  
                                    alert('Something was wrong if');
                                    window.location.href='../views/register_car.php';
                                    </script>"; 
                                }
                            }else{
                                echo "<script>  
                                alert('Something was wrong row2');
                                window.location.href='../views/register_car.php';
                                </script>"; 
                            }
                        }else{
                            echo "<script>  
                            alert('Something was wrong result2');
                            window.location.href='../views/register_car.php';
                            </script>"; 
                        }
                    }else{
                        echo "<script>  
                        alert('Car plates wrong');
                        window.location.href='../views/register_car.php';
                        </script>"; 
                    }
                }else{
                    echo "<script>  
                    alert('Something was wrong emptys');
                    window.location.href='../views/register_car.php';
                    </script>"; 
                }

            }elseif($is_driver = 1){
                echo "<script>  
                alert('You already have a car added');
                window.location.href='../views/home.php';
                </script>";  
            }else{
                echo "<script>  
                alert('is_driver');
                window.location.href='../views/home.php';
                </script>";   
            }
            
        }else{
            if(!empty($car_model) && !empty($route) && !empty($car_color) && !empty($ride_cost) && !empty($passengers) && !empty($car_plates)){
                //putting in uppercase the names
                $car_modelUpper=strtoupper($car_model);
                $car_platesUpper=strtoupper($car_plates);
                $car_colorUpper=strtoupper($car_color);
                //creating the query of the car:
                $query0 = "INSERT INTO car_account (car_model, car_color, ride_cost, num_passengers, car_plates, availability, limit_passengers) VALUES ('$car_modelUpper', '$car_colorUpper', '$ride_cost', 0, '$car_platesUpper', 'YES', '$passengers')"; 
                //requesting query
                $result0= $conection->query($query0);
            
                //$result = mysqli_query($conection, $query);
                if($result0){
                    $query2 = "SELECT car_id FROM car_account WHERE car_plates ='$car_platesUpper'";
                    $result2= $conection->query($query2);
                    //$result2 = ($conection, $query2);
                    if($result2){
                        $row2 = mysqli_fetch_array($result2, MYSQLI_NUM);
                        if($row2){
                            $dbcar_id =$row2[0];
                            $query6="INSERT INTO route (route_link) VALUES ($route)";
                            $result6 = $conection->query($query6);
                            if($result6){
                                $query10="SELECT route_id FROM route WHERE route_link='$route'";
                                $result10=$conection->query($query10);
                                if($result10){
                                    $row4 = mysqli_fetch_array($result10, MYSQLI_NUM);
                                    $dbroute2_id = $row10[0];
                                    $query7 = "INSERT INTO ride_joins (user_id, car_id, route_id, is_driver) VALUES ('$user_id', '$dbcar_id', '$dbroute2_id', 1)";
                                    $result7 = $conection->query($query7);
                                    if($result7){
                                        echo "<script>  
                                        alert('Car added successfully');
                                        window.location.href='../views/home.php';
                                        </script>"; 
                                    }else{
                                        echo "<script>  
                                        alert('Something was wrong result7');
                                        window.location.href='../views/register_car.php';
                                        </script>"; 
                                    }
                                }else{
                                    echo "<script>  
                                    alert('Something was wrong result10');
                                    window.location.href='../views/register_car.php';
                                    </script>"; 
                                }
                            }elseif(!$result6){
                            //if para ver si la ruta ya exuiste
                                $query3 = "INSERT INTO route (route_link) VALUES ('$route')";
                                $result3 = $conection->query($query3);
                                //$result3 = ($conection, $query3);
                                if($result3){
                                    $query4 = "SELECT route_id FROM route WHERE route_link = '$route'";
                                    $result4 = $conection->query($query4);
                                // $result4 = ($conection, $query4);
                                    if($result4){
                                        $row3 = mysqli_fetch_array($result4, MYSQLI_NUM);
                                        if($row3){
                                            $dbroute_id = $row3[0];
                                            $query5 = "INSERT INTO ride_joins (user_id, car_id, route_id, is_driver) VALUES ('$user_id', '$dbcar_id', '$dbroute_id', 1)";
                                            $result5 = $conection->query($query5);
                                            //$result5 = ($conection, $query5);
                                            if($result5){

                                                echo "<script>  
                                                alert('Car added successfully');
                                                window.location.href='../views/home.php';
                                                </script>"; 
                                            }else{
                                                echo "<script>  
                                                alert('Something was wrong result 5');
                                                window.location.href='../views/register_car.php';
                                                </script>"; 
                                            }
                                        }else{
                                            echo "<script>  
                                            alert('Something was wrong row3');
                                            window.location.href='../views/register_car.php';
                                            </script>"; 
                                        }
                                    }else{
                                        echo "<script>  
                                        alert('Something was wrong result4');
                                        window.location.href='../views/register_car.php';
                                        </script>"; 
                                    }
                                }else{
                                    echo "<script>  
                                    alert('Something was wrong result3');
                                    window.location.href='../views/register_car.php';
                                    </script>"; 
                                }   
                            }else{
                                echo "<script>  
                                alert('Something was wrong if');
                                window.location.href='../views/register_car.php';
                                </script>"; 
                            }
                        }else{
                            echo "<script>  
                            alert('Something was wrong row2');
                            window.location.href='../views/register_car.php';
                            </script>"; 
                        }
                    }else{
                        echo "<script>  
                        alert('Something was wrong result2');
                        window.location.href='../views/register_car.php';
                        </script>"; 
                    }
                }else{
                    echo "<script>  
                    alert('Car plates wrong');
                    window.location.href='../views/register_car.php';
                    </script>"; 
                }
            }else{
                echo "<script>  
                alert('Something was wrong emptys');
                window.location.href='../views/register_car.php';
                </script>"; 
            } 
        }
    }else{
        echo "<script>  
        alert('Something was wrong result1');
        window.location.href='../views/register_car.php';
        </script>"; 
    }
}else{
    echo "<script>  
    alert('Something was wrong student_id');
    window.location.href='../views/register_car.php';
    </script>"; 
}
?>
