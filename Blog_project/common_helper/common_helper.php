<?php

function send_email($from, $to, $subject, $message)
{

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'smtp.gfg.com;';
        $mail->SMTPAuth = true;
        $mail->Username = 'user@gfg.com';
        $mail->Password = 'password';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($from, 'Prince Motisariya');
        $mail->addAddress($to);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->AltBody = $message;
        $mail->send();
        echo "Mail has been sent successfully!";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    $message = "Line 1\r\nLine 2\r\nLine 3";

    $message = wordwrap($message, 70, "\r\n");

    $headers = 'From: ' . $from . "\r\n";

    if (mail('jenish.artbees@gmail.com', 'My Subject', $message)) {
        return true;
    } else {
        return false;
    }
}

function callApi($url, $method)
{
    if ($method == 'GET') {
        $curl = curl_init();

        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Cookie: PHPSESSID=0443p0vj7thfsi739ehp2iihet; connect.sid=s%3A9JuxzHhG3hYdnM3LNabZUKlIQAmrg1eN.frmHPyQnNpSRAhi4KSmLMzLh30ZkzmeHJShx7DWxNmA'
                ),
            )
        );

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }
}

?>