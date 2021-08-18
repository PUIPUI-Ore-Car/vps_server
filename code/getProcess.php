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
    $tempData = getAllTemp(get_db_connect());
    $network = getJson('./network.json');
    $cnt = 0;
    foreach($tempData as $tempHumiData){
      $tempArray[$cnt] = $tempHumiData['temp'];
      $humiArray[$cnt] = $tempHumiData['humidity'];
      $timeArray[$cnt] = $tempHumiData['time'];
      $cnt++;
    }

    $data = array('method' => strtolower($_SERVER['REQUEST_METHOD']), 'command' => 'AllDataFetch','odo' => $odo, 'temp' => $tempArray, 'humidity' => $humiArray, 'ssid' => $network["ssid"], 'ipAddr' => $network["ipAddr"], 'time' => $timeArray);

    $json = json_encode( $data );
    echo $json;
  }
?>