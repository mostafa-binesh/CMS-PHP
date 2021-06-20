<?php
// set post fields
$post = [
    'username' => 'mostafa',
    'password' => 'binesh',
    'gender'   => 1,
];

$ch = curl_init('http://localhost/cms/tests/get.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

// execute!
$response = curl_exec($ch);
// echo $response;
// close the connection, release resources used
curl_close($ch);

// do anything you want with your response
// var_dump($response);
echo $response;
?>