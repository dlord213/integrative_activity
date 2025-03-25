<?php
session_start();
include("../../config.php");

$user_id = $_SESSION['user_id'];

$user_id = $_SESSION['user_id']; // Get logged-in user ID

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['product_id'])) {
    $product_id = (int)$_POST['product_id'];

    $check_stock = "SELECT quantity FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($check_stock);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $stmt->bind_result($quantity);
    $stmt->fetch();
    $stmt->close();

    if ($quantity > 0) {
        $conn->begin_transaction();

        try {
            $insert_order = "INSERT INTO orders (user_id, product_id, status) VALUES (?, ?, 'pending')";
            $stmt = $conn->prepare($insert_order);
            $stmt->bind_param("ii", $user_id, $product_id);
            $stmt->execute();
            $stmt->close();

            $update_quantity = "UPDATE products SET quantity = quantity - 1 WHERE product_id = ?";
            $stmt = $conn->prepare($update_quantity);
            $stmt->bind_param("i", $product_id);
            $stmt->execute();
            $stmt->close();

            $conn->commit();

            echo "<script>window.location.href = '../orders';</script>";
        } catch (Exception $e) {
            $conn->rollback();
            echo "<script>alert('Error placing order. Please try again.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('This product is out of stock.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.history.back();</script>";
}
