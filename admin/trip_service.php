<?php
//Artemi

class TripService{

public function getTripData(){
    require("database_connection.php");
    require("trip.php");
    $sql ="SELECT * FROM trips";
    $TripArray = array();
    foreach($dbConnection->query($sql) as $row){
        $trip1 = new Trip($row["name"],$row["start_location"],$row["destination"],$row["start_date"],$row["end_date"],$row["price"],$row["description"],$row["image"]);
        array_push($TripArray, $trip1);
    }
    return $TripArray;
}

/* Search nach ID ? 
public function getSpecificTripData($ID){
    require("database_connection.php");
    $stmt= $dbConnection->prepare("SELECT * FROM trips WHERE id = ?");
    $stmt->execute(array($id));
    $TripArray = array();
    while($row = $stmt->fetch()){
        $trip2 = new Trip($row["name"],$row["start_location"],$row["destination"],$row["start_date"],$row["end_date"],$row["price"],$row["description"],$row["image"]);
        array_push($TripArray, $trip2);
    }
    return $TripArray;
}
*/
}
?>