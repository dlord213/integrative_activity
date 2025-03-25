<div class="fixed inset-0 bg-black/75 hidden justify-center items-center z-50" id="detailsModal">
    <div class="flex flex-col bg-stone-800 p-6 rounded-lg shadow-lg max-w-lg w-full gap-4">
        <div class="flex flex-row gap-6 items-center">
            <button onclick="closeProductDetailsModal()" class="cursor-pointer">
                <i class="fa-solid fa-close"></i>
            </button>
            <h1 class="text-4xl font-black">Edit Product</h1>
        </div>
        <div class="flex items-center justify-center w-full">
            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border border-stone-300 border-dashed rounded-lg cursor-pointer bg-stone-50 dark:hover:bg-stone-900 dark:bg-stone-800 hover:bg-stone-100 dark:border-stone-600 dark:hover:border-stone-500 dark:hover:bg-stone-600">
                <img id="modal_image" class="w-full h-full object-cover rounded-lg" src="" alt="Product Image">
                <input id="dropzone-file" type="file" class="hidden" />
            </label>
        </div>
        <input type="hidden" id="flower_id">
        <input type="text" id="flower_name" class="bg-stone-50 border border-stone-300 text-stone-900 text-sm rounded-lg p-2.5 dark:bg-stone-700 dark:border-stone-600 dark:placeholder-stone-400 dark:text-white w-full" placeholder="Flower Name" required />
        <div class="flex flex-row gap-4">
            <input type="number" id="flower_quantity" class="bg-stone-50 border border-stone-300 text-stone-900 text-sm rounded-lg p-2.5 dark:bg-stone-700 dark:border-stone-600 dark:placeholder-stone-400 dark:text-white w-full" placeholder="Quantity" required />
            <input type="text" id="flower_price" class="bg-stone-50 border border-stone-300 text-stone-900 text-sm rounded-lg p-2.5 dark:bg-stone-700 dark:border-stone-600 dark:placeholder-stone-400 dark:text-white w-full" placeholder="Price" required />
        </div>
        <button type="button" class="w-full bg-stone-500 text-white py-2 rounded-lg cursor-pointer" onclick="saveChanges()">Save Changes</button>
    </div>
</div>


<script>
    function openProductDetailsModal(id, name, quantity, price, image) {
        document.getElementById("flower_id").value = id;
        document.getElementById("flower_name").value = name;
        document.getElementById("flower_quantity").value = quantity;
        document.getElementById("flower_price").value = price;
        document.getElementById("modal_image").src = image;

        const modal = document.getElementById("detailsModal");
        modal.classList.remove("hidden");
        modal.classList.add("flex");
    }

    function closeProductDetailsModal() {
        const modal = document.getElementById("detailsModal");
        modal.classList.add("hidden");
        modal.classList.remove("flex");
    }

    function saveChanges() {
        const id = document.getElementById("flower_id").value;
        const name = document.getElementById("flower_name").value;
        const quantity = document.getElementById("flower_quantity").value;
        const price = document.getElementById("flower_price").value;

        console.log("Sending Data:", {
            id,
            name,
            quantity,
            price
        });

        const formData = new FormData();
        formData.append("id", id.toString());
        formData.append("name", name.toString());
        formData.append("quantity", quantity.toString());
        formData.append("price", price.toString());

        fetch("update_product.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log("Server Response:", data);

                if (data.success) {
                    alert("Product updated successfully!");
                    closeProductDetailsModal();
                    location.reload();
                } else {
                    alert("Error updating product: " + data.error);
                }
            })
            .catch(error => console.error("Error:", error));
    }
</script>