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
      plotGraph();
      $.getJSON("https://api.kex.com/v1/price/$COIN_NAME", $RESULT);
      $KEGCOIN_PRICE = result.last;
      $KEGCOIN_VOL = result.volumebtc;
      $KEGCOIN_CHANGE = result.change;
      $KEGCOIN_HIGH = result.high;
      echo('
			<p> Current Kegcoin price: <b>' .$KEGCOIN_PRICE.' USD </b>
      <p> Current Kegcoin 24 Hr Volume: <b>' .$KEGCOIN_VOL.' USD </b>
      <p> 24 Hr Kegcoin price change: <b>' .$KEGCOIN_CHANGE.'% </b>
      <p> 24 Hr high: <b>' .$KEGCOIN_HIGH.' USD </b>
      '); 
      buyButton(kegusd); // TODO
      sellButton(kegusd); // TODO
	

		</div>
        
</div>
<div id="footer"><p>Kex 2019</p></div>


</body>
</html>
