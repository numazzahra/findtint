<?php
require "database.php"; // koneksi database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Cek input kosong
    if (empty($full_name) || empty($email) || empty($password)) {
        die("All fields are required!");
    }

    // Cek apakah email sudah ada — PAKAI prepare() 
    $check = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        die("Email already exists. Please use another email!");
    }

    // Hash password
    $hashedPass = password_hash($password, PASSWORD_BCRYPT);

    // Insert user baru — PAKAI prepare() 
    $stmt = $conn->prepare("INSERT INTO users (full_name, email, password) VALUES (?,?,?)");
    $stmt->bind_param("sss", $full_name, $email, $hashedPass);

    if ($stmt->execute()) {
        echo "<script>
                alert('Account created successfully! Please log in.');
                window.location.href = 'login.php';
              </script>";
    } else {
        echo "Failed: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>