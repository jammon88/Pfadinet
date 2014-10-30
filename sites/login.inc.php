<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<?php
$uebungen = array();
include("connect.int.php");
  $abfrage = "SELECT * FROM uebungen ORDER BY Sortierung DESC";
  $ergebnis = mysql_query($abfrage);
    while($row = mysql_fetch_object($ergebnis))
    {
    if($row->Freigeschalten == "ja") {
    array_push($uebungen, array($row->Titel, $row->Datum, $row->Name, $row->Dauer, $row->sonnig, $row->bewoelkt, $row->neblig, $row->Regen, $row->Schneefall, $row->Sommer, $row->Herbst, $row->Winter, $row->Fruehling, $row->Pfader, $row->Leiter, $row->Vorbereitungszeit, $row->Nachtuebung, $row->Schnee, $row->Beschreibung, $row->Material, $row->id, $row->Kommentare, $row->Bewertung, $row->Aufrufe));
    }
    }
?>
		<div class="post" id="a" style="display:<?php echo ($_SESSION['status'] != 'admin') ? 'block' : 'none'; ?>">
			<h1 class="title">login f&uuml;r administratoren</h1>
			<div class="entry">
				<p>Um Eintr&auml;ge freizugeben oder bestehende Eintr&auml;ge zu l&ouml;schen, 
				musst du Administratorrechte besitzen.<br />
				Du kannst dich dann im untenstehenden Formular anmelden:</p>
				<p style="text-align: left; margin-left: 80px; display:<?php echo ($_SESSION['report']) ? 'block' : 'none';?>; color:red" id="fehler"><?php echo $_SESSION['report']; $_SESSION['report'] = "";?></p>
			
			<table style="border-width: 0px; background-color:#1A1A1A; width: 300px; position: relative; left: 160px;" style="float:left" align="left">
				<tr>
					<td style="background-image:url('../images/img07.gif'); color: #000000; text-align: left;">

					&nbsp; Login</td>
				</tr>
				<tr>
					<td style="padding: 10px; font-weight:normal; text-align:justify;">
			<form action="?s=log" method="post"><table style="width: 100%">
				<tr>
					<td>Benutzername:</td>
					<td>
						<input name="username" type="text" />
					&nbsp;</td>
				</tr>
				<tr>
					<td>Passwort: </td>
					<td><input name="password" type="password" />&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
					<input name="Submit1" type="submit" value="Login" style="width: 97px" />&nbsp;</td>
				</tr>
			</table></form>
			</td>
				</tr>
			</table>
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
			</div>
		</div>
	<div class="post" id="b" style="display:<?php echo ($_SESSION['status'] == 'admin') ? 'block' : 'none'; ?>">
			<h1 class="title">logout erfolgreich</h1>
			<div class="entry">
				<p>Sie wurden erfolgreich ausgeloggt.<br/>
				<a href="?s=home">Zur Startseite</a> | <a href="?s=login">Neu einloggen</a></p>
			</div>
		</div>
	<?php
	if($_SESSION['status'] == "admin") {
		session_destroy();
	}
	?>