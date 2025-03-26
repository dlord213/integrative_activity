<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

?>


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

<body class="flex flex-row dark:bg-[#161616] text-[#242424] lg:mx-auto dark:text-[#fefefe] text-[#242424] min-h-screen">
    <?php include("./components/sidebar.php") ?>
    <div class="flex flex-col basis-[80%] px-8 py-6 lg:max-w-5xl lg:mx-auto gap-8">
        <div class="flex flex-row gap-4 items-center">
            <i class="fa-solid fa-user text-2xl dark:text-[#242424] dark:bg-[#fefefe] p-4 rounded-full cursor-pointer delay-0 duration-300 transition-all dark:hover:bg-[#efefef]"></i>
            <div class="flex flex-col">
                <?php if (isset($_SESSION['username'])): ?>
                    <h1 class="font-bold text-3xl"><?php echo $_SESSION['username']; ?></h1>
                    <h1 class="text-stone-400"><?php echo $_SESSION['email']; ?></h1>
                <?php endif; ?>
            </div>
        </div>
        <?php include("./components/user_recent_orders.php") ?>
    </div>
    <?php include("./components/dashboard_order_details.php") ?>
</body>

</html>