<?php
require 'basicHeadersAdd.php';
header("content-type:application/json;charset=utf-8");
$a = file_get_contents('php://input');
$b = json_decode($a, true);
$c = "https://user.mypikpak.com/v1/shield/captcha/init";
$d = $b['client_id'];
$e = $b['captcha_token'];
$f = $b['device_id'];
$g = $b['captcha_sign'];
$h = $b['email'];
$i = $b['timestamp'];
$j = $b['user_agent'];
$k = http_build_query(["client_id" => $d]);
$l = ["action" => "POST:/v1/auth/verification", "captcha_token" => $e, "client_id" => $d, "device_id" => $f, "meta" => ["captcha_sign" => "1." . $g, "user_id" => "", "package_name" => "com.pikcloud.pikpak", "client_version" => "1.35.3", "email" => $h, "timestamp" => (string) $i], "redirect_uri" => "xlaccsdk01://xbase.cloud/callback?state=harbor"];
$m = ["X-Device-Id: " . $f, "User-Agent: " . $j];
$m = addHeaders1($m);
$n = curl_init();
curl_setopt($n, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($n, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($n, CURLOPT_URL, $c . '?' . $k);
curl_setopt($n, CURLOPT_POST, true);
curl_setopt($n, CURLOPT_POSTFIELDS, json_encode($l));
curl_setopt($n, CURLOPT_HTTPHEADER, $m);
curl_setopt($n, CURLOPT_RETURNTRANSFER, true);
$o = curl_exec($n);
if (curl_errno($n)) {
  echo 'cURL error: ' . curl_error($n);
}
curl_close($n);
echo $o; ?>