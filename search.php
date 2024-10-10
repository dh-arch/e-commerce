<?php
include 'connection.php';

if (isset($_POST['query'])) {
    $searchQuery = $conn->real_escape_string($_POST['query']);

    $sql = "SELECT * FROM products WHERE name LIKE '%$searchQuery%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p>" . $row['name'] . "</p>";
        } 
    } else {
        echo "<p>No products found</p>";
    }
}

$conn->close();

?>