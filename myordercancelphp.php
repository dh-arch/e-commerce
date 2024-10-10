<?php
include 'connection.php';

if (isset($_GET['type']) && $_GET['type'] == 'cancel') {
    $status = $_GET['type'];

    if (isset($_POST['pid']) && isset($_POST['orderid'])) {

        $pid = $_POST['pid'];
        print_r($pid);
        $orderid = $_POST['orderid'];
        print_r($orderid);

        $dateTime = new DateTime('now', new DateTimeZone('Asia/kolkata'));
        $ordercancel_date = $dateTime->format('Y-m-d H:i:s');

        $accessToken= 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOjUxNDk3MDgsInNvdXJjZSI6InNyLWF1dGgtaW50IiwiZXhwIjoxNzI2ODIzNjc0LCJqdGkiOiJFZG5aZDI5b1p5MHBjM01MIiwiaWF0IjoxNzI1OTU5Njc0LCJpc3MiOiJodHRwczovL3NyLWF1dGguc2hpcHJvY2tldC5pbi9hdXRob3JpemUvdXNlciIsIm5iZiI6MTcyNTk1OTY3NCwiY2lkIjo0OTQ1NjIzLCJ0YyI6MzYwLCJ2ZXJib3NlIjpmYWxzZSwidmVuZG9yX2lkIjowLCJ2ZW5kb3JfY29kZSI6IiJ9.RZXSCMlHpGUGDpZpMNjucXiKtQGa2JEuZpP6jtKfIBU';
        print_r($accessToken);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/orders/cancel',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "ids": [636981334]
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOjUxNDk3MDgsInNvdXJjZSI6InNyLWF1dGgtaW50IiwiZXhwIjoxNzI2ODIzNjc0LCJqdGkiOiJFZG5aZDI5b1p5MHBjM01MIiwiaWF0IjoxNzI1OTU5Njc0LCJpc3MiOiJodHRwczovL3NyLWF1dGguc2hpcHJvY2tldC5pbi9hdXRob3JpemUvdXNlciIsIm5iZiI6MTcyNTk1OTY3NCwiY2lkIjo0OTQ1NjIzLCJ0YyI6MzYwLCJ2ZXJib3NlIjpmYWxzZSwidmVuZG9yX2lkIjowLCJ2ZW5kb3JfY29kZSI6IiJ9.RZXSCMlHpGUGDpZpMNjucXiKtQGa2JEuZpP6jtKfIBU'
            ),
        ));

        $response = curl_exec($curl);  

        curl_close($curl);
        echo $response;

        // $sql = "update `payment` set `status`= '$status', `grandtotal`= '0', `transaction_id`='', `invoice_id`='', `delivery_date`='', `ordercancel_date`='$ordercancel_date' where `order_id`= '$orderid'";   // print_r($sql);
        // $result = mysqli_query($conn, $sql);
        // if ($result == true) {
        //     $data = array('error' => 'false', 'message' => 'update status successfully');
        // } else {
        //     $data = array('error' => 'true', 'message' => 'not update status successfully');
        //     echo json_encode($data);
        // }
    }
}
