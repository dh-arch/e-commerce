<!-- dhruvisha108@gmail.com
RFwMt@@ht9F25u8 -->

<?php

function getShiprocketToken($email, $password)
{
  $url = 'https://apiv2.shiprocket.in/v1/external/auth/login';

  $postData = json_encode([
    'email' => $email,
    'password' => $password
  ]);

  // Initialize cURL
  $ch = curl_init();

  // Set cURL options
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string
  curl_setopt($ch, CURLOPT_POST, true); // HTTP POST
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
  curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

  // Disable SSL verification temporarily (not recommended for production)
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

  // Enable verbose debugging
  curl_setopt($ch, CURLOPT_VERBOSE, true);

  // Execute cURL request
  $response = curl_exec($ch);

  // Check for cURL errors
  if (curl_errno($ch)) {
    echo 'cURL Error: ' . curl_error($ch);
  } else {
    // Print the raw response for debugging
    echo "Response: " . $response;
  }

  curl_close($ch);

  // Decode the JSON response
  $result = json_decode($response, true);

  // Check if token is received
  if (isset($result['token'])) {
    return $result['token'];  // Return the access token
  } else {
    echo "Error: Could not retrieve the access token. Response: $response";
    return false;
  }
}

// Example usage
$email = 'dhruvisha108@gmail.com';  // Use your actual Shiprocket API email
$password = 'RFwMt@@ht9F25u8';  // Use your actual Shiprocket API password

$accessToken = getShiprocketToken($email, $password);

if ($accessToken) {
  echo "Access Token: " . $accessToken;

  $sql = "insert into `shiprocket_token` (`token`) values (`$accessToken`)";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    echo 1;
  } else { 
    echo 0;
  }
} else {
  echo "Failed to obtain access token.";
}

?>