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

			<h1 class="title">pfadinet - das Portal f&uuml;r Pfadfinder</h1>
			<div class="entry">
				<p>Wenn du jetzt gerade nach Hause gekommen bist von einer 
				Pfadi&uuml;bung. Gut gelaunt, weil die &Uuml;bung ein Hit war. Dann bist 
				du hier, bei <em>pfadinet</em> gefragt. Mache es m&ouml;glich, dass 
				auch andere Pfadis diese coole &Uuml;bung erleben d&uuml;rfen. Stelle Sie 
				hier ins Internet und teile deine Freude mit anderen Pfadis aus 
				der Schweiz.</p>
				<p>Es kann aber auch sein, dass du zur Zeit mit deinen 
				Pfadikollegen krampfhaft nach einer &Uuml;bung f&uuml;r den n&auml;chsten 
				Samstag suchst. Das Wetter ist schlecht, es ist kalt und ihr 
				habt keine Ahnung, wie ihr den n&auml;chsten Samstagnachmittag &uuml;ber 
				die B&uuml;hne bringen k&ouml;nntet. Auch hier schafft pfadinet Abhilfe. 
				Benutze unsere Suchfunktion um genau die &Uuml;bungen zu finden, die 
				f&uuml;r deinen n&auml;chsten Samstagnachmittag zutreffen w&uuml;rde.</p>
				<p><em>pfadinet</em> steht noch ganz am Anfang seiner 
				Lebenszeit. Du kannst einer der ersten sein, der die erste 
				richtig tolle &Uuml;bung ins Internet stellt. Somit kannst du dich 
				auch sp&auml;ter noch lange in der Top10 - &Uuml;bungsliste sehen, 
				nat&uuml;rlich mit deinem Pfadinamen.</p>
				<p><em>pfadinet</em> wurde von Atreju gegr&uuml;ndet. Richtig heisse 
				ich Luzi Sennhauser und bin in der Abteilung Dunant aus dem 
				Kanton Z&uuml;rich. Das Projekt <em>pfadinet</em> zieht keinerlei 
				Werbung mit sich und ist absolut nicht aus kommerziellem 
				Hintergrund er&ouml;ffnet worden. <em>pfadinet</em> braucht keine 
				Spenden, nur aktive Besucher, die viele &Uuml;bungen schreiben...</p>
			</div>
		</div>
