<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<div class="post">
		<?php
$uebungen = array();
	include("save/connect.int.php"); 	
  $abfrage = "SELECT * FROM uebungen ORDER BY Sortierung DESC";
  $ergebnis = mysql_query($abfrage);
    while($row = mysql_fetch_object($ergebnis))
    {
    if($row->Freigeschalten == "ja") {
    array_push($uebungen, array($row->Titel, $row->Datum, $row->Name, $row->Dauer, $row->sonnig, $row->bewoelkt, $row->neblig, $row->Regen, $row->Schneefall, $row->Sommer, $row->Herbst, $row->Winter, $row->Fruehling, $row->Pfader, $row->Leiter, $row->Vorbereitungszeit, $row->Nachtuebung, $row->Schnee, $row->Beschreibung, $row->Material, $row->id, $row->Kommentare, $row->Bewertung, $row->Aufrufe));
    }
    }
?>

			<h1 class="title" style="margin-top:100px">Bitte warten...</h1>
		<p>Die Seite wird geladen. Bitte haben Sie etwas Geduld...</p>
		</div>

