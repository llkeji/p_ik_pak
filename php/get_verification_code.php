<?php
header("content-type:application/json;charset=utf-8");
$a = file_get_contents('php://input');
$b = json_decode($a, true);
$c = $b['email'];
$d = $b['api_key'];
$e = md5($c);
$f = null;
for ($g = 0; $g < 50; $g++) {
  $h = "https://api.apilayer.com/temp_mail/mail/id/$e";
  $j = array("apikey: $d");
  $k = curl_init();
  curl_setopt($k, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($k, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($k, CURLOPT_URL, $h);
  curl_setopt($k, CURLOPT_HTTPHEADER, $j);
  curl_setopt($k, CURLOPT_RETURNTRANSFER, 1);
  $l = curl_exec($k);
  if ($l !== false) {
    $m = json_decode($l, true);
    if ($m !== null && isset($m[0]['mail_html'])) {
      $n = $m[0]['mail_html'];
      if (preg_match('/\d{6}/', $n, $o)) {
        $f = $o[0];
        break;
      }
    } else if (!$m['error']) {
      echo json_encode($m);
      break;
    }
  }
  sleep(5);
}
if ($f) {
  echo json_encode(array("code" => $f));
} ?>