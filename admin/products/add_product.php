<?php
header('Content-Type: application/json');
include("../../config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $image_url = $_POST['image_url'];

    if (empty($name) || empty($quantity) || empty($price) || empty($image_url)) {
        die(json_encode(["success" => false, "message" => "All fields are required."]));
    }

    $stmt = $conn->prepare("INSERT INTO products (name, quantity, price, image_url) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sids", $name, $quantity, $price, $image_url);

    // Execute the query
    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Product added successfully!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to add product."]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["success" => false, "message" => "Invalid request."]);
}
