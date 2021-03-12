<?php
session_start();
include('conection.php');
$email=$_POST['email'];
$password=$_POST['password'];
$user_id = $_SESSION['user_id'];

if (!empty($email)) {
    $query1= "SELECT user_id from user_account WHERE email= '$email' AND password = SHA2('$password', 256)";
    $result1= mysqli_query($conection, $query1);
    $row = mysqli_fetch_array($result1, MYSQLI_NUM);
    if($row){
        $student_id =$row[0];
        $query7="SELECT is_driver FROM ride_joins WHERE user_id='$user_id'";
        $result7 = $conection->query($query7);
        if($result7){
            $row7=mysqli_fetch_array($result7, MYSQLI_NUM);
            if($row7){
                $is_driver= $row7[0];
                if($is_driver == 0){
                    $query5="DELETE FROM ride_joins WHERE user_id='$user_id'";
                    $result5= $conection->query($query5);
                    if($result5){
                        $query6="DELETE FROM user_account WHERE user_id= '$user_id'";
                        $result6= mysqli_query($conection, $query6);
                        if($result6){
                            session_destroy();
                            echo "<script>
                            alert('Account deleted.');
                            window.location.href='../views/login.php';
                            </script>";

                        }else{
                            session_destroy();
                            echo "<script>
                            alert('Account deleted.');
                            window.location.href='../views/login.php';
                            </script>";
                        }
                    }else{
                        echo "<script>
                        alert('result 5');
                        window.location.href='../views/login.php';
                        </script>";
                    }
                }elseif($is_driver == 1){
                    $query2= "SELECT car_id FROM ride_joins WHERE user_id='$user_id'";
                    $result2= mysqli_query($conection, $query2);
                    $row2 = mysqli_fetch_array($result2, MYSQLI_BOTH);
                    if($row2){
                        $car_id = $row2[0];
                        $query3="DELETE FROM ride_joins WHERE car_id= '$car_id'";
                        $result3= mysqli_query($conection, $query3);
                        if($result3){
                            $query4="DELETE FROM car_account WHERE car_id= '$car_id'";
                            $result4= mysqli_query($conection, $query4);
                            if ($result4){
                                $query51="DELETE FROM user_account WHERE email='$email'";
                                $result51=mysqli_query($conection, $query51);
                                if($result51){
                                    session_destroy();
                                    echo "<script>
                                    alert('Account deleted.');
                                    window.location.href='../views/login.php';
                                    </script>";
                                }else{
                                    echo "<script>
                                    alert('result5');
                                    window.location.href='../views/login.php';
                                    </script>";
                                }
                            }else{
                                echo "<script>
                                alert('result 4);
                                window.location.href='../views/login.php';
                                </script>";
                            }
                        }else{
                            echo "<script>
                            alert('result 3');
                            window.location.href='../views/login.php';
                            </script>";
                        }
                    }else{
                        echo "<script>
                        alert('row2');
                        window.location.href='../views/delete_account.php';
                        </script>";
                    }
                                
                }else{
                    echo "<script>
                    alert('comparison');
                    window.location.href='../views/delete_account.php';
                    </script>";
                }
            }else{
                $query52="DELETE FROM user_account WHERE user_id='$user_id'";
                    $result52= $conection->query($query52);
                    if($result52){
                        session_destroy();
                        echo "<script>
                        alert('Account deleted.');
                        window.location.href='../views/login.php';
                        </script>";
                    }
                    else{
                        echo "<script>
                        alert('error result52');
                        window.location.href='../views/delete_account.php';
                        </script>";
                                }
            }
        }else{
            echo "<script>
            alert('result7');
            window.location.href='../views/delete_account.php';
            </script>";
        }
    }else{
        echo "<script>
            alert('row');
            window.location.href='../views/delete_account.php';
            </script>";
    }
    
}else{
    echo "<script>
    alert('Empty fields');
    window.location.href='../views/delete_account.php';
    </script>";
}

?>

