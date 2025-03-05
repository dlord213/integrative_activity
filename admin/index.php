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

<body class="flex flex-row dark:bg-[#161616] text-[#242424] lg:mx-auto dark:text-[#fefefe] min-h-screen">
    <?php include("./components/sidebar.php") ?>
    <div class="flex flex-col basis-[80%] px-8 py-4 lg:max-w-5xl lg:mx-auto gap-4">
        <div class="flex flex-row justify-between items-center">
            <h1 class="text-4xl font-black text-wrap">Dashboard</h1>
            <i class="fa-solid fa-user text-2xl dark:text-[#242424] dark:bg-[#fefefe] p-4 rounded-full cursor-pointer delay-0 duration-300 transition-all dark:hover:bg-[#efefef]"></i>
        </div>
        <div class="grid grid-cols-3 gap-4">
            <div class="flex flex-col dark:bg-[#242424] rounded-xl px-4 py-12 gap-2">
                <p>Today's sales</p>
                <h1 class="font-black text-4xl">₱XX,XXX</h1>
            </div>
            <div class="flex flex-col dark:bg-[#242424] rounded-xl px-4 py-12 gap-2">
                <p>This week sales</p>
                <h1 class="font-black text-4xl">₱XX,XXX</h1>
            </div>
            <div class="flex flex-col dark:bg-[#242424] rounded-xl px-4 py-12 gap-2">
                <p>This month sales</p>
                <h1 class="font-black text-4xl">₱XX,XXX</h1>
            </div>
        </div>
    </div>
</body>

</html>