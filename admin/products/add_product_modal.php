<div class="fixed inset-0 bg-black/75 hidden justify-center items-center z-50" id="addModal">
    <i class="fa-solid fa-arrow-close p-4 dark:bg-[#242424] rounded-xl cursor-pointer delay-0 duration-300 transition-all hover:dark:bg-[#363636] dark:shadow-none shadow"></i>
    <div class="flex flex-col bg-stone-700 p-6 rounded-lg shadow-lg max-w-lg w-full gap-4">
        <div class="flex flex-row gap-6 items-center">
            <button onclick="openAddNewProductModal(event)" class="cursor-pointer">
                <i class="fa-solid fa-close" class="w-[64px] aspect-square"></i>
            </button>
            <h1 class="text-4xl font-black">Add new product</h1>
        </div>
        <input type="text" id="add_flower_img_url" class="bg-stone-50 border border-stone-300 text-stone-900 text-sm rounded-lg focus:ring-stone-500 focus:border-stone-500 block w-full p-2.5 dark:bg-stone-700 dark:border-stone-600 dark:placeholder-stone-400 dark:text-white dark:focus:ring-stone-500 dark:focus:border-stone-500" placeholder="Flower image url" required />
        <input type="text" id="add_flower_name" class="bg-stone-50 border border-stone-300 text-stone-900 text-sm rounded-lg focus:ring-stone-500 focus:border-stone-500 block w-full p-2.5 dark:bg-stone-700 dark:border-stone-600 dark:placeholder-stone-400 dark:text-white dark:focus:ring-stone-500 dark:focus:border-stone-500" placeholder="Flower name" required />
        <textarea id="add_flower_description" class="bg-stone-50 border border-stone-300 text-stone-900 text-sm rounded-lg focus:ring-stone-500 focus:border-stone-500 block w-full p-2.5 dark:bg-stone-700 dark:border-stone-600 dark:placeholder-stone-400 dark:text-white dark:focus:ring-stone-500 dark:focus:border-stone-500 resize-none" placeholder="Description" required draggable="false"></textarea>
        <div class="flex flex-row gap-4">
            <input type="text" id="add_flower_quantity" class="bg-stone-50 border border-stone-300 text-stone-900 text-sm rounded-lg focus:ring-stone-500 focus:border-stone-500 block w-full p-2.5 dark:bg-stone-700 dark:border-stone-600 dark:placeholder-stone-400 dark:text-white dark:focus:ring-stone-500 dark:focus:border-stone-500" placeholder="Stock quantity" required />
            <input type="text" id="add_flower_price" class="bg-stone-50 border border-stone-300 text-stone-900 text-sm rounded-lg focus:ring-stone-500 focus:border-stone-500 block w-full p-2.5 dark:bg-stone-700 dark:border-stone-600 dark:placeholder-stone-400 dark:text-white dark:focus:ring-stone-500 dark:focus:border-stone-500" placeholder="Price" required />
        </div>
        <button type="button" class=" w-full bg-stone-500 text-white py-2 rounded-lg cursor-pointer" onclick="addNewProduct()">Add product</button>
    </div>
</div>
<script>
    function openAddNewProductModal(event) {
        const modal = document.getElementById("addModal");
        if (modal.classList.contains("flex")) {
            modal.classList.remove("flex");
            modal.classList.add("hidden");
        } else {
            modal.classList.remove("hidden");
            modal.classList.add("flex");

        }
    }

    function addNewProduct() {
        const formData = new FormData();

        const name = document.getElementById("add_flower_name").value;
        const description = document.getElementById("add_flower_description").value;
        const quantity = document.getElementById("add_flower_quantity").value;
        const price = document.getElementById("add_flower_price").value;
        const image_url = document.getElementById("add_flower_img_url").value;

        console.log("Sending Data:", {
            name,
            description,
            quantity,
            price,
            image_url,
        });

        formData.append("name", name.toString());
        formData.append("description", description.toString());
        formData.append("quantity", quantity.toString());
        formData.append("price", price.toString());
        formData.append("image_url", image_url.toString());


        fetch("add_product.php", {
                method: "POST",
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                if (data.success) {
                    openAddNewProductModal();
                    location.reload();
                }
            })
            .catch(error => console.error("Error:", error));
    }
</script>