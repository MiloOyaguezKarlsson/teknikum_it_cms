<?php

//opens a connection to the DB, returns instance of mysqli
function getConnection() {
    
    //server variables
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "cms_test";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    //return connection
    return $conn;
}

//gets the text of the textarea with the specified id from the DB
function getTextarea($id) {
    
    //open connection
    $conn = getConnection();
    
    //get textarea content
    $sql = "SELECT content FROM textareas WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    
    //bind result
    $textarea = "";
    $stmt->bind_result($textarea);
    $stmt->fetch();
    
    //close connection and return value
    $conn->close();
    return $textarea;
}

//updates the textarea with the given id to display the given text
function updateTextarea($id, $text) {
    
    //open connection
    $conn = getConnection();
    
    //insert new textareas and update existing ones
    $sql = "INSERT INTO textareas(id, content) VALUES (?, ?) ON DUPLICATE KEY UPDATE id = VALUES(id), content = VALUES(content)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $id, $text);
    $stmt->execute();
    
    //close connection
    $conn->close();
}

//used to more efficiently send Sponsors between functions
class Sponsor {
    
    public $id;
    public $text;
    public $url;
    public $alt;
    
    public function __construct($id, $text, $url, $alt) {
        
        $this->id = $id;
        $this->text = $text;
        $this->url = $url;
        $this->alt = $alt;
    }
}

//gets all sponsors from DB and returns as array of Sponsor
function getSponsors() {
    
    $sponsors = [];
    
    //open connection
    $conn = getConnection();
    
    //get sponsors from DB
    $result = $conn->query("SELECT * FROM sponsors");
    
    if($result->num_rows > 0) {
        while($row = $result->fetch_array()) {
            
            //create array of Sponsors
            $sponsors[] = new Sponsor($row["id"], $row["text"], $row["image_url"], $row["image_alt"]);
        }
    }
    
    //close connection and return sponsors
    $conn->close();
    return $sponsors;
}

//deletes all existing sponsors from DB, then inserts the given range of Sponsors
function updateSponsors(array $sponsors) {
    
    //open connection
    $conn = getConnection();
    
    //delete existing sponsors
    $deleteSql = "DELETE FROM sponsors";
    $conn->query($deleteSql);
    
    //add new sponsors
    $addSql = "INSERT INTO sponsors(text, image_url, image_alt) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($addSql);
    
    foreach($sponsors as $sponsor) {
        $stmt->bind_param("sss", $sponsor->text, $sponsor->url, $sponsor->alt);
        $stmt->execute();
    }
}

//used to more efficiently send Education Fields between functions
class Field {
    
    public $id;
    public $text;
    public $url;
    public $alt;
    
    public function __construct($id, $text, $url, $alt) {
        
        $this->id = $id;
        $this->text = $text;
        $this->url = $url;
        $this->alt = $alt;
    }
}

//gets all fields from DB and returns as array of Field
function getFields() {
    
    $fields = [];
    
    //open connection
    $conn = getConnection();
    
    //get fields from DB
    $result = $conn->query("SELECT * FROM utbildningar");
    
    if($result->num_rows > 0) {
        while($row = $result->fetch_array()) {
            
            //create array of Fields
            $fields[] = new Field($row["id"], $row["text"], $row["image_url"], $row["image_alt"]);
        }
    }
    
    //close connection and return fields
    $conn->close();
    return $fields;
}

//deletes all existing fields from DB, then inserts the given range of Fields
function updateFields(array $fields) {
    
    //open connection
    $conn = getConnection();
    
    //delete existing sponsors
    $deleteSql = "DELETE FROM utbildningar";
    $conn->query($deleteSql);
    
    //add new sponsors
    $addSql = "INSERT INTO utbildningar(text, image_url, image_alt) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($addSql);
    
    foreach($fields as $field) {
        $stmt->bind_param("sss", $field->text, $field->url, $field->alt);
        $stmt->execute();
    }
}