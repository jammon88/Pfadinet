<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<?php
chdir('../');
include('check.php');
chdir('sites/');
$uebungen = array();
  	$sonnig = "";
  	$bewoelkt = "";
  	$neblig = "";
  	$regen = "";
  	$schneefall = "";
  	$sommer = "";
  	$herbst = "";
  	$winter = "";
  	$fruehling = "";
  	$fuenkli = "";
  	$erstestufe = "";
  	$zweitestufe = "";
  	$drittestufe = "";
  	$viertestufe = "";
include("connect.int.php");
  if($_POST['neu']) {
  	$titel = $_POST['Titel'];
  	$datum = $_POST['Datum'];
  	$name = $_POST['Name'];
  	$dauer = $_POST['Dauer'];
  	$kategorie = $_POST['Kategorie'];
  	if($_POST['a1']) {
  		$sonnig = "1";
  	}
  	else {
  		$sonnig = "0";
  	}
  	if($_POST['a2']) {
  		$bewoelkt = "1";
  	}
  	else {
  		$bewoelkt = "0";
  	}
  	if($_POST['a3']) {
  		$neblig = "1";
  	}
  	else {
  		$neblig = "0";
  	}
  	if($_POST['a4']) {
  		$regen = "1";
  	}
  	else {
  		$regen = "0";
  	}
  	if($_POST['a5']) {
  		$schneefall = "1";
  	}
  	else {
  		$schneefall = "0";
  	}
  	if($_POST['b1']) {
  		$sommer = "1";
  	}
  	else {
  		$sommer = "0";
  	}
  	if($_POST['b2']) {
  		$herbst = "1";
  	}
  	else {
  		$herbst = "0";
  	}
  	if($_POST['b3']) {
  		$winter = "1";
  	}
  	else {
  		$winter = "0";
  	}
  	if($_POST['b4']) {
  		$fruehling = "1";
  	}
  	else {
  		$fruehling = "0";
  	}
	$pfader = $_POST['Pfader'];
	$leiter = $_POST['Leiter'];
	if($_POST['c1']) {
  		$fuenkli = "1";
  	}
  	else {
  		$fuenkli = "0";
  	}
  	if($_POST['c2']) {
  		$erstestufe = "1";
  	}
  	else {
  		$erstestufe = "0";
  	}
  	if($_POST['c3']) {
  		$zweitestufe = "1";
  	}
  	else {
  		$zweitestufe = "0";
  	}
  	if($_POST['c4']) {
  		$drittestufe = "1";
  	}
  	else {
  		$drittestufe = "0";
  	}
  	if($_POST['c5']) {
  		$viertestufe = "1";
  	}
  	else {
  		$viertestufe = "0";
  	}
	$vorbereitungszeit = $_POST['Vorbereitungszeit'];
	$nachtuebung = "";
	 if($_POST['Nachtuebung']) {
  		$nachtuebung = "1";
  	}
  	else {
  		$nachtuebung = "0";
  	}
  	$schnee = "";
  	if($_POST['Schnee']) {
  		$schnee = "1";
  	}
  	else {
  		$schnee = "0";
  	}
  	$beschreibung = $_POST['Beschreibung'];
  	$material = $_POST['Material'];
  	$noch = true;
  	$zahl = "0";
  	$comments = array();
  	while($noch) {
	  	$towrite = "";
	  	$a = "Name".$zahl;
	  	$b = "Datum".$zahl;
	  	$c = "Kommentare".$zahl;
	  	$d = "Loeschen".$zahl;
	  	if($_POST[$a] || $_POST[$b] || $_POST[$c]) {
	  		if(!$_POST[$c]) {
		  		array_push($comments, $_POST[$a]."|".$_POST[$b]."|".$_POST[$c]);
		  	}
	  	}
	  	else {
	  		$noch = false;
	  	}
		$zahl++;
  	}
  	$kommentare = implode("$", $comments);
  	$bewertung = $_POST['Bewertung'];
  	$bewertungd = $_POST['BewertungD'];
  	$aufrufe = $_POST['Aufrufe'];
  	$sortierung = $_POST['Sortierung'];
  	$freigeschalten = "";
  	$id=$_POST['id'];
  	if($_POST['Freigeschalten'] == "1") {
  		$freigeschalten = "ja";
  	}
  	else {
  		$freigeschalten = "nein";
  	}
 $wetter2 = array();
		if($uebungen[$i][4] == "1") {
			array_push($wetter2, "sonnig");
		}
		if($uebungen[$i][5] == "1") {
			array_push($wetter2, "bew&ouml;lkt");
		}
		if($uebungen[$i][6] == "1") {
			array_push($wetter2, "Nebel");
		}
		if($uebungen[$i][7] == "1") {
			array_push($wetter2, "Regen");
		}
		if($uebungen[$i][8] == "1") {
			array_push($wetter2, "Schneefall");
		}
		$wetter = implode(", ", $wetter2);
		$jahreszeit2 = array();
		if($uebungen[$i][9] == "1") {
			array_push($jahreszeit2, "Sommer");
		}
		if($uebungen[$i][10] == "1") {
			array_push($jahreszeit2, "Herbst");
		}
		if($uebungen[$i][11] == "1") {
			array_push($jahreszeit2, "Winter");
		}
		if($uebungen[$i][12] == "1") {
			array_push($jahreszeit2, "Fr&uuml;hling");
		}
		$jahreszeit = implode(", ", $jahreszeit2);
		$vorbereitung = "";
							if($vorbereitungszeit == "5+") {
								$vorbereitung = "mehr als 5 Stunden";
							}
							else if($vorbereitungszeit == "0") {
								$vorbereitung = "keine";
							}
							else {
								if($vorbereitungszeit >= 10) {
								$vorbereitung = $vorbereitungszeit." Minuten";
								}
								if($vorbereitungszeit == 1) {
								$vorbereitung = $vorbereitungszeit." Stunde";
								}
								if($vorbereitungszeit > 1 && $uebungen[$i][15] < 5) {
								$vorbereitung = $vorbereitungszeit." Stunden";
								}
							}
		$nacht = "";
		if($nachtuebung == "1") {
			$nacht = "ja";
		}
		if($nachtuebung == "0") {
			$nacht = "nein";
		}
		$schnee2 = "";
		if($schnee == "1") {
			$schnee2 = "auch mit Schnee ausf&uuml;hrbar";
		}
		if($schnee == "0") {
			$schnee2 = "ohne Schnee nicht ausf&uuml;hrbar";
		}
$loeschen = "DELETE FROM uebungen WHERE id = '".$id."'";
$losch = mysql_query($loeschen);
$eintrag = "INSERT INTO uebungen (id, Titel, Datum, Name,  Dauer, Kategorie, sonnig, bewoelkt, neblig, Regen, Schneefall, Sommer, Herbst, Winter, Fruehling, Pfader, Leiter, fuenkli, erstestufe, zweitestufe, drittestufe, viertestufe, Vorbereitungszeit, Nachtuebung, Schnee, Beschreibung, Material, Freigeschalten, Kommentare, Bewertung, Bewertung2, Aufrufe, Sortierung) VALUES ('$id', '".htmlspecialchars($titel)."', '$datum',  '".htmlspecialchars($name)."', '$dauer', '".htmlspecialchars($kategorie)."', '$sonnig', '$bewoelkt','$neblig','$regen','$schneefall','$sommer','$herbst','$winter','$fruehling','$pfader','$leiter','$fuenkli', '$erstestufe','$zweitestufe','$drittestufe','$viertestufe', '$vorbereitungszeit','$nachtuebung','$schnee','".htmlspecialchars($beschreibung)."','".htmlspecialchars($material)."','".htmlspecialchars($freigeschalten)."','".htmlspecialchars($kommentare)."','$bewertung','$bewertungd','$aufrufe','$sortierung')";
$eintragen = mysql_query($eintrag);
  }
$uebungen = array();
	
  $abfrage = "SELECT * FROM uebungen ORDER BY Sortierung DESC";
  $ergebnis = mysql_query($abfrage);
    while($row = mysql_fetch_object($ergebnis))
    {
    if($row->Freigeschalten == "ja") {
    array_push($uebungen, array($row->Titel, $row->Datum, $row->Name, $row->Dauer, $row->sonnig, $row->bewoelkt, $row->neblig, $row->Regen, $row->Schneefall, $row->Sommer, $row->Herbst, $row->Winter, $row->Fruehling, $row->Pfader, $row->Leiter, $row->Vorbereitungszeit, $row->Nachtuebung, $row->Schnee, $row->Beschreibung, $row->Material, $row->id, $row->Kommentare, $row->Bewertung, $row->Aufrufe, $row->Bewertung2));
    }
    }
?>

		<div class="post">
			<h1 class="title">pfadi&uuml;bung erfolgreich bearbeitet</h1>
			<div class="entry" style="padding-top:0">
			<p>Die &Uuml;bung wurde erfolgreich bearbeitet<br />
			<br />
			<a href="?s=uebungen">Zur&uuml;ck zur &Uuml;bungs&uuml;bersicht</a><br>
			<a href="?s=freischalten2">&Uuml;bungen freischalten</a><br>
			</p>
			</div>
		</div>