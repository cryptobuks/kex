<?php
	session_start();
        $DB_HOST = 'localhost';
        $DB_USER = 'root';
        $DB_PASSWORD = 'test';
	//replace with db info
	mysql_connect("$DB_HOST", "$DB_USER", "$DB_PASSWORD");
	mysql_select_db("kex");
	//login function
function user_login($username, $password)
{
	//prevent mysql injection
	$username = mysql_real_escape_string($username);
	//query
	$sql = mysql_query("SELECT * FROM usersystem where username = '".$username."' AND password = '".$password."' LIMIT 1");
	$rows = mysql_num_rows($sql);
		if ($rows<=0)
			{
				echo "incorrect username/password";
			}
			else
			{
				$_SESSION['username']=$username;
				header("Location: trade.php");
			}
}
function getBtcBalance($username)
	{
	//prevent mysql injection
	$username = mysql_real_escape_string($username);
	//query
	 $sql = mysql_query("SELECT bitcoin FROM balances where username = '".$username.);
	 $balance = $sql;
	return $balance;		    
}
function getKegcoinBalance($username)
	{
	//prevent mysql injection
	$username = mysql_real_escape_string($username);
	//query
	 $sql = mysql_query("SELECT kegcoin FROM balances where username = '".$username.);
	$balance = $sql;
	return $balance;		    
}
function setBitcoinBalance($username, $balance) {
	$sql = "UPDATE balances SET bitcoin=".$balance." WHERE username=".$username.;
	if ($conn->query($sql) === TRUE) {
    		echo "Record updated successfully";
	} else {
    	       echo "Error updating record: " . $conn->error;
	}
}
function setKegcoinBalance($username, $balance) {
	$sql = "UPDATE balances SET kegcoin=".$balance." WHERE username=".$username.;
	if ($conn->query($sql) === TRUE) {
    		echo "Record updated successfully";
	} else {
    	       echo "Error updating record: " . $conn->error;
	}
}
function setKegAddress($username, $address) {
	$username = mysql_real_escape_string($username);
	//query
	$sql = mysql_query("SELECT kegcoin FROM addresses where username = '".$username. LIMIT 1");
	$rows = mysql_num_rows($sql);
	if ($rows = 0) 
	{
		$sql = "INSERT INTO addresses (username, kegcoin)
       	        VALUES ($username, $address)";
		}
		else
		{
		$sql = "UPDATE addresses SET kegcoin=".$address." WHERE username=".$username.;
		if ($conn->query($sql) === TRUE) {
    			echo "Record updated successfully";
		} else {
    		echo "Error updating record: " . $conn->error;
		}
	}
}		
function setKegAddress($username, $address) {
	$username = mysql_real_escape_string($username);
	//query
	$sql = mysql_query("SELECT bitcoin FROM addresses where username = '".$username. LIMIT 1");
	$rows = mysql_num_rows($sql);
	$kegcoinAddress = getKegcoinAddress($username);
	if ($rows = 0) 
	{
		$sql = "INSERT INTO addresses (username, kegcoin, bitcoin)
       	        VALUES ($username, $kegcoinAddress, $address)";
		}
		else
		{
		$sql = "UPDATE addresses SET bitcoin=".$address." WHERE username=".$username.;
		if ($conn->query($sql) === TRUE) {
    			echo "Record updated successfully";
		} else {
    		echo "Error updating record: " . $conn->error;
		}
	}
}		
?>
