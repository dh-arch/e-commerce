<?php

include 'connection.php';
session_start();

// $uid= $_SESSION['user_id'];

// $sql= "select * from `shipment` where `uid`='$uid'";
// $result= mysqli_query($conn, $sql);
// while($row= mysqli_fetch_assoc($result)){
//   print_r($row['order_id']);
// }

$accessToken= "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOjUxNDk3MDgsInNvdXJjZSI6InNyLWF1dGgtaW50IiwiZXhwIjoxNzI2ODIzNjc0LCJqdGkiOiJFZG5aZDI5b1p5MHBjM01MIiwiaWF0IjoxNzI1OTU5Njc0LCJpc3MiOiJodHRwczovL3NyLWF1dGguc2hpcHJvY2tldC5pbi9hdXRob3JpemUvdXNlciIsIm5iZiI6MTcyNTk1OTY3NCwiY2lkIjo0OTQ1NjIzLCJ0YyI6MzYwLCJ2ZXJib3NlIjpmYWxzZSwidmVuZG9yX2lkIjowLCJ2ZW5kb3JfY29kZSI6IiJ9.RZXSCMlHpGUGDpZpMNjucXiKtQGa2JEuZpP6jtKfIBU";

function trackShiprocketOrder($accessToken, $orderId) {
  $url = 'https://apiv2.shiprocket.in/v1/external/courier/track?order_id=' . $orderId;

  // Initialize cURL
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
      'Authorization: Bearer ' . $accessToken  // Pass the access token
  ));
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);  // Disable SSL verification (for testing)
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);  // Disable SSL verification (for testing)

  // Execute cURL request
  $response = curl_exec($ch);

  // Check for cURL errors
  if (curl_errno($ch)) {
      echo 'cURL Error: ' . curl_error($ch);
      return false;
  }

  curl_close($ch);

  // Decode and return the JSON response
  return json_decode($response, true);
}

// Example usage to track an order:
$orderId = 635653990;  // Replace with your actual order_id
$trackingInfo = trackShiprocketOrder($accessToken, $orderId);

if ($trackingInfo) {
  echo "Tracking Information: ";
  print_r($orderId);
  print_r($trackingInfo);
} else {
  echo "Failed to retrieve tracking information.";
}

