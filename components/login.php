<?php
session_start();
include_once 'conection.php';
$email = $_POST['email'];
$password = $_POST['password'];

if (!empty($email) && !empty($password)){

    $query1= "SELECT user_id FROM user_account WHERE email = '$email' AND password = SHA2('$password',256)";
    $result1 = $conection->query($query1);
    if($result1){
        $row = mysqli_fetch_array($result1, MYSQLI_NUM);
        if($row){
            $dbuser_id=$row[0];
            $_SESSION['user_id']=$dbuser_id;
            //echo $_SESSION['user_id'];
            header('Location: ../views/home.php');
            
        }else{
            echo "<script>
            alert('Wrong data..');
            window.location.href='../views/login.php';
            </script>"; 
        }
    }else{
        echo "<script>
        alert('Wrong data.');
        window.location.href='../views/login.php';
        </script>";
    }         

}else{
    echo "<script>
    alert('Empty fields!');
    window.location.href='../views/login.php';
    </script>";
}
?>
 
