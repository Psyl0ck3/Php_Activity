<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="GET">
        <p>
            <label for="Username">Username</label>
            <input type="text" name="user">
        </p>

        <p>
            <label for="Password">Password</label>
            <input type="password" name="pass">
        </p>

        <input type= "submit" name="btn_login" value="Login">
        <br>
        <br>
        <input type= "submit" name="btn_logout" value="Log Out">
    </form>
    <?php
        if (isset($_GET['btn_login'])) {
            $usern = $_GET['user'];
            $passw = $_GET['pass'];

        }

        //displaying username and password
        echo 'User logged in: ' .$usern. '';
        echo 'Password: ' .$passw. '';
        

        

    ?>
</body>
</html>