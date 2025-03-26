<?php

include("../config.php");

$limit = 9;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1);
$offset = ($page - 1) * $limit;

// Fetch total number of products
$total_query = "SELECT COUNT(*) AS total FROM products";
$total_result = $conn->query($total_query);
$total_row = $total_result->fetch_assoc();
$total_products = $total_row['total'];
$total_pages = ceil($total_products / $limit);

// Fetch products for the current page
$sql = "SELECT product_id, name, price, image_url FROM products ORDER BY name ASC LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);
?>

<div class="grid grid-cols-[1fr_1fr_1fr] gap-4">
    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <a href="./flower.php?id=<?= htmlspecialchars($row['product_id']); ?>" class="flex flex-col rounded-lg p-4 dark:bg-stone-800 items-center dark:hover:bg-stone-600 cursor-pointer transition-all delay-0 duration-300">
                <img src="<?= htmlspecialchars($row['image_url']); ?>" alt="<?= htmlspecialchars($row['name']); ?>" class="w-full aspect-square rounded-lg object-contain" />
                <h1 class="text-2xl font-black"><?= htmlspecialchars($row['name']); ?></h1>
                <p>$<?= number_format($row['price'], 2); ?></p>
            </a>
        <?php endwhile; ?>
    <?php else: ?>
        <p class="text-center text-gray-500 col-span-2">No products available.</p>
    <?php endif; ?>
</div>

<!-- Pagination Controls -->
<div class="flex flex-row gap-2 justify-end w-full mt-4">
    <?php if ($page > 1): ?>
        <a href="?page=<?= $page - 1; ?>" class="p-4 dark:bg-[#242424] rounded-xl cursor-pointer transition-all hover:dark:bg-[#363636] dark:shadow-none shadow">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
    <?php endif; ?>

    <?php if ($page < $total_pages): ?>
        <a href="?page=<?= $page + 1; ?>" class="p-4 dark:bg-[#242424] rounded-xl cursor-pointer transition-all hover:dark:bg-[#363636] dark:shadow-none shadow">
            <i class="fa-solid fa-arrow-right"></i>
        </a>
    <?php endif; ?>
</div>