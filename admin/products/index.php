<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fleur de Magazine / Products</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap');

        * {
            font-family: Work Sans, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
    </style>
</head>

<body class="flex flex-row dark:bg-[#161616] text-[#242424] lg:mx-auto dark:text-[#fefefe] min-h-screen">
    <?php include("../components/sidebar.php") ?>
    <div class="flex flex-col basis-[80%] px-8 py-4 lg:max-w-5xl lg:mx-auto gap-4">
        <div class="flex flex-row justify-between">
            <label for="default-search" class="mb-2 text-sm font-medium text-stone-900 sr-only dark:text-white">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-stone-500 dark:text-stone-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-stone-900 rounded-lg bg-stone-50 dark:bg-[#242424] dark:placeholder-stone-400 dark:text-white outline-none dark:shadow-none shadow" placeholder="Search" required />
            </div>
        </div>
        <div class="flex flex-row justify-between items-center">
            <h1 class="lg:text-4xl font-black">Products</h1>
            <div class="flex flex-row gap-4">
                <button type="button" onclick="openAddNewProductModal(event)" href="" class="flex flex-row gap-4 items-center px-6 py-4 rounded-md transition-all delay-0 duration-300 dark:bg-[#363636] dark:hover:bg-[#484848] hover:bg-[#efefef] cursor-pointer shadow">
                    <i class="fa-solid fa-add "></i>
                    <p>Add new product</p>
                </button>
            </div>
        </div>
        <?php include("./product_pagination.php") ?>
    </div>


    <?php include("./product_details_modal.php") ?>
    <?php include("./add_product_modal.php") ?>

</body>

</html>