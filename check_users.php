<?php
require "database.php";

echo "<h2>Users in Database</h2>";

$result = mysqli_query($conn, "SELECT * FROM users");

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
    echo "<tr style='background-color: #f8bbd9;'><th>ID</th><th>Name</th><th>Email</th><th>Google ID</th><th>Created At</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td style='padding: 8px;'>" . $row['id'] . "</td>";
        echo "<td style='padding: 8px;'>" . $row['full_name'] . "</td>";
        echo "<td style='padding: 8px;'>" . $row['email'] . "</td>";
        echo "<td style='padding: 8px;'>" . ($row['google_id'] ? $row['google_id'] : 'NULL') . "</td>";
        echo "<td style='padding: 8px;'>" . $row['created_at'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No users found in database";
}

mysqli_close($conn);
?>