<?php
$a = $_GET['device_id'];
$b = $_GET['orgin_str'];
function get_hash($c)
{
  $d = md5($c);
  return $d;
}
function get_sign($b, $e)
{
  foreach ($e as $f) {
    $b = get_hash($b . $f["salt"]);
  }
  return $b;
}
function get_ua_key($a)
{
  $g = sha1($a . "com.pikcloud.pikpak1appkey");
  $h = get_hash($g);
  return $a . $h;
}
$e = [['alg' => 'md5', 'salt' => 'rSfcTp/DgsbZN+8q/CU+0LaQ'], ['alg' => 'md5', 'salt' => 'whYlISFbiZ+BFJTKYD'], ['alg' => 'md5', 'salt' => 'we4IGIjabozmJ7W4RjaH8pgFmxuK4'], ['alg' => 'md5', 'salt' => '5yWI/notmLb6fKG7zkJBMDo1zxu7+Gm0i'], ['alg' => 'md5', 'salt' => 'c6WFNL2'], ['alg' => 'md5', 'salt' => '86pAtUs7logT13qk0rpYJB'], ['alg' => 'md5', 'salt' => 'tOhDN1F5pBrSqCSZkc+edhzhZgRbC'], ['alg' => 'md5', 'salt' => 'n75RCmuCmgwtTsj9AwNzS'], ['alg' => 'md5', 'salt' => 'zy'], ['alg' => 'md5', 'salt' => 'Ips0'], ['alg' => 'md5', 'salt' => 'nXOHs4XmDbOr4JXOARcglv54SGGLPUsjZ'], ['alg' => 'md5', 'salt' => 'QfqqbpbnO4A7MeoBds+BVcmk6IsR']];
$i = get_sign($b, $e);
$j = get_ua_key($a);
$k = json_encode(array("sign" => $i, "key" => $j));
echo $k; ?>