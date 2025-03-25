<?php
session_start();
include("../../config.php");


$user_id = $_SESSION['user_id'];
$limit = 5; // Number of orders per page

// Get current page number
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1); // Ensure page number is at least 1
$offset = ($page - 1) * $limit;

// Fetch total order count for pagination
$total_orders_query = "SELECT COUNT(*) FROM orders WHERE user_id = ?";
$stmt = $conn->prepare($total_orders_query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($total_orders);
$stmt->fetch();
$stmt->close();

$total_pages = ceil($total_orders / $limit);

// Fetch paginated orders
$orders_query = "SELECT o.order_id, o.created_at, o.status, p.name, p.image_url, u.address
                 FROM orders o 
                 JOIN products p ON o.product_id = p.product_id 
                 JOIN users u ON o.user_id = u.user_id
                 WHERE o.user_id = ? 
                 ORDER BY o.created_at DESC 
                 LIMIT ? OFFSET ?";
$stmt = $conn->prepare($orders_query);
$stmt->bind_param("iii", $user_id, $limit, $offset);
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="flex flex-col gap-4">
    <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="flex flex-col dark:bg-[#242424] bg-[#fafafa] rounded-xl dark:shadow-none shadow-md gap-4 p-4">
            <div class="flex flex-row justify-between dark:bg-[#484848] rounded-xl items-center p-4">
                <div class="flex flex-row gap-4">
                    <img src="<?php echo htmlspecialchars($row['image_url']); ?>"
                        alt="<?php echo htmlspecialchars($row['name']); ?>"
                        class="w-[64px] aspect-square dark:bg-[#969696] rounded-full object-contain" />
                    <div class="flex flex-col">
                        <h1 class="text-lg font-bold"><?= htmlspecialchars($row['name']) ?></h1>
                        <h1 class="">Order #<?= htmlspecialchars($row['order_id']) ?></h1>
                        <h1 class="">Ordered on <?= htmlspecialchars($row['created_at']) ?></h1>
                    </div>
                </div>
                <button type="button" onclick="toggleModal({ 
    id: '<?= $row['order_id'] ?>', 
    date: '<?= $row['created_at'] ?>',
    status: '<?= $row['status'] ?>',
    address: '<?= $row['address'] ?>',
    items: [ 
        { name: '<?= $row['name'] ?>', quantity: 3 } // Adjust as needed
    ] 
})"
                    class="flex flex-row gap-4 items-center px-6 py-4 rounded-md transition-all delay-0 duration-300 dark:bg-[#363636] dark:hover:bg-[#484848] hover:bg-[#efefef] shadow">
                    <i class="fa-solid fa-eye"></i>
                    <p>View</p>
                </button>
            </div>
        </div>
    <?php } ?>
</div>

<!-- Pagination -->
<div class="flex flex-row gap-2 justify-end w-full mt-4">
    <?php if ($page > 1) { ?>
        <a href="?page=<?= $page - 1 ?>" class="fa-solid fa-arrow-left p-4 dark:bg-[#242424] rounded-xl cursor-pointer delay-0 duration-300 transition-all hover:dark:bg-[#363636] dark:shadow-none shadow"></a>
    <?php } ?>

    <?php if ($page < $total_pages) { ?>
        <a href="?page=<?= $page + 1 ?>" class="fa-solid fa-arrow-right p-4 dark:bg-[#242424] rounded-xl cursor-pointer delay-0 duration-300 transition-all hover:dark:bg-[#363636] dark:shadow-none shadow"></a>
    <?php } ?>
</div>