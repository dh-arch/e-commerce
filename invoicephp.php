
<?php
include 'connection.php';

require 'vendor/autoload.php';
 
use Dompdf\Dompdf;
use Dompdf\Options;

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();

$mail->isSMTP();                                       // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'csanghani58@gmail.com';                 // SMTP username
$mail->Password = 'uljxhwqkwpxruivp';                           // SMTP password
$mail->Port = 587;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isRemoteEnabled', true); // For remote images

    ob_start();
    include 'invoice.php';
    $websiteContent = ob_get_clean();

    // print_r($websiteContent);

    // Initialize Dompdf
    $dompdf = new Dompdf($options);

    $dompdf->loadHtml($websiteContent);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // Get the PDF output as a string
    $dompdf->output();

    $mail->addStringAttachment($websiteContent, "invoice_{$invoice_id}.pdf");  // Add the PDF as an attachment

    // Generate the PDF content
    $mail->From = 'csanghani58@gmail.com';
    $mail->addAddress('dhruvi.artbees@gmail.com');
    $mail->Subject = "Invoice #{$invoice_id}";
    $mail->Body =  "Dear {$name},Please find your invoice attached.";

    if (!$mail->send()) {
        $data = array('error' => 'true', 'message' => 'faild to sent');
        echo json_encode($data);
    } else {

        // header('location: ordersuccess.php');

        $data = array('error' => 'false', 'message' => 'product delete successfully');
        // echo json_encode($data); 
    }
}
?>