<?php
include("../config.php");

$sql = "SELECT o.order_id, p.name, u.username, o.status, o.created_at, u.address
        FROM orders o
        JOIN products p ON o.product_id = p.product_id
        JOIN users u ON o.user_id = u.user_id
        ORDER BY o.created_at DESC
        LIMIT 5";

$result = $conn->query($sql);
?>

<div class="flex flex-col gap-2">
    <h1 class="text-4xl font-bold">Recent Orders</h1>
    <div class="flex flex-col dark:bg-[#242424] bg-[#fafafa] rounded-xl dark:shadow-none shadow-md gap-4 p-4">

        <?php if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <div class="flex flex-row justify-between dark:bg-[#484848] rounded-xl items-center p-4">
                    <div class="flex flex-row gap-4">
                        <div class="w-[64px] aspect-square dark:bg-[#969696] rounded-full flex items-center justify-center">
                            <i class="fa-solid fa-box text-white text-2xl"></i>
                        </div>
                        <div class="flex flex-col">
                            <h1 class="text-lg font-bold"><?php echo htmlspecialchars($row['name']); ?></h1>
                            <h1 class="text-stone-400 text-sm">Order # <?php echo htmlspecialchars($row['order_id']); ?></h1>
                            <h1 class="text-stone-400 text-sm">Created on <?php echo date("F j, Y", strtotime($row['created_at'])); ?></h1>
                        </div>
                    </div>
                    <button type="button" onclick="openOrderDetailsModal(<?php echo $row['order_id']; ?>, '<?php echo htmlspecialchars($row['name']); ?>', '<?php echo htmlspecialchars($row['username']); ?>', '<?php echo htmlspecialchars($row['status']); ?>', '<?php echo htmlspecialchars($row['created_at']); ?>', '<?php echo htmlspecialchars($row['address']); ?>')"
                        class="cursor-pointer flex flex-row gap-4 items-center px-6 py-4 rounded-md transition-all delay-0 duration-300 dark:bg-[#363636] dark:hover:bg-[#484848] hover:bg-[#efefef] shadow">
                        <i class="fa-solid fa-eye"></i>
                        <p>View</p>
                    </button>
                </div>
        <?php }
        } else {
            echo "<p class='text-center text-stone-400'>No recent orders found.</p>";
        }
        ?>
    </div>
</div>

<?php $conn->close(); ?>