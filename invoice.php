<?php

use FontLib\Table\Type\head;

include 'connection.php';
?>

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
    <?php

    if (isset($_POST['order_id'])) {
        $order_id = $_POST['order_id'];
        // print_r($order_id);

        // $sql = "select * from payment, cart where payment.pid=cart.product_id"; //join query
        $sql = "select * from `payment` where `order_id` = '$order_id'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $uid = $row['uid'];
            $name = $row['name'];   // print_r($name);
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

    ?>
                <div class="invoice-box">
                    <h1>Invoice</h1>

                    <div class="sold_detail">
                        <p>Sold To : <?php echo $name; ?> </p>
                        <p>Address : <?php echo $address; ?> </p>
                    </div>

                    <div class="col-12 d-flex invoice-detail">
                        <div class="col-6 ">
                            <p>Invoice Id : <?php echo $invoice_id; ?> </p>
                            <p>Invoice Date : <?php echo $current_date; ?> </p>
                        </div>
                        <div class="col-6 order-detail ">
                            <p>Order Id : <?php echo $order_id; ?> </p>
                            <p>Order Date : <?php echo $delivery_date; ?> </p>
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
                                <td> <?php echo $category; ?> </td>
                                <td> <?php echo $quantity; ?> </td>
                                <td> <?php echo $totalprice; ?> </td>
                                <td> <?php echo $grandtotal; ?> </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align:right;"><strong>Total:</strong></td>
                                <td> <?php echo $grandtotal; ?> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

    <?php }
        }
        header('location: invoicepage.php');
        $data = array('error' => 'false', 'message' => 'order id');
    } else {
        $data = array('error' => 'true', 'message' => 'not found order id');
        echo json_encode($data);
    } ?>

</body>

</html>