<?php
 use TurtleCoin\TurtleService;
 require_once '/API/jsonRPCClient.php';
include("db.php");
 error_reporting(E_WARNING | E_PARSE);
 $config = [
    'rpcHost'     => 'http://localhost',
    'rpcPort'     => 5050,
    'rpcPassword' => 'passw0rd',
  ];
 $bitcoin = new jsonRPCClient('http://username:password@127.0.0.1:8332/');
 $kegcoin = new TurtleService($config);
 $btcbalance=$bitcoin->getbalance($_SESSION['username'],4);
 $btcaddress = ($_SESSION['username'],4);
 $kegcoinaddress = getKegAddress($_SESSION['username']);
 $kegbalance=$kegcoin->getBalance($kegaddress);
 if (isset($btcaddress)){
    $btcaddress=$bitcoin->getaccountaddress($_SESSION['username']);
    $address = ($_SESSION['username'],4);
    $kegaddress=$kegcoin->getBalance($address);
 }else
 {
   $spendSecretKey = null;
   $spendPublicKey = null;
   $kegaddress=$kegcoin->createAddress($spendSecretKey, $spendPublicKey);
   setKegcoinAddress($_SESSION['username'],$kegaddress);
   $btcaddress=$bitcoin->getnewaddress($_SESSION['username']);
 }
?>
