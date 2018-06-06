<?php

require_once("DatabaseHandler.php");

//handle incoming events/requests
if(isset($_GET["do"])){
    if($_GET["do"] === "login"){
        login();
    } else if($_GET["do"] === "logout"){
        logout();
    }
}


function login(){
    $password = $_GET["password"];
    $username = $_GET["username"];
    $databaseHandler = new DatabaseHandler();
    $connection = $databaseHandler->get_connection();

    $stmt = $connection->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = "";

    $stmt->bind_result($result);
    $stmt->fetch();

    if(!($result === null)){
        if($result === $password){
            //send user to the cms
            session_start();
            $_SESSION["loggedIn"] = true;
            header("Location: index.php");
            return true;
        } else {
            //send user back to the login page
            header("Location: login.php");
            return false;
        }
    } else {
        //send user to the login page
        header("Location: login.php");
        return false;
    }
}

function logout(){
    $_SESSION["loggedIn"] = false;
    header("Location: login.php");
}

function postUser(){
    $databaseHandler = new DatabaseHandler();
    $connection = $databaseHandler->get_connection();
    $pw = password_hash("admin", PASSWORD_DEFAULT);
    $username = "admin";

    $stmt = $connection->prepare("INSERT INTO users VALUES(NULL, ?, ?, 2");

    $stmt->bind_param("ss", $username, $pw);

    if($stmt->execute() === true){
        echo "user posted";
    } else {
        echo "user not posted";
    }
}
