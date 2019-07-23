<html>
<?php 
 use TurtleCoin\TurtleService;
 use TurtleCoin\TurtleCoind;
 require_once 'jsonRPCClient.php';
 error_reporting(E_WARNING | E_PARSE);
  $config = [
    'rpcHost'     => 'http://localhost',
    'rpcPort'     => 5050,
    'rpcPassword' => 'passw0rd',
  ];
  $configd = [
    'rpcHost' => 'http://localhost',
    'rpcPort' => 5050,
];

 $kegcoind = new TurtleCoind($configd);
 $bitcoin = new jsonRPCClient('http://username:password@127.0.0.1:8332/');
 $kegcoinw = new TurtleService($config);
 
  echo "<pre>\n";
  print_r($bitcoin->getinfo());
  print_r($bitcoin->listaccounts());
  print_r($kegcoind->getInfo());
  print_r($kegcoinw->getAddresses());
  echo "</pre>";
  print_r($bitcoin->validateaddress('g'));
?>
</html>
