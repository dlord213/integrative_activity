<?php
include("../../config.php");

$productsPerPage = 6;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$offset = ($page - 1) * $productsPerPage;

$totalProductsQuery = "SELECT COUNT(*) as total FROM products";
$totalResult = $conn->query($totalProductsQuery);
$totalRow = $totalResult->fetch_assoc();
$totalProducts = $totalRow['total'];

$totalPages = ceil($totalProducts / $productsPerPage);

$sql = "SELECT product_id, name, quantity, price, image_url FROM products LIMIT $productsPerPage OFFSET $offset";
$result = $conn->query($sql);
?>

<div class="flex flex-col h-full dark:bg-[#242424] bg-[#fafafa] rounded-xl dark:shadow-none shadow-md p-4 gap-4 overflow-y-auto">
    <?php if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
            <div class="flex flex-row justify-between dark:bg-[#484848] rounded-xl items-center p-4">
                <div class="flex flex-row gap-4 items-center">
                    <img src="<?php echo htmlspecialchars($row['image_url']); ?>"
                        alt="<?php echo htmlspecialchars($row['name']); ?>"
                        class="w-[64px] aspect-square dark:bg-[#969696] rounded-full object-contain" />
                    <div class="flex flex-col">
                        <h1 class="text-lg font-bold"><?php echo htmlspecialchars($row['name']); ?></h1>
                        <h1 class="">Quantity: <?php echo htmlspecialchars($row['quantity']); ?></h1>
                        <h1 class="text-green-600 font-semibold">₱<?php echo number_format($row['price'], 2); ?></h1>
                    </div>
                </div>
                <button type="button" onclick="openProductDetailsModal(<?php echo $row['product_id']; ?>, '<?php echo htmlspecialchars($row['name']); ?>', '<?php echo $row['quantity']; ?>', '<?php echo $row['price']; ?>', '<?php echo $row['image_url']; ?>')"
                    class="flex flex-row gap-4 items-center px-6 py-4 rounded-md transition-all delay-0 duration-300 dark:bg-[#363636] dark:hover:bg-[#484848] hover:bg-[#efefef] cursor-pointer shadow">
                    <i class="fa-solid fa-edit"></i>
                    <p>Manage</p>
                </button>
            </div>
    <?php }
    } else {
        echo "<p class='text-center text-stone-500'>No products found.</p>";
    } ?>
</div>

<div class="flex flex-row gap-2 justify-end w-full mt-4">
    <?php if ($page > 1) { ?>
        <a href="?page=<?php echo $page - 1; ?>" class="p-4 dark:bg-[#242424] rounded-xl cursor-pointer transition-all hover:dark:bg-[#363636] dark:shadow-none shadow">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
    <?php } ?>

    <span class="p-4 dark:bg-[#363636] rounded-xl text-white">
        Page <?php echo $page; ?> of <?php echo $totalPages; ?>
    </span>

    <?php if ($page < $totalPages) { ?>
        <a href="?page=<?php echo $page + 1; ?>" class="p-4 dark:bg-[#242424] rounded-xl cursor-pointer transition-all hover:dark:bg-[#363636] dark:shadow-none shadow">
            <i class="fa-solid fa-arrow-right"></i>
        </a>
    <?php } ?>
</div>

<?php
$conn->close();
?>