<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<?php
ob_start();
session_start();
error_reporting(0);
$_SESSION['status'] = "";
$status = $_SESSION['status'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$verbindung = mysql_connect("localhost", "###USERNAME###","###PASSWORD###");
if(!$verbindung) {
  $_SESSION['report'] = "Es konnte keine Verbindung zur Datenbank hergestellt werden";
	    	echo "<meta http-equiv='refresh' content='0; URL=index.php?s=login'>";
	    	exit;
}
else {
	$datenbank = mysql_select_db("###DB_NAME###");
	if(!$datenbank) {
	  $_SESSION['report'] = "Die Datenbank existiert nicht";
	    	echo "<meta http-equiv='refresh' content='0; URL=index.php?s=login'>";
	    	exit;
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
	    }
	    else {
	    	$_SESSION['report'] = "Du musst dich zuerst einloggen, bevor du Zugriff auf diese Seite bekommst";
	    	$username = "";
	    	$password = "";
	    	$status = "";
	    	$_SESSION['username'] = $username;
	    	$_SESSION['password'] = $password;
	    	$_SESSION['status'] = $status;
	    	echo "<meta http-equiv='refresh' content='0; URL=index.php?s=login'>";
	    	exit;
	  	}
	 }
}
ob_end_flush();
?>