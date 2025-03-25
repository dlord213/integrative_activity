<?php
include("../config.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password, created_at, type) VALUES ('$username', '$email', '$hashed_password', NOW(), 'admin')";

    if ($conn->query($sql) === TRUE) {
        $user_id = $conn->insert_id;

        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['user_type'] = 'admin';

        header("Location: ../admin/");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fleur de Magazine / Register</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap');

        * {
            font-family: Work Sans, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
    </style>
</head>

<body class="flex flex-col lg:py-6 lg:px-0 p-6 dark:bg-[#161616] text-[#242424] lg:max-w-lg lg:mx-auto dark:text-[#fefefe] min-h-screen gap-4 justify-center">
    <a href="../index.php" class="flex flex-row gap-4 items-center text-wrap items-center">
        <img src="../../assets/logo.png" class="w-full h-full max-w-[64px] max-h-[64px] aspect-square dark:invert" />
        <h1 class="2xl:text-4xl text-2xl font-black">Fleur de Magazine</h1>
    </a>
    <form action="admin_register.php" method="POST" class="flex flex-col gap-4">
        <div class="flex flex-col gap-2">
            <p>Username</p>
            <input type="text" name="username" id="username" class="bg-stone-50 border border-stone-300 text-stone-900 text-sm rounded-lg focus:ring-stone-500 focus:border-stone-500 block w-full p-2.5 dark:bg-stone-700 dark:border-stone-600 dark:placeholder-stone-400 dark:text-white dark:focus:ring-stone-500 dark:focus:border-stone-500" placeholder="johndoe007" required />
        </div>
        <div class="flex flex-col gap-2">
            <p>Email</p>
            <input type="email" name="email" id="email" class="bg-stone-50 border border-stone-300 text-stone-900 text-sm rounded-lg focus:ring-stone-500 focus:border-stone-500 block w-full p-2.5 dark:bg-stone-700 dark:border-stone-600 dark:placeholder-stone-400 dark:text-white dark:focus:ring-stone-500 dark:focus:border-stone-500" placeholder="johndoe@gmail.com" required />
        </div>
        <div class="flex flex-col gap-2">
            <p>Password</p>
            <input type="password" name="password" id="password" class="bg-stone-50 border border-stone-300 text-stone-900 text-sm rounded-lg focus:ring-stone-500 focus:border-stone-500 block w-full p-2.5 dark:bg-stone-700 dark:border-stone-600 dark:placeholder-stone-400 dark:text-white dark:focus:ring-stone-500 dark:focus:border-stone-500" placeholder="********" required />
        </div>
        <button type="submit" class="text-white bg-stone-700 hover:bg-stone-800 focus:ring-4 focus:outline-none focus:ring-stone-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-stone-600 dark:hover:bg-stone-700 dark:focus:ring-stone-800 cursor-pointer">Register</button>
    </form>
    <div class="border-t border-stone-200 dark:border-stone-800 py-4 w-full flex flex-col">
        <a href="./login.php" class="">Already have an account?</a>
    </div>
</body>

</html>