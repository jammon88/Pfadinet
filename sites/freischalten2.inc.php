<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<?php
chdir('../');
include('check.php');
chdir('sites/');
$uebungen = array();
include("connect.int.php");
  $abfrage = "SELECT * FROM uebungen ORDER BY Sortierung DESC";
  $ergebnis = mysql_query($abfrage);
    while($row = mysql_fetch_object($ergebnis))
    {
    if($row->Freigeschalten == "nein") {
    array_push($uebungen, array($row->Titel, $row->Datum, $row->Name, $row->Dauer, $row->sonnig, $row->bewoelkt, $row->neblig, $row->Regen, $row->Schneefall, $row->Sommer, $row->Herbst, $row->Winter, $row->Fruehling, $row->Pfader, $row->Leiter, $row->Vorbereitungszeit, $row->Nachtuebung, $row->Schnee, $row->Beschreibung, $row->Material, $row->id, $row->Kommentare, $row->Bewertung, $row->Aufrufe, $row->Kategorie, $row->fuenkli, $row->erstestufe, $row->zweitestufe, $row->drittestufe, $row->viertestufe));
    }
    }
?>
		<div class="post">
			<h1 class="title">freischalten noch nicht aktivierter &Uuml;bungen</h1>
			<div class="entry" style="padding-top:0">
			<?php 
	$i = 0;
	while($uebungen[$i]) {
	?>
			<table style="border-width: 0px; width: 100%; background-color:#1A1A1A">
				<tr>
					<td><a href="?s=details&id=<?php echo $uebungen[$i][20]; ?>" style="text-decoration:none">
					</a>

					<div id="Ebene2" style="position: relative; z-index: 3; top: 0px; left: 0px; height: 22px;background-image:url('../images/img07.gif'); vertical-align:middle">
					<table><tr><td style="color: #000000">
					<span style="font-weight:bold"><?php echo $uebungen[$i][0]; ?></span>&nbsp;<span style="font-size:11px">
					 von <?php echo $uebungen[$i][2]; ?>&nbsp;&nbsp; 
					<span style="font-size:11px">&nbsp;&nbsp;
					<a href='?s=freischalten&a=ja&amp;id=<?php echo $uebungen[$i][20]; ?>'>
					Freischalten</a>&nbsp;&nbsp; <a href='?s=freischalten&a=de&id=<?php echo $uebungen[$i][20]; ?>'>
					L&ouml;schen</a>&nbsp;&nbsp; <a href='?s=bearbeiten&id=<?php echo $uebungen[$i][20]; ?>'>
					Bearbeiten</a>

					</span></span></td></tr></table></div>

					</td>
				</tr>
				<tr>
					<td>
					<table style="width: 100%; border-top-style: solid; border-top-width:0px; font-size: 13px;">
						<tr style="border-top-style: solid; border-top-width: 0px; padding-top: 1px">
							<td style="width: 210px; padding-right:10px" valign="top">Dauer: <?php echo $uebungen[$i][3]; ?> Stunden<br />
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
							$uebungen[$i][18] = str_replace("\n", "<br />", $uebungen[$i][18]);
							echo $uebungen[$i][18];
							?><br />
							<br />
							Material: <?php echo str_replace("\n", "<br />", $uebungen[$i][19]); ?></td>
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
		</div>	