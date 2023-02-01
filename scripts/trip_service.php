<?php
//Artemi

class TripService{

public function getTripData($sql){
    require("database_connection.php");
    require("trip.php");
    $tripArray = array();
    foreach($dbConnection->query($sql) as $row){
        $trip = new Trip($row["name"],$row["start_location"],$row["destination"],$row["start_date"],$row["end_date"],$row["price"],$row["description"],$row["image"],$row['trip_id']);
        array_push($tripArray, $trip);
    }
    return $tripArray;
}

// Tobias
public function getTripById($id){
    return $this->getTripData("SELECT * FROM trips WHERE trip_id = " . $id)[0];
}

//Artemi
public function deleteTripData($id){
    require("index.html");
    $stmt = $dbConnection->prepare("DELETE FROM trips WHERE id = ?");
    $stmt->execute(array($id));
    }

}
?>