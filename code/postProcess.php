<?php
  require('./helpers/db_helpers.php');
  require('./helpers/helpers.php');

  function postData() {
    $data = file_get_contents('php://input');
    $postData = json_decode($data, true);
    // var_dump($postData);

    // JSONにネットワーク情報を書き込む
    postJson('./network.json', $postData["ssid"], $postData["ipAddr"]);

    // DBにデータを格納する
    postDB_data(get_db_connect(), $postData);

    // 返送用JSONを作成
    $postData["method"] = "post";
    $json = json_encode( $postData );
    echo $json;
  }
?>