<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<?php
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
  	$timestamp = time();
  	$datum = date("d.m.Y",$timestamp);
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
 $wetter2 = array();
		if($_POST['a1']) {
			array_push($wetter2, "sonnig");
		}
		if($_POST['a2']) {
			array_push($wetter2, "bew&ouml;lkt");
		}
		if($_POST['a3']) {
			array_push($wetter2, "Nebel");
		}
		if($_POST['a4']) {
			array_push($wetter2, "Regen");
		}
		if($_POST['a5']) {
			array_push($wetter2, "Schneefall");
		}
		$wetter = implode(", ", $wetter2);
		$jahreszeit2 = array();
		if($_POST['b1']) {
			array_push($jahreszeit2, "Sommer");
		}
		if($_POST['b2']) {
			array_push($jahreszeit2, "Herbst");
		}
		if($_POST['b3']) {
			array_push($jahreszeit2, "Winter");
		}
		if($_POST['b4']) {
			array_push($jahreszeit2, "Fr&uuml;hling");
		}
		$jahreszeit = implode(", ", $jahreszeit2);
 $stufen2 = array();
		if($_POST['c1']) {
			array_push($stufen2, "0. Stufe");
		}
		if($_POST['c2']) {
			array_push($stufen2, "1. Stufe");
		}
		if($_POST['c3']) {
			array_push($stufen2, "2. Stufe");
		}
		if($_POST['c4']) {
			array_push($stufen2, "3. Stufe");
		}
		if($_POST['c5']) {
			array_push($stufen2, "4. Stufe");
		}
		$stufen = implode(", ", $stufen2);
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
			$schnee2 = "auch mit Schnee ausführbar";
		}
		if($schnee == "0") {
			$schnee2 = "ohne Schnee nicht ausführbar";
		}
  	$abfrage = "SELECT id FROM uebungen ORDER BY id DESC";
 $ergebnis = mysql_query($abfrage);
$row = mysql_fetch_object($ergebnis);
 	    $id = $row->id+1;
$nachricht = "Es wurde eine neue Übung auf http://www.pfadinet.ch.vu eingetragen.

Name: ".$name."
Datum: ".$datum."
Titel: ".$titel."
Dauer: ".$dauer."
Wetter: ".$wetter."
Jahreszeit: ".$jahreszeit."
Pfader: ".$pfader."
Leiter: ".$leiter."
Stufen: ".$stufen."
Vorbereitungszeit: ".$vorbereitung."
Nachtuebung: ".$nacht."
Schnee: ".$schnee2."

Beschreibung: ".$beschreibung."

Material: ".$material."

Zum Login: http://pfadi.spacequadrat.de/index.php?s=login

Mit freundlichen Gr&uuml;ssen
Das pfadinet-Team";
$janein = "";
if($_SESSION['status'] == "admin") {
	$janein = "ja";
}
else {
	$janein = "nein";
	mail("luzi.sennhauser@bluewin.ch", "Neuer Eintrag auf pfadinet", $nachricht, "From: pfadinet <info@pfadinet.ch.vu>");
}
if($_FILES['Protokoll']['name']) {
$endung = substr($_FILES['Protokoll']['name'], -4);
if ( move_uploaded_file( $_FILES['Protokoll']['tmp_name'], "../protokolle/".$id.$endung ) ) 
{ 
    chmod( "../protokolle/".$id.$endung, 0644 ); 
} 
}
$beschreibung = htmlspecialchars($beschreibung);
$material = htmlspecialchars($material);
$material = str_replace("'", "", $material);
$material = str_replace("\"", "", $material);
$beschreibung = str_replace("\"", "", $beschreibung);
$beschreibung = str_replace("'", "", $beschreibung);
$eintrag = "INSERT INTO uebungen (id, Titel, Datum, Name,  Dauer, Kategorie, sonnig, bewoelkt, neblig, Regen, Schneefall, Sommer, Herbst, Winter, Fruehling, Pfader, Leiter, fuenkli, erstestufe, zweitestufe, drittestufe, viertestufe, Vorbereitungszeit, Nachtuebung, Schnee, Beschreibung, Material, Freigeschalten, Bewertung2) VALUES ('$id', '".htmlspecialchars($titel)."', '$datum',  '".htmlspecialchars($name)."', '$dauer', '".htmlspecialchars($kategorie)."', '$sonnig', '$bewoelkt','$neblig','$regen','$schneefall','$sommer','$herbst','$winter','$fruehling','$pfader','$leiter','$fuenkli', '$erstestufe','$zweitestufe','$drittestufe','$viertestufe', '$vorbereitungszeit','$nachtuebung','$schnee','".$beschreibung."','".$material."','".$janein."','0')";
echo $eintrag;
$eintragen = mysql_query($eintrag);
  }
$uebungen = array();
	
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
			<h1 class="title">pfadi&uuml;bung erfolgreich gesendet</h1>
			<div class="entry" style="padding-top:0">
			<p>Deine &Uuml;bung wurde erfolgreich abgeschickt. Nachdem sie von den 
			Administratoren gesichtet und als akzeptiert erkl&auml;rt wurde, wird die 
			&Uuml;bung aufgeschaltet. Dies wird in ein bis zwei Tagen der Fall sein.<br />
			<br />
			<a href="?s=hinzufuegen">Weitere &Uuml;bung registrieren</a><br />
			<a href="?s=uebungen">Zur&uuml;ck zur &Uuml;bungs&uuml;bersicht</a></p>
			</div>
		</div>