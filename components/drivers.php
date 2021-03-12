<?php include('../includes/header.php'); ?>

<?php
include('conection.php');

//saving the number of drivers in the db, using the last ID
$query = "SELECT MAX(car_id) FROM car_account";
$result = $conection->query($query);
$row = mysqli_fetch_array($result, MYSQLI_BOTH);

//Checking if query was successful
if ($row){

    //selecting the data of each driver, using IDs one by one 
    for ($i=1; $i <= $row[0] ; $i++) { 
        $query2 = "SELECT * FROM car_account WHERE car_id = '$i' AND availability = 'YES'";
        $result2 = $conection->query($query2);
        
        if ($result2){
            $row2 = mysqli_fetch_array($result2, MYSQLI_BOTH);
        
            if ($row2){
                $query3 = "SELECT user_id, route_id FROM ride_joins WHERE car_id = '$i' AND is_driver = 1";
                $result3 = $conection->query($query3);
                
                if($result3){
                    $row3 = mysqli_fetch_array($result3, MYSQLI_BOTH);

                    if($row3){
                        $userrow = $row3[0];
                        $query4 = "SELECT first_name, last_name, cellphone, email FROM user_account WHERE user_id = '$userrow'";
                        $result4 = $conection->query($query4);
                        
                        if($result4){
                            $row4 = mysqli_fetch_array($result4, MYSQLI_BOTH);

                            if($row4){
                                $routerow = $row3[1];
                                $query5 = "SELECT route_link FROM route WHERE route_id = $routerow";
                                $result5 = $conection->query($query5);
                                if($result5){
                                    $row5 = mysqli_fetch_array($result5, MYSQLI_BOTH);

                                    if($row5){
                                        $card_fname = $row4[0]; 
                                        $card_lname = $row4[1];
                                        $card_phone = $row4[2];
                                        $card_email = $row4[3];
                                        $card_carmodel = $row2[1];
                                        $card_carcolor = $row2[2];
                                        $card_rcost = $row2[3];
                                        $card_npass = $row2[4];
                                        $card_carplates = $row2[5];
                                        $card_rlink = $row5[0];
                                        
?>
                                        <div class="container">
                                            <div class="card bg-light mt-5">
                                                <div class="card-body">
                                                    <h5 class="card-title text-uppercase text-white text-center">Driver info</h5>
                                                    <ul class="card-text text-left">
                                                        <li>Name: <?php echo $card_fname; ?> </li>
                                                        <li>Last: <?php echo $card_lname; ?></li>
                                                        <li>Phone: <?php echo $card_phone; ?></li>
                                                        <li>E-mail: <?php echo $card_email; ?></li>
                                                        <li>Car model: <?php echo $card_carmodel; ?></li>
                                                        <li>Car color: <?php echo $card_carcolor; ?></li>
                                                        <li>Price: <?php echo $card_rcost; ?> MXN</li>
                                                        <li>Passengers in <?php echo $card_npass; ?></li>
                                                        <li>Car plates <?php echo $card_carplates;?></li>
                                                        <li>Route <a href=" <?php echo $card_rlink;?>" target="_blank">See the map here<a></li>                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><br>
<?php
                                    }
                                }
                            }
                        } 
                    }
                }
            }
        }
    }
}
else{
    echo "<script>
    alert(' Error, query');
    window.location.href='../views/home.php';
    </script>";
}

?>

<?php include ('../includes/footer.php'); ?>