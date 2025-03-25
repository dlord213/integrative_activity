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
    <div class="fixed inset-0 bg-black/75 hidden justify-center items-center z-50" id="orderModal">
        <i class="fa-solid fa-arrow-close p-4 dark:bg-[#242424] rounded-xl cursor-pointer delay-0 duration-300 transition-all hover:dark:bg-[#363636] dark:shadow-none shadow"></i>
        <div class="flex flex-col bg-stone-700 p-6 rounded-lg shadow-lg max-w-lg w-full gap-4">
            <div class="flex flex-row gap-6 items-center">
                <button onclick="closeModal(event)" class="cursor-pointer">
                    <i class="fa-solid fa-close" class="w-[64px] aspect-square"></i>
                </button>
                <h1 class="text-4xl font-black">Order Details</h1>
            </div>
            <div class="flex flex-col gap-4">
                <!-- Order Information -->
                <div class="p-4 bg-stone-800 rounded-xl">
                    <h2 class="text-xl font-semibold text-stone-300">Order ID:</h2>
                    <p id="order_id" class="text-stone-400">#12345</p>
                </div>
                <div class="p-4 bg-stone-800 rounded-xl">
                    <h2 class="text-xl font-semibold text-stone-300">Order Date:</h2>
                    <p id="order_date" class="text-stone-400">2025-03-20 10:30:00</p>
                </div>
                <div class="p-4 bg-stone-800 rounded-xl">
                    <h2 class="text-xl font-semibold text-stone-300">Status:</h2>
                    <p id="order_status" class="text-stone-400">Pending</p>
                </div>
                <div class="p-4 bg-stone-800 rounded-xl">
                    <h2 class="text-xl font-semibold text-stone-300">Shipping Address:</h2>
                    <p id="shipping_address" class="text-stone-400">123 Main St, City, State</p>
                </div>
            </div>

            <!-- Order Items -->
            <div class="p-4 bg-stone-800 rounded-xl">
                <h2 class="text-2xl font-semibold text-stone-300">Orders/items</h2>
                <div class="flex flex-col gap-2">
                    <!-- Example of order item, repeat for each item -->
                    <div class="flex justify-between">
                        <span class="text-stone-400">Flower Name</span>
                        <span class="text-stone-400">x3</span>
                    </div>
                </div>
            </div>

            <!-- Button to Close the Modal -->
            <button type="button" class="w-full bg-stone-500 text-white py-2 rounded-lg cursor-pointer" onclick="closeModal(event)">Close</button>
        </div>
    </div>
    <script>
        function closeModal(event) {
            event.preventDefault(); // Prevent any default form behavior (if inside a form)

            const modal = document.getElementById("orderModal");
            if (modal.classList.contains("hidden")) {
                modal.classList.remove("hidden"); // Show modal
                modal.classList.add("flex"); // Add flex to make it visible
            } else {
                modal.classList.add("hidden"); // Hide modal
                modal.classList.remove("flex"); // Remove flex to hide it
            }
        }
    </script>
</body>

</html>