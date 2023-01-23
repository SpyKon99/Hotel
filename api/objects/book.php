<?php
class Book{

    // database connection and table name
    private $conn;
    private $table_name = "bookings";

    // object properties
    public $id;
    public $userid;
    public $roomid;
    public $checkin;
    public $checkout;
    public $numberofguests;
    public $created;
    public $numberofstays;
    public $totalprice;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // create booking
    function book(){

        if($this->isNotAvailable()){
            return false;
        }

        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                    SET
                    userid=:userid, roomid=:roomid, checkin=:checkin, checkout=:checkout, numberofguests=:numberofguests, created=:created, numberofstays=:numberofstays, totalprice=:totalprice";

        // prepare query 
        $stmt = $this->conn->prepare($query);

        //sanitize
        $this->userid=htmlspecialchars(strip_tags($this->userid));
        $this->roomid=htmlspecialchars(strip_tags($this->roomid));
        $this->checkin=htmlspecialchars(strip_tags($this->checkin));
        $this->checkout=htmlspecialchars(strip_tags($this->checkout));
        $this->numberofguests=htmlspecialchars(strip_tags($this->numberofguests));
        $this->created=htmlspecialchars(strip_tags($this->created));
        $this->numberofstays=htmlspecialchars(strip_tags($this->numberofstays));
        $this->totalprice=htmlspecialchars(strip_tags($this->totalprice));



        // bind values
        $stmt->bindParam(":userid", $this->userid);
        $stmt->bindParam(":roomid", $this->roomid);
        $stmt->bindParam(":checkin", $this->checkin);
        $stmt->bindParam(":checkout", $this->checkout);
        $stmt->bindParam(":numberofguests", $this->numberofguests);
        $stmt->bindParam(":created", $this->created);
        $stmt->bindParam(":numberofstays", $this->numberofstays);
        $stmt->bindParam(":totalprice", $this->totalprice);

        // execute query
        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }
    
        return false;

    }
    // complete reservation
    function update(){
        // select all query
        $query = "UPDATE
                   " . $this->table_name . "
                SET
                    complete=1 
                WHERE
                    userid='".$this->userid."' AND roomid='".$this->roomid."' AND complete= 0";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();
        return $stmt;
    }

    // view cart
    function cart(){
        // select all query
        $query = "SELECT bookings.userid, bookings.checkin, bookings.checkout, bookings.numberofstays, bookings.totalprice, bookings.roomid, rooms.roomName, rooms.price
             FROM " . $this->table_name . " INNER JOIN rooms ON bookings.roomid=rooms.id AND bookings.complete=0 AND bookings.userid='".$this->userid."' AND bookings.roomid='".$this->roomid."'";   

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();
        return $stmt;
    }
    

    function isNotAvailable(){
        $query = "SELECT * FROM " . $this->table_name . " WHERE
            roomid = '".$this->roomid."' AND(
            (checkin BETWEEN '".$this->checkin."' AND '".$this->checkout."') OR 
            (checkout BETWEEN '".$this->checkin."' AND '".$this->checkout."') OR
            (checkin <= '".$this->checkin."' AND  checkout >= '".$this->checkout."'))";    
        

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    //return user's reservations
    function reservations(){
        // select all query
        $query = "SELECT
                   *
                FROM " . $this->table_name . " WHERE
                userid= '".$this->userid."' ";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();
        return $stmt;
    }  
}
?>