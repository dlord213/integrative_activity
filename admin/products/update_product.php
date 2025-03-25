<?php
header('Content-Type: application/json');
include("../../config.php");


$id = $_POST["id"] ?? null;
$name = $_POST["name"] ?? null;
$quantity = $_POST["quantity"] ?? null;
$price = $_POST["price"] ?? null;


if (!$id || !$name || !$quantity || !$price) {
    echo json_encode(["success" => false, "error" => "Missing required fields"]);
    exit();
}

$sql = "UPDATE products SET name=?, quantity=?, price=? WHERE product_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sidi", $name, $quantity, $price, $id);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => $stmt->error]);
}

$stmt->close();
$conn->close();
