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
        <div class="flex flex-row gap-4 items-center text-wrap">
            <img src="../../assets/logo.png" class="w-full h-full max-w-[64px] max-h-[64px] aspect-square dark:invert" />
            <h1 class="2xl:text-4xl text-2xl font-black">Fleur de Magazine</h1>
        </div>
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
    <div class="grid grid-cols-[15vw_1fr] gap-6 relative">
        <div class="flex flex-col gap-4 sticky top-4 h-screen min-h-screen">
            <div class="flex flex-col gap-4 dark:bg-stone-800 p-4 rounded-2xl">
                <h1 class="text-4xl font-bold">Availability</h1>
                <div class="flex flex-row gap-2 items-center">
                    <input type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-stone-100 border-stone-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-stone-800 focus:ring-2 dark:bg-stone-700 dark:border-stone-600">
                    <p class="">In stock (#)</p>
                </div>
                <div class="flex flex-row gap-2 items-center">
                    <input type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-stone-100 border-stone-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-stone-800 focus:ring-2 dark:bg-stone-700 dark:border-stone-600">
                    <p class="">Out of stock (#)</p>
                </div>

            </div>
            <div class="flex flex-col gap-4 dark:bg-stone-800 p-4 rounded-2xl">
                <h1 class="text-4xl font-bold">Price</h1>
                <div class="flex flex-row gap-4">
                    <div class="flex flex-col gap-2">
                        <p class="">Min</p>
                        <input type="text" id="minimum_price" class="bg-stone-50 border border-stone-300 text-stone-900 text-sm rounded-lg focus:ring-stone-500 focus:border-stone-500 block w-full p-2.5 dark:bg-stone-700 dark:border-stone-600 dark:placeholder-stone-400 dark:text-white dark:focus:ring-stone-500 dark:focus:border-stone-500" placeholder="Minimum" required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <p class="">Max</p>
                        <input type="text" id="maximum_price" class="bg-stone-50 border border-stone-300 text-stone-900 text-sm rounded-lg focus:ring-stone-500 focus:border-stone-500 block w-full p-2.5 dark:bg-stone-700 dark:border-stone-600 dark:placeholder-stone-400 dark:text-white dark:focus:ring-stone-500 dark:focus:border-stone-500" placeholder="Maximum" required />
                    </div>
                </div>
                <button type="button" class=" w-full bg-stone-700 text-white py-2 rounded-lg cursor-pointer dark:hover:bg-stone-600">Apply</button>
            </div>
        </div>
        <div class="flex flex-col gap-4">
            <div class="flex flex-row justify-between items-center">
                <div class="flex flex-row gap-4">
                    <i class="fa-solid fa-grid"></i>
                    <i class="fa-solid fa-grip"></i>
                </div>
                <h1 class="text-xl font-bold">Showing 1 - 9 of result</h1>
            </div>
            <div class="grid grid-cols-[1fr_1fr] gap-4">
                <a href="./flower.php" class="flex flex-col rounded-lg p-4 dark:bg-stone-800 items-center dark:hover:bg-stone-600 cursor-pointer transition-all delay-0 duration-300">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3vBCi9FZ5K0LbNe8h4yVdMuymxzjMquaZoA&s" class="w-full aspect-square rounded-lg" />
                    <h1 class="text-2xl font-black">FLOWER NAME</h1>
                    <p>$99.99</p>
                </a>
                <a href="./flower.php" class="flex flex-col rounded-lg p-4 dark:bg-stone-800 items-center dark:hover:bg-stone-600 cursor-pointer transition-all delay-0 duration-300">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3vBCi9FZ5K0LbNe8h4yVdMuymxzjMquaZoA&s" class="w-full aspect-square rounded-lg" />
                    <h1 class="text-2xl font-black">FLOWER NAME</h1>
                    <p>$99.99</p>
                </a>
                <a href="./flower.php" class="flex flex-col rounded-lg p-4 dark:bg-stone-800 items-center dark:hover:bg-stone-600 cursor-pointer transition-all delay-0 duration-300">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3vBCi9FZ5K0LbNe8h4yVdMuymxzjMquaZoA&s" class="w-full aspect-square rounded-lg" />
                    <h1 class="text-2xl font-black">FLOWER NAME</h1>
                    <p>$99.99</p>
                </a>
                <a href="./flower.php" class="flex flex-col rounded-lg p-4 dark:bg-stone-800 items-center dark:hover:bg-stone-600 cursor-pointer transition-all delay-0 duration-300">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3vBCi9FZ5K0LbNe8h4yVdMuymxzjMquaZoA&s" class="w-full aspect-square rounded-lg" />
                    <h1 class="text-2xl font-black">FLOWER NAME</h1>
                    <p>$99.99</p>
                </a>
                <a href="./flower.php" class="flex flex-col rounded-lg p-4 dark:bg-stone-800 items-center dark:hover:bg-stone-600 cursor-pointer transition-all delay-0 duration-300">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3vBCi9FZ5K0LbNe8h4yVdMuymxzjMquaZoA&s" class="w-full aspect-square rounded-lg" />
                    <h1 class="text-2xl font-black">FLOWER NAME</h1>
                    <p>$99.99</p>
                </a>
                <a href="./flower.php" class="flex flex-col rounded-lg p-4 dark:bg-stone-800 items-center dark:hover:bg-stone-600 cursor-pointer transition-all delay-0 duration-300">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3vBCi9FZ5K0LbNe8h4yVdMuymxzjMquaZoA&s" class="w-full aspect-square rounded-lg" />
                    <h1 class="text-2xl font-black">FLOWER NAME</h1>
                    <p>$99.99</p>
                </a>
                <a href="./flower.php" class="flex flex-col rounded-lg p-4 dark:bg-stone-800 items-center dark:hover:bg-stone-600 cursor-pointer transition-all delay-0 duration-300">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3vBCi9FZ5K0LbNe8h4yVdMuymxzjMquaZoA&s" class="w-full aspect-square rounded-lg" />
                    <h1 class="text-2xl font-black">FLOWER NAME</h1>
                    <p>$99.99</p>
                </a>
                <a href="./flower.php" class="flex flex-col rounded-lg p-4 dark:bg-stone-800 items-center dark:hover:bg-stone-600 cursor-pointer transition-all delay-0 duration-300">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3vBCi9FZ5K0LbNe8h4yVdMuymxzjMquaZoA&s" class="w-full aspect-square rounded-lg" />
                    <h1 class="text-2xl font-black">FLOWER NAME</h1>
                    <p>$99.99</p>
                </a>
                <a href="./flower.php" class="flex flex-col rounded-lg p-4 dark:bg-stone-800 items-center dark:hover:bg-stone-600 cursor-pointer transition-all delay-0 duration-300">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3vBCi9FZ5K0LbNe8h4yVdMuymxzjMquaZoA&s" class="w-full aspect-square rounded-lg" />
                    <h1 class="text-2xl font-black">FLOWER NAME</h1>
                    <p>$99.99</p>
                </a>
                <a href="./flower.php" class="flex flex-col rounded-lg p-4 dark:bg-stone-800 items-center dark:hover:bg-stone-600 cursor-pointer transition-all delay-0 duration-300">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3vBCi9FZ5K0LbNe8h4yVdMuymxzjMquaZoA&s" class="w-full aspect-square rounded-lg" />
                    <h1 class="text-2xl font-black">FLOWER NAME</h1>
                    <p>$99.99</p>
                </a>
                <a href="./flower.php" class="flex flex-col rounded-lg p-4 dark:bg-stone-800 items-center dark:hover:bg-stone-600 cursor-pointer transition-all delay-0 duration-300">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3vBCi9FZ5K0LbNe8h4yVdMuymxzjMquaZoA&s" class="w-full aspect-square rounded-lg" />
                    <h1 class="text-2xl font-black">FLOWER NAME</h1>
                    <p>$99.99</p>
                </a>
                <a href="./flower.php" class="flex flex-col rounded-lg p-4 dark:bg-stone-800 items-center dark:hover:bg-stone-600 cursor-pointer transition-all delay-0 duration-300">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3vBCi9FZ5K0LbNe8h4yVdMuymxzjMquaZoA&s" class="w-full aspect-square rounded-lg" />
                    <h1 class="text-2xl font-black">FLOWER NAME</h1>
                    <p>$99.99</p>
                </a>
                <a href="./flower.php" class="flex flex-col rounded-lg p-4 dark:bg-stone-800 items-center dark:hover:bg-stone-600 cursor-pointer transition-all delay-0 duration-300">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3vBCi9FZ5K0LbNe8h4yVdMuymxzjMquaZoA&s" class="w-full aspect-square rounded-lg" />
                    <h1 class="text-2xl font-black">FLOWER NAME</h1>
                    <p>$99.99</p>
                </a>
                <a href="./flower.php" class="flex flex-col rounded-lg p-4 dark:bg-stone-800 items-center dark:hover:bg-stone-600 cursor-pointer transition-all delay-0 duration-300">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3vBCi9FZ5K0LbNe8h4yVdMuymxzjMquaZoA&s" class="w-full aspect-square rounded-lg" />
                    <h1 class="text-2xl font-black">FLOWER NAME</h1>
                    <p>$99.99</p>
                </a>
                <a href="./flower.php" class="flex flex-col rounded-lg p-4 dark:bg-stone-800 items-center dark:hover:bg-stone-600 cursor-pointer transition-all delay-0 duration-300">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3vBCi9FZ5K0LbNe8h4yVdMuymxzjMquaZoA&s" class="w-full aspect-square rounded-lg" />
                    <h1 class="text-2xl font-black">FLOWER NAME</h1>
                    <p>$99.99</p>
                </a>
                <a href="./flower.php" class="flex flex-col rounded-lg p-4 dark:bg-stone-800 items-center dark:hover:bg-stone-600 cursor-pointer transition-all delay-0 duration-300">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3vBCi9FZ5K0LbNe8h4yVdMuymxzjMquaZoA&s" class="w-full aspect-square rounded-lg" />
                    <h1 class="text-2xl font-black">FLOWER NAME</h1>
                    <p>$99.99</p>
                </a>
            </div>
            <div class="flex flex-row gap-2 justify-end w-full">
                <i class="fa-solid fa-arrow-left p-4 dark:bg-[#242424] rounded-xl cursor-pointer delay-0 duration-300 transition-all hover:dark:bg-[#363636] dark:shadow-none shadow"></i>
                <i class="fa-solid fa-arrow-right p-4 dark:bg-[#242424] rounded-xl cursor-pointer delay-0 duration-300 transition-all hover:dark:bg-[#363636] dark:shadow-none shadow"></i>
            </div>
        </div>
    </div>
</body>

</html>