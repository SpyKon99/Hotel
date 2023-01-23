<?php
class Room{
 
    // database connection and table name
    private $conn;
    private $table_name = "rooms";
 
    // object properties
    public $id;
    public $roomname;
    public $description;
    public $image;
    public $price;
    public $numberofguests;
    public $airportpickup;
    public $breakfast;
    public $parking;
    public $wifi;
    public $created;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    //return specific room
    function specificRoom(){
        // select all query
        $query = "SELECT
                    *
                FROM
                    " . $this->table_name . "  
                WHERE 
                    id= '". $this->id . "' ";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();
        return $stmt;
    }
    // return all rooms
    function allRooms(){
        // select all query
        $query = "SELECT
                    *
                FROM
                    " . $this->table_name . " ";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();
        return $stmt;
    }

    // search room
    function search(){
        // select all query
        $query = "SELECT
                    *
                FROM
                    " . $this->table_name . " 
                WHERE
                    roomName LIKE '%' '".$this->roomname."' '%' ";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();
        return $stmt;
    }
}