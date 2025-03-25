<?php

$conn = new mysqli("localhost", "root", "", "integrative_activity");

// Check connection
if ($conn->connect_error) {
    die("Failed to connect to MySQL: " . $conn->connect_error);
}
