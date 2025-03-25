<?php
include("../config.php");

$user_id = $_SESSION['user_id'];

$sql = "SELECT orders.order_id, orders.created_at, orders.status, products.name, products.image_url
        FROM orders
        JOIN products ON orders.product_id = products.product_id
        WHERE orders.user_id = ?
        ORDER BY orders.created_at DESC
        LIMIT 5";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="flex flex-col gap-2">
    <h1 class="text-4xl font-bold">Recent Orders</h1>
    <div class="flex flex-col dark:bg-[#242424] bg-[#fafafa] rounded-xl dark:shadow-none shadow-md gap-4 p-4">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="flex flex-row justify-between dark:bg-[#484848] rounded-xl items-center p-4">
                    <div class="flex flex-row gap-4">
                        <div class="w-[64px] aspect-square dark:bg-[#969696] rounded-full overflow-hidden">
                            <img src="<?= htmlspecialchars($row['image']); ?>" alt="<?= htmlspecialchars($row['name']); ?>" class="w-full h-full object-cover">
                        </div>
                        <div class="flex flex-col">
                            <h1 class="text-lg font-bold"><?= htmlspecialchars($row['name']); ?></h1>
                            <h1 class="">Order #<?= htmlspecialchars($row['order_id']); ?></h1>
                            <h1 class="">Status: <?= ucfirst(htmlspecialchars($row['status'])); ?></h1>
                            <h1 class="">Created on <?= date('M d, Y', strtotime($row['created_at'])); ?></h1>
                        </div>
                    </div>
                    <button type="button" onclick="closeModal(event)" class="flex flex-row gap-4 items-center px-6 py-4 rounded-md transition-all delay-0 duration-300 dark:bg-[#363636] dark:hover:bg-[#484848] hover:bg-[#efefef] shadow">
                        <i class="fa-solid fa-eye"></i>
                        <p>View</p>
                    </button>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center text-gray-500">No recent orders found.</p>
        <?php endif; ?>
    </div>
</div>