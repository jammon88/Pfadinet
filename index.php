<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<?php
session_start();
include("softcheck.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include("save/head.inc.php");
?>
<body <?php
if($_GET['s'] == "backup" && ($_GET['a'] == "load" || $_GET['a'] == "erst")) {
	echo "onload='weiterleitung()'";
}
?>>
<!-- start header -->
<?php 
include("save/titel.inc.php");
?>
<!-- end header -->
<!-- start menu -->
<?php
include("save/menu.inc.php");
?>
<!-- end menu -->
<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="content">
		<?php 
			if($_GET['s'] && !$inc) {
			if(file_exists("sites/".$_GET['s'].".inc.php")) {
				include("sites/".$_GET['s'].".inc.php");
			}
			else {
				include("sites/error.inc.php");
			}
			}
			if($inc) {
				include("sites/warten.int.php");
			}
		?>
	</div>
	<!-- end content -->
	<!-- start sidebar -->
<?php include("save/sidebar.inc.php");
?>
	<!-- end sidebar -->
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end page -->
<div id="footer">
	<p id="legal">©2007 All Rights Reserved. Designed by <a href="http://www.freecsstemplates.org/">
	Free CSS Templates</a></p>
	<p id="links"><a href="#">Privacy</a> | <a href="#">Terms</a> | <a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional"><abbr title="eXtensible HyperText Markup Language">
	XHTML</abbr></a> | <a href="http://jigsaw.w3.org/css-validator/check/referer" title="This page validates as CSS"><abbr title="Cascading Style Sheets">
	CSS</abbr></a></p>
</div>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-6627199-8");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>
