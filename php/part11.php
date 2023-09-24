<?php
require 'basicHeadersAdd.php';
header("content-type:application/json;charset=utf-8");
$a = file_get_contents('php://input');
$b = json_decode($a, true);
$c = $b['device_id'];
$d = $b['user_id'];
$e = $b['phoneModel'];
$f = $b['phoneBuilder'];
$g = $b['invite_code'];
$h = $b['access_token'];
$i = $b['captcha_token'];
$j = $b['User_Agent'];
$k = "https://api-drive.mypikpak.com/vip/v1/activity/invite";
$l = array("data" => array("sdk_int" => "33", "uuid" => $c, "userType" => "1", "userid" => $d, "userSub" => "", "product_flavor_name" => "cha", "language_system" => "zh-CN", "language_app" => "zh-CN", "build_version_release" => "13", "phoneModel" => $e, "build_manufacturer" => $f, "build_sdk_int" => "33", "channel" => "spread", "versionCode" => "10142", "versionName" => "1.35.3", "installFrom" => "other", "country" => "NO"), "apk_extra" => array("channel" => "spread", "invite_code" => $g));
$m = array("Host: api-drive.mypikpak.com", "authorization: Bearer " . $h, "product_flavor_name: cha", "x-captcha-token: $i", "x-client-version-code: 10142", "x-device-id: $c", "user-agent: $j", "country: NO", "accept-language: zh-CN", "x-peer-id: $c", "x-user-region: 2", "x-system-language: zh-CN", "x-alt-capability: 3", "accept-encoding: gzip", "content-type: application/json");
$n = curl_init();
curl_setopt($n, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($n, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($n, CURLOPT_URL, $k);
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