<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<?php
include("connect.int.php");
$uebungen=array();
$sort = "";
$desc = "";
$anzahl = "10";
$b = "0";
if($_POST['Sortieren']) {
		if($_POST['Sortieren'] == "Beliebtheit") {
			$sort = "Sortierung";
		}
		else if($_POST['Sortieren'] == "Datum") {
			$sort = "id";
		}
		else {
			$sort = $_POST['Sortieren'];
		}
		if($_POST['Absteigend'] == "1") {
			$desc = " DESC";
		}
		$anzahl = $_POST['Anzahl'];
}
else {
	$sort = "id";
	$desc = " DESC";
}
if($_GET['b']) {
	$b = $_GET['b'];
}
if($_GET['a']) {
	$anzahl = $_GET['a'];
}
$abfrage = "SELECT * FROM uebungen WHERE Freigeschalten = 'ja' ORDER BY ".$sort.$desc." LIMIT ".$b.", ".$anzahl;
$ergebnis = mysql_query($abfrage);
while($row = mysql_fetch_object($ergebnis))
{
array_push($uebungen, array($row->Titel, $row->Datum, $row->Name, $row->Dauer, $row->sonnig, $row->bewoelkt, $row->neblig, $row->Regen, $row->Schneefall, $row->Sommer, $row->Herbst, $row->Winter, $row->Fruehling, $row->Pfader, $row->Leiter, $row->Vorbereitungszeit, $row->Nachtuebung, $row->Schnee, $row->Beschreibung, $row->Material, $row->id, $row->Kommentare, $row->Bewertung, $row->Aufrufe, $row->Kategorie, $row->fuenkli, $row->erstestufe, $row->zweitestufe, $row->drittestufe, $row->viertestufe));
}
$abfrage2 = "SELECT * FROM uebungen WHERE Freigeschalten = 'ja'";
$ergebnis2 = mysql_query($abfrage2);

$total = mysql_num_rows($ergebnis2);
$max_angezeigt = mysql_num_rows($ergebnis) + $b;
?>

		<div class="post">
			<h1 class="title">pfadi&uuml;bungen</h1>
			<div style="text-align:right" id="sortierung"><br>
				&Uuml;bungen <?php echo $b+1; ?> - <?php echo $max_angezeigt; ?> von <?php echo $total; ?>&nbsp;&nbsp; 
				|&nbsp;&nbsp; <a href="?s=hinzufuegen" style="text-decoration:none"><img src="images/plus.png" style="height:20px; margin:0; padding:0; margin-right:5px; margin-bottom:-5px; text-decoration:none"></a><a href="?s=hinzufuegen">&Uuml;bung hinzuf&uuml;gen</a>&nbsp; <br>
				<br>
				<form style="display:inline-table; text-align:right; margin:0px" method="post" action="?s=uebungen&b=<?php echo $b; ?>">
				<select name="Anzahl">
				<option value="5" <?php if($anzahl == "5") { echo "selected=''"; }?>>5</option>
				<option value="10" <?php if($anzahl == "10") { echo "selected=''";}?>>10</option>
				<option value="20" <?php if($anzahl == "20") { echo "selected=''"; }?>>20</option>
				<option value="50" <?php if($anzahl == "50") { echo "selected=''"; }?>>50</option>
				<option value="100" <?php if($anzahl == "100") { echo "selected=''"; }?>>100</option>
				</select> &Uuml;bungen pro Seite; Sortieren nach:&nbsp;
				<select name="Sortieren" id="Sortieren">
				<option value="Datum" <?php if(!$_POST['Sortieren'] || $_POST['Sortieren'] == "Datum") { echo "selected=''";}?>>
				Datum</option>
				<option value="Aufrufe" <?php if($_POST['Sortieren'] == "Aufrufe") { echo "selected=''"; }?>>
				Aufrufe</option>
				<option value="Bewertung2" <?php if($_POST['Sortieren'] == "Bewertung2") { echo "selected=''"; }?>>
				Bewertung</option>
				<option value="Beliebtheit" <?php if($_POST['Sortieren'] == "Beliebtheit") {echo "selected = ''"; }?>>
				Beliebtheit</option>
				</select>&nbsp;&nbsp; Absteigend:
					<input name="Absteigend" type="checkbox" value="1" id="Absteigend" <?php if($_POST['Absteigend'] == "1" || !$_POST['Sortieren']) { echo "checked='checked'"; }?>>&nbsp;
					<input name="Submit1" type="submit" value="Anzeigen &amp; Sortieren"><br>
				<br>
				</form>
			<br>
			</div>
			<?php $i = 0;
	while($uebungen[$i]) {
	?>
			<div class="entry" style="padding-top:0; text-align: left;">
			
	

			<table style="border-width: 0px; width: 100%; background-color:#1A1A1A">
				<tr>
					<td><a href="?s=details&id=<?php echo $uebungen[$i][20]; ?>" style="text-decoration:none">
					<div style="cursor: pointer; background-image:url('images/img07.gif'); z-index: 4; top: 0px; position: relative; width: 68px; right: 0px; float:right; color: #333333; text-decoration:none; text-align: center; border-left-style: solid; border-left-width: 1px; left: 0px;" class="uebungsbg">
					<table style="width: 100%; ">
						<tr>
							<td valign="left" class="uebungen"><a href="?s=details&id=<?php echo $uebungen[$i][20]; ?>">
							Details</a></td>
						</tr>
					</table>
					</div></a>
					<div style="background-image:url('images/img07.gif'); z-index: 4; top: 0px; position: relative; width: 88px; right: 0px; float:right; color: #333333; text-decoration:none; text-align: center; border-left-style: solid; border-left-width: 1px; padding-left: 4px; height: 22px;" id="uebungsbg">
							<table style="width: 100%">
								<tr>
									<td>	<?php
			$ba = split(" ", $uebungen[$i][22]);
			$schnitt = array_sum($ba) / count($ba);
			$gerundet = round($schnitt * 2, 0) / 2;
			?><img src="images/<?php
			if($gerundet >= 1) {
				echo 'ganz';
			}
			else if($gerundet >= 0.5) {
				echo 'halb';
			}
			else {
				echo 'kein';
			}
			?>.png" style="width:15px;" id="stern5" /><img src="images/<?php
			if($gerundet >= 2) {
				echo 'ganz';
			}
			else if($gerundet >= 1.5) {
				echo 'halb';
			}
			else {
				echo 'kein';
			}
			?>.png" style="width:15px" id="stern6"/><img src="images/<?php
			if($gerundet >= 3) {
				echo 'ganz';
			}
			else if($gerundet >= 2.5) {
				echo 'halb';
			}
			else {
				echo 'kein';
			}
			?>.png" style="width:15px" id="stern7"/><img src="images/<?php
			if($gerundet >= 4) {
				echo 'ganz';
			}
			else if($gerundet >= 3.5) {
				echo 'halb';
			}
			else {
				echo 'kein';
			}
			?>.png" style="width:15px" id="stern8"/><img src="images/<?php
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
					<div style="background-image:url('images/img07.gif'); position: relative; width: 109px; right: 0px; float:right; color: #333333; text-decoration:none; text-align: center; top: 0px; z-index: 4; border-left-style: solid; border-left-width: 1px; padding-left: 4px;" class="uebungsbg">
							<table style="width: 100%">
								<tr>
									<td class="uebungen"><?php if($uebungen[$i][23] == "") {echo "0 Aufrufe";}else if($uebungen[$i][23] == "1") {echo "1 Aufruf";}else{echo $uebungen[$i][23]." Aufrufe";}?></td>
								</tr>
							</table>
							</div>

					<div id="Ebene1" style="position: relative; z-index: 3; top: 0px; left: 0px; height: 22px;background-image:url('images/img07.gif'); vertical-align:middle" class="uebungsbg">
					<table style="font-size:13px"><tr><td style="color:black">
					<span style="font-weight:bold; font-size:13px"><?php echo $uebungen[$i][0]; ?></span>&nbsp;<span style="font-size:11px">
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
							&nbsp;<?php if($uebungen[$i][16] == "1") { ?><img src="images/mond.png" height="30" alt="Nacht&uuml;bung" align="top" /> <?php } if($uebungen[$i][17] != "1") { ?>
							<img src="images/keinschnee.png" height="30" alt="Es darf kein Schnee vorhanden sein" align="top" /><?php } ?></td>
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
			</div><?php $i++; } ?>
			
			<p style="text-align: right; margin-left: 80px; margin-right:20px;">
			Seite <?php $aktuelle_seite = ceil($max_angezeigt/$anzahl); echo $aktuelle_seite; ?> von <?php $max_seite = ceil($total/$anzahl); echo $max_seite;?>&nbsp;&nbsp; 
			|&nbsp;&nbsp; <?php 
			if($b >= $anzahl) {
				echo "<a href='?s=uebungen&b=".($b-$anzahl)."&a=".$anzahl."'>vorherige Seite</a>";
			}
			else {
				echo "vorherige Seite";
			}
			?>
			&nbsp; |&nbsp; <?php 
			if($max_angezeigt < $total) {
				echo "<a href='?s=uebungen&b=".($b+$anzahl)."&a=".$anzahl."'>n&auml;chste Seite</a>";
			}
			else {
				echo "n&auml;chste Seite";
			}
			?>&nbsp; |&nbsp;&nbsp;&nbsp; 
			Gehe zu Seite&nbsp; 
			<?php
			$i = 1;
			if($aktuelle_seite > 5) {
			$i = $aktuelle_seite - 5;
			}
				for($i; $i < $aktuelle_seite; $i++) {
					echo " <a href='?s=uebungen&b=".(($i-1)*$anzahl)."&a=".$anzahl."'>".$i."</a>";
				}
				echo "<b> ".$aktuelle_seite."</b>";
			$y = $max_seite;
			if($max_seite > $aktuelle_seite+6) {
			$y = $aktuelle_seite+6;
			}
				for($i = $aktuelle_seite+1; $i <= $y; $i++) {
					echo " <a href='?s=uebungen&b=".(($i-1)*$anzahl)."&a=".$anzahl."'>".$i."</a>";
				}
			?>
						<br>
			<a href="?s=hinzufuegen" style="text-decoration:none"><img src="images/plus.png" style="height:20px; margin:0; padding:0; margin-right:5px; margin-bottom:-5px; text-decoration:none"></a><a href="?s=hinzufuegen">&Uuml;bung hinzuf&uuml;gen</a></p>
		</div>

