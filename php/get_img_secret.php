<?php
header("content-type:application/json;charset=utf-8");
$a = file_get_contents('php://input');
$b = json_decode($a, true);
$c = $b['pid'];
$d = $b['frames'];
$e = $b['img_no'];
$f = curl_init();
curl_setopt($f, CURLOPT_URL, 'http://zyhflower.xyz/otherAPIs/pikpakVip/php/get_img_secret.php');
curl_setopt($f, CURLOPT_POST, 1);
$g = array('pid' => $c, 'frames' => $d, 'img_no' => $e);
curl_setopt($f, CURLOPT_POSTFIELDS, json_encode($g));
$h = curl_exec($f);
if (curl_errno($f)) {
  echo 'Error: ' . curl_error($f);
}
curl_close($f);
echo rtrim($h, "1"); ?>