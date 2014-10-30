<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<?php
$uebungen = array();
include("connect.int.php");
 $add = array();
 if($_POST['Dauer']) {
 $add = array();
 }
 if(!$_POST['Dauer'] && $_SESSION['suche']) {
  $add = $_SESSION['suche'];
 }
 if($_POST['Dauer']) {
  $dauer = $_POST['Dauer'];
  if($dauer != "egal") {
  	array_push($add, "Dauer = '".$dauer."'");
  }
  $kategorie = $_POST['Kategorie'];
  if($kategorie != "egal") {
  	array_push($add, "Kategorie = '".$kategorie."'");
  }
  $nachtuebung = $_POST['Nachtuebung'];
  if($nachtuebung != "egal") {
  	array_push($add, "Nachtuebung = '".$nachtuebung."'");
  }
  $wetter = $_POST['Wetter'];
  if($wetter != "egal") {
  	array_push($add, $wetter." = '1'");
  }
  $jahreszeit = $_POST['Jahreszeit'];
  if($jahreszeit != "egal") {
  	array_push($add, $jahreszeit." = '1'");
  }
  $schnee = $_POST['Schnee'];
  if($schnee != "egal" && $schnee != "0") {
  	array_push($add, "Schnee = '".$schnee."'");
  }
  $pfader = $_POST['Pfader'];
  if($pfader != "egal") {
  	array_push($add, "Pfader = '".$pfader."'");
  }
  $leiter = $_POST['Leiter'];
  if($leiter != "egal") {
  	array_push($add, "Leiter = '".$leiter."'");
  }
  $stufe = $_POST['Stufe'];
  if($stufe != "egal") {
  	array_push($add, $stufe." = '1'");
  }
  }
  $zusatz = implode(" AND ", $add);
  $abfrage = "SELECT * FROM uebungen WHERE ".$zusatz." ORDER BY id DESC";
  if($_POST['Dauer'] == "egal" && $_POST['Nachtuebung'] == "egal" && $_POST['Wetter'] == "egal" && $_POST['Jahreszeit'] == "egal" && $_POST['Schnee'] == "egal" && $_POST['Pfader'] == "egal" && $_POST['Leiter'] == "egal" && $_POST['Kategorie'] == "egal" && $_POST['Stufe'] == "egal") {
  	$abfrage = "SELECT * FROM uebungen ORDER BY id DESC";
  }
$_SESSION['suche'] = $add;
  $ergebnis = mysql_query($abfrage);
    while($row = mysql_fetch_object($ergebnis))
    {
    if($row->Freigeschalten == "ja") {
    array_push($uebungen, array($row->Titel, $row->Datum, $row->Name, $row->Dauer, $row->sonnig, $row->bewoelkt, $row->neblig, $row->Regen, $row->Schneefall, $row->Sommer, $row->Herbst, $row->Winter, $row->Fruehling, $row->Pfader, $row->Leiter, $row->Vorbereitungszeit, $row->Nachtuebung, $row->Schnee, $row->Beschreibung, $row->Material, $row->id, $row->Kommentare, $row->Bewertung, $row->Aufrufe, $row->Kategorie, $row->fuenkli, $row->erstestufe, $row->zweitestufe, $row->drittestufe, $row->viertestufe));
    }
    }
?>
		<div class="post">
			<h1 class="title">suchergebnisse</h1>
			<div class="entry">
			<p style="text-align: right; margin-left: 80px">
			<a href="?s=uebungen">Zur &Uuml;bungs&uuml;bersicht</a> | 
			<a href="?s=hinzufuegen">&Uuml;bung hinzuf&uuml;gen</a><br />
			<?php 
			if(count($uebungen) == "0") {
				echo "kein Suchergebnis";
			}
			else if(count($uebungen) == "1") {
				echo "1 Suchergebnis";
			}
			else {
				echo count($uebungen)." Suchergebnisse";
			}
			?></p>
			<p style="text-align: left; margin-left: 80px; font-weight: 700; display:<?php echo (count($uebungen) == '0') ? 'block' : 'none'; ?>">
			Es konnten keine Suchergebnisse gefunden werden.</p>
			<div class="entry" style="padding-top:0">
			<?php 
	$i = 0;
	while($uebungen[$i]) {
	?>
			<table style="border-width: 0px; width: 100%; background-color:#1A1A1A">
				<tr>
					<td><a href="?s=details&id=<?php echo $uebungen[$i][20]; ?>" style="text-decoration:none">
					<div style="cursor: pointer; background-image:url('../images/img07.gif'); z-index: 4; top: 0px; position: relative; width: 68px; right: 0px; float:right; color: #333333; text-decoration:none; text-align: center; border-left-style: solid; border-left-width: 1px; left: 0px;">
					<table style="width: 100%; ">
						<tr>
							<td valign="middle" class="uebungen"><a href="?s=details&id=<?php echo $uebungen[$i][20]; ?>&ref=suche">
							Details</a></td>
						</tr>
					</table>
					</div></a>
					<div style="background-image:url('../images/img07.gif'); z-index: 4; top: 0px; position: relative; width: 88px; right: 0px; float:right; color: #333333; text-decoration:none; text-align: center; border-left-style: solid; border-left-width: 1px; padding-left: 4px; height: 22px;">
							<table style="width: 100%">
								<tr>
									<td>	<?php
			$b = split(" ", $uebungen[$i][22]);
			$schnitt = array_sum($b) / count($b);
			$gerundet = round($schnitt * 2, 0) / 2;
			?><img src="../images/<?php
			if($gerundet >= 1) {
				echo 'ganz';
			}
			else if($gerundet >= 0.5) {
				echo 'halb';
			}
			else {
				echo 'kein';
			}
			?>.png" style="width:15px;" id="stern5" /><img src="../images/<?php
			if($gerundet >= 2) {
				echo 'ganz';
			}
			else if($gerundet >= 1.5) {
				echo 'halb';
			}
			else {
				echo 'kein';
			}
			?>.png" style="width:15px" id="stern6"/><img src="../images/<?php
			if($gerundet >= 3) {
				echo 'ganz';
			}
			else if($gerundet >= 2.5) {
				echo 'halb';
			}
			else {
				echo 'kein';
			}
			?>.png" style="width:15px" id="stern7"/><img src="../images/<?php
			if($gerundet >= 4) {
				echo 'ganz';
			}
			else if($gerundet >= 3.5) {
				echo 'halb';
			}
			else {
				echo 'kein';
			}
			?>.png" style="width:15px" id="stern8"/><img src="../images/<?php
			if($gerundet >= 5) {
				echo 'ganz';
			}
			else if($gerundet >= 4.5) {
				echo 'halb';
			}
			else {
				echo 'kein';
			}
			?>.png" style="width:15px; margin-top: 0px;" id="stern9"/></td>
								</tr>
							</table>
							</div>
					<div style="background-image:url('../images/img07.gif'); position: relative; width: 109px; right: 0px; float:right; color: #333333; text-decoration:none; text-align: center; top: 0px; z-index: 4; border-left-style: solid; border-left-width: 1px; padding-left: 4px;">
							<table style="width: 100%;">
								<tr>
									<td class="uebungen"><?php if($uebungen[$i][23] == "") {echo "0 Aufrufe";}else if($uebungen[$i][23] == "1") {echo "1 Aufruf";}else{echo $uebungen[$i][23]." Aufrufe";}?></td>
								</tr>
							</table>
							</div>

					<div id="Ebene1" style="position: relative; z-index: 3; top: 0px; left: 0px; height: 22px;background-image:url('../images/img07.gif'); vertical-align:middle">
					<table><tr><td style="color: #000000">
					<span style="font-weight:bold"><?php echo $uebungen[$i][0]; ?></span>&nbsp;<span style="font-size:11px">
					 von <?php echo $uebungen[$i][2]; ?>&nbsp;&nbsp; 
					<?php
						if($_SESSION['status'] == "admin") {
							echo "<a href='?s=freischalten&a=de&id=".$uebungen[$i][20]."' class='intern'>L&ouml;schen</a>&nbsp;&nbsp; <a href='?s=bearbeiten&id=".$uebungen[$i][20]."' class='intern'>Bearbeiten</a>";
						}
					?></span></td></tr></table></div>

					</td>
				</tr>
				<tr>
					<td>
					<table style="width: 100%; border-top-style: solid; border-top-width:0px; font-size: 13px;">
						<tr style="border-top-style: solid; border-top-width: 0px; padding-top: 1px">
							<td style="width: 210px; padding-right:10px" valign="top">
							Dauer: <?php echo $uebungen[$i][3]; ?> Stunden<br />
							Kategorie: <?php 
							if($uebungen[$i][24] == "1") {
								echo "Gel&auml;ndespiel";
							}
							if($uebungen[$i][24] == "2") {
								echo "Pfaditechnik";
							}
							if($uebungen[$i][24] == "3") {
								echo "Basteln (Atelier)";
							}
							if($uebungen[$i][24] == "4") {
								echo "Spiel und Sport";
							}
							if($uebungen[$i][24] == "5") {
								echo "andere &Uuml;bung";
							}
							?><br />
							Wetter: <?php
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

					?><br />
							Jahreszeiten: <?php 
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
			
					 ?><br />
							Anzahl Pfader: <?php echo $uebungen[$i][13]; ?><br />
							Anzahl Leiter: <?php echo $uebungen[$i][14]; ?><br />
							Stufen: <?php 
						$stufen2 = array();
						if($uebungen[$i][25] == "1") {
							array_push($stufen2, "F&uuml;nkli");
						}
						if($uebungen[$i][26] == "1") {
							array_push($stufen2, "1. Stufe");
						}
						if($uebungen[$i][27] == "1") {
							array_push($stufen2, "2. Stufe");
						}
						if($uebungen[$i][28] == "1") {
							array_push($stufen2, "3. Stufe");
						}
						if($uebungen[$i][29] == "1") {
							array_push($stufen2, "4. Stufe");
						}
						$stufen = implode(", ", $stufen2);
						echo $stufen;
					?><br />
							Vorbereitungszeit: <?php 
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
							?><br />
							&nbsp;<?php if($uebungen[$i][16] == "1") { ?><img src="../images/mond.png" height="30" alt="Nacht&uuml;bung" align="top" /> <?php } if($uebungen[$i][17] != "1") { ?>
							<img src="../images/keinschnee.png" height="30" alt="Es darf kein Schnee vorhanden sein" align="top" /><?php } ?></td>
							<td valign="top" style="padding-left:10px; border-left-width:1px; border-left-style: solid;"><?php 
							$pos = strpos($uebungen[$i][18], '.', 300);
							if($pos > 0) {
							$uebungen[$i][18] = str_replace("\n", "<br />", $uebungen[$i][18]);
							echo substr($uebungen[$i][18], 0, $pos); 
							if(strlen($uebungen[$i][18]) > 300) {
								echo "...";
							}
							}
							else {
							echo str_replace("\n", "<br />", $uebungen[$i][18]);
							}
							?><br />
							<br />
							Material: <?php echo $uebungen[$i][19]; ?></td>
						</tr>
					</table>
					</td>
				</tr>
			</table>
			<br />
			<?php
		$i++;
		}
		?>
			</div>
		</div>
		
	</div>

