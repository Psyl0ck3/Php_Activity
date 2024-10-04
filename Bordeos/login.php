<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <p>
            <label for="Username">Username</label>
            <input type="text" name="user">
        </p>

        <p>
            <label for="Password">Password</label>
            <input type="password" name="pass">
        </p>

        <input type="submit" name="btn_login" value="Login">
        <br>
        <br>
        <input type="submit" name="btn_logout" value="Log Out">
    </form>
    <?php
        session_start();

        function login($user, $pass) {
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                echo 'You are already logged in as ' . $_SESSION['user'] . '. Please log out first.';
                return false;
            } else {
                $_SESSION['logged_in'] = true;
                $_SESSION['user'] = $user;
                $_SESSION['pass'] = $pass;
                return true;
            }
        }

        function logout() {
            session_unset();
            session_destroy();
        }

        function generateRandomPassword() {
            $length = 10;
            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+{}[]:;<>?,./';
            $randomPassword = '';
            for ($i = 0; $i < $length; $i++) {
                $randomPassword .= $characters[rand(0, strlen($characters) - 1)];
            }
            $hashedPassword = password_hash($randomPassword, PASSWORD_DEFAULT);
            return $hashedPassword;
        }
        
        if (isset($_POST['btn_login'])) {
            $usern = $_POST['user'];
            $passw = $_POST['pass'];
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                echo $_SESSION['user'] . ' is already logged in. Wait for the user to log out first.';
            } else {
                if (!empty($passw)) {
                    $randomPassword = generateRandomPassword();
                    if (login($usern, $randomPassword)) {
                        echo 'User logged in: ' . $_SESSION['user'] . '';
                        echo 'Password: ' . $_SESSION['pass'] . '';
                    }
                } else {
                    if (login($usern, $passw)) {
                        echo 'User logged in: ' . $_SESSION['user'] . '';
                        echo 'Password: ' . $_SESSION['pass'] . '';
                    }
                }
            }
        }

        if (isset($_POST['btn_logout'])) {
            logout();
            echo 'You have been logged out.';
        }
    ?>
</body>
</html>