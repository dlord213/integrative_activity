<div class="fixed inset-0 bg-black/75 hidden justify-center items-center z-50" id="customerModal">
    <div class="flex flex-col bg-stone-700 p-6 rounded-lg shadow-lg max-w-lg w-full gap-4 relative">

        <h1 class="text-4xl font-black">Customer Details</h1>

        <div class="flex flex-col gap-4">
            <div class="p-4 bg-stone-800 rounded-xl">
                <h2 class="text-xl font-semibold text-stone-300">Customer ID:</h2>
                <p id="customer_id" class="text-stone-400"></p>
            </div>
            <div class="p-4 bg-stone-800 rounded-xl">
                <h2 class="text-xl font-semibold text-stone-300">Full Name:</h2>
                <p id="full_name" class="text-stone-400"></p>
            </div>
            <div class="p-4 bg-stone-800 rounded-xl">
                <h2 class="text-xl font-semibold text-stone-300">Email:</h2>
                <p id="email" class="text-stone-400"></p>
            </div>
            <div class="p-4 bg-stone-800 rounded-xl">
                <h2 class="text-xl font-semibold text-stone-300">Phone Number:</h2>
                <p id="phone_number" class="text-stone-400"></p>
            </div>
            <div class="p-4 bg-stone-800 rounded-xl">
                <h2 class="text-xl font-semibold text-stone-300">Shipping Address:</h2>
                <p id="shipping_address" class="text-stone-400"></p>
            </div>
        </div>

        <button type="button" class="cursor-pointer w-full bg-stone-500 text-white py-2 rounded-lg cursor-pointer hover:bg-stone-600 transition" onclick="closeCustomerModal()">
            Close
        </button>
    </div>
</div>
<script>
    function openCustomerDetailsModal(id, name, email, phone, address) {
        document.getElementById("customer_id").textContent = id;
        document.getElementById("full_name").textContent = name;
        document.getElementById("email").textContent = email;
        document.getElementById("phone_number").textContent = phone;
        document.getElementById("shipping_address").textContent = address;

        document.getElementById("customerModal").classList.remove("hidden");
        document.getElementById("customerModal").classList.add("flex");
    }

    function closeCustomerModal() {
        document.getElementById("customerModal").classList.add("hidden");
        document.getElementById("customerModal").classList.remove("flex");
    }
</script>