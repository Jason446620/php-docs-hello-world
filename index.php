<?php
// Your code here!
$ocpApimSubscriptionKey = 'b6417ac8581d4532ae444347c5558f2b';
$uriBase = 'https://eastus.api.cognitive.microsoft.com/';

$request_URL = $uriBase . 'vision/v3.0/tag';

$params = array('language' => 'en');
$request_URL = $request_URL . '?' . http_build_query($params);


$headers = array(
    'Content-Type' => 'application/json',
    'Ocp-Apim-Subscription-Key' => $ocpApimSubscriptionKey,
    'Ocp-Apim-Trace' => true
);


$imageUrl = 'https://upload.wikimedia.org/wikipedia/commons/3/3c/Shaki_waterfall.jpg';

$body = json_encode(array(
    'url' => $imageUrl
));

print_r($body);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$request_URL);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_POST, true);
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS,$body); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$server_output = curl_exec ($ch);

curl_close ($ch);

print  $server_output ;
?>
