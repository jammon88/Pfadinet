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
	mail("luzi.sennhauser@bluewin.ch", "Kontaktanfrage von pfadinet", $_POST['nachricht'], "From: ".$_POST['name']." <".$_POST['mail'].">");
?>
		<div class="post">
			<h1 class="title">kontakt oder kritik gesendet&nbsp;</h1>
			<div class="entry">
				<p>Ihre Nachricht wurde gesendet. Falls du eine E-Mailadresse 
				eingegeben hast, werde ich mich fr&uuml;her oder sp&auml;ter noch mit dir 
				in Verbindung setzen.</p>
			
			</div>
		</div>
