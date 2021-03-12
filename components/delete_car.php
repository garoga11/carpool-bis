<?php
session_start();
include 'conection.php';
$user_id = $_SESSION['user_id'];

$query = "SELECT car_id FROM ride_joins WHERE user_id = '$user_id' AND is_driver = 1"; 
$result= mysqli_query($conection, $query);
if($result){
    $row = mysqli_fetch_array($result, MYSQLI_NUM);
    if($row){
        $car = $row[0];
        $query2 = "DELETE FROM ride_joins WHERE car_id = '$car'";
        $result2= mysqli_query($conection, $query2);
        if($result2){
            $query3 = "DELETE FROM car_account WHERE car_id = '$car'";
            $result3= mysqli_query($conection, $query3);
            if($result3){
                echo "<script>  
                alert('Car deleted');
                window.location.href='../views/home.php';
                </script>"; 
            }
            else{
                echo "<script>  
                alert('error result3');
                window.location.href='../components/update_car2.php';
                </script>"; 
            }
        }
        else{
            echo "<script>  
            alert('error result2');
            window.location.href='../components/update_car2.php';
            </script>"; 
        }
    }
    else{
        echo "<script>  
        alert('error row');
        window.location.href='../components/update_car2.php';
        </script>"; 
    }
}
else{
    echo "<script>  
    alert('error result');
    window.location.href='../components/update_car2.php';
    </script>"; 
}
?>