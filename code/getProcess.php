<?php
  require('./helpers/db_helpers.php');
  require('./helpers/helpers.php');

  function getData() {
    $odo = getOdoPui(get_db_connect());
    $tempData = getLatestTemp(get_db_connect());
    $network = getJson('./network.json');

    $data = array('method' => strtolower($_SERVER['REQUEST_METHOD']), 'odo' => $odo, 'temp' => $tempData["temp"], 'humidity' => $tempData["humidity"], 'ssid' => $network["ssid"], 'ipAddr' => $network["ipAddr"], 'time' => $tempData["time"]);

    $json = json_encode( $data );
    echo $json;
  }

  function getAllData() {
    // すべてのデータを送る
    $odo = getOdoPui(get_db_connect());
    $tempData = getLatestTemp(get_db_connect());
    $network = getJson('./network.json');

    $data = array('method' => strtolower($_SERVER['REQUEST_METHOD']), 'command' => 'AllData','odo' => $odo, 'temp' => $tempData["temp"], 'humidity' => $tempData["humidity"], 'ssid' => $network["ssid"], 'ipAddr' => $network["ipAddr"], 'time' => $tempData["time"]);

    $json = json_encode( $data );
    echo $json;
  }
?>