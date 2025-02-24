<?php
include("../dB/config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName  = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate if email already exists
    $checkQuery = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['status'] = "Email address already taken.";
        $_SESSION['status_code'] = "error";
        header('Location: ../register.php');
        exit();
    } else {
        $query = "INSERT INTO users (firstName, lastName, email, password)
                  VALUES ('$firstName', '$lastName', '$email', '$password')";

        if (mysqli_query($conn, $query)) {
            header('Location: ../view/admin/index.php');
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
