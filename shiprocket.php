
<!-- x71dlwc2-ckbl-v45t-p0wc-okeflxkg4701 -->

<?php

function trackDelhiveryShipment($awbNumber, $apiKey) {
    // Define the Delhivery Tracking API URL
    $url = "https://track.delhivery.com/api/v1/packages/json/?waybill=" . $awbNumber;

    // Initialize cURL
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Return response as string
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: Token ' . $apiKey, // Add your API Key as Authorization header
        'Content-Type: application/json'
    ));

    // Execute cURL request
    $response = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        echo 'cURL error: ' . curl_error($ch);
        curl_close($ch);
        return false;
    }

    // Close cURL session 
    curl_close($ch);

    // Decode the JSON response
    $result = json_decode($response, true);

    // Return result or handle errors
    if (isset($result['packages'])) {
        return $result['packages']; // The tracking info is stored in 'packages' field
    } else {
        echo "Error: Unable to fetch tracking information. Response: $response";
        return false;
    }
}

// Example usage
$awbNumber = "964925";  // Replace with your actual AWB number
$apiKey = "123456";  // Replace with your Delhivery API key

$trackingInfo = trackDelhiveryShipment($awbNumber, $apiKey);

if ($trackingInfo) {
    print_r($trackingInfo);  // Display tracking details
} else {
    echo "Failed to retrieve tracking information.";
}

