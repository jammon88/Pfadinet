<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="de-ch" />
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="hilfe.css" />
<script language="javascript" type="text/javascript">
<!--
function schliessen() {
window.close();
}
//-->
</script>
</head>

<body>
<?php
$s = "hilfe";
if($_GET['s']) {
	$s = $_GET['s'];
}
?>
<p id="close3"><img src="images/close.png" id="close" onclick="windows.close()" /> <span id="close2" onclick="window.close()">Hilfe schliessen</span></p>

<table style="width: 100%; border-collapse: collapse">
	<tr>
		<td style="width: 154px"><span style="font-weight: 700">Hilfethemen:</span>
		<div id="themen">
		<a href="?s=hilfe">Ben&uuml;zung der Hilfe</a><br />
		<a href="?s=hinzufuegen">&Uuml;bungen hinzuf&uuml;gen</a><br />
		<a href="?s=suche">&Uuml;bungen suchen</a><br />
		<a href="?s=kontakt">Kritik hinterlassen</a><br />
		</div>
		</td>
		<td id="anzeige"><div id="ganzes">
		<?php
		include("hilfe/".$s.".inc.php");
		?>
		</div></td>
	</tr>
</table>

</body>

</html>
