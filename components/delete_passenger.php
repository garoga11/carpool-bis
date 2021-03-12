<?php
session_start();
include('conection.php');
$var=$_GET['delete'];
if(isset($var)){
    $query="SELECT car_id FROM ride_joins WHERE user_id ='$var' AND is_driver = '0'";
    $result=$conection->query($query);
    if($result){
        $row= mysqli_fetch_array($result,MYSQLI_NUM);
        if($row){
            $query2="DELETE FROM ride_joins WHERE user_id= '$var' AND is_driver = '0'";
            $result2=$conection->query($query2);
            if($result2){
                $car_id=$row[0];
                $query3="UPDATE car_account SET num_passengers = num_passengers - 1 WHERE car_id = '$car_id'";
                $result3 = mysqli_query($conection, $query3);
                        if($result3){
                            $query5 = "SELECT limit_passengers, num_passengers FROM car_account WHERE car_id = '$car_id'"; 
                            $result5 = mysqli_query($conection, $query5);
                            if($result5){
                                $row5 = mysqli_fetch_array($result5, MYSQLI_BOTH);
                                if($row5){
                                    $limPass = $row5[0];
                                    $numPass = $row5[1];
                                    if($limPass > $numPass){
                                        $query6 = "UPDATE car_account SET availability = 'YES' WHERE car_id = '$car_id'"; 
                                        $result6 = mysqli_query($conection, $query6);
                                        if($result6){
                                            echo "<script>
                                            alert('Passenger deleted :) ');
                                            window.location.href='../views/passengers.php';
                                            </script>";
                                        }else{
                                            echo "<script>
                                            alert('error result6 :) ');
                                            window.location.href='../views/passengers.php';
                                            </script>";
                                        }

                                    }else{
                                        echo "<script>
                                        alert('Passenger deleted ');
                                        window.location.href='../views/passengers.php';
                                        </script>";  
                                    }
                                }else{
                                    echo "<script>
                                    alert('row5');
                                    window.location.href='../views/passengers.php';
                                    </script>"; 
                                }
                            }else{
                                echo "<script>
                                alert('result5 ');
                                window.location.href='../views/passengers.php';
                                </script>"; 
                            }
                        }else{
                            echo "<script>
                            alert('Error result3');
                            window.location.href='../views/passengers.php';
                            </script>";  
                        }
            }else{     
                echo "<script>
                alert('error row');
                window.location.href='../views/home.php';
                </script>"; 
            }
        }else{
            echo "<script>
            alert('error result2');
            window.location.href='../views/home.php';
            </script>"; 
        } 
    }else{
        echo "<script>
        alert('result');
        window.location.href='passengers.php';
        </script>";   
    }
}else{
    echo "<script>
    alert('isset');
    window.location.href='passengers.php';
    </script>";  
}

?>