<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip Manager</title>
</head>
<body>
    <div> 
        <form action="trip_manager.php" method="POST">
            <label>Name</label>
            <input type="text" name="name"> <br>
            <label>Start Location</label>
            <input type="text" name="start_loaction"><br>
            <label>Destination</label>
            <input type="text" name="destination"><br>
            <label>Start Date</label>
            <input type="date" name="start_date"><br>
            <label>End Date</label>
            <input type="date" name="end_date"><br>
            <label>Price</label>
            <input type="text" name="price"><br>
            <label>Description</label>
            <input type="text" name="description"><br>
            <label>image</label>
            <input type="file" name="image"><br>
            <button type="submit" name="submit">Absenden</button><br>
        </form>
    </div> 

    <?php
    //Artemi
    require("../scripts/trip.php");
    if(isset($_POST["submit"])){
        $trip1 = new Trip($_POST["name"],$_POST["start_loaction"],$_POST["destination"],$_POST["start_date"],$_POST["end_date"],$_POST["price"],$_POST["description"],$_POST["image"]);
        $trip1->saveTripData();
    }
    ?>
</body>
</html> 