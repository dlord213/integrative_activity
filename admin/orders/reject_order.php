<?php
include("../../config.php");

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['order_id'])) {
        echo json_encode(["error" => "Order ID is missing"]);
        exit;
    }

    $order_id = intval($_POST['order_id']); // Ensure it's an integer

    $sql = "UPDATE orders SET status = 'Order rejected' WHERE order_id = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo json_encode(["error" => "Database prepare error: " . $conn->error]);
        exit;
    }

    $stmt->bind_param("i", $order_id);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Order #$order_id has been updated to 'Order rejected'."]);
    } else {
        echo json_encode(["error" => "Database execution error: " . $conn->error]);
    }

    $stmt->close();
}

$conn->close();
