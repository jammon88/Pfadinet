<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />

<?php
chdir('../');
include('check.php');
chdir('sites/');
$uebungen = array();
	include("connect.int.php");
  $abfrage = "SELECT * FROM uebungen WHERE id='".$_GET['id']."'";
  $ergebnis = mysql_query($abfrage);
    while($row = mysql_fetch_object($ergebnis))
    {
    $uebungen = array($row->Titel, $row->Datum, $row->Name, $row->Dauer, $row->Kategorie, $row->sonnig, $row->bewoelkt, $row->neblig, $row->Regen, $row->Schneefall, $row->Sommer, $row->Herbst, $row->Winter, $row->Fruehling, $row->Pfader, $row->Leiter, $row->fuenkli, $row->erstestufe, $row->zweitestufe, $row->drittestufe, $row->viertestufe, $row->Vorbereitungszeit, $row->Nachtuebung, $row->Schnee, $row->Beschreibung, $row->Material, $row->id, $row->Kommentare, $row->Bewertung, $row->Aufrufe, $row->Sortierung, $row->Freigeschalten, $row->Bewertung2);
    }
?>
		<div class="post">
			<h1 class="title">hinzuf&uuml;gen von pfadi&uuml;bungen</h1>
			<div class="entry">
			<p style="text-align: right; margin-left: 80px">
			<a href="?s=uebungen">Zur&uuml;ck zur &Uuml;bersicht</a></p>
			<form method="post" action="?s=bearbeiten2" name="formular" title="formular" id="formular">
			<table style="width: 100%; font-size:13px" cellspacing="10">
				<tr>
					<td style="width: 196px">(Pfadi-)Name</td>
					<td style="width: 450px">
						<input name="Name" type="text" style="width: 187px" id="Name" value="<?php echo $uebungen[2]; ?>" /></td>
				</tr>
				<tr>
					<td style="width: 196px">Titel der &Uuml;bung:</td>
					<td style="width: 450px">
						<input name="Titel" type="text" style="width: 187px" value="<?php echo $uebungen[0]; ?>" /></td>
				</tr>
				<tr>
					<td style="width: 196px">Datum der Erstellung:</td>
					<td style="width: 450px">
						<input name="Datum" type="text" style="width: 187px" value="<?php echo $uebungen[1]; ?>" /></td>
				</tr>
				<tr>
					<td style="width: 196px">Dauer der &Uuml;bung:</td>
					<td style="width: 450px">
						<select name="Dauer" style="width: 100px">
						<option <?php if($uebungen[3] == "egal") { echo "selected='selected'"; } ?> value="egal">egal</option>
						<option <?php if($uebungen[3] == "1") { echo "selected='selected'"; } ?> value="1">1 Stunde</option>
						<option <?php if($uebungen[3] == "2") { echo "selected='selected'"; } ?> value="2">2 Stunden</option>
						<option <?php if($uebungen[3] == "3") { echo "selected='selected'"; } ?> value="3">3 Stunden</option>
						<option <?php if($uebungen[3] == "4") { echo "selected='selected'"; } ?> value="4">4 Stunden</option>
						<option <?php if($uebungen[3] == "5") { echo "selected='selected'"; } ?> value="5">5 Stunden</option>
						<option <?php if($uebungen[3] == "6") { echo "selected='selected'"; } ?> value="6">6 Stunden</option>
						<option <?php if($uebungen[3] == "9") { echo "selected='selected'"; } ?> value="9">9 Stunden</option>
						<option <?php if($uebungen[3] == "12") { echo "selected='selected'"; } ?> value="12">12 Stunden</option>
						<option <?php if($uebungen[3] == "18") { echo "selected='selected'"; } ?> value="18">18 Stunden</option>
						<option <?php if($uebungen[3] == "24") { echo "selected='selected'"; } ?> value="24">24 Stunden</option>
						<option <?php if($uebungen[3] == "24+") { echo "selected='selected'"; } ?> value="24+">mehr als 24 Stunden</option>
						</select></td>
				</tr>
				<tr>
					<td style="width: 196px">Kategorie der &Uuml;bung:</td>
					<td style="width: 450px">
						<select name="Kategorie">
						<option <?php if($uebungen[4] == "1") { echo "selected='selected'"; } ?> value="1">Gel&auml;ndespiel</option>
						<option <?php if($uebungen[4] == "2") { echo "selected='selected'"; } ?> value="2">Pfaditechnik</option>
						<option <?php if($uebungen[4] == "3") { echo "selected='selected'"; } ?> value="3">Basteln (Atelier)</option>
						<option <?php if($uebungen[4] == "4") { echo "selected='selected'"; } ?> value="4">Spiel und Sport</option>
						<option <?php if($uebungen[4] == "5") { echo "selected='selected'"; } ?> value="5">andere &Uuml;bung</option>
						</select></td>
				</tr>
				<tr>
					<td style="width: 196px" valign="top">Bei welchem Wetter ist 
					die &Uuml;bung machbar?</td>
					<td style="width: 450px">
					<input name="a1" type="checkbox" <?php if($uebungen[5] == "1") { echo "checked='checked'"; } ?>/> 
					Sonnig&nbsp; |
					<input name="a2" type="checkbox" <?php if($uebungen[6] == "1") { echo "checked='checked'"; } ?> /> Bew&ouml;lkt&nbsp; |
					<input name="a3" type="checkbox" <?php if($uebungen[7] == "1") { echo "checked='checked'"; } ?> /> Neblig&nbsp; |
					<input name="a4" type="checkbox" <?php if($uebungen[8] == "1") { echo "checked='checked'"; } ?> /> Regen&nbsp; |
					<input name="a5" type="checkbox" <?php if($uebungen[9] == "1") { echo "checked='checked'"; } ?> /> Schneefall</td>
				</tr>
				<tr>
					<td style="width: 196px" valign="top">In welcher Jahreszeit 
					ist die &Uuml;bung machbar?</td>
					<td style="width: 450px"><input name="b1" type="checkbox" <?php if($uebungen[10] == "1") { echo "checked='checked'"; } ?> /> 
					Sommer&nbsp; |
					<input name="b2" type="checkbox" <?php if($uebungen[11] == "1") { echo "checked='checked'"; } ?> /> Herbst&nbsp; |
					<input name="b3" type="checkbox" <?php if($uebungen[12] == "1") { echo "checked='checked'"; } ?> /> Winter&nbsp; |
					<input name="b4" type="checkbox" <?php if($uebungen[13] == "1") { echo "checked='checked'"; } ?> /> Fr&uuml;hling</td>
				</tr>
				<tr>
					<td style="width: 196px">Wie viele Pfader werden in etwa 
					ben&ouml;tigt?</td>
					<td style="width: 450px">
								<select name="Pfader" style="width: 160px">
								<option <?php if($uebungen[14] == "1-5") { echo "selected='selected'"; } ?> value="1-5">1-5</option>
								<option <?php if($uebungen[14] == "6-10") { echo "selected='selected'"; } ?> value="6-10">6-10</option>
								<option <?php if($uebungen[14] == "11-20") { echo "selected='selected'"; } ?> value="10-20">11-20</option>
								<option <?php if($uebungen[14] == "21-30") { echo "selected='selected'"; } ?> value="20-30">21-30</option>
								<option <?php if($uebungen[14] == "30+") { echo "selected='selected'"; } ?> value="30+">mehr als 30</option>
								</select></td>
				</tr>
				<tr>
					<td style="width: 196px">Wie viele Leiter werden in etwa 
					ben&ouml;tigt?</td>
					<td style="width: 450px">
								<select name="Leiter" style="width: 160px">
								<option <?php if($uebungen[15] == "1") { echo "selected='selected'"; } ?> value="1">1</option>
								<option <?php if($uebungen[15] == "2") { echo "selected='selected'"; } ?> value="2">2</option>
								<option <?php if($uebungen[15] == "3") { echo "selected='selected'"; } ?> value="3">3</option>
								<option <?php if($uebungen[15] == "4") { echo "selected='selected'"; } ?> value="4">4</option>
								<option <?php if($uebungen[15] == "5") { echo "selected='selected'"; } ?> value="5">5</option>
								<option <?php if($uebungen[15] == "6-10") { echo "selected='selected'"; } ?> value="5-10">6-10</option>
								<option <?php if($uebungen[15] == "11-20") { echo "selected='selected'"; } ?> value="10-20">11-20</option>
								<option <?php if($uebungen[15] == "20+") { echo "selected='selected'"; } ?> value="20+">mehr als 20</option>
								</select></td>
				</tr>
				<tr>
					<td style="width: 196px" valign="top">Stufen: </td>
					<td style="width: 450px">
								<input name="c1" type="checkbox" <?php if($uebungen[16] == "1") { echo "checked='checked'"; } ?>/> 0. Stufe 
								(F&uuml;nkli)&nbsp; |
					<input name="c2" type="checkbox" <?php if($uebungen[17] == "1") { echo "checked='checked'"; } ?> /> 1. Stufe&nbsp; |
					<input name="c3" type="checkbox" <?php if($uebungen[18] == "1") { echo "checked='checked'"; } ?> /> 2. Stufe&nbsp; |
					<input name="c4" type="checkbox" <?php if($uebungen[19] == "1") { echo "checked='checked'"; } ?> /> 3. Stufe&nbsp; |
					<input name="c5" type="checkbox" <?php if($uebungen[20] == "1") { echo "checked='checked'"; } ?> /> 4. Stufe</td>
				</tr>
				<tr>
					<td style="width: 196px">Vorbereitungszeit (ohne Planung)</td>
					<td style="width: 450px"><select name="Vorbereitungszeit" style="width: 160px">
					<option <?php if($uebungen[21] == "0") { echo "selected='selected'"; } ?> value="0">keine Vorbereitungszeit</option>
					<option <?php if($uebungen[21] == "15") { echo "selected='selected'"; } ?> value="15">15 Minuten</option>
					<option <?php if($uebungen[21] == "30") { echo "selected='selected'"; } ?> value="30">30 Minuten</option>
					<option <?php if($uebungen[21] == "45") { echo "selected='selected'"; } ?> value="45">45 Minuten</option>
					<option <?php if($uebungen[21] == "1") { echo "selected='selected'"; } ?> value="1">1 Stunde</option>
					<option <?php if($uebungen[21] == "2") { echo "selected='selected'"; } ?> value="2">2 Stunden</option>
					<option <?php if($uebungen[21] == "3") { echo "selected='selected'"; } ?> value="3">3 Stunden</option>
					<option <?php if($uebungen[21] == "4") { echo "selected='selected'"; } ?> value="4">4 Stunden</option>
					<option <?php if($uebungen[21] == "5") { echo "selected='selected'"; } ?> value="5">5 Stunden</option>
					<option <?php if($uebungen[21] == "5+") { echo "selected='selected'"; } ?> value="5+">mehr als 5 Stunden</option>
					</select>&nbsp;</td>
				</tr>
				<tr>
					<td style="width: 196px">Ist es eine Nacht&uuml;bung?</td>
					<td style="width: 450px"><input name="Nachtuebung" type="checkbox"<?php if($uebungen[22] == "1") { echo "checked='checked'"; } ?>  /></td>
				</tr>
				<tr>
					<td style="width: 196px">Ist die &Uuml;bung auch mit liegendem 
					Schnee machbar?</td>
					<td style="width: 450px"><input name="Schnee" type="checkbox"<?php if($uebungen[23] == "1") { echo "checked='checked'"; } ?>  /></td>
				</tr>
				<tr>
					<td style="width: 196px" valign="top">Beschreibung und 
					Erkl&auml;rung der &Uuml;bung:</td>
					<td style="width: 450px">
					<textarea name="Beschreibung" style="width: 100%; height: 175px;"><?php echo $uebungen[24]; ?></textarea></td>
				</tr>
				<tr>
					<td style="width: 196px" valign="top">Ben&ouml;tigtes Material: </td>
					<td style="width: 450px">
					<textarea name="Material" style="width: 100%; height: 99px;"><?php echo $uebungen[25]; ?></textarea></td>
				</tr>
				<tr>
					<td style="width: 196px" valign="top">Kommentare:</td>
					<td style="width: 450px">
					<?php
					$teile1 = explode('$', $uebungen[27]);
					for($i = 0; $i < count($teile1); $i++) {
					$teile2 = explode('|', $teile1[$i]);
					if(!$uebungen[27]) {
						echo "Es wurden noch keine Kommentare verfasst.";
					}
					else {
					?>
					Datum: 
					<input name="Datum<?php echo $i; ?>" type="text" value="<?php echo $teile2[1]; ?>" style="width: 75px">&nbsp;&nbsp; Name:
					<input name="Name<?php echo $i; ?>" type="text" value="<?php echo $teile2[0]; ?>">&nbsp;&nbsp;
					<input name="Loeschen<?php echo $i; ?>" type="checkbox" value="1">L&ouml;schen<br>
					<textarea name="Kommentare<?php echo $i; ?>" style="width: 100%; height: 99px;" rows="1" cols="20"><?php echo $teile2[2] ?></textarea><hr>
					<br>
					<?php }} ?>
					</td>
				</tr>
				<tr>
					<td style="width: 196px" valign="top">Bewertung:</td>
					<td style="width: 450px">
					<textarea name="Bewertung" style="width: 100%; height: 99px;" rows="1" cols="20"><?php echo $uebungen[28]; ?></textarea></td>
				</tr>
				<tr>
					<td style="width: 196px" valign="top">Bewertung 
					Durchschnitt:</td>
					<td style="width: 450px">
					<textarea name="BewertungD" style="width: 100%; height: 99px;" rows="1" cols="20"><?php echo $uebungen[32]; ?></textarea></td>
				</tr>
				<tr>
					<td style="width: 196px" valign="top">Freigeschalten:</td>
					<td style="width: 450px">
					<input name="Freigeschalten" value="1" type="checkbox" <?php if($uebungen[31] == "ja") { echo "checked='checked'"; } ?> >&nbsp;</td>
				</tr>
				<tr>
					<td style="width: 196px" valign="top">Aufrufe:</td>
					<td style="width: 450px">
					<textarea name="Aufrufe" style="width: 100%; height: 99px;" rows="1" cols="20"><?php echo $uebungen[29]; ?></textarea></td>
				</tr>
				<tr>
					<td style="width: 196px" valign="top">Sortierung:</td>
					<td style="width: 450px">
					<textarea name="Sortierung" style="width: 100%; height: 99px;" rows="1" cols="20"><?php echo $uebungen[30]; ?></textarea><input name="id" type="hidden" value="<?php echo $_GET['id']; ?>"></td>
				</tr>
				</table>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="hidden" name="neu" value="1" />
			<input type="submit" value="Absenden" style="width: 127px"/></form>
			<p style="text-align: right; margin-left: 80px">
			<a href="?s=uebungen">Zur&uuml;ck zur &Uuml;bersicht</a></p>
		</div></div>