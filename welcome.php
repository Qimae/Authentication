<?php

session_start();

?>
<!DOCTYPE html>
<html>

<head>
  <title>

  </title>

  <style>
    .image {
      background-repeat: no-repeat;
      position: relative;
      min-height: 100vh;
      background-size: cover;

    }

    .text {
      color: #11101d;
      font-size: 15px;
      font-weight: 500;
      margin: 18px;
      text-align: center;
    }
    .button {
      float: right;
      background-color: red;
      padding-right: 30px;
      width: fit-content;
      border: 0;
      border-radius: 10px;
      padding: 10px;
    }
  </style>
</head>

<body class="image" style="background-image: url('bg 1.jpg');height: 500px;width: 100%;"><br>
<a href="logout.php">
<input type="button" value="Logout" class="button">
</a>
<div class="text">
  <h1>Welcome, Authentication Done</h1>
</div>
</body>



</html>