<?php
include('conection.php');

$user_id = $_POST['user_id'];
$first_name =  $_POST['first_name'];
$last_name =  $_POST['last_name'];
$gender = $_POST['gender'];
$cellphone = $_POST['cellphone'];
$university =  $_POST['university'];
$email = $_POST['email'];
$password =  $_POST['password'];


//ccheking if the data is empty:
if(!empty($user_id) && !empty($first_name) && !empty($last_name) && !empty($gender) && !empty($cellphone) && !empty($university) && !empty($email) && !empty($password)){

    //putting in uppercase the names
    $first_nameUpper=strtoupper($first_name);
    $last_nameUpper=strtoupper($last_name);

    //creating the query:
    $query = "INSERT INTO user_account(university_id, student_id, first_name, last_name, gender, cellphone, email, password) VALUES ('$university', '$user_id', '$first_nameUpper', '$last_nameUpper', '$gender', '$cellphone', '$email', SHA2('$password', 256))"; 

    //requesting query
    $result = mysqli_query($conection, $query);

    //If the query couldn't get results:
    if (!$result) {
        echo "<script>
        alert(' Data already registered');
        window.location.href='../views/login.php';
        </script>";
    }elseif ($result){
        session_start();
        $query1= "SELECT user_id FROM user_account WHERE email = '$email' AND password = SHA2('$password', 256)";
        $result1 = $conection->query($query1);
        if($result1){
            $row = mysqli_fetch_array($result1, MYSQLI_NUM);
            if($row){
                $dbuser_id=$row[0];
                $_SESSION['user_id']=$dbuser_id;
                //echo $_SESSION['user_id'];
                header('Location: ../views/login.php');
            }else{
                echo "<script>
                alert('Something was wrong');
                window.location.href='../views/login.php';
                </script>";   
            }
        }else{
            echo "<script>
            alert('Something was wrong');
            window.location.href='../views/login.php';
            </script>"; 

        }
    }else{
        echo "<script>
        alert('Try with other Id or email');
        window.location.href='../views/login.php';
        </script>";
    }    
}else{
    echo "<script>
    alert('Empty fields');
    window.location.href='../views/login.php';
    </script>";
}

?>