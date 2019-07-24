<?php
	include("login.php");
  include("buy.php"); // TODO
  include("sell.php"); // TODO
  <script src="/js/graph.js"></script>
	if (isset($_SESSION['username'])){
	include("coinhandler.php");}
?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stylesheet2.css">
<meta charset="utf-8">
<title>Kex - the Online Crypto Exchange.</title>
</head>

<body>


<div id="headBar"><p class="logoFont">Kex</p></div>

	<div id="userInfo"><?php 
			if (isset($_SESSION['username']))
			{
				echo('<p>Welcome, <b>'.$_SESSION['username'].'</b>! Your current balance is: '.$btcbalance.' BTC + ' .$kegbalance.' KEG</p>');
			}
			else
            {
				echo('<p>User not logged in.</p>');
			}
?>
</div>


	<div id="container">
		<div id="nav">
        
<?php 
			if (isset($_SESSION['username']))
			{
				echo('
			- <a href="deposit.php">Deposit</a><br>
            - <a href="withdraw.php">Withdraw</a><br>
            - <a href="accountsettings.php">Account Settings</a><br>
            - <a href="logout.php">Log out</a>');
		}
		else
		//display login form
		{
			echo('<p>Log in:</p><form action="login.php" method="post">
            	<p>Username:</p> <input name="username" type="text" />
                <p>Password:</p> <input name="password" type="password" />
                <input type="submit" value="Go" /></form>
				</p><a href="registrationform.php">Register</a></p>');
		}
			?>
			
    	</div>
    
		<div id="main">
		
	
	$UNIT = $_GET['u'];	
	$PERIOD = $_GET['p'];
        $COIN_NAME = $_GET['coin'];
	
			
      plotGraph();
      $.getJSON("https://api.kex.com/v1/price/?coin=".$COIN_NAME."&p=".$PERIOD., $RESULT);
      $PRICE = result.last; // current prce
      $VOL = result.volumebtc; // daily volume
      $CHANGE = result.change; // change since yesterday
      $HIGH = result.high; // highest prce today
      $LOW = result.low; //  loest prce today
			echo('
			<p> Current '.$COIN_NAME.' price: <b>' .$PRICE. .$UNIT.' </b>
      <p> Current '.$COIN_NAME.' 24 Hr Volume: <b>' .$VOL. .$UNIT.' </b>
      <p> 24 Hr '.$COIN_NAME.' price change: <b>' .$CHANGE.'% </b>
      <p> 24 Hr ''.$COIN_NAME. high': <b>' .$HIGH. .$UNIT.' </b>
	      <p> 24 Hr  '.$COIN_NAME.' low: <b>' .$LOW. .$UNIT.' </b>
      '); 
      buyButton(.$COIN_NAME..$UNIT); // TODO
      sellButton(.$COIN_NAME..$UNIT); // TODO
	

		</div>
        
</div>
<div id="footer"><p>Kex 2019</p></div>


</body>
</html>
