<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "findtint";

// Connect ke MySQL server
$conn = mysqli_connect($host, $user, $pass);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Buat database jika belum ada
$create_db_query = "CREATE DATABASE IF NOT EXISTS $db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
if (mysqli_query($conn, $create_db_query)) {
    // Database created or already exists
} else {
    die("Error creating database: " . mysqli_error($conn));
}

// Pilih database
if (!mysqli_select_db($conn, $db)) {
    die("Error selecting database: " . mysqli_error($conn));
}

// Set charset
mysqli_set_charset($conn, "utf8mb4");

?>