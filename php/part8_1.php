<?php
sleep(1);
require 'basicHeadersAdd.php';
header("content-type:application/json;charset=utf-8");
$a = file_get_contents('php://input');
$b = json_decode($a, true);
$c = $b['client_id'];
$d = $b['captcha_token'];
$e = $b['device_id'];
$f = $b['captcha_sign'];
$g = $b['email'];
$h = $b['timestamp'];
$i = $b['User_Agent'];
$j = "https://user.mypikpak.com/v1/shield/captcha/init";
$k = http_build_query(array("client_id" => $c));
$l = array("action" => "POST:/v1/auth/signup", "captcha_token" => $d, "client_id" => $c, "device_id" => $e, "meta" => array("captcha_sign" => "1." . $f, "user_id" => "", "package_name" => "com.pikcloud.pikpak", "client_version" => "1.35.3", "email" => $g, "timestamp" => (string) $h), "redirect_uri" => "xlaccsdk01://xbase.cloud/callback?state=harbor");
$m = array("Host: user.mypikpak.com", "x-device-id: $e", "User-Agent: $i", "accept-language: zh", "content-type: application/json", "accept-encoding: gzip");
$n = curl_init();
curl_setopt($n, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($n, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($n, CURLOPT_URL, $j . '?' . $k);
curl_setopt($n, CURLOPT_HTTPHEADER, $m);
curl_setopt($n, CURLOPT_POSTFIELDS, json_encode($l));
curl_setopt($n, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($n, CURLOPT_POST, 1);
$o = curl_exec($n);
if ($o === false) {
  echo "cURL Error: " . curl_error($n);
} else {
  echo $o;
}
curl_close($n); ?>