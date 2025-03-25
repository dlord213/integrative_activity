<?php
include("../../config.php");

if (isset($_GET['order_id'])) {
    $order_id = (int)$_GET['order_id'];

    // Fetch order details
    $sql = "SELECT o.order_id, u.username AS customer_name, o.created_at AS order_date,
                   o.status AS order_status, u.address, p.name
            FROM orders o
            JOIN products p ON o.product_id = p.product_id
            JOIN users u ON o.user_id = u.user_id
            WHERE o.order_id = $order_id";

    $result = $conn->query($sql);
    $order = $result->fetch_assoc();

    // Return JSON response
    echo json_encode($order);
}

$conn->close();
