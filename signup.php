<?php

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if ($password == $cpassword) {
        $sql = "SELECT * FROM user WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO user (username, password)
					VALUES ('$username', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Wow! User Registration Completed.')</script>";
                $username = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
                header("location: welcome.php");
            } else {
                echo "<script>alert('Something is Wrong ')</script>";
            }
        } else {
            echo "<script>alert('Username Already Exists.')</script>";
        }
    } else {
        echo "<script>alert('Password Not Matched.')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
    <link rel="icon" href="images/logo.png" sizes="150x150" type="image/png">

    <style>
        .container {
            padding: 8px;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.522);
            width: 50%;
            border-radius: 20px;
        }

        input[type=text],
        input[type=password] {
            width: 50%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            text-align: center;
            border-radius: 10px;
        }

        button {
            text-align: center;
            padding: 12px 93px;
            background-color: red;
            color: white;
            border-radius: 10px;
            box-sizing: border-box;
            border: none;
            opacity: 0.6;
            transition: 0.3s;
        }

        button:hover {
            opacity: 1;
        }

        .log {
            text-align: center;
            padding: 30px;
        }

        .text {
            text-align: center;

        }

        h2 {
            font-size: 15px;
        }

        .image {
            background-repeat: no-repeat;
            position: relative;
            min-height: 100vh;
            background-size: cover;
        }
    </style>
</head>

<body class="image" style="background-image: url('bg 1.jpg');height: 500px;width: 100%;">
<br>
    <center>
        <div class="container">
            <div class="text">
                <h1>Signup</h1>
                <h2>Please fill up this form to create an account.</h2>
            </div>
            <form action="" method="POST">
                <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" required>
                <input type="password" name="password" placeholder="Password" value="<?php echo $_POST['password']; ?>" required>
                <input type="password" name="cpassword" placeholder="Confirm Password" value="<?php echo $_POST['cpassword']; ?>" required>

                <div class="log">
                    <button name="submit">Signup</button>
                </div>
                <p>Login <a href="login.php">here.</a></p>


            </form>
    </center>
    </div>

</body>

</html>