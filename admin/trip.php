<?php
class Trip{
    //Artemi
    protected $name;
    private $start_Location; 
    private $destination; 
    private $start_Date; 
    private $end_Date; 
    private $price; 
    private $description; 
    private $image;


    public function __construct($name, $start_Location, $destination, $start_Date, $end_Date, $price, $description, $image){
        $this->name = $name;
        $this->start_Location = $start_Location;
        $this->destination = $destination;
        $this->start_Date = $start_Date;
        $this->end_Date = $end_Date;
        $this->price = $price;
        $this->description = $description;
        $this->image = $image;
    }

    public function saveTripData(){
        require("database_connection");
        if($this->price == null){
            $this->price = 0; 
        }
        $stmt = $dbConnection->prepare("INSERT INTO trips (name, start_location, destination, start_date, end_date, price, description, image) VALUES (?,?,?,?,?,?,?,?)"); 
        $stmt->execute(array($this->name, $this->start_Location,$this->destination,$this->start_Date,$this->end_Date,$this->price,$this->description,$this->image));
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
    public function getStart_Location(){
        return $this->start_Location;
    }
    public function getDestination(){
        return $this->destination;
    }
    public function getStart_Date(){
        return $this->start_Date;
    }
    public function getEnd_Date(){
        return $this->end_Date;
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