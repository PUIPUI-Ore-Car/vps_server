<?php

function get_db_connect(){

  try{
    $dsn = DSN;
    $user = DB_USER;
    $password = DB_PASSWORD;

    $dbh = new PDO($dsn, $user, $password);

  }catch(PDOException $e){
    echo($e->getMessage());
    die();
  }
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $dbh;
}

function postDB_data ($dbh, $datas){
  // DBにPUI数と温湿度データを書き込む
  $pui = $datas["puiCount"];
  $temp = $datas["temperature"];
  $humidity = $datas["humidity"];
  $time = $datas["time"];
  $sql = "INSERT INTO puicar_sense_data (current_pui_count, temp, humidity, time)";
  $sql .= "VALUE (:current_pui_count, :temp, :humidity, :time)";

  $stmt = $dbh->prepare($sql);
  $stmt->bindValue(':current_pui_count', $pui, PDO::PARAM_STR);
  $stmt->bindValue(':temp', $temp, PDO::PARAM_STR);
  $stmt->bindValue(':humidity', $humidity, PDO::PARAM_STR);
  $stmt->bindValue(':time', $time, PDO::PARAM_STR);

  if($stmt->execute()){
    return TRUE;
  }else{
    return FALSE;
  }
}

function getOdoPui ($dbh){
  // pui数のODOデータを取得する
  $sql = 'SELECT current_pui_count FROM puicar_sense_data';
  $stmt = $dbh->prepare($sql);
  $stmt->execute();
  if($stmt->rowCount() > 0){
    $data = $stmt->fetchAll();
    $odo = 0;
    foreach($data as $datacell){
      $odo += intval($datacell["current_pui_count"]);
    }
    return $odo;
  }
  return -1;
}

function getLatestTemp ($dbh){
  // 最新の温湿度データを取得する
  $sql = 'SELECT temp, humidity, time FROM puicar_sense_data ORDER BY id DESC LIMIT 1';
  $stmt = $dbh->prepare($sql);
  $stmt->execute();
  if($stmt->rowCount() > 0){
    $data = $stmt->fetchAll();
    $data[0]["temp"] = intval($data[0]["temp"]);
    $data[0]["humidity"] = intval($data[0]["humidity"]);
    return $data[0];
  }
  return null;
}

function getAllTemp ($dbh){
  // すべての温湿度データを取得する
  $sql = 'SELECT temp, humidity, time FROM puicar_sense_data ORDER BY id DESC';
  $stmt = $dbh->prepare($sql);
  $stmt->execute();
  if($stmt->rowCount() > 0){
    $data = $stmt->fetchAll();
    for($i = 0; $i < count($data); $i++){
      $retVal[$i]["temp"] = intval($data[$i]["temp"]);
      $retVal[$i]["humidity"] = intval($data[$i]["humidity"]);
    }
    // var_dump($retVal);
    return $retVal;
  }
  return null;
}