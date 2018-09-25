<?php
$token=$_POST['token'];
$title=$_POST['title'];
$body=$_POST['body'];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://exp.host/--/api/v2/push/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n\n\"to\": \"".$token."\",\n\"title\": \"".$title."\",\n\"body\": \"".$body."\",\n\"sound\": \"default\",\n\n\"badge\": 0\n}",
  CURLOPT_HTTPHEADER => array(
    "Accept: application/json",
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}?>
