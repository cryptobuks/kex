<?php
  include("../db.php");
  $VERSION = 0.0.1;
  $CUMVOLUME = getExchangeVolume();
  $COINCOUNT = 4;
  $TIMESTAMP = time();
  echo('
  <p>keX</p>
  <p>version: ' .$VERSION.'</p>
  <p>timestamp: ' .$TIMESTAMP.'</p>
  <p>volume: ' .$CUMVOLUME.'</p>
  <p>coins: ' .$COINCOUNT.'</p>
  <p> Copywrite (c) 2019 The keX Developers.<p>
  ');
?>
