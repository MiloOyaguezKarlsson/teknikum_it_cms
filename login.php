<!--Author: Milo Oyaguez Karlsson-->
<!--form to log the user in, sends to Authorization.php with username, password and do=login parameters-->
<form action="Authorization.php">
    <label for="username">Username: </label>
    <input type="text" name="username" id="username"><br>
    <label for="password">Password: </label>
    <input type="password" name="password" id="password"><br>
    <input type="hidden" name="do" value="login">
    <input type="submit" class="btn">
</form>