<?php
$key= 'secretkey';
// function generatejwt($user){
//     global $key;

//     $payload = array(
//         $data=> array(
//             'id'=> $user['id'],
//             'username' => $user['username'],
//             'email' => $user['email']
//         )
//     )

//      JWT::encode($payload, $key);
// }

// function verifyjwt($jwt){
//     global $key;

//     try {
//         return JWT::decode($jwt, $key, array('HS256'));
//     } catch (Exception $e) {
//         return false;
//     }
// }


function generatetoken(){
    global $key;

    //build the headers
    $headers = ['alg'=>'HS256','typ'=>'JWT'];
    $headers_encoded = json_encode($headers);   

    //build the payload
    $payload = ['sub'=>'1234567890', 'id'=>$id, 'email'=>$email, 'password'=>$password];   
    $payload_encoded = json_encode($payload); 


    //build the signature
    $jwt = hash_hmac('SHA256',"$headers_encoded.$payload_encoded",$key);  //  print_r($jwt); 
}

?>