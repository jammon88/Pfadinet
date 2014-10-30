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

		<div class="post">
			<h1 class="title">kontakt &amp; kritik</h1>
			<div class="entry">
				<p>Bist du mit dieser Seite und deren Inhalten zufrieden? Oder 
				hast du noch Verbesserungsvorschl&auml;ge?</p>
				<p>Ich freue mich &uuml;ber jede Kritik. Falls du irgend eine 
				Anregung hast, kannst du diese im untenstehenden Formular 
				erl&auml;utern. Ich versuche dann das Problem genauer abzukl&auml;ren und 
				es so schnell wie m&ouml;glich zu beheben.</p>
				<form action="?s=mail" method="post" name="formular" title="formular">
			<table style="border-width: 0px; background-color:#1A1A1A; width: 518px; position: relative; left: 50px;" style="float:left">
				<tr>
					<td style="background-image:url('images/img07.gif'); color: #000000; text-align: left;">

					&nbsp; Kontakt &amp; Kritik</td>
				</tr>
				<tr>
					<td style="padding: 10px; font-weight:normal; text-align:justify;">
			<table style="width: 100%">
				<tr>
					<td style="width: 181px">Mein Name:</td>
					<td><input name="name" type="text" />&nbsp;</td>
				</tr>
				<tr>
					<td style="width: 181px">Meine E-Mailadresse:</td>
					<td><input name="mail" type="text" />&nbsp;</td>
				</tr>
				<tr>
					<td style="width: 181px" valign="top">Nachricht oder Kritik:</td>
					<td>
					<textarea name="nachricht" style="width: 321px; height: 132px;"></textarea>&nbsp;</td>
				</tr>
				<tr>
					<td style="width: 181px" valign="top">&nbsp;</td>
					<td>
					<input name="Submit2" type="button" value="Absenden" onclick="senden2()" />&nbsp;</td>
				</tr>
			</table>
			</td>
				</tr>
			</table></form>
			
			</div>
		</div>
