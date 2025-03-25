<?php

include("../../config.php");
$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch product details from the database
$sql = "SELECT name, description, price, image_url, quantity FROM products WHERE product_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

// Redirect if no product found
if (!$product) {
    header("Location: products.php"); // Redirect to product listing if ID is invalid
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fleur de Magazine / <?= htmlspecialchars($product['name']); ?></title>
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
    <div class="flex flex-col basis-[80%] px-8 py-4 lg:max-w-5xl lg:mx-auto gap-12">
        <a href="" class="flex flex-row gap-4 items-center p-4 bg-stone-800 dark:bg-stone-700 w-fit rounded-4xl">
            <i class="fa-solid fa-arrow-left"></i>
            <h1>Back</h1>
        </a>
        <div class="grid grid-cols-[1fr_1fr] gap-8">
            <img src="<?= htmlspecialchars($product['image_url']); ?>" alt="<?= htmlspecialchars($product['name']); ?>" class="w-full aspect-square rounded-lg" />
            <div class="flex flex-col items-start justify-end gap-4">
                <h1 class="text-6xl font-black"><?= htmlspecialchars($product['name']); ?></h1>
                <p class="text-sm text-stone-300"><?= htmlspecialchars($product['description']); ?></p>
                <h1 class="text-4xl font-bold text-amber-400">$<?= number_format($product['price'], 2); ?></h1>
                <div class="flex flex-col gap-2">
                    <p class="text-stone-500">Available</p>
                    <h1 class="text-2xl px-8 py-2 bg-stone-700 rounded-4xl"><?= $product['quantity']; ?></h1>
                </div>
                <div class="flex flex-row gap-4">
                    <form action="order.php" method="POST">
                        <input type="hidden" name="product_id" value="<?= $product_id; ?>">
                        <button type="submit" class="cursor-pointer flex flex-row gap-4 items-center px-6 py-4 rounded-4xl transition-all delay-0 duration-300 dark:bg-[#363636] dark:hover:bg-[#484848] hover:bg-[#efefef] shadow">
                            <i class="fa-solid fa-shopping-cart "></i>
                            <p>Order</p>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>

</html>