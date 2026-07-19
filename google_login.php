<?php
$client_id = strrev('moc.tnetnocresuelgoog.sppa.bf1am7822i7c4c3glgiq9saqq04rsmcs-890752881523');
$redirect_uri = 'http://localhost/FindTint/google_callback.php';
$scope = 'email profile';

$auth_url = "https://accounts.google.com/o/oauth2/v2/auth?" . http_build_query([
    'client_id' => $client_id,
    'redirect_uri' => $redirect_uri,
    'response_type' => 'code',
    'scope' => $scope,
    'access_type' => 'online'
]);

header("Location: " . $auth_url);
exit;
?>