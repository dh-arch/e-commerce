
<?php
include 'connection.php';

if (isset($_GET['unique_id'])) {
    $unique_id = $_GET['unique_id'];
    print_r($unique_id);

    $sql = "select * from payment, cart where payment.unique_id=cart.unique_id"; //join query
    // $sql = "select * from `payment` where `unique_id` = '$unique_id'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $uid = $row['uid'];
        $name = $row['name'];
        print_r($name);
        $address = $row['address'];  // print_r($address);
        $mobileno = $row['mobileno'];
        $email = $row['email'];
        $order_id = $row['order_id'];   // print_r($order_id); 
        $invoice_id = $row['invoice_id'];    // print_r($invoice_id); 

        $pid = $row['pid'];  // print_r($pid);
        $image = $row['image'];    // print_r($image);
        $category = $row['category'];   // print_r($category);
        $quantity = $row['quantity'];  // print_r($quantity);
        $totalprice = $row['totalprice'];  // print_r($totalprice);
        $grandtotal = $row['grandtotal'];   // print_r($grandtotal);
        $current_date = $row['current_date'];
        $delivery_date = $row['delivery_date'];   // print_r($delivery_date);

        $sql = "select * from productdata where id='$pid'";

        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $price = $row['price'];
            $discount = $row['price-offer'];
        }
    }
    $data = array('error' => 'false', 'message' => 'order id');
} else {
    $data = array('error' => 'true', 'message' => 'not found order id');
    echo json_encode($data);
}

// Include autoload file from Composer
require 'vendor/autoload.php';

// Reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true); // For remote images

// Create an instance of Dompdf
$dompdf = new Dompdf($options);

// ob_start();
// include 'invoice.php';
// $websiteContent = ob_get_clean();

// print_r($websiteContent);

$html = '
<!DOCTYPE html>
<html>

<head>
    <title>Invoice</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .invoice-box {
            max-width: 800px;
            /* margin: auto; */
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            line-height: 24px;
            text-align: left;
            border-collapse: collapse;
            margin-top: 30px;
        }

        table th,
        table td {
            padding: 12px;
            border: 1px solid #ddd;
            vertical-align: top;
        }

        table th {
            background-color: #f8f8f8;
            font-weight: bold;
        }

        table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .sold_detail {
            margin-top: 20px;
        }

        .invoice-detail {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <h1>Invoice</h1>
        
        <div class="sold_detail">
            <p>Sold To : ' . $name . ' </p>
            <p>Address : ' . $address . ' </p>
        </div>

        <div class="col-12 d-flex invoice-detail">
            <div class="col-6 ">
                <p>Invoice Id : ' .  $invoice_id . ' </p>
                <p>Invoice Date : ' . $current_date . ' </p>
            </div>
            <div class="col-6 order-detail ">
                <p>Order Id : ' .  $order_id . ' </p>
                <p>Order Date : ' . $delivery_date . ' </p>
            </div>
        </div> 

         <table>
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> ' . $category . ' </td>
                    <td> ' . $quantity . ' </td>
                    <td> ' . $totalprice . ' </td>
                    <td> ' . $grandtotal . ' </td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align:right;"><strong>Total:</strong></td>
                    <td> ' . $grandtotal . ' </td>
                </tr>
            </tbody>
        </table> 


     </div>
</body>

</html>
';

// Load the HTML content into DOMPDF
$dompdf->loadHtml($html);

// Set paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to the browser
$dompdf->stream("invoice_{$invoice_id}.pdf", array("Attachment" => false));

// Alternatively, you can save the PDF to a file on the server
// $output = $dompdf->output();
// file_put_contents("invoice.pdf", $output);
?>
