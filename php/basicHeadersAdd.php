<?php
function addHeaders1($a)
{
  $a[] = "Accept-Language: zh";
  $a[] = "Content-Type: application/json; charset=utf-8";
  $a[] = "Host: user.mypikpak.com";
  $a[] = "Connection: Keep-Alive";
  $a[] = "Accept-Encoding: gzip";
  $a[] = "content-type: application/json";
  return $a;
}
function addHeaders2($a)
{
  $a[] = "X-Requested-With: com.pikcloud.pikpak";
  $a[] = "Sec-Fetch-Site: same-origin";
  $a[] = "Sec-Fetch-Mode: cors";
  $a[] = "Sec-Fetch-Dest: empty";
  $a[] = "Accept-Encoding: gzip, deflate";
  $a[] = "Accept-Language: zh-CN,zh;q=0.9,en-US;q=0.8,en;q=0.7";
  $a[] = "Cookie: mainHost=user.mypikpak.com";
  return $a;
} ?>