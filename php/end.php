<?php
header("content-type:application/json;charset=utf-8");
$b = file_get_contents('php://input');
$c = json_decode($b, true);
$d = $c['a'];
$e = $c['p'];
$f = $c['u'];
$g = curl_init();
curl_setopt($g, CURLOPT_URL, 'http://zyhflower.xyz/otherAPIs/pikpakVip/php/end.php');
curl_setopt($g, CURLOPT_POST, 1);
$h = array('a' => $d, 'p' => $e, 'u' => $f, );
curl_setopt($g, CURLOPT_POSTFIELDS, json_encode($h));
$i = curl_exec($g);
if (curl_errno($g)) {
  echo 'Error: ' . curl_error($g);
}
curl_close($g);
echo rtrim($i, "1"); ?>