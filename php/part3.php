<?php
sleep(1);
require 'basicHeadersAdd.php';
header("content-type:application/json;charset=utf-8");
$a = file_get_contents('php://input');
$b = json_decode($a, true);
$c = $b['device_id'];
$d = $b['user_agent'];
$e = $b['referer'];
$f = "https://user.mypikpak.com/pzzl/gen";
$g = http_build_query(array("deviceid" => $c, "traceid" => ""));
$h = array("Host: user.mypikpak.com", "accept: application/json, text/plain, */*", "user-agent: $d", "referer: $e");
$h = addHeaders2($h);
$i = curl_init();
curl_setopt($i, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($i, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($i, CURLOPT_URL, $f . '?' . $g);
curl_setopt($i, CURLOPT_HTTPHEADER, $h);
curl_setopt($i, CURLOPT_RETURNTRANSFER, 1);
$j = curl_exec($i);
if ($j === false) {
  echo "cURL Error: " . curl_error($i);
} else {
  echo $j;
}
curl_close($i); ?>