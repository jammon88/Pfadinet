<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<body onload="starten()">
<?php
  $aufrufe = "";
$uebungen = array();
include("connect.int.php");
  if($_GET['id']) {
  	if($_POST['Kommentar']) {
  	  			$schonkom = "";
  			$dazu = "";
  			$zuschreiben = "";
  $abfrageb = "SELECT id, Kommentare FROM uebungen WHERE id = '".$_GET['id']."'";
  $ergebnisb = mysql_query($abfrageb);
    while($rowb = mysql_fetch_object($ergebnisb))
    {
	$schonkom = $rowb->Kommentare;
    }
  		if($schonkom) {
  			$dazu = "$";
  		}
  		$timestamp = time();
  		$datum = date("d.m.Y",$timestamp);
  		$n = str_replace('|', '/', str_replace('$', '', $_POST['Name']));
  		$k = str_replace('|', '/', str_replace('$', '', $_POST['Kommentar']));
  		$zuschreiben = $schonkom.$dazu.$n."|".$datum."|".$k;
  		$updatec = "UPDATE uebungen Set Kommentare = '".$zuschreiben."' WHERE id = '".$_GET['id']."'";
  		$up = mysql_query($updatec);
  	}
  $abfrage1 = "SELECT id, Bewertung, Aufrufe FROM uebungen WHERE id = '".$_GET['id']."'";
  $ergebnis1 = mysql_query($abfrage1);
  $schon = "";
    while($row = mysql_fetch_object($ergebnis1))
    {
	$schon = $row->Bewertung;
	$aufrufe = $row->Aufrufe + 1;
    }
   $aendern = "";
   if($_GET['bew']) {
   	 $zuschreiben = "";
  	 if($schon == ""){
  	 	$zuschreiben = $_GET['bew'];
  	 }
  	 else {
  	 	$zuschreiben = $schon." ".$_GET['bew'];
  	 }
  	 $aendern2 = "UPDATE uebungen Set Bewertung = '".$zuschreiben."' WHERE id = '".$_GET['id']."'";
  	$update = mysql_query($aendern2);
  	$aendern = "true";
  }
  else {
  	 $aendern3 = "UPDATE uebungen Set Aufrufe = '".$aufrufe."' WHERE id = '".$_GET['id']."'";
  	$update = mysql_query($aendern3);
  }
  $abfrage = "SELECT * FROM uebungen WHERE id = '".$_GET['id']."'";
  $ergebnis = mysql_query($abfrage);
    while($row = mysql_fetch_object($ergebnis))
    {
    array_push($uebungen, array($row->Titel, $row->Datum, $row->Name, $row->Dauer, $row->sonnig, $row->bewoelkt, $row->neblig, $row->Regen, $row->Schneefall, $row->Sommer, $row->Herbst, $row->Winter, $row->Fruehling, $row->Pfader, $row->Leiter, $row->Vorbereitungszeit, $row->Nachtuebung, $row->Schnee, $row->Beschreibung, $row->Material, $row->id, $row->Kommentare, $row->Bewertung));
    }
   }
	$i = 0;
	while($uebungen[$i]) {
	?>

		<div class="post">
			<h1 class="title"><?php echo ($uebungen[$i][0]) ? $uebungen[$i][0] : 'pfadi&uuml;bung wurde nicht gefunden'; ?></h1><span style="font-size: 11px; font-family: Arial; display:<?php echo ($uebungen[$i][0]) ? 'block' : 'none'; ?>">hinzugef&uuml;gt am <?php echo $uebungen[$i][1]; ?> von <?php echo $uebungen[$i][2]; ?></span>
			<div class="entry">
			<p style="text-align: left; margin-left: 80px; font-weight: 700; display:<?php echo (count($uebungen)) ? 'none' : 'block'; ?>">
			Die &Uuml;bung ist nicht mehr vorhanden.</p>
			<div class="entry" style="padding-top:0; font-weight: 700;">
			<div style="width: 519px; text-align: right; font-weight: 700">
			<?php if($_SESSION['status'] == "admin") { ?>
			<span style="font-weight:normal"><a href="?s=freischalten&a=de&id=<?php echo $uebungen[$i][20];?>">L&ouml;schen</a>&nbsp;&nbsp; 
			|&nbsp;&nbsp; <a href="?s=bearbeiten&id=<?php echo $uebungen[$i][20]; ?>">Bearbeiten</a></span>&nbsp;&nbsp; 
			|&nbsp;&nbsp; 
			<?php } if($_GET['ref'] == "suche") { ?>
			<span style="font-weight:normal"><a href="?s=suche">Zu den Suchergebnissen</a></span>&nbsp;&nbsp; 
			|&nbsp;&nbsp; <?php } ?>
			<span style="font-weight:normal"><a href="?s=uebungen">Zur 
			&Uuml;bungs&uuml;bersicht</a></span><br />
			<br />
			<table style="border-width: 0px; background-color:#1A1A1A" style="float:left">
				<tr>
					<td style="background-image:url('../images/img07.gif'); color: #000000; text-align: left;">

					&nbsp; &Uuml;bersicht</td>
				</tr>
				<tr>
					<td style="padding: 10px">
			<table style="font-weight: 700; background-color:#1A1A1A; text-align: left; width: 494px;" align="left">
				<tr>
					<td style="width: 180px">Dauer:&nbsp;&nbsp; </td>
					<td style="font-weight:normal"><?php echo $uebungen[$i][3]; ?> Stunden</td>
				</tr>
				<tr>
					<td style="width: 180px">Wetter: </td>
					<td style="font-weight:normal"><?php
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
		echo $wetter;

					?></td>
				</tr>
				<tr>
					<td style="width: 180px">Jahreszeiten: </td>
					<td style="font-weight:normal"><?php 
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
		echo $jahreszeit;
			
					 ?></td>
				</tr>
				<tr>
					<td style="width: 180px">Anzahl Pfader: </td>
					<td style="font-weight:normal"><?php echo $uebungen[$i][13]; ?></td>
				</tr>
				<tr>
					<td style="width: 180px">Anzahl Leiter:</td>
					<td style="font-weight:normal"><?php echo $uebungen[$i][14]; ?></td>
				</tr>
				<tr>
					<td style="width: 180px">Vorbereitungszeit:</td>
					<td style="font-weight:normal"><?php 
							if($uebungen[$i][15] == "5+") {
								echo "mehr als 5 Stunden";
							}
							else if($uebungen[$i][15] == "0") {
								echo "keine";
							}
							else {
								if($uebungen[$i][15] >= 10) {
								echo $uebungen[$i][15]." Minuten";
								}
								if($uebungen[$i][15] == 1) {
								echo $uebungen[$i][15]." Stunde";
								}
								if($uebungen[$i][15] > 1 && $uebungen[$i][15] < 5) {
								echo $uebungen[$i][15]." Stunden";
								}
							}
							?></td>
				</tr>
				<tr>
					<td style="width: 180px">Nacht&uuml;bung:</td>
					<td style="font-weight:normal"><?php if($uebungen[$i][16] == "1") { echo "ja"; } else {echo "nein"; } ?></td>
				</tr>
				<tr>
					<td style="width: 180px">bei liegendem Schnee:&nbsp;&nbsp;&nbsp;&nbsp; </td>
					<td style="font-weight:normal"><?php if($uebungen[$i][17] == "1") { echo "machbar"; } else {echo "nicht machbar"; } ?></td>
				</tr>
			</table>
					</td>
				</tr>
			</table>
			<table style="border-width: 0px; background-color:#1A1A1A; width: 518px; float:left; margin-top:20px">
				<tr>
					<td style="background-image:url('../images/img07.gif'); color: #000000; text-align: left;">

					&nbsp; Ausf&uuml;hrung</td>
				</tr>
				<tr>
					<td style="padding: 10px; font-weight:normal; text-align: justify;">
			<?php echo str_replace("\n", "<br />", $uebungen[$i][18]); 
			if(file_exists("../protokolle/".$uebungen[$i][20].".doc")) {
				echo "<br /><br /><img src='images/doc.png' style='height: 12px;' />&nbsp;&nbsp;<a href='../protokolle/".$uebungen[$i][20].".doc'>Protokoll downloaden (.doc)</a>";
			}
			if(file_exists("../protokolle/".$uebungen[$i][20].".xls")) {
				echo "<br /><br /><img src='images/xls.png' style='height: 12px;' />&nbsp;&nbsp;<a href='../protokolle/".$uebungen[$i][20].".xls'>Protokoll downloaden (.xls)</a>";
			}
			if(file_exists("../protokolle/".$uebungen[$i][20].".txt")) {
				echo "<br /><br /><img src='images/txt.png' style='height: 12px;' />&nbsp;&nbsp;<a href='../protokolle/".$uebungen[$i][20].".txt'>Protokoll downloaden (.txt)</a>";
			}
			if(file_exists("../protokolle/".$uebungen[$i][20].".pdf")) {
				echo "<br /><br /><img src='images/pdf.png' style='height: 12px;' />&nbsp;&nbsp;<a href='../protokolle/".$uebungen[$i][20].".pdf'>Protokoll downloaden (.pdf)</a>";
			}
			?>
			</td>
				</tr>
			</table>
			<table style="border-width: 0px; background-color:#1A1A1A; width: 518px; float:left; margin-top:20px">
				<tr>
					<td style="background-image:url('../images/img07.gif'); color: #000000; text-align: left;">

					&nbsp; Material</td>
				</tr>
				<tr>
					<td style="padding: 10px; font-weight:normal; text-align:justify;">
			<?php echo $uebungen[$i][19]; ?></td>
				</tr>
			</table>
			<table style="border-width: 0px; background-color:#1A1A1A; width: 518px; float:left; margin-top:20px">
				<tr>
					<td style="background-image:url('../images/img07.gif'); color: #000000; text-align: left;">

					&nbsp; Bewertung</td>
				</tr>
				<?php
			$b = split(" ", $uebungen[$i][22]);
			$schnitt = array_sum($b) / count($b);
			$gerundet = round($schnitt * 2, 0) / 2;
			$sum = $aufrufe * array_sum($b);
			$aendern4 = "UPDATE uebungen Set Sortierung = '".$sum."' AND Bewertung2 = '".$gerundet."' WHERE id = '".$_GET['id']."'";
 		 	$update = mysql_query($aendern4);

			?>
				<tr>
					<td style="padding: 10px; font-weight:normal; text-align:justify ;"><?php if(!$aendern) {?><a href="?s=details&id=<?php echo $_GET['id']; ?>&bew=1"><?php } ?><img src="../images/<?php
			if($gerundet >= 1) {
				echo 'ganz';
			}
			else if($gerundet >= 0.5) {
				echo 'halb';
			}
			else {
				echo 'kein';
			}
			?>.png" style="width:20px; cursor:pointer" id="stern1" onmouseover="stern(1)" onmouseout="ostern()" /><?php if(!$aendern) { ?></a><a href="?s=details&id=<?php echo $_GET['id']; ?>&bew=2"><?php } ?><img src="../images/<?php
			if($gerundet >= 2) {
				echo 'ganz';
			}
			else if($gerundet >= 1.5) {
				echo 'halb';
			}
			else {
				echo 'kein';
			}
			?>.png" style="width:20px" id="stern2" onmouseover="stern(2)" onmouseout="ostern()"/><?php if(!$aendern) { ?></a><a href="?s=details&id=<?php echo $_GET['id']; ?>&bew=3"><?php } ?><img src="../images/<?php
			if($gerundet >= 3) {
				echo 'ganz';
			}
			else if($gerundet >= 2.5) {
				echo 'halb';
			}
			else {
				echo 'kein';
			}
			?>.png" style="width:20px" id="stern3" onmouseover="stern(3)" onmouseout="ostern()"/><?php if(!$aendern) { ?></a><a href="?s=details&id=<?php echo $_GET['id']; ?>&bew=4"><?php } ?><img src="../images/<?php
			if($gerundet >= 4) {
				echo 'ganz';
			}
			else if($gerundet >= 3.5) {
				echo 'halb';
			}
			else {
				echo 'kein';
			}
			?>.png" style="width:20px" id="stern4" onmouseover="stern(4)" onmouseout="ostern()"/><?php if(!$aendern) { ?></a><a href="?s=details&id=<?php echo $_GET['id']; ?>&bew=5"><?php } ?><img src="../images/<?php
			if($gerundet >= 5) {
				echo 'ganz';
			}
			else if($gerundet >= 4.5) {
				echo 'halb';
			}
			else {
				echo 'kein';
			}
			?>.png" style="width:20px" id="stern5"  onmouseover="stern(5)" onmouseout="ostern()"/><?php if(!$aendern) {?></a><?php } ?><br />
			<span style="font-weight:normal">(<?php if($uebungen[$i][22] == "") { echo '0'; }else{ echo count($b); }; ?> Bewertungen)</span></td>
				</tr>
			</table>
			<table style="border-width: 0px; background-color:#1A1A1A; width: 518px; float:left; margin-top:20px">
				<tr>
					<td style="background-image:url('../images/img07.gif'); color: #000000; text-align: left;">

					&nbsp; Kommentare:</td>
				</tr>
				<?php
			$b = split(" ", $uebungen[$i][22]);
			$schnitt = array_sum($b) / count($b);
			$gerundet = round($schnitt * 2, 0) / 2;
			$sum = $aufrufe + array_sum($b);
			$aendern4 = "UPDATE uebungen Set Sortierung = '".$sum."' WHERE id = '".$_GET['id']."'";
 		 	$update = mysql_query($aendern4);

			?>
				<tr>
					<td style="padding: 10px; font-weight:normal; text-align: justify;">
					<?php 
						if($uebungen[$i][21]) {
						$eintraege1 = explode('$', $uebungen[$i][21]);
						for($y = 0; $y < count($eintraege1); $y++) {
							$eintraege2 = explode('|', $eintraege1[$y]);
					?><span style="font-size:11px">geschrieben am <?php echo $eintraege2[1]." von ".$eintraege2[0]; ?></span>
					<br />
					<?php echo $eintraege2[2]; ?><br />
					<br />
					<?php
						}
						}
						else {
					?>&nbsp;&nbsp;
					Es wurden noch keine Kommentare verfasst.
					<?php
					}
					?>
					<br />
					<br />
					<div style="text-align: center; width:100%">
						<form method="post" action="?s=details&id=<?php echo $_GET['id']; ?>" name="formular" title="formular">
						<table style="border-top: 1px solid #808080; width: 100%; font-weight:normal; text-align: left; border-left-color: #808080; border-right-color: #808080; border-bottom-color: #808080;">
							<tr>
								<td style="width: 91px">&nbsp;</td>
								<td id="fehler">
								
									&nbsp;</td>
							</tr>
							<tr>
								<td style="width: 91px">Name:</td>
								<td>
								
									<input name="Name" type="text" />
								</td>
							</tr>
							<tr>
								<td valign="top" style="width: 91px">Kommentar: </td>
								<td>
								<textarea name="Kommentar" style="width: 342px; height: 119px" rows="1" cols="20"></textarea></td>
							</tr>
							<tr>
								<td valign="top" style="width: 91px">&nbsp;</td>
								<td>
						<input name="Submit2" type="button" value="Senden" style="width: 95px" onclick="senden()" /></td>
							</tr>
						</table>
						<br />
						</form>
					</div>
					</td>
				</tr>
			</table>
			<?php
		$i++;
		}
		?>
			</div>
		</div>
		
	</div>
	</div>
