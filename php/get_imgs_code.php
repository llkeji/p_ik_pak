<?php
header("content-type:application/json;charset=utf-8");
$a = file_get_contents('php://input');
$b = json_decode($a, true);
$c = $b['frames'];
$d = $b['UP_key'];
$e = curl_init();
curl_setopt($e, CURLOPT_URL, 'http://zyhflower.xyz/otherAPIs/pikpakVip/php/getImgsCode.php');
curl_setopt($e, CURLOPT_POST, 1);
$f = array('frames' => $c, 'UP_key' => $d);
curl_setopt($e, CURLOPT_POSTFIELDS, json_encode($f));
$g = curl_exec($e);
if (curl_errno($e)) {
  echo 'Error: ' . curl_error($e);
}
curl_close($e);
echo rtrim($g, "1"); ?>