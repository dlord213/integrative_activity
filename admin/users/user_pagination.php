<div class="flex flex-col h-full dark:bg-[#242424] bg-[#fafafa] rounded-xl dark:shadow-none shadow-md p-4 gap-4">
    <?php
    include("../../config.php");

    // Pagination settings
    $limit = 7; // Number of customers per page
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    // Get total customers count
    $totalQuery = "SELECT COUNT(*) AS total FROM users";
    $totalResult = $conn->query($totalQuery);
    $totalRow = $totalResult->fetch_assoc();
    $totalCustomers = $totalRow['total'];
    $totalPages = ceil($totalCustomers / $limit);

    // Fetch customers for the current page
    $sql = "SELECT user_id, username, email, phone_number, address, created_at 
            FROM users WHERE type='user' ORDER BY created_at DESC 
            LIMIT $limit OFFSET $offset";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
            <div class="flex flex-row justify-between dark:bg-[#484848] rounded-xl items-center p-4">
                <div class="flex flex-row gap-4 items-center">
                    <div class="w-[64px] aspect-square dark:bg-[#969696] rounded-full flex items-center justify-center">
                        <i class="fa-solid fa-user text-white text-2xl"></i>
                    </div>
                    <div class="flex flex-col">
                        <h1 class="text-lg font-bold"><?php echo htmlspecialchars($row['username']); ?></h1>
                        <h1 class="text-stone-400 text-sm">Created on: <?php echo date("F j, Y", strtotime($row['created_at'])); ?></h1>
                    </div>
                </div>
                <button type="button" onclick="openCustomerDetailsModal(<?php echo $row['user_id']; ?>, '<?php echo htmlspecialchars($row['username']); ?>', '<?php echo htmlspecialchars($row['email']); ?>', '<?php echo htmlspecialchars($row['phone_number']); ?>', '<?php echo htmlspecialchars($row['address']); ?>')"
                    class="cursor-pointer flex flex-row gap-4 items-center px-6 py-4 rounded-md transition-all delay-0 duration-300 dark:bg-[#363636] dark:hover:bg-[#484848] hover:bg-[#efefef] shadow">
                    <i class="fa-solid fa-eye"></i>
                    <p>View details</p>
                </button>
            </div>
    <?php
        }
    } else {
        echo "<p class='text-center text-stone-500'>No customers found.</p>";
    }

    $conn->close();
    ?>
</div>

<!-- Pagination Controls -->
<div class="flex flex-row gap-2 justify-end w-full mt-4">
    <?php if ($page > 1) { ?>
        <a href="?page=<?php echo ($page - 1); ?>" class="p-4 dark:bg-[#242424] rounded-xl cursor-pointer transition-all duration-300 hover:dark:bg-[#363636] dark:shadow-none shadow">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
    <?php } ?>

    <span class="p-4 dark:bg-[#363636] rounded-xl text-white">
        Page <?php echo $page; ?> of <?php echo $totalPages; ?>
    </span>

    <?php if ($page < $totalPages) { ?>
        <a href="?page=<?php echo ($page + 1); ?>" class="p-4 dark:bg-[#242424] rounded-xl cursor-pointer transition-all duration-300 hover:dark:bg-[#363636] dark:shadow-none shadow">
            <i class="fa-solid fa-arrow-right"></i>
        </a>
    <?php } ?>
</div>