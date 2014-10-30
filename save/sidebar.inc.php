<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<div id="sidebar">
		<ul>

<li id="search">
				<h2>&uuml;bungssuche</h2>
				<form method="post" action="?s=suche">
						<table style="width: 230px; font-size: 13px;">
							<tr>
								<td>Dauer:</td>
								<td style="width: 113px">
						<select name="Dauer" style="width: 110px">
						<option value="egal" <?php if(($_GET['s'] == "suche" && $_POST['Dauer'] == "egal")||(!$_POST['Dauer'])) { echo "selected=''"; }?>>egal</option>
						<option value="1" <?php if($_GET['s'] == "suche" && $_POST['Dauer'] == "1") { echo "selected=''"; }?>>1 Stunde</option>
						<option value="2" <?php if($_GET['s'] == "suche" && $_POST['Dauer'] == "2") { echo "selected=''"; }?>>2 Stunden</option>
						<option value="3" <?php if($_GET['s'] == "suche" && $_POST['Dauer'] == "3") { echo "selected=''"; }?>>3 Stunden</option>
						<option value="4" <?php if($_GET['s'] == "suche" && $_POST['Dauer'] == "4") { echo "selected=''"; }?>>4 Stunden</option>
						<option value="5" <?php if($_GET['s'] == "suche" && $_POST['Dauer'] == "5") { echo "selected=''"; }?>>5 Stunden</option>
						<option value="6" <?php if($_GET['s'] == "suche" && $_POST['Dauer'] == "6") { echo "selected=''"; }?>>6 Stunden</option>
						<option value="9" <?php if($_GET['s'] == "suche" && $_POST['Dauer'] == "9") { echo "selected=''"; }?>>9 Stunden</option>
						<option value="12" <?php if($_GET['s'] == "suche" && $_POST['Dauer'] == "12") { echo "selected=''"; }?>>12 Stunden</option>
						<option value="18" <?php if($_GET['s'] == "suche" && $_POST['Dauer'] == "18") { echo "selected=''"; }?>>18 Stunden</option>
						<option value="24" <?php if($_GET['s'] == "suche" && $_POST['Dauer'] == "24") { echo "selected=''"; }?>>24 Stunden</option>
						<option value="24+" <?php if($_GET['s'] == "suche" && $_POST['Dauer'] == "24+") { echo "selected=''"; }?>>mehr als 24 Stunden</option>
						</select></td>
							</tr>
							<tr>
								<td>Kategorie:</td>
								<td style="width: 113px">
						<select name="Kategorie" style="width:110px">
						<option value="egal" <?php if(($_GET['s'] == "suche" && $_POST['Kategorie'] == "egal")||(!$_POST['Kategorie'])) { echo "selected=''"; }?>>egal</option>
						<option value="1" <?php if($_GET['s'] == "suche" && $_POST['Kategorie'] == "1") { echo "selected=''"; }?>>Gel&auml;ndespiel</option>
						<option value="2" <?php if($_GET['s'] == "suche" && $_POST['Kategorie'] == "2") { echo "selected=''"; }?>>Pfaditechnik</option>
						<option value="3" <?php if($_GET['s'] == "suche" && $_POST['Kategorie'] == "3") { echo "selected=''"; }?>>Basteln (Atelier)</option>
						<option value="4" <?php if($_GET['s'] == "suche" && $_POST['Kategorie'] == "4") { echo "selected=''"; }?>>Spiel und Sport</option>
						<option value="5" <?php if($_GET['s'] == "suche" && $_POST['Kategorie'] == "5") { echo "selected=''"; }?>>andere &Uuml;bung</option>
						</select></td>
							</tr>
							<tr>
								<td>Nacht&uuml;bung:</td>
								<td style="width: 113px">
						<select name="Nachtuebung" style="width: 110px">
						<option value="egal" <?php if(($_GET['s'] == "suche" && $_POST['Nachtuebung'] == "egal")||(!$_POST['Nachtuebung'])) { echo "selected=''"; }?>>egal</option>
						<option value="1" <?php if($_GET['s'] == "suche" && $_POST['Nachtuebung'] == "1") { echo "selected=''"; }?>>Ja</option>
						<option value="0" <?php if($_GET['s'] == "suche" && $_POST['Nachtuebung'] == "0") { echo "selected=''"; }?>>Nein</option>
						</select></td>
							</tr>
							<tr>
								<td>Wetter:</td>
								<td style="width: 113px">
								<select name="Wetter" style="width: 110px">
								<option value="egal" <?php if(($_GET['s'] == "suche" && $_POST['Wetter'] == "egal")||(!$_POST['Wetter'])) { echo "selected=''"; }?>>egal
								</option>
								<option value="sonnig" <?php if($_GET['s'] == "suche" && $_POST['Wetter'] == "sonnig") { echo "selected=''"; }?>>Sonnig</option>
								<option value="bew&ouml;lkt" <?php if($_GET['s'] == "suche" && $_POST['Wetter'] == "bew&ouml;lkt") { echo "selected=''"; }?>>Bew&ouml;lkt</option>
								<option value="neblig" <?php if($_GET['s'] == "suche" && $_POST['Wetter'] == "neblig") { echo "selected=''"; }?>>neblig</option>
								<option value="Regen" <?php if($_GET['s'] == "suche" && $_POST['Wetter'] == "Regen") { echo "selected=''"; }?>>Regen</option>
								<option value="Schneefall" <?php if($_GET['s'] == "suche" && $_POST['Wetter'] == "Schneefall") { echo "selected=''"; }?>>Schneefall</option>
								</select></td>
							</tr>
							<tr>
								<td>Jahreszeit:</td>
								<td style="width: 113px">
								<select name="Jahreszeit" style="width: 110px">
								<option value="egal"  <?php if(($_GET['s'] == "suche" && $_POST['Jahreszeit'] == "egal")||(!$_POST['Jahreszeit'])) { echo "selected=''"; }?>>egal
								</option>
								<option value="Sommer" <?php if($_GET['s'] == "suche" && $_POST['Jahreszeit'] == "Sommer") { echo "selected=''"; }?>>Sommer</option>
								<option value="Herbst" <?php if($_GET['s'] == "suche" && $_POST['Jahreszeit'] == "Herbst") { echo "selected=''"; }?>>Herbst</option>
								<option value="Winter" <?php if($_GET['s'] == "suche" && $_POST['Jahreszeit'] == "Winter") { echo "selected=''"; }?>>Winter</option>
								<option value="Fruehling" <?php if($_GET['s'] == "suche" && $_POST['Jahreszeit'] == "Fruehling") { echo "selected=''"; }?>>Fr&uuml;hling</option>
								</select></td>
							</tr>
							<tr>
								<td>liegender Schnee:</td>
								<td style="width: 113px">
						<select name="Schnee" style="width: 110px">
						<option value="egal" <?php if(($_GET['s'] == "suche" && $_POST['Schnee'] == "egal")||(!$_POST['Schnee'])) { echo "selected=''"; }?>>egal</option>
						<option value="1" <?php if($_GET['s'] == "suche" && $_POST['Schnee'] == "1") { echo "selected=''"; }?>>Ja</option>
						<option value="0" <?php if($_GET['s'] == "suche" && $_POST['Schnee'] == "0") { echo "selected=''"; }?>>Nein</option>
						</select></td>
							</tr>
							<tr>
								<td>Anzahl Pfader:</td>
								<td style="width: 113px">
								<select name="Pfader" style="width: 110px">
								<option value="egal"  <?php if(($_GET['s'] == "suche" && $_POST['Pfader'] == "egal")||(!$_POST['Pfader'])) { echo "selected=''"; }?>>egal
								</option>
								<option value="1-5" <?php if($_GET['s'] == "suche" && $_POST['Pfader'] == "1-5") { echo "selected=''"; }?>>1-5</option>
								<option value="6-10" <?php if($_GET['s'] == "suche" && $_POST['Pfader'] == "6-10") { echo "selected=''"; }?>>6-10</option>
								<option value="11-20" <?php if($_GET['s'] == "suche" && $_POST['Pfader'] == "11-20") { echo "selected=''"; }?>>11-20</option>
								<option value="21-30" <?php if($_GET['s'] == "suche" && $_POST['Pfader'] == "21-30") { echo "selected=''"; }?>>21-30</option>
								<option value="30+" <?php if($_GET['s'] == "suche" && $_POST['Pfader'] == "30+") { echo "selected=''"; }?>>mehr als 30</option>
								</select></td>
							</tr>
							<tr>
								<td>Anzahl Leiter:</td>
								<td style="width: 113px">
								<select name="Leiter" style="width: 110px">
								<option value="egal" <?php if(($_GET['s'] == "suche" && $_POST['Leiter'] == "egal")||(!$_POST['Leiter'])) { echo "selected=''"; }?>>egal
								</option>
								<option value="1" <?php if($_GET['s'] == "suche" && $_POST['Leiter'] == "1") { echo "selected=''"; }?>>1</option>
								<option value="2" <?php if($_GET['s'] == "suche" && $_POST['Leiter'] == "2") { echo "selected=''"; }?>>2</option>
								<option value="3" <?php if($_GET['s'] == "suche" && $_POST['Leiter'] == "3") { echo "selected=''"; }?>>3</option>
								<option value="4" <?php if($_GET['s'] == "suche" && $_POST['Leiter'] == "4") { echo "selected=''"; }?>>4</option>
								<option value="5" <?php if($_GET['s'] == "suche" && $_POST['Leiter'] == "5") { echo "selected=''"; }?>>5</option>
								<option value="6-10" <?php if($_GET['s'] == "suche" && $_POST['Leiter'] == "6-10") { echo "selected=''"; }?>>6-10</option>
								<option value="11-20" <?php if($_GET['s'] == "suche" && $_POST['Leiter'] == "11-20") { echo "selected=''"; }?>>11-20</option>
								<option value="20+" <?php if($_GET['s'] == "suche" && $_POST['Leiter'] == "20+") { echo "selected=''"; }?>>mehr als 20</option>
								</select></td>
							</tr>
							<tr>
								<td>Stufe:</td>
								<td style="width: 113px">
								<select name="Stufe" style="width: 110px">
								<option value="egal" <?php if(($_GET['s'] == "suche" && $_POST['Stufe'] == "egal")||(!$_POST['Stufe'])) { echo "selected=''"; }?>>egal
								</option>
								<option value="fuenkli" <?php if($_GET['s'] == "suche" && $_POST['Stufe'] == "fuenkli") { echo "selected=''"; }?>>0. Stufe (F&uuml;nkli)</option>
								<option value="erstestufe" <?php if($_GET['s'] == "suche" && $_POST['Stufe'] == "erstestufe") { echo "selected=''"; }?>>1. Stufe (W&ouml;lfli &amp; Bienli)
								</option>
								<option value="zweitestufe" <?php if($_GET['s'] == "suche" && $_POST['Stufe'] == "zweitestufe") { echo "selected=''"; }?>>2. Stufe (Pfader)</option>
								<option value="drittestufe" <?php if($_GET['s'] == "suche" && $_POST['Stufe'] == "drittestufe") { echo "selected=''"; }?>>3. Stufe (Pios)</option>
								<option value="viertestufe" <?php if($_GET['s'] == "suche" && $_POST['Stufe'] == "viertestufe") { echo "selected=''"; }?>>4. Stufe (Rover)</option>
								</select></td>
							</tr>
							</table>
								<input name="Submit1" type="submit" value="&Uuml;bungen suchen" style="width: 214px" /></form>
			</li>	

<li>
				<h2>top10 - &Uuml;bungen</h2>
				<ul>
				<?php
					include("connect.inc.php");
					$abfrage = "SELECT * FROM uebungen WHERE Freigeschalten = 'ja' ORDER BY Sortierung DESC LIMIT 0, 10";
					$ergebnis = mysql_query($abfrage);
					  while($row = mysql_fetch_object($ergebnis))
					    {
					    ?>
					    <li><a href="?s=details&id=<?php echo $row->id; ?>"><?php echo $row->Titel; ?> <span style="font-size:11px">
						von <?php echo $row->Name; ?></span></a></li>
					    <?php
					    }
					    ?>
				</ul>
			</li>
			<li>
				<h2>neuste &Uuml;bungen</h2>
				<ul>
				<?php
					include("connect.inc.php");
					$abfrage = "SELECT * FROM uebungen WHERE Freigeschalten = 'ja' ORDER BY id DESC LIMIT 0, 10";
					$ergebnis = mysql_query($abfrage);
					  while($row = mysql_fetch_object($ergebnis))
					    {
					    ?>
					    <li><a href="?s=details&id=<?php echo $row->id; ?>"><?php echo $row->Titel; ?> <span style="font-size:11px">
						von <?php echo $row->Name; ?></span></a></li>
					    <?php
					    }
					    ?>
				</ul>
			</li>

		</ul>
	</div>

	

