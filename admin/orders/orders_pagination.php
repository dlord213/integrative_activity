<?php
include("../../config.php");

$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$sql = "SELECT o.order_id, u.username AS customer_name, p.name AS product_name
        FROM orders o
        JOIN users u ON o.user_id = u.user_id
        JOIN products p ON o.product_id = p.product_id
        ORDER BY o.created_at DESC
        LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

$totalOrders = $conn->query("SELECT COUNT(*) AS total FROM orders")->fetch_assoc()['total'];
$totalPages = ceil($totalOrders / $limit);
?>

<div class="flex flex-col h-full dark:bg-[#242424] bg-[#fafafa] rounded-xl dark:shadow-none shadow-md p-4 gap-4">
    <?php if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
            <div class="flex flex-row justify-between dark:bg-[#484848] rounded-xl items-center p-4">
                <div class="flex flex-row gap-4">
                    <div class="w-[64px] aspect-square dark:bg-[#969696] rounded-full flex items-center justify-center">
                        <i class="fa-solid fa-user text-white text-2xl"></i>
                    </div>
                    <div class="flex flex-col">
                        <h1 class="text-lg font-bold"><?php echo htmlspecialchars($row['customer_name']); ?></h1>
                        <h1 class="text-sm text-stone-300">Order #<?php echo $row['order_id']; ?></h1>
                        <p class="text-stone-400">Product: <?php echo htmlspecialchars($row['product_name']); ?></p>
                    </div>
                </div>
                <button type="button" class="cursor-pointer flex flex-row gap-4 items-center px-6 py-4 rounded-md transition-all delay-0 duration-300 dark:bg-[#363636] dark:hover:bg-[#484848] hover:bg-[#efefef] shadow"
                    onclick="fetchOrderDetails(<?php echo $row['order_id']; ?>)">
                    <i class="fa-solid fa-eye"></i>
                    <p>View</p>
                </button>
            </div>
    <?php }
    } else {
        echo "<p class='text-center text-stone-500'>No recent orders found.</p>";
    }
    ?>
</div>

<!-- Pagination -->
<div class="flex flex-row gap-2 justify-end w-full mt-4">
    <?php if ($page > 1) { ?>
        <a href="?page=<?php echo $page - 1; ?>" class="fa-solid fa-arrow-left p-4 dark:bg-[#242424] rounded-xl cursor-pointer transition-all hover:dark:bg-[#363636] dark:shadow-none shadow"></a>
    <?php }
    if ($page < $totalPages) { ?>
        <a href="?page=<?php echo $page + 1; ?>" class="fa-solid fa-arrow-right p-4 dark:bg-[#242424] rounded-xl cursor-pointer transition-all hover:dark:bg-[#363636] dark:shadow-none shadow"></a>
    <?php } ?>
</div>



<?php $conn->close(); ?>