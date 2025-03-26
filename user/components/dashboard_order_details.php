<div class="fixed inset-0 bg-black/75 hidden justify-center items-center z-50" id="orderModal">
    <div class="flex flex-col bg-stone-700 p-6 rounded-lg shadow-lg max-w-lg w-full gap-4">
        <h1 class="text-4xl font-black">Order Details</h1>
        <div class="flex flex-col gap-4">
            <div class="p-4 bg-stone-800 rounded-xl">
                <h2 class="text-xl font-semibold text-stone-300">Order ID:</h2>
                <p id="order_id" class="text-stone-400">#</p>
            </div>
            <div class="p-4 bg-stone-800 rounded-xl">
                <h2 class="text-xl font-semibold text-stone-300">Order Date:</h2>
                <p id="order_date" class="text-stone-400"></p>
            </div>
            <div class="p-4 bg-stone-800 rounded-xl">
                <h2 class="text-xl font-semibold text-stone-300">Status:</h2>
                <p id="order_status" class="text-stone-400"></p>
            </div>
            <div class="p-4 bg-stone-800 rounded-xl">
                <h2 class="text-xl font-semibold text-stone-300">Shipping Address:</h2>
                <p id="shipping_address" class="text-stone-400"></p>
            </div>
        </div>

        <!-- Order Item -->
        <div class="p-4 bg-stone-800 rounded-xl">
            <h2 class="text-2xl font-semibold text-stone-300">Ordered Item</h2>
            <div class="flex justify-between">
                <span class="text-stone-400" id="order_item"></span>
            </div>
        </div>

        <button type="button" class="w-full bg-stone-500 text-white py-2 rounded-lg cursor-pointer" onclick="closeModal()">Close</button>
    </div>
</div>

<script>
    function toggleModal(order) {
        document.getElementById("order_id").textContent = "#" + order.id;
        document.getElementById("order_date").textContent = order.date;
        document.getElementById("order_status").textContent = order.status;
        document.getElementById("shipping_address").textContent = order.address;
        document.getElementById("order_item").textContent = order.item.name;

        const modal = document.getElementById("orderModal");
        modal.classList.remove("hidden");
        modal.classList.add("flex");
    }

    function closeModal() {
        const modal = document.getElementById("orderModal");
        modal.classList.add("hidden");
        modal.classList.remove("flex");
    }
</script>