<?php
class User{
 
    // database connection and table name
    private $conn;
    private $table_name = "users";
 
    // object properties
    public $id;
    public $firstname;
    public $lastname;
    public $country;
    public $city;
    public $address;
    public $email;
    public $username;
    public $phone;
    public $password;
    public $role;
    public $created;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // signup user
    function signup(){
    
        if($this->isAlreadyExist()){
            return false;
        }

        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                firstname=:firstname, lastname=:lastname, country=:country, city=:city, address=:address, email=:email, username=:username, phone=:phone, password=:password, role=:role, created=:created";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->firstname=htmlspecialchars(strip_tags($this->firstname));
        $this->lastname=htmlspecialchars(strip_tags($this->lastname));
        $this->country=htmlspecialchars(strip_tags($this->country));
        $this->city=htmlspecialchars(strip_tags($this->city));
        $this->address=htmlspecialchars(strip_tags($this->address));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->username=htmlspecialchars(strip_tags($this->username));        
        $this->phone=htmlspecialchars(strip_tags($this->phone));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->role=htmlspecialchars(strip_tags($this->role));
        $this->created=htmlspecialchars(strip_tags($this->created));
    
        // bind values
        $stmt->bindParam(":firstname", $this->firstname);
        $stmt->bindParam(":lastname", $this->lastname);
        $stmt->bindParam(":country", $this->country);
        $stmt->bindParam(":city", $this->city);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":role", $this->role);
        $stmt->bindParam(":created", $this->created);
    
        // execute query
        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }
    
        return false;
        
    }

    // login user
    function login(){
        // select all query
        $query = "SELECT
                    `id`, `username`, `password`, `created`
                FROM
                    " . $this->table_name . " 
                WHERE
                    username='".$this->username."' AND password='".$this->password."'";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();
        return $stmt;
    }

    // login admin
    function adminLogin(){
        // select all query
        $query = "SELECT
                    `id`, `username`, `password`, `created`
                FROM
                    " . $this->table_name . " 
                WHERE
                    username='".$this->username."' AND password='".$this->password."' AND role=2 ";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();
        return $stmt;
    }
    
    function isAlreadyExist(){

        $query = "SELECT *
            FROM
                " . $this->table_name . " 
            WHERE
                username='".$this->username."' OR email='".$this->email."'";

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
}