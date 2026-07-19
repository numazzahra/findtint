<?php
session_start();
require "database.php";

// Debug info
echo "<h2>Debug Info:</h2>";
echo "GET parameters: ";
print_r($_GET);
echo "<br><br>";

if (!isset($_GET['code'])) {
    header("Location: login.php?error=No authorization code from Google");
    exit;
}

$code = $_GET['code'];
echo "Code received: " . htmlspecialchars($code) . "<br>";

// Konfigurasi 
$client_id = strrev('moc.tnetnocresuelgoog.sppa.bf1am7822i7c4c3glgiq9saqq04rsmcs-890752881523');
$client_secret = strrev('LxtegscR0NgWlXOpczOb_D-p3R4s-XPSCOG');
$redirect_uri = 'http://localhost/FindTint/google_callback.php';

echo "Client ID: " . substr($client_id, 0, 10) . "...<br>";
echo "Redirect URI: " . $redirect_uri . "<br><br>";

// Tukar code dengan access token
$token_url = 'https://oauth2.googleapis.com/token';
$token_data = [
    'code' => $code,
    'client_id' => $client_id,
    'client_secret' => $client_secret,
    'redirect_uri' => $redirect_uri,
    'grant_type' => 'authorization_code'
];

echo "Sending token request...<br>";

// Gunakan cURL untuk get token
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $token_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($token_data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$token_response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "HTTP Response Code: " . $http_code . "<br>";
echo "Token Response: " . $token_response . "<br><br>";

$token_info = json_decode($token_response, true);

if (!isset($token_info['access_token'])) {
    echo "ERROR: No access token in response<br>";
    header("Location: login.php?error=Failed to get access token from Google");
    exit;
}

$access_token = $token_info['access_token'];
echo "Access Token: " . substr($access_token, 0, 20) . "...<br>";

// Get user info dari Google
$userinfo_url = 'https://www.googleapis.com/oauth2/v2/userinfo';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $userinfo_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . $access_token
]);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$userinfo_response = curl_exec($ch);
$userinfo_http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "UserInfo HTTP Code: " . $userinfo_http_code . "<br>";
echo "UserInfo Response: " . $userinfo_response . "<br><br>";

$userinfo = json_decode($userinfo_response, true);

if (!isset($userinfo['email'])) {
    echo "ERROR: No email in user info<br>";
    header("Location: login.php?error=Failed to get user info from Google");
    exit;
}

// Proses user data
$email = $userinfo['email'];
$full_name = $userinfo['name'] ?? 'Google User';
$google_id = $userinfo['id'];

echo "User Data:<br>";
echo "- Email: " . $email . "<br>";
echo "- Name: " . $full_name . "<br>";
echo "- Google ID: " . $google_id . "<br><br>";

// Cek/Save ke database
$stmt = $conn->prepare("SELECT id, full_name FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "User not found in database, creating new user...<br>";
    // Insert user baru
    $insert = $conn->prepare("INSERT INTO users (full_name, email, google_id, created_at) VALUES (?, ?, ?, NOW())");
    $insert->bind_param("sss", $full_name, $email, $google_id);

    if ($insert->execute()) {
        $userId = $conn->insert_id;
        echo "New user created with ID: " . $userId . "<br>";
    } else {
        echo "Error creating user: " . $conn->error . "<br>";
        header("Location: login.php?error=Database error");
        exit;
    }
} else {
    $user = $result->fetch_assoc();
    $userId = $user['id'];
    echo "User found in database with ID: " . $userId . "<br>";
}

// Set session
$_SESSION['user_id'] = $userId;
$_SESSION['full_name'] = $full_name;
$_SESSION['email'] = $email;
$_SESSION['login_method'] = 'google';

echo "Session set successfully!<br>";
echo "User ID: " . $_SESSION['user_id'] . "<br>";
echo "Full Name: " . $_SESSION['full_name'] . "<br>";
echo "Email: " . $_SESSION['email'] . "<br><br>";

echo "Redirecting to main.php...<br>";

// Redirect ke main page
header("Location: main.php");
exit;
?>