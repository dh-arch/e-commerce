<?php
include('../config/config.php');

if (isset($_GET['type']) && $_GET['type'] == 'adddata') {

    if (isset($_POST['unique_id']) && isset($_POST['uid']) && isset($_POST['ordertype']) && isset($_POST['length']) && isset($_POST['breadth']) && isset($_POST['height']) && isset($_POST['weight'])) {

        $unique_id = $_POST['unique_id'];
        $uid = $_POST['uid'];
        $ordertype = $_POST['ordertype'];
        $length = $_POST['length'];
        $breadth = $_POST['breadth'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];

        // $sql = "update `payment` set `ordertype`='$ordertype' where `unique_id`='$unique_id' ";
        // $result = mysqli_query($con, $sql);
        // if ($result) {
        //     $data = array(
        //         'error' => 'true',
        //         'message' => 'ordertype added',
        //         'data' => null 
        //     );
        // } else {
        //     $data = array(
        //         'error' => 'false',
        //         'message' => 'ordertype not added',
        //         'data' => null
        //     );
        // }

        if ($ordertype == 'PlaceOrder') {
            $sql = "update `payment` set `ordertype`='$ordertype', `length`='$length', `breadth`='$breadth', `height`='$height', `weight`='$weight' where `unique_id`='$unique_id' ";
            $result = mysqli_query($con, $sql);
            if ($result) {
                $data = array(
                    'error' => 'true',
                    'message' => 'ordertype, length, breadth, height, weight added',
                    'data' => null
                );
            } else {
                $data = array(
                    'error' => 'false',
                    'message' => 'ordertype, length, breadth, height, weight not added',
                    'data' => null
                );
            }
        }

        // if ($ordertype == 'pending') {

        //     $sql = "update `payment` set `ordertype`='$ordertype', `length`='$length', `breadth`='$breadth', `height`='$height', `weight`='$weight' where `unique_id`='$unique_id' ";
        //     $result = mysqli_query($con, $sql);
        //     if ($result) {
        //         $data = array(
        //             'error' => 'true',
        //             'message' => 'ordertype, length, breadth, height, weight added',
        //             'data' => null
        //         );
        //     } else {
        //         $data = array(
        //             'error' => 'false',
        //             'message' => 'ordertype, length, breadth, height, weight not added',
        //             'data' => null
        //         );
        //     }
        // }

        $sql = "select * from `payment` where `unique_id`='$unique_id'";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $order_id = $row['order_id'];
            $uid = $row['uid'];
            $name = $row['name'];
            $category = $row['category'];
            $quantity = $row['quantity'];
            $grandtotal = $row['grandtotal'];
            $paymode = $row['paymode'];

            if ($paymode == 'card') {
                $paytype = 'prepaid';
            } else {
                $paytype = 'prepaid';
            }
            $currentdate = $row['current_date'];
            $currentdate = strtotime($currentdate);
            $orderdate = date('Y-m-d ', $currentdate);

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
                "order_id" => "'. $order_id .'",
                "order_date" => "2024-09-10",
                "pickup_location" => "warehouse",
                "billing_customer_name" => "'. $name .'",
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
                        "name" =>  $category,
                        "sku" => "SKU001",
                        "units" => $quantity,
                        "selling_price" =>  $grandtotal,
                        "discount" => 0,
                        "tax" => 0,
                        "hsn" => "998877"
                    ]
                ],
                "payment_method" => $paytype,
                "shipping_charges" => 00.00,
                "giftwrap_charges" => 0,
                "transaction_charges" => 0,
                "total_discount" => 0,
                "sub_total" => $grandtotal,
                "length" => $length,
                "breadth" => $breadth,
                "height" => $height,
                "weight" => $weight
            ];
        }


        $accessToken = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOjUxNDk3MDgsInNvdXJjZSI6InNyLWF1dGgtaW50IiwiZXhwIjoxNzI4MDI3MTU5LCJqdGkiOiJzUEh5Q281bFVqcVNUcEZMIiwiaWF0IjoxNzI3MTYzMTU5LCJpc3MiOiJodHRwczovL3NyLWF1dGguc2hpcHJvY2tldC5pbi9hdXRob3JpemUvdXNlciIsIm5iZiI6MTcyNzE2MzE1OSwiY2lkIjo0OTQ1NjIzLCJ0YyI6MzYwLCJ2ZXJib3NlIjpmYWxzZSwidmVuZG9yX2lkIjowLCJ2ZW5kb3JfY29kZSI6IiJ9.GAT70sBmXcAteSHta0fiaPPF5oLOkAZYjgFbRbiNCog";

        // Call the function to create the order
        $orderResponse = createShiprocketOrder($accessToken, $orderData);

        if ($orderResponse) {

            $orderid = $orderResponse['order_id'];
            $shipment_id = $orderResponse['shipment_id'];

            print_r("Order ID" . $orderResponse['order_id']);
            print_r("Shipment ID" . $orderResponse['shipment_id']);

            $sql = "update `payment` set `orderid`='$orderid', `shipment_id`='$shipment_id' where `unique_id`='$unique_id' ";
            $result = mysqli_query($con, $sql);
            if ($result) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo "Failed to create the order.";
        }
    }
}
