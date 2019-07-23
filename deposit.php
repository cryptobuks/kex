<?php
	include("login.php");
	if (isset($_SESSION['username'])){include("coinhandler.php");}
?>

<!doctype html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
</head>
<link rel="stylesheet" type="text/css" href="stylesheet2.css">
<meta charset="utf-8">
<title>Kex - The Online Crypto Exchange</title>
</head>

<body>
<script
    src="https://www.paypal.com/sdk/js?client-id=SB_CLIENT_ID"> // replace SB_CLIENT_ID with your paypal sandbox client id
</script>
<script
    src="https://www.paypal.com/sdk/js?client-id=SB_CLIENT_ID">
  </script>

  <div id="paypal-button-container"></div>

  <script>
    paypal.Buttons().render('#paypal-button-container');
  </script>
  
<div id="headBar"><p class="logoFont">Kex</p></div>

	<div id="userInfo">
    
    <?php
	if (isset($_SESSION['username'])){
		echo('<p>Welcome, <b>'.$_SESSION['username'].'</b>! Your current BTC balance is: '.$btcbalance.' BTC and '.$kegbalance. ' KEG </p>');
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
		echo('- <a href="deposit.php">Deposit</a><br>
            - <a href="withdraw.php">Withdraw</a><br>
	    - <a href="https://discord.gg/5rBztsJ">Support</a><br>
            - <a href="accountsettings.php">Account Settings</a><br>
            - <a href="logout.php">Log out</a>');
			
		}
		else
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
             <?php
			if (isset($_SESSION['username']))
			{
				echo('<h3>Deposit Bitcoin</h3>
				<p>To deposit Bitcoin into your account, use the following address:</p>
				<h4>'.$address.'</h4> 
				<p><b><a href="newbtcaddress.php">Get new address</a></b></p>
				<br>
				<p>A new address will appear every time you refresh or visit this page. You may use any of the addresses previously associated with your account. However doe maximum annonimility, it is recommended to use a different address for each deposit you make.</p>
        <p>Warning: it may take up to 1-2 hours for the block chain to confirm your deposit.</p>
				<p><b>WARNING: Kex holds no responsbility for lost BTC due to Mining to a addres or using a incorrect address. We CAN NOT recover lost btc and you will not recieve a refund on any lost btc.</b></p>');
				echo('<h3>Deposit Kegcoin</h3>
				<p>To deposit Kegcoin into your account, use the following address:</p>
				<h4>'.$address.'</h4> 
				<p><b><a href="getkegaddress.php">Get new address</a></b></p>
				<br>
				<p>The <b>SAME</b> address will appear every time you visit this page. You MUST use the address associated with your account.</p>
                                <p>Warning: it may take up to 1-2 hours for the block chain to confirm your deposit. Depending on current transaction pool size</p>
				<p><b>WARNING: Kex holds no responsbility for lost BTC due to Mining to a address or using a incorrect address. We CAN NOT recover lost btc and you will not recieve a refund on any lost btc.</b></p>
			        <p> Your Adrress is subject to change without notice at any time, please do NOT mine to Your exchange address as coins sent to a old adress wil not be recoverable and will be permanantly lost.</p>');
			        echo('<h3>Deposit USD</h3>
				<p>To deposit USD into your account, use the following options:</p>
				<p> NOTE: This will deposit <b>$5 (5 USD)</b> into your account. Varable Deposit amounts are soon going to be implemnted.</p>
				</p> If you wish to deposits large amounts (100s of USD) Please email us at deposits@kex.com to arange a alternative method of transfer</p>');
				<script>
 			          paypal.Buttons({
   				    createOrder: function(data, actions) {
      				      // Set up the transaction
     				      return actions.order.create({
        				purchase_units: [{
          				  amount: {
            				    value: '5.00' // 5 USD (TODO: Implment varable Deposit amount)
          				  }
        			        }]
      				      });
    				     }
  				     onApprove: function(data, actions) {
      				      return actions.order.capture().then(function(details) {
        			       alert('Transaction completed by ' + details.payer.name.given_name);
        			       // Call your server to save the transaction
				       return fetch('/paypal-transaction-complete', {
          			        method: 'post',
          			        headers: {
            			         'content-type': 'application/json'
          			        },
          			        body: JSON.stringify({
            			         orderID: data.orderID
		  		        })
        			       });
      				     });
    				    }
  				  }).render('#paypal-button-container');
				</script>				
			}
			
			else
			{
				echo('<h3>Deposit</h3><p><b>Error:</b> User not logged in.</p>');
			}
			?>
		</div>
</div>
<div id="footer"><p>Kex 2019</p></div>

</body>
</html>
