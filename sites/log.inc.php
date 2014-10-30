<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<?php
session_start();
error_reporting(0);
$_SESSION['status'] = "";
$status = $_SESSION['status'];
$username = md5($_POST['username']);
$password = md5($_POST['password']);
include("connect.int.php");
	$datenbank = mysql_select_db("###DB_NAME###");
	if(!$datenbank) {
	  $_SESSION['report'] = "Die Datenbank existiert nicht";
	  include("login.inc.php");
	}
	else {
		$abfrage = "SELECT username, password, status FROM members";
	  	$ergebnis = mysql_query($abfrage);
	  	$log = "false";
	  	while($row = mysql_fetch_object($ergebnis))
	    {
	    	if($row->username == $username && $row->password == $password) {
	    		$log = "true";
	    		$status = $row->status;
	    	}
	    }
	    if($log == "true") {
	    	$_SESSION['status'] = $status;
	    	$_SESSION['username'] = $username;
	    	$_SESSION['password'] = $password;
			include("home.inc.php");
	    }
	    else {
	    	$_SESSION['report'] = "Der Benutzername und das Passwort stimmen nicht &uuml;berein";
	    	$username = "";
	    	$password = "";
	    	$status = "";
	    	$_SESSION['username'] = $username;
	    	$_SESSION['password'] = $password;
	    	$_SESSION['status'] = $status;
			include("login.inc.php");
	  	}
	 }
?>