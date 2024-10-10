<?php

function createShiprocketOrder($accessToken, $orderData)
{
  $url = 'https://apiv2.shiprocket.in/v1/external/orders/create/adhoc';

  // Initialize cURL
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string
  curl_setopt($ch, CURLOPT_POST, true); // HTTP POST
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $accessToken // Pass the access token
  ));
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($orderData));

  // Execute cURL request
  $response = curl_exec($ch);

  // Check for cURL errors
  if (curl_errno($ch)) {
    echo 'cURL Error: ' . curl_error($ch);
  }

  curl_close($ch);

  // Decode the response
  $result = json_decode($response, true);
  return $result;
}

// Example usage of order creation:
$orderData = [
  "order_id" => "12344",
  "order_date" => "2024-09-07",
  "pickup_location" => "warehouse",
  "billing_customer_name" => "xyz",
  "billing_last_name" => "",
  "billing_address" => "ersdwfd",
  "billing_address_2" => "",
  "billing_city" => "surat",
  "billing_pincode" => "394101",
  "billing_state" => "gujarat",
  "billing_country" => "India",
  "billing_email" => "dhruvisha108@gmail.com",
  "billing_phone" => "9274338874",
  "shipping_is_billing" => true, // Use same address for shipping
  "order_items" => [
    [
      "name" => "pro 1",
      "sku" => "SKU001",
      "units" => 1,
      "selling_price" => 200,
      "discount" => 0,
      "tax" => 0,
      "hsn" => "998877"
    ]
  ],
  "payment_method" => "Prepaid",
  "shipping_charges" => 50.00,
  "giftwrap_charges" => 0,
  "transaction_charges" => 0,
  "total_discount" => 0,
  "sub_total" => 200,
  "length" => 10,
  "breadth" => 5,
  "height" => 5,
  "weight" => 0.5
];

$accessToken = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOjUxNDk3MDgsInNvdXJjZSI6InNyLWF1dGgtaW50IiwiZXhwIjoxNzI2ODIzNjc0LCJqdGkiOiJFZG5aZDI5b1p5MHBjM01MIiwiaWF0IjoxNzI1OTU5Njc0LCJpc3MiOiJodHRwczovL3NyLWF1dGguc2hpcHJvY2tldC5pbi9hdXRob3JpemUvdXNlciIsIm5iZiI6MTcyNTk1OTY3NCwiY2lkIjo0OTQ1NjIzLCJ0YyI6MzYwLCJ2ZXJib3NlIjpmYWxzZSwidmVuZG9yX2lkIjowLCJ2ZW5kb3JfY29kZSI6IiJ9.RZXSCMlHpGUGDpZpMNjucXiKtQGa2JEuZpP6jtKfIBU";

// Call the function to create the order
$orderResponse = createShiprocketOrder($accessToken, $orderData);

if ($orderResponse) {
  echo "Order Response: ";
  print_r($orderResponse);
} else {
  echo "Failed to create the order.";
}

if (isset($orderResponse['order_id']) && isset($orderResponse['shipment_id'])) {
  echo "Order Created Successfully! Order ID: " . $orderResponse['order_id'];
  echo "Shipment ID:" . $orderResponse['shipment_id'];

  $order_id = $orderResponse['order_id'];
  $shipment_id = $orderResponse['shipment_id'];
  print_r($orderResponse['status_code']);

  // $sql= "insert into `shipment` (`uid`,`order_id`,`shipment_id`) values ('$uid','$order_id', '$shipment_id')";
  // $result= mysqli_query($conn, $sql);
  // if($result){
  //   echo 1;
  // }
  // else{
  //   echo 0;
  // }

} else {
  echo "Failed to create order. Response: ";
  print_r($orderResponse);
}
