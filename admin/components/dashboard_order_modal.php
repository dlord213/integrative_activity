<div class="fixed inset-0 bg-black/75 hidden justify-center items-center z-50" id="orderModal">
    <div class="flex flex-col bg-stone-700 p-6 rounded-lg shadow-lg max-w-lg w-full gap-4">
        <div class="flex flex-row justify-between items-center">
            <h1 class="text-4xl font-black">Order Details</h1>
            <button onclick="closeOrderModal()" class="cursor-pointer">
                <i class="fa-solid fa-close text-2xl"></i>
            </button>
        </div>
        <div class="flex flex-col gap-4">
            <div class="p-4 bg-stone-800 rounded-xl">
                <h2 class="text-xl font-semibold text-stone-300">Order ID</h2>
                <p id="order_id" class="text-stone-400">#</p>
            </div>
            <div class="p-4 bg-stone-800 rounded-xl">
                <h2 class="text-xl font-semibold text-stone-300">Product</h2>
                <p id="product_name" class="text-stone-400"></p>
            </div>
            <div class="p-4 bg-stone-800 rounded-xl">
                <h2 class="text-xl font-semibold text-stone-300">Customer Name</h2>
                <p id="customer_name" class="text-stone-400"></p>
            </div>
            <div class="p-4 bg-stone-800 rounded-xl">
                <h2 class="text-xl font-semibold text-stone-300">Order Date</h2>
                <p id="order_date" class="text-stone-400"></p>
            </div>
            <div class="p-4 bg-stone-800 rounded-xl">
                <h2 class="text-xl font-semibold text-stone-300">Status</h2>
                <p id="order_status" class="text-stone-400"></p>
            </div>
        </div>
        <button type="button" class="w-full bg-stone-500 text-white py-2 rounded-lg cursor-pointer" onclick="closeOrderModal()">Close</button>
    </div>
</div>
<script>
    function openOrderDetailsModal(orderId, productName, customerName, status, orderDate, address, items) {
        document.getElementById("order_id").innerText = `#${orderId}`;
        document.getElementById("product_name").innerText = productName;
        document.getElementById("customer_name").innerText = customerName;
        document.getElementById("order_date").innerText = orderDate;
        document.getElementById("order_status").innerText = status;
        document.getElementById("shipping_address").innerText = address;

        let orderItemsContainer = document.getElementById("order_items");

        const modal = document.getElementById("orderModal");
        modal.classList.remove("hidden"); // Show modal
        modal.classList.add("flex");
    }

    function closeOrderModal() {
        const modal = document.getElementById("orderModal");
        modal.classList.add("hidden"); // Hide modal
        modal.classList.remove("flex");
    }
</script>