<?php
class Trip{
    //Artemi
    protected $name;
    private $startLocation;
    private $destination; 
    private $startDate;
    private $endDate;
    private $price; 
    private $description; 
    private $image;
    private $id;


    public function __construct($name, $startLocation, $destination, $startDate, $endDate, $price, $description, $image){
        $this->name = $name;
        $this->startLocation = $startLocation;
        $this->destination = $destination;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->price = $price;
        $this->description = $description;
        $this->image = $image;
    }

    public function saveTripData(){
        require("database_connection.php");
        if($this->price == null){
            $this->price = 0; 
        }
        $stmt = $dbConnection->prepare("INSERT INTO trips (name, start_location, destination, start_date, end_date, price, description, image) VALUES (?,?,?,?,?,?,?,?)"); 
        $stmt->execute(array($this->name, $this->startLocation,$this->destination,$this->startDate,$this->endDate,$this->price,$this->description,$this->image));
        header("Location:trip_manager.php");
    }

    public function getTripData(){
        require("database_connection");
        require("trip.php");
        $sql = "SELECT * FROM trips"; 
        $tripArray = array();
        foreach($dbConnection->query($sql) as $row){
            $trip = new Trip($row["name"],$row["start_location"],$row["destination"],$row["start_date"],$row["end_date"],$row["price"],$row["description"],$row["image"]);
            array_push($tripArray,$trip); 
        }
        return $tripArray;
    }
   
    public function getName(){
        return $this->name;
    }
    public function getStartLocation(){
        return $this->startLocation;
    }
    public function getDestination(){
        return $this->destination;
    }
    public function getStartDate(){
        return $this->startDate;
    }
    public function getEndDate(){
        return $this->endDate;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getImage(){
        return $this->image;
    }
}
?>