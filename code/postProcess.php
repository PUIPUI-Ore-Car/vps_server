<?php
  require('./config.php');
  require('./helpers/db_helpers.php');
  require('./helpers/helpers.php');

  function postData() {
    $postData = json_decode(file_get_contents('php://input'), true);

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