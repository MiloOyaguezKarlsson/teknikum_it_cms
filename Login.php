<?php

require_once "DatabaseHandler.php";

class Login
{
    function render()
    {
        return '<form action="HandleEvents.php?do=login" method="get" enctype="text/plain">
<input type="text" name="username" required>
<input type="password" name="password" required>
<button type="submit">Logga in</button>
</form>';
    }

    function __construct(){

    }

    function login($username, $password){
        $sql = "SELECT * FROM users WHERE username = '" . $username . "'";
        $dbConnection = DatabaseHandler::get_connection();
        $result = $dbConnection->query($sql);
        $hashed_pw = $result->fetch_row();
    }
}

?>