<?php 
session_start();
include('conection.php');

$pass_id = $_POST['IDpass'];
$car_id = $_GET['car_id_add'];

//echo "si se mando $pass_id $car_id"

if(!empty($pass_id && $car_id)){

    $query = "SELECT user_id FROM user_account WHERE student_id = '$pass_id'"; 
    $result = mysqli_query($conection, $query);
    if ($result) {
        $row = mysqli_fetch_array($result, MYSQLI_BOTH);
        if($row){
            $var = $_SESSION['user_id'];
            if($var == $row[0]){
                echo "<script>
                alert('You are a driver');
                window.location.href='../views/passengers.php';
                </script>";
            }
            else{
                $query2 = "SELECT route_id FROM ride_joins WHERE car_id = '$car_id'"; 
                $result2 = mysqli_query($conection, $query2);
                if($result2){
                    $row2 = mysqli_fetch_array($result2, MYSQLI_BOTH);
                    if($row2){
                        $newpass = $row[0];
                        $route = $row2[0];
                        $query3 = "INSERT INTO ride_joins(user_id, car_id, route_id, is_driver) VALUES('$newpass', '$car_id', '$route', 0)"; 
                        $result3 = mysqli_query($conection, $query3);
                        if($result3){
                            $query4 = "UPDATE car_account SET num_passengers = num_passengers + 1 WHERE car_id = '$car_id'"; 
                            $result4 = mysqli_query($conection, $query4);
                            if($result4){
                                $query5 = "SELECT limit_passengers, num_passengers FROM car_account WHERE car_id = '$car_id'"; 
                                $result5 = mysqli_query($conection, $query5);
                                if($result5){
                                    $row5 = mysqli_fetch_array($result5, MYSQLI_BOTH);
                                    if($row5){
                                        $limPass = $row5[0];
                                        $numPass = $row5[1];
                                        if($limPass <= $numPass){
                                            $query6 = "UPDATE car_account SET availability = 'NO' WHERE car_id = '$car_id'"; 
                                            $result6 = mysqli_query($conection, $query6);
                                            if($result6){
                                                echo "<script>
                                                alert('New Passenger Added :) ');
                                                window.location.href='../views/passengers.php';
                                                </script>";
                                            }
                                            else{
                                                echo "<script>
                                                alert('Error result6');
                                                window.location.href='../views/passengers.php';
                                                </script>";
                                            }
                                        }
                                        else{
                                            echo "<script>
                                                alert('New Passenger Added');
                                                window.location.href='../views/passengers.php';
                                                </script>";
                                        }
                                    }
                                    else{
                                        echo "<script>
                                        alert('Error row5');
                                        window.location.href='../views/passengers.php';
                                        </script>";
                                    }
                                }
                                else{
                                    echo "<script>
                                    alert('Error result4');
                                    window.location.href='../views/passengers.php';
                                    </script>";
                                }
                            }
                            else{
                                echo "<script>
                                alert('Error result4');
                                window.location.href='../views/passengers.php';
                                </script>";
                            }
                        }
                        else{
                            echo "<script>
                            alert('Error result3');
                            window.location.href='../views/passengers.php';
                            </script>";
                        }
                    }
                    else{
                        echo "<script>
                        alert('Error row2');
                        window.location.href='../views/passengers.php';
                        </script>";
                    }
                }
                else{
                    echo "<script>
                    alert('Error result2');
                    window.location.href='../views/passengers.php';
                    </script>";
                }
            }
        }
        else{
            echo "<script>
            alert('ID no exist');
            window.location.href='../views/passengers.php';
            </script>";
        }
    }
    else{
        echo "<script>
        alert('error result');
        window.location.href='../views/passengers.php';
        </script>";
    }
}
else{
    echo "<script>
    alert('Empty fields');
    window.location.href='../views/passengers.php';
    </script>";
}
?>