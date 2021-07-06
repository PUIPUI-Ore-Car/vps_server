<?php
  require('./config.php');
  require('./helpers/db_helpers.php');

  function postData() {
    $postData = json_decode(file_get_contents('php://input'));
    $postData["method"] = "post";
    $json = json_encode( $postData );
    echo $json;
  }
?>