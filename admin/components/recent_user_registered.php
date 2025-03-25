<?php
include("../config.php");

$sql = "SELECT user_id, username, email, phone_number, address, created_at 
        FROM users WHERE type='user' ORDER BY created_at DESC LIMIT 5";
$result = $conn->query($sql);
?>

<div class="flex flex-col gap-2">
    <h1 class="text-4xl font-bold">Recent Customers Registered</h1>
    <div class="flex flex-col dark:bg-[#242424] bg-[#fafafa] rounded-xl dark:shadow-none shadow-md gap-4 p-4">

        <?php if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <div class="flex flex-row justify-between dark:bg-[#484848] rounded-xl items-center p-4">
                    <div class="flex flex-row gap-4 items-center">
                        <div class="w-[64px] aspect-square dark:bg-[#969696] rounded-full flex items-center justify-center">
                            <i class="fa-solid fa-user text-white text-2xl"></i>
                        </div>
                        <div class="flex flex-col">
                            <h1 class="text-lg font-bold"><?php echo htmlspecialchars($row['username']); ?></h1>
                            <p class="text-stone-400 text-sm">Created on: <?php echo date("F j, Y", strtotime($row['created_at'])); ?></p>
                        </div>
                    </div>
                    <button type="button" onclick="openCustomerDetailsModal(<?php echo $row['user_id']; ?>, '<?php echo htmlspecialchars($row['username']); ?>', '<?php echo htmlspecialchars($row['email']); ?>', '<?php echo htmlspecialchars($row['phone_number']); ?>', '<?php echo htmlspecialchars($row['address']); ?>')"
                        class="cursor-pointer flex flex-row gap-4 items-center px-6 py-4 rounded-md transition-all delay-0 duration-300 dark:bg-[#363636] dark:hover:bg-[#484848] hover:bg-[#efefef] shadow">
                        <i class="fa-solid fa-eye"></i>
                        <p>View details</p>
                    </button>
                </div>
        <?php }
        } else {
            echo "<p class='text-center text-stone-500'>No recent customers found.</p>";
        }
        ?>
    </div>
</div>

<?php $conn->close(); ?>