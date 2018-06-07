<?php

/**
 * Author: Milo Oyaguez Karlsson
 */

require_once("DatabaseHandler.php");

//handle incoming events/requests
if(isset($_GET["do"])){
    if($_GET["do"] === "login"){
        login();
    } else if($_GET["do"] === "logout"){
        logout();
    }
}

/**
 * Checks if user entered the correct credentials to login, if succesful sets sessionvariable loggedIn to true
 * and redirects user to index.php if not redirects user back to login.php
 * @return bool
 */
function login(){
    //get credentials from url params
    $password = $_GET["password"];
    $username = $_GET["username"];
    //make a connection to the database
    $databaseHandler = new DatabaseHandler();
    $connection = $databaseHandler->get_connection();

    //prepare and execute select statement
    $stmt = $connection->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    //bind result to a variable and fetch result
    $result = "";
    $stmt->bind_result($result);
    $stmt->fetch();

    //if result is "" no user with that username was found there fore login is incorrect
    if(!($result === "")){
        if($result === $password){
            //start session and set sessionvariable logged in to true
            session_start();
            $_SESSION["loggedIn"] = true;
            //redirect user to index.php
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

/**
 * Logs the user out by unsetting the loggedIn sessionvariable and redirecting to login.php
 */
function logout(){
    session_start();
    session_destroy();

    header("Location: login.php");
    var_dump( $_SESSION["loggedIn"]);
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
