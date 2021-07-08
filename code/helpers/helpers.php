<?php

// ネットワーク情報のJSONを取得
function getJson($file) {
  $json = file_get_contents($file);
  if($json){
    // utf-8以外の場合は変換する
    $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');

    $networkData = json_decode($json, true);

    return $networkData;
  }
  postJson($file, 'debug-LAN', '127.0.0.1');
  return false;
}
// ネットワーク情報のJSONを書き込む
function postJson($file, $ssid, $ipAddr) {
  var_dump($ssid);
  $data = ["ssid" => $ssid, "ipAddr" => $ipAddr];
  $json = json_encode($data);
  file_put_contents($file, $json);
}
