<?php
require 'basicHeadersAdd.php';
header("content-type:application/json;charset=utf-8");
$a = file_get_contents('php://input');
$b = json_decode($a, true);
$c = $b['client_id'];
$d = $b['captcha_token'];
$e = $b['client_secret'];
$f = $b['email'];
// $g = $b['name'];
$h = $b['password'];
$i = $b['verification_token'];
$j = $b['device_id'];
$k = $b['User_Agent'];
$l = "https://user.mypikpak.com/v1/auth/signup";
$m = http_build_query(array("client_id" => $c));
$n = array("captcha_token" => $d, "client_id" => $c, "client_secret" => $e, "email" => $f, "password" => $h, "verification_token" => $i);
// $n = array("captcha_token" => $d, "client_id" => $c, "client_secret" => $e, "email" => $f, "name" => $g, "password" => $h, "verification_token" => $i);
$o = array("X-Device-Id: $j", "User-Agent: $k");
$o = addHeaders1($o);
$p = curl_init();
curl_setopt($p, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($p, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($p, CURLOPT_URL, $l . '?' . $m);
curl_setopt($p, CURLOPT_HTTPHEADER, $o);
curl_setopt($p, CURLOPT_POSTFIELDS, json_encode($n));
curl_setopt($p, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($p, CURLOPT_POST, 1);
$q = curl_exec($p);
if ($q === false) {
  echo "cURL Error: " . curl_error($p);
} else {
  echo $q;
}
curl_close($p); ?>