<?php
  // 文字コード設定
  header('Content-Type: application/json; charset=UTF-8');

  switch(strtolower($_SERVER['REQUEST_METHOD'])){
    case 'get': {
      // データを取得する


      $json = json_encode( array('method' => strtolower($_SERVER['REQUEST_METHOD']), 'keys' => 3) );
      echo $json;
      break;
    }
    case 'post': {
      // データを受信する

      $postData = json_decode(file_get_contents('php://input'));
      $postData["method"] = "post";
      // var_dump($postData);
      $json = json_encode( $postData );
      echo $json;
      break;
    }
    default: {
      // エラー

    }
  }