<?php
session_start();
include('conection.php');
$user_id = $_POST['user_id'];
$cellphone = $_POST['cellphone'];
$email = $_POST['email'];
$password =  $_POST['password'];


//cheking if the data is empty:
if(!empty($cellphone) && !empty($email) && !empty($password)){
    //creating the query:
    $query = "UPDATE user_account SET cellphone = '$cellphone', email = '$email', password = SHA2('$password',256)
    WHERE student_id = '$user_id'"; 

    //requesting query    
    $result = mysqli_query( $conection, $query );

    //If the query couldn't get results:
    if (!$result) {
        echo "<script>
        alert('Query wrong');
        </script>";

    }elseif ($result){
        echo "<script>
        alert(' Data changed');
        window.location.href='../components/show_profile.php';
        </script>";

    }else{
        echo "<script>
        alert(' Wrong data');
        window.location.href='../components/show_profile.php';
        </script>";
    } 
}else{
    echo "<script>
        alert(' Empty fields');
        window.location.href='../components/show_profile.php';
        </script>";
}

?>

