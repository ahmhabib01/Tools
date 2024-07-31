<?php


$num = $_GET["number"];

$sms = $_GET["sms"];

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => 'http://202.51.182.198:8181/nbp/sms/code',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => '{"receiver":"$num,","text":"$sms,","title":"Register Account"}',
  CURLOPT_HTTPHEADER => [
    'User-Agent: okhttp/3.11.0',
    'Connection: Keep-Alive',
    'Accept-Encoding: gzip',
    'Authorization: Bearer',
    'language: en',
    'timeZone: Asia/Dhaka',
    'Content-Type: application/json; charset=utf-8',
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo 'cURL Error #:' . $err;
} else {
  echo $response;
}
