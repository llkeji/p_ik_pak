<?php
sleep(1);
require 'basicHeadersAdd.php';
header("content-type:application/json;charset=utf-8");
$a = file_get_contents('php://input');
$b = json_decode($a, true);
$c = $b['device_id'];
$d = $b['captcha_token'];
$e = $b['pid'];
$f = $b['trace_id'];
$g = $b['user_agent'];
$h = $b['referer'];
$i = "https://user.mypikpak.com/credit/v1/report";
$j = http_build_query(array("deviceid" => $c, "captcha_token" => $d, "type" => "pzzlSlider", "result" => "0", "data" => $e, "traceid" => $f));
$k = array("Host: user.mypikpak.com", "accept: application/json, text/plain, */*", "user-agent: $g", "referer: $h");
$k = addHeaders2($k);
$l = curl_init();
curl_setopt($l, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($l, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($l, CURLOPT_URL, $i . '?' . $j);
curl_setopt($l, CURLOPT_HTTPHEADER, $k);
curl_setopt($l, CURLOPT_RETURNTRANSFER, 1);
$m = curl_exec($l);
if ($m === false) {
  echo "cURL Error: " . curl_error($l);
} else {
  echo $m;
}
curl_close($l); ?>