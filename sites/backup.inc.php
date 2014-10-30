<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<?php
chdir('../');
include('check.php');
chdir('sites/');
$uebungen = array();
include("connect.int.php");
  $abfrage = "SELECT * FROM uebungen";
  $ergebnis = mysql_query($abfrage);
    while($row = mysql_fetch_object($ergebnis))
    {
    array_push($uebungen, array($row->id, $row->Titel, $row->Datum, $row->Name, $row->Dauer, $row->Kategorie, $row->sonnig, $row->bewoelkt, $row->neblig, $row->Regen, $row->Schneefall, $row->Sommer, $row->Herbst, $row->Winter, $row->Fruehling, $row->Pfader, $row->Leiter, $row->fuenkli, $row->erstestufe, $row->zweitestufe, $row->drittestufe, $row->viertestufe, $row->Vorbereitungszeit, $row->Nachtuebung, $row->Schnee, $row->Beschreibung, $row->Material, $row->Freigeschalten, $row->Kommentare, $row->Bewertung, $row->Bewertung2, $row->Aufrufe, $row->Sortierung));
    }
?>
		<div class="post">
			<h1 class="title">backup</h1>
			<div class="entry" style="padding-top:0">
			<p><a href="?s=backup&a=erst">Backup erstellen</a></p>
			<p><?php if($_GET['a'] != "load" && $_GET['a'] != "erst") { ?>Du kannst auch alte Backups hervorholen. Beachte:
	<span style="font-style: italic">Die neuen Daten werden dadurch 
	&uuml;berschrieben!</span> Wenn du den aktuellen Stand mit einem alten Backup 
	&uuml;berschreiben willst, klicke auf dasjenige Datum:</p>
	<p><?php
	$handle=opendir ("../backup/");
	while ($datei = readdir ($handle)) {
	if($datei != "." && $datei != ".." && substr($datei, -4) == ".txt") {
	 echo "<a href='?s=backup&a=load&d=".substr($datei, 0, -4)."'>".substr($datei, 0, -4)."</a><br>";
	}
	}
	closedir($handle);
	} else {
	?>
	Bitte warten...
	<?php } 
	
	if($_GET['a'] == "erst" || $_GET['a'] == "load") {
	$zuschreiben = "CREATE TABLE  `web2s3113sql1`.`uebungen` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, `Titel` VARCHAR(50) NOT NULL, `Datum` VARCHAR(10) NOT NULL, `Name` VARCHAR(30) NOT NULL, `Dauer` VARCHAR(3) NOT NULL, `Kategorie` INT(1) NOT NULL, `sonnig` INT(1) NOT NULL, `bewoelkt` INT(1) NOT NULL, `neblig` INT(1) NOT NULL, `Regen` INT(1) NOT NULL, `Schneefall` INT(1) NOT NULL, `Sommer` INT(1) NOT NULL, `Herbst` INT(1) NOT NULL, `Winter` INT(1) NOT NULL, `Fruehling` INT(1) NOT NULL, `Pfader` VARCHAR(5) NOT NULL, `Leiter` VARCHAR(5) NOT NULL, `fuenkli` INT(1) NOT NULL, `erstestufe` INT(1) NOT NULL, `zweitestufe` INT(1) NOT NULL, `drittestufe` INT(1) NOT NULL, `viertestufe` INT(1) NOT NULL, `Vorbereitungszeit` VARCHAR(2) NOT NULL, `Nachtuebung` INT(1) NOT NULL, `Schnee` INT(1) NOT NULL, `Beschreibung` LONGTEXT NOT NULL, `Material` LONGTEXT NOT NULL, `Freigeschalten` VARCHAR(4) NOT NULL, `Kommentare` LONGTEXT NULL, `Bewertung` LONGTEXT NULL, `Bewertung2` INT( 10 ) NOT NULL, `Aufrufe` INT(20) NOT NULL, `Sortierung` INT( 20 ) NOT NULL) ENGINE = MYISAM#";
	for($i = 0; $i < count($uebungen); $i++) {
		$zuschreiben .= "INSERT INTO `uebungen` (`id` ,`Titel` ,`Datum` ,`Name` ,`Dauer` ,`Kategorie` ,`sonnig` ,`bewoelkt` ,`neblig` ,`Regen` ,`Schneefall` ,`Sommer` ,`Herbst` ,`Winter` ,`Fruehling` ,`Pfader` ,`Leiter` ,`fuenkli` ,`erstestufe` ,`zweitestufe` ,`drittestufe` ,`viertestufe` ,`Vorbereitungszeit` ,`Nachtuebung` ,`Schnee` ,`Beschreibung` ,`Material` ,`Freigeschalten` ,`Kommentare` ,`Bewertung` ,`Bewertung2` ,`Aufrufe` ,`Sortierung`) VALUES ('".$uebungen[$i][0]."', '".$uebungen[$i][1]."', '".$uebungen[$i][2]."', '".$uebungen[$i][3]."', '".$uebungen[$i][4]."', '".$uebungen[$i][5]."', '".$uebungen[$i][6]."', '".$uebungen[$i][7]."', '".$uebungen[$i][8]."', '".$uebungen[$i][9]."', '".$uebungen[$i][10]."', '".$uebungen[$i][11]."', '".$uebungen[$i][12]."', '".$uebungen[$i][13]."', '".$uebungen[$i][14]."', '".$uebungen[$i][15]."', '".$uebungen[$i][16]."', '".$uebungen[$i][17]."', '".$uebungen[$i][18]."', '".$uebungen[$i][19]."', '".$uebungen[$i][20]."', '".$uebungen[$i][21]."', '".$uebungen[$i][22]."', '".$uebungen[$i][23]."', '".$uebungen[$i][24]."', '".$uebungen[$i][25]."', '".$uebungen[$i][26]."', '".$uebungen[$i][27]."', '".$uebungen[$i][28]."', '".$uebungen[$i][29]."', '".$uebungen[$i][32]."', '".$uebungen[$i][30]."', '".$uebungen[$i][31]."')#";


	}
	$timestamp = time();
	$datum = date("d.m.Y",$timestamp);
	$datei = fopen("../backup/".$datum.".txt", "w");
	fwrite($datei, $zuschreiben);
	
}
if($_GET['a'] == "load" && $_GET['d']) {
	$datei = fopen("../backup/".$_GET['d'].".txt", "r");
	$abfrage = "";
	while(!feof($datei)) {
		$zeile = fgets($datei, 10000);
		$abfrage .= $zeile.'\n';
	}
	$abfrage = substr($abfrage, 0, -2);
	$abfrage = explode('#', $abfrage);
	for($i = 0; $i < count($abfrage); $i++) {
	   $ergebnis = mysql_query($abfrage[$i]);
	}
 }

	
	?>
	</p>
		</div>
		</div>
	


	