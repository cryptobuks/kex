<?php
	include("login.php");
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

	<div id="userInfo">
		<?php 
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
			
			
    	</div>
    
		<div id="main">
		
	
	$UNIT = $_GET['u'];	
	$PERIOD = $_GET['p'];
        $COIN_NAME = $_GET['coin'];
	
			
      plotGraph($COIN_NAME,$PERIOD,$UNIT);
      $.getJSON("https://api.kex.com/v1/coin/index.php?c=".$COIN_NAME."&p=".$PERIOD.'&u='.$UNIT., $RESULT);
      $PRICE = result.last; // current prce
      $VOL = result.volumebtc; // daily volume
      $CHANGE = result.change; // change since yesterday
      $HIGH = result.high; // highest prce today
      $LOW = result.low; //  lowest prce today
	echo('
	<p> Current '.$COIN_NAME.' price: <b>' .$PRICE. .$UNIT.' </b>
      <p> Current '.$COIN_NAME.' 24 Hr Volume: <b>' .$VOL. .$UNIT.' </b>
      <p> 24 Hr '.$COIN_NAME.' price change: <b>' .$CHANGE.'% </b>
      <p> 24 Hr ''.$COIN_NAME. high': <b>' .$HIGH. .$UNIT.' </b>
	      <p> 24 Hr  '.$COIN_NAME.' low: <b>' .$LOW. .$UNIT.' </b>
      
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<form action = "/exchange.php">


  <div class="form-group row">
    <label class="col-4 col-form-label" for="Amount (BTC)">Amount (BTC)</label> 
    <div class="col-8">
      <div class="input-group">
        <input id="Amount (BTC)" name="Amount (BTC)" placeholder="0.01" type="text" aria-describedby="Amount (BTC)HelpBlock" required="required" class="form-control"> 
        <div class="input-group-append">
          <div class="input-group-text">BTC</div>
        </div>
      </div> 
      <span id="Amount (BTC)HelpBlock" class="form-text text-muted">Enter the amount you wish to purchase in BTC</span>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>

<form action = "/exchange.php">
  <div class="form-group row">
    <label class="col-4 col-form-label" for="Amount (BTC)">Amount (BTC)</label> 
    <div class="col-8">
      <div class="input-group">
        <input id="Amount (".$TICKER.")" name="Amount (".$TICKER. ")" placeholder="0.01" type="text" aria-describedby="Amount ()HelpBlock" required="required" class="form-control"> 
        <div class="input-group-append">
          <div class="input-group-text">$TICKER</div>
        </div>
      </div> 
      <span id="Amount ()HelpBlock" class="form-text text-muted">Enter the amount you wish to sell in ".$TICKER.</span>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Sell</button>
    </div>
  </div>
</form>
 ");
	

		</div>
        
</div>
<div id="footer"><p>Kex 2019</p></div>


</body>
</html>
