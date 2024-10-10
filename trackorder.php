<?php
include 'connection.php';


$url = 'https://apiv2.shiprocket.in/v1/external/settings/company/pickup';

// Initialize cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOjUxNDk3MDgsInNvdXJjZSI6InNyLWF1dGgtaW50IiwiZXhwIjoxNzI2ODIzNjc0LCJqdGkiOiJFZG5aZDI5b1p5MHBjM01MIiwiaWF0IjoxNzI1OTU5Njc0LCJpc3MiOiJodHRwczovL3NyLWF1dGguc2hpcHJvY2tldC5pbi9hdXRob3JpemUvdXNlciIsIm5iZiI6MTcyNTk1OTY3NCwiY2lkIjo0OTQ1NjIzLCJ0YyI6MzYwLCJ2ZXJib3NlIjpmYWxzZSwidmVuZG9yX2lkIjowLCJ2ZW5kb3JfY29kZSI6IiJ9.RZXSCMlHpGUGDpZpMNjucXiKtQGa2JEuZpP6jtKfIBU'  // Pass the access token
));
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);  // Disable SSL verification (for testing)
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);  // Disable SSL verification (for testing)

// Execute cURL request
$response = curl_exec($ch);
print_r($response);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'cURL Error: ' . curl_error($ch);
    return false;
}

curl_close($ch);

// Decode and return the JSON response
return json_decode($response, true);
