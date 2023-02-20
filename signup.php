<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $server_name  = "localhost";
    $user_name = "root";
    $password = "";
    $database = "users";
    //connect to database
    $conn = new mysqli($server_name, $user_name, $password, $database);

    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    //saving password on hast
    $hash = password_hash($password, PASSWORD_DEFAULT);
    if ($password == $confirm_password) {
        $result = $conn->query("INSERT INTO users(first_name,last_name,email,password)
    values('$first_name','$last_name','$email','$password')");
    echo $conn->error;
        echo "saved to database";
    } else {
        echo "incorrect password";
    }
} else {
    echo "you can not access this page";
}
