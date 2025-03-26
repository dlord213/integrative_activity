<?php

include("../config.php");
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: ../user/flowers");
    exit();
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fleur de Magazine</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap');

        * {
            font-family: Work Sans, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
    </style>
</head>

<body class="flex flex-col lg:py-6 lg:px-0 p-6 dark:bg-[#161616] lg:max-w-5xl lg:mx-auto dark:text-[#fefefe] text-[#242424] min-h-screen gap-4 relative">
    <div class="flex flex-row gap-4 justify-between items-center">
        <div class="flex flex-row gap-4">
            <a href="" class="flex flex-row gap-4 items-center px-6 py-4 rounded-md transition-all delay-0 duration-300 dark:hover:bg-[#484848] hover:bg-[#efefef] dark:shadow-none shadow">
                <i class="fa-solid fa-shop"></i>
                <p>Shop</p>
            </a>
        </div>
        <a href="../index.php" class="flex flex-row gap-4 items-center text-wrap">
            <img src="../../assets/logo.png" class="w-full h-full max-w-[64px] max-h-[64px] aspect-square dark:invert" />
            <h1 class="2xl:text-4xl text-2xl font-black">Fleur de Magazine</h1>
        </a>
        <div class="flex flex-row gap-4">
            <div class="flex flex-row gap-4">
                <a href="../auth/login.php" class="flex flex-row gap-4 items-center px-6 py-4 rounded-md transition-all delay-0 duration-300 dark:hover:bg-[#484848] hover:bg-[#efefef] dark:shadow-none shadow">
                    <p>Login</p>
                </a>
            </div>
            <div class="flex flex-row gap-4">
                <a href="../auth/register.php" class="flex flex-row gap-4 items-center px-6 py-4 rounded-md transition-all delay-0 duration-300 dark:hover:bg-[#484848] hover:bg-[#efefef] dark:shadow-none shadow">
                    <p>Register</p>
                </a>
            </div>
        </div>
    </div>
    <div class="flex flex-col gap-4">
        <?php include("./flowers_pagination.php") ?>
    </div>
</body>

</html>