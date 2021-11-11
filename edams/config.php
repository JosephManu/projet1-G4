<?php
$conn = new mysqli("localhost", "root", "", "edams");

if ($conn->connect_errno) {
    echo "Error: " . $conn->connect_error;
}