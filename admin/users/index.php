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
            <h1 class="lg:text-4xl font-black">Users</h1>
        </div>
        <?php include("./user_pagination.php") ?>
    </div>
    <div class="fixed inset-0 bg-black/75 hidden justify-center items-center z-50" id="customerModal">
        <i class="fa-solid fa-arrow-close p-4 dark:bg-[#242424] rounded-xl cursor-pointer delay-0 duration-300 transition-all hover:dark:bg-[#363636] dark:shadow-none shadow"></i>
        <div class="flex flex-col bg-stone-700 p-6 rounded-lg shadow-lg max-w-lg w-full gap-4">
            <h1 class="text-4xl font-black">Customer Details</h1>
            <div class="flex flex-col gap-4">
                <!-- Customer Information -->
                <div class="p-4 bg-stone-800 rounded-xl">
                    <h2 class="text-xl font-semibold text-stone-300">Customer ID:</h2>
                    <p id="customer_id" class="text-stone-400">#56789</p>
                </div>
                <div class="p-4 bg-stone-800 rounded-xl">
                    <h2 class="text-xl font-semibold text-stone-300">Full Name:</h2>
                    <p id="full_name" class="text-stone-400">Jane Doe</p>
                </div>
                <div class="p-4 bg-stone-800 rounded-xl">
                    <h2 class="text-xl font-semibold text-stone-300">Email:</h2>
                    <p id="email" class="text-stone-400">jane.doe@example.com</p>
                </div>
                <div class="p-4 bg-stone-800 rounded-xl">
                    <h2 class="text-xl font-semibold text-stone-300">Phone Number:</h2>
                    <p id="phone_number" class="text-stone-400">555-1234</p>
                </div>
                <div class="p-4 bg-stone-800 rounded-xl">
                    <h2 class="text-xl font-semibold text-stone-300">Shipping Address:</h2>
                    <p id="shipping_address" class="text-stone-400">123 Main St, City, State</p>
                </div>
            </div>

            <!-- Button to Close the Modal -->
            <button type="button" class="w-full bg-stone-500 text-white py-2 rounded-lg cursor-pointer" onclick="closeModal(event)">Close</button>
        </div>
    </div>
    <script>
        function openCustomerDetailsModal(id, name, email, phone, address) {
            document.getElementById("customer_id").textContent = id;
            document.getElementById("full_name").textContent = name;
            document.getElementById("email").textContent = email;
            document.getElementById("phone_number").textContent = phone;
            document.getElementById("shipping_address").textContent = address;

            const modal = document.getElementById("customerModal");
            modal.classList.remove("hidden");
            modal.classList.add("flex");
        }

        function closeModal(event) {
            event.preventDefault();
            const modal = document.getElementById("customerModal");
            modal.classList.add("hidden");
            modal.classList.remove("flex");
        }
    </script>
</body>

</html>