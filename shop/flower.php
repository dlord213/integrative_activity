<?php

include("../config.php");
$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch product details from the database
$sql = "SELECT name, description, price, image_url, quantity FROM products WHERE product_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

if (!$product) {
    header("Location: products.php");
    exit;
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

<body class="flex flex-col lg:py-6 lg:px-0 p-6 dark:bg-[#161616] lg:max-w-5xl lg:mx-auto dark:text-[#fefefe] text-[#242424] min-h-screen gap-4">
    <div class="flex flex-row gap-4 justify-between items-center">
        <div class="flex flex-row gap-4">
            <a href="/shop/" class="flex flex-row gap-4 items-center px-6 py-4 rounded-md transition-all delay-0 duration-300 dark:hover:bg-[#484848] hover:bg-[#efefef] dark:shadow-none shadow">
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
                <a href="./auth/login.php" class="flex flex-row gap-4 items-center px-6 py-4 rounded-md transition-all delay-0 duration-300 dark:hover:bg-[#484848] hover:bg-[#efefef] dark:shadow-none shadow">
                    <p>Login</p>
                </a>
            </div>
            <div class="flex flex-row gap-4">
                <a href="./auth/register.php" class="flex flex-row gap-4 items-center px-6 py-4 rounded-md transition-all delay-0 duration-300 dark:hover:bg-[#484848] hover:bg-[#efefef] dark:shadow-none shadow">
                    <p>Register</p>
                </a>
            </div>
        </div>
    </div>
    <div class="flex flex-col basis-[80%] px-8 py-4 lg:max-w-5xl lg:mx-auto gap-12">
        <div class="grid grid-cols-[1fr_1fr] gap-8">
            <img src="<?= htmlspecialchars($product['image_url']); ?>" alt="<?= htmlspecialchars($product['name']); ?>" class="w-full aspect-square object-contain rounded-lg" />
            <div class="flex flex-col items-start justify-end gap-4">
                <h1 class="text-6xl font-black"><?= htmlspecialchars($product['name']); ?></h1>
                <p class="text-sm text-stone-300"><?= htmlspecialchars($product['description']); ?></p>
                <h1 class="text-4xl font-bold text-amber-400">$<?= number_format($product['price'], 2); ?></h1>
                <div class="flex flex-col gap-2">
                    <p class="text-stone-500">Available</p>
                    <h1 class="text-2xl px-8 py-2 bg-stone-700 rounded-4xl"><?= $product['quantity']; ?></h1>
                </div>
                <div class="flex flex-row gap-4">
                    <a href="../auth/login.php" <?= $product['quantity'] == 0 ? 'disabled' : ''; ?>
                        class="cursor-pointer flex flex-row gap-4 items-center px-6 py-4 rounded-4xl transition-all delay-0 duration-300
                dark:bg-[#363636] dark:hover:bg-[#484848] hover:bg-[#efefef] shadow
                <?= $product['quantity'] == 0 ? 'opacity-50 cursor-not-allowed' : ''; ?>">
                        <i class="fa-solid fa-shopping-cart"></i>
                        <p>Order</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>