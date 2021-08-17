<?php
  require('./config.php');


  // 文字コード設定(デバッグ終了後は外す)
  header('Content-Type: application/json; charset=UTF-8');

  switch(strtolower($_SERVER['REQUEST_METHOD'])){
    case 'get': {
      // データを取得する
      require('./getProcess.php');
      getAllData();
      break;
    }
    case 'post': {
      // データを受信する
      require('./postProcess.php');
      postData();
      break;
    }
    default: {
      // エラー
      echo '{"error": "no sapported method"}';
      break;
    }
  }
?>