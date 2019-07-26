<?php
  include( "../db.php");
  $UNIT = $_GET['u'];	
	$PERIOD = $_GET['p'];
  $COIN_NAME = $_GET['c'];
  $PRICE = getPrice($COIN_NAME,$UNIT);
  $VOLUME = getVolume($COIN_NAME,$UNIT);
  $CHANGE = (getPrice($COIN_NAME,$UNIT) - getPrice($COIN_NAME,$UNIT,$MIDNIGHT));
  $HIGH = getHigh($COIN_NAME,$UNIT);
  $LOW = getLow($COIN_NAME,$UNIT);
  // api format
  /*
  last: PRICE
  volume: VOLUME
  change: CHANGE
  high: HIGH
  low: LOW
  market: COIN_NAME+UNIT
  */
  echo('
  <p>last: ' .$PRICE.'</p>
  <p>volume: ' .$VOLUME.'</p>
  <p>change: ' .$CHANGE.'</p>
  <p>high: ' .$HIGH.'</p>
  <p>low: ' .$LOW.'</p>
  <p>market: '.$COIN_NAME.$UNIT.'<p>
  ');
?>
