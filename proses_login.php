<?php
session_start();
require "database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Ambil user berdasarkan email
    $stmt = $conn->prepare("SELECT id, full_name, email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // VERIFIKASI PASSWORD 
        if (password_verify($password, $user['password'])) {

            // Buat session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['full_name'] = $user['full_name'];

            header("Location: main.php"); // Dashboard
            exit;

        } else {
            echo "<script>alert('Wrong password!'); history.back();</script>";
        }

    } else {
        echo "<script>alert('Email not found!'); history.back();</script>";
    }
}
?>