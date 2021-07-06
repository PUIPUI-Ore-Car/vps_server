<?php
  require('./config.php');
  require('./helpers/db_helpers.php');

  function getData() {
    $odo = getOdoPui(get_db_connect());

    $data = array('method' => strtolower($_SERVER['REQUEST_METHOD']), 'odo' => $odo, );

    $json = json_encode( $data );
    echo $json;
  }
?>