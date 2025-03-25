<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fleur de Magazine / Products</title>
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
    <div class="flex flex-col basis-[80%] px-8 py-4 lg:max-w-5xl lg:mx-auto gap-4">
        <div class="flex flex-row justify-between">
            <label for="default-search" class="mb-2 text-sm font-medium text-stone-900 sr-only dark:text-white">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-stone-500 dark:text-stone-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-stone-900 rounded-lg bg-stone-50 dark:bg-[#242424] dark:placeholder-stone-400 dark:text-white outline-none dark:shadow-none shadow" placeholder="Search" required />
            </div>
        </div>
        <div class="flex flex-row justify-between items-center">
            <h1 class="lg:text-4xl font-black">Orders</h1>
            <div class="flex flex-row gap-4">

            </div>
        </div>
        <?php include("./orders_pagination.php") ?>
    </div>

    <div class="fixed inset-0 bg-black/75 hidden justify-center items-center z-50" id="orderModal">
        <i class="fa-solid fa-arrow-close p-4 dark:bg-[#242424] rounded-xl cursor-pointer delay-0 duration-300 transition-all hover:dark:bg-[#363636] dark:shadow-none shadow"></i>
        <div class="flex flex-col bg-stone-700 p-6 rounded-lg shadow-lg max-w-lg w-full gap-4">
            <h1 class="text-4xl font-black">Order Details</h1>
            <div class="flex flex-col gap-4">
                <!-- Order Information -->
                <div class="p-4 bg-stone-800 rounded-xl">
                    <h2 class="text-xl font-semibold text-stone-300">Order ID</h2>
                    <p id="order_id" class="text-stone-400">#12345</p>
                </div>
                <div class="p-4 bg-stone-800 rounded-xl">
                    <h2 class="text-xl font-semibold text-stone-300">Customer Name</h2>
                    <p id="customer_name" class="text-stone-400">John Smith</p>
                </div>
                <div class="p-4 bg-stone-800 rounded-xl">
                    <h2 class="text-xl font-semibold text-stone-300">Order Date</h2>
                    <p id="order_date" class="text-stone-400">2025-03-20 10:30:00</p>
                </div>
                <div class="p-4 bg-stone-800 rounded-xl">
                    <h2 class="text-xl font-semibold text-stone-300">Status</h2>
                    <p id="order_status" class="text-stone-400">Shipped</p>
                </div>
                <div class="p-4 bg-stone-800 rounded-xl">
                    <h2 class="text-xl font-semibold text-stone-300">Shipping Address</h2>
                    <p id="shipping_address" class="text-stone-400">123 Main St, City, State</p>
                </div>
            </div>
            <div class="flex flex-row gap-4">
                <form action="./reject_order.php" method="POST" class="flex flex-col flex-1">
                    <input type="hidden" id="order_id_for_reject" name="order_id" />
                    <button type="button" id="reject_btn" class="w-full bg-red-500 hover:bg-red-400 text-white py-2 rounded-lg cursor-pointer">Reject</button>
                </form>
                <form action="./accept_order.php" method="POST" class="flex flex-col flex-1">
                    <input type="hidden" id="order_id_for_accept" name="order_id" />
                    <button type="button" id="accept_btn" class="w-full bg-green-500 hover:bg-green-400 text-white py-2 rounded-lg cursor-pointer">Accept</button>
                </form>
            </div>

            <!-- Button to Close the Modal -->
            <button type="button" class="w-full bg-stone-500 text-white py-2 rounded-lg cursor-pointer" onclick="closeModal(event)">Close</button>
        </div>
    </div>

    <script>
        function fetchOrderDetails(orderId) {
            fetch(`./get_order_details.php?order_id=${orderId}`)
                .then(response => response.json())
                .then(data => {
                    // Populate modal with order details
                    document.getElementById("order_id").textContent = `#${data.order_id}`;
                    document.getElementById("order_id_for_accept").value = `${data.order_id}`;
                    document.getElementById("order_id_for_reject").value = `${data.order_id}`;
                    document.getElementById("customer_name").textContent = data.customer_name;
                    document.getElementById("order_date").textContent = data.order_date;
                    document.getElementById("order_status").textContent = data.order_status;
                    document.getElementById("shipping_address").textContent = data.address;

                    // Show modal
                    document.getElementById("orderModal").classList.remove("hidden");
                    document.getElementById("orderModal").classList.add("flex");
                })
                .catch(error => console.error("Error fetching order details:", error));
        }

        function updateOrderStatus(event, action, orderId) {
            event.preventDefault();

            fetch('order_handler.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        action: action,
                        orderId: orderId
                    })
                })
                .then(response => response.text())
                .then(data => {
                    alert(data); // Show response message
                    location.reload(); // Reload page to reflect changes
                })
                .catch(error => console.error('Error:', error));
        }

        function closeModal(event) {
            event.preventDefault();
            const modal = document.getElementById("orderModal");
            modal.classList.add("hidden");
            modal.classList.remove("flex");
        }

        document.getElementById("accept_btn").addEventListener("click", function() {
            const orderId = document.getElementById("order_id_for_accept").value;

            fetch("./accept_order.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                    body: `order_id=${orderId}`,
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        window.location.reload(); // Reload page on success
                    } else {
                        alert(data.error); // Show error message if any
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("An error occurred while updating the order.");
                });
        });

        document.getElementById("reject_btn").addEventListener("click", function() {
            const orderId = document.getElementById("order_id_for_reject").value;

            fetch("./reject_order.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                    body: `order_id=${orderId}`,
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        window.location.reload(); // Reload page on success
                    } else {
                        alert(data.error); // Show error message if any
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("An error occurred while updating the order.");
                });
        });
    </script>
</body>

</html>