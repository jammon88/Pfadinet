<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<div class="post">
		<?php
$uebungen = array();
if($_GET['pass'] != "Dwd59WdowXe8211s") {
	include("error.inc.php");
	exit;
}
	include("save/connect.int.php"); 
		$timestamp = time();
		$datum = date("d.m.Y",$timestamp);
  $abfrage = "SELECT * FROM uebungen WHERE Freigeschalten = 'ja' AND Datum = '".$datum."' ORDER BY Sortierung DESC";
  $ergebnis = mysql_query($abfrage);
    while($row = mysql_fetch_object($ergebnis))
    {
    array_push($uebungen, array($row->Titel, $row->Datum, $row->Name, $row->Dauer, $row->sonnig, $row->bewoelkt, $row->neblig, $row->Regen, $row->Schneefall, $row->Sommer, $row->Herbst, $row->Winter, $row->Fruehling, $row->Pfader, $row->Leiter, $row->Vorbereitungszeit, $row->Nachtuebung, $row->Schnee, $row->Beschreibung, $row->Material, $row->id, $row->Kommentare, $row->Bewertung, $row->Aufrufe));
    }
?>

			<h1 class="title">Newsletter-Versand</h1>
			<div class="entry">
				<?php if(mysql_num_rows($ergebnis) == '0') {
				echo "Es hat keine neuen &Uuml;bungen. Darum werden keine Newsletter versendet!";
				}
				else {
				echo "Die neuen &Uuml;bungen werden nun versandt an:
			<br>";
					$ueb = "";
					$i = 0;
	while($uebungen[$i]) {
		$datei1 = "http://uebungen.scout.ch/save/newsletter.dat";
			$teile1 = file($datei1);
			for($i = 0; $i < count($teile1); $i++) {
				if($teile1[$i] != "") {
					$teile2 = explode('|', $teile1[$i]);
					echo $teile2[0]."<br>";
					
					
					$Empfaenger = "luzi.sennhauser@bluewin.ch"; 
					$Betreff = "pfadinet-Newsletter"; 
					
					$Nachricht = " 
					<html> 
					<head> 
					<title>pfadinet-Newsletter (Neue &Uuml;bungen)</title> 
					</head> 
					<body bgcolor=\"black\" text=\"white\">";
					$da = fopen("uebungen.inc.php", "r");
					$a .= file($da);
					for($i = 0; $i < count($a); $i++) {
						$Nachricht .= $a[$i];
					}
					$Nachricht .= "</body></html>";
					$Header = "MIME-Version: 1.0\n"; 
					$Header .= "Content-type: text/html; charset=iso-8859-1\n"; 
					$Header .= "From: Mein Name <meine@mailadresse.de>\n"; 
					
					mail($Empfaenger, $Betreff, $Nachricht, $Header); 
					
					
					
					
				}
			}
		
			?>
			</div>
		</div>
