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
$g = $b['user_id'];
$h = $b['timestamp'];
$i = $b['User_Agent'];
$j = "https://user.mypikpak.com/v1/shield/captcha/init";
$k = http_build_query(array("client_id" => $c));
$l = array("action" => "POST:/vip/v1/activity/invite", "captcha_token" => $d, "client_id" => $c, "device_id" => $e, "meta" => array("captcha_sign" => "1." . $f, "user_id" => $g, "package_name" => "com.pikcloud.pikpak", "client_version" => "1.35.3", "timestamp" => (string) $h), "redirect_uri" => "xlaccsdk01://xbase.cloud/callback?state=harbor");
$m = array("X-Device-Id: $e", "User-Agent: $i");
$m = addHeaders1($m);
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