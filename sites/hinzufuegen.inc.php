<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />

<?php
$uebungen = array();
	include("connect.int.php");
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
			<h1 class="title">hinzuf&uuml;gen von pfadi&uuml;bungen</h1>
			<div class="entry">
			<p style="text-align: right; margin-left: 80px">
			<a href="?s=uebungen">Zur&uuml;ck zur &Uuml;bersicht</a></p>
			<p style="text-align: left; ">
			Helfe auch du mit beim Weiterf&uuml;hren der &Uuml;bungsdatenbank von 
			pfadinet! Trage hier die &Uuml;bungen ein, die du auch anderen Pfadis zu 
			Verf&uuml;gung stellen willst. Da du dich nicht anmelden musst, um hier 
			einen Beitrag zu verfassen, wird dein Beitrag nach dem Absenden 
			zuerst &uuml;berpr&uuml;ft, bevor er unter &quot;&Uuml;bungen&quot; betrachtet werden kann.</p>
			<p style="text-align: left; font-weight: 700;">
			Bitte schreibt eure Beitr&auml;ge in Hochdeutsch, da sie dann auch von 
			Pfadern, die nicht muttersprachlich Deutsch sprechen oder von 
			Deutschen gelesen werden kann.</p>
			<p style="text-align: left; margin-left: 80px; display:none; color:red" id="fehler">
			&nbsp;</p>
			<form method="post" action="?s=senden" name="formular" title="formular" id="formular" enctype="multipart/form-data">
			<table style="width: 100%">
				<tr>
					<td style="width: 190px">Dein (Pfadi-)Name</td>
					<td style="width: 450px">
						<input name="Name" type="text" style="width: 187px" id="Name" /></td>
				</tr>
				<tr>
					<td style="width: 190px">Titel der &Uuml;bung:</td>
					<td style="width: 450px">
						<input name="Titel" type="text" style="width: 187px" /></td>
				</tr>
				<tr>
					<td style="width: 190px">Dauer der &Uuml;bung:</td>
					<td style="width: 450px">
						<select name="Dauer" style="width: 100px">
						<option value="1">1 Stunde</option>
						<option value="2">2 Stunden</option>
						<option value="3">3 Stunden</option>
						<option value="4">4 Stunden</option>
						<option value="5">5 Stunden</option>
						<option value="6">6 Stunden</option>
						<option value="9">9 Stunden</option>
						<option value="12">12 Stunden</option>
						<option value="18">18 Stunden</option>
						<option value="24">24 Stunden</option>
						<option value="24+">mehr als 24 Stunden</option>
						</select></td>
				</tr>
				<tr>
					<td style="width: 190px">Kategorie der &Uuml;bung:</td>
					<td style="width: 450px">
						<select name="Kategorie">
						<option value="1">Gel&auml;ndespiel</option>
						<option value="2">Pfaditechnik</option>
						<option value="3">Basteln (Atelier)</option>
						<option value="4">Spiel und Sport</option>
						<option value="5">andere &Uuml;bung</option>
						</select></td>
				</tr>
				<tr>
					<td style="width: 190px" valign="top">Bei welchem Wetter ist 
					die &Uuml;bung machbar?</td>
					<td style="width: 450px" id="wetter"><input name="a1" type="checkbox"/> 
					Sonnig&nbsp; |
					<input name="a2" type="checkbox" /> Bew&ouml;lkt&nbsp; |
					<input name="a3" type="checkbox" /> Neblig&nbsp; |
					<input name="a4" type="checkbox" /> Regen&nbsp; |
					<input name="a5" type="checkbox" /> Schneefall</td>
				</tr>
				<tr>
					<td style="width: 190px" valign="top">In welcher Jahreszeit 
					ist die &Uuml;bung machbar?</td>
					<td style="width: 450px" id="jahreszeit"><input name="b1" type="checkbox" /> 
					Sommer&nbsp; |
					<input name="b2" type="checkbox" /> Herbst&nbsp; |
					<input name="b3" type="checkbox" /> Winter&nbsp; |
					<input name="b4" type="checkbox" /> Fr&uuml;hling</td>
				</tr>
				<tr>
					<td style="width: 190px">Wie viele Pfader werden in etwa 
					ben&ouml;tigt?</td>
					<td style="width: 450px">
								<select name="Pfader" style="width: 160px">
								<option value="1-5">1-5</option>
								<option value="6-10">6-10</option>
								<option value="11-20">11-20</option>
								<option value="21-30">21-30</option>
								<option value="30+">mehr als 30</option>
								</select></td>
				</tr>
				<tr>
					<td style="width: 190px">Wie viele Leiter werden in etwa 
					ben&ouml;tigt?</td>
					<td style="width: 450px">
								<select name="Leiter" style="width: 160px">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6-10">6-10</option>
								<option value="11-20">11-20</option>
								<option value="20+">mehr als 20</option>
								</select></td>
				</tr>
				<tr>
					<td style="width: 190px" valign="top">Stufen: </td>
					<td style="width: 450px" id="stufe">
								<input name="c1" type="checkbox"/> 0. Stufe 
								(F&uuml;nkli)&nbsp; |
					<input name="c2" type="checkbox" /> 1. Stufe&nbsp; |
					<input name="c3" type="checkbox" /> 2. Stufe&nbsp; |
					<input name="c4" type="checkbox" /> 3. Stufe&nbsp; |
					<input name="c5" type="checkbox" /> 4. Stufe</td>
				</tr>
				<tr>
					<td style="width: 190px">Vorbereitungszeit (ohne Planung)</td>
					<td style="width: 450px"><select name="Vorbereitungszeit" style="width: 160px">
					<option value="0">keine Vorbereitungszeit</option>
					<option value="15">15 Minuten</option>
					<option value="30">30 Minuten</option>
					<option value="45">45 Minuten</option>
					<option value="1">1 Stunde</option>
					<option value="2">2 Stunden</option>
					<option value="3">3 Stunden</option>
					<option value="4">4 Stunden</option>
					<option value="5">5 Stunden</option>
					<option value="5+">mehr als 5 Stunden</option>
					</select>&nbsp;</td>
				</tr>
				<tr>
					<td style="width: 190px">Ist es eine Nacht&uuml;bung?</td>
					<td style="width: 450px"><input name="Nachtuebung" type="checkbox" /></td>
				</tr>
				<tr>
					<td style="width: 190px">Ist die &Uuml;bung auch mit liegendem 
					Schnee machbar?</td>
					<td style="width: 450px"><input name="Schnee" type="checkbox" /></td>
				</tr>
				<tr>
					<td style="width: 190px" valign="top">Beschreibung und 
					Erkl&auml;rung der &Uuml;bung:</td>
					<td style="width: 450px">
					<textarea name="Beschreibung" style="width: 100%; height: 175px;"></textarea></td>
				</tr>
				<tr>
					<td style="width: 190px" valign="top">Ben&ouml;tigtes Material: </td>
					<td style="width: 450px">
					<textarea name="Material" style="width: 100%; height: 99px;"></textarea></td>
				</tr>
				<tr>
					<td style="width: 190px" valign="top">Protokoll 
					(freiwillig):</td>
					<td style="width: 450px">
										Protokoll 
					hochladen (*.doc, *.xls, *.txt, *.pdf):<span id="hochladen2"><br>
					<input name="Protokoll" type="file" size="20" style="color:#E0F3B8; background-color:transparent; border-color:transparent; width: 407px;"></span><br>
					</td>
				</tr>
				</table>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="hidden" name="neu" value="1" />
			<input type="button" value="Absenden" style="width: 127px" onclick="absenden()"/></form>
			<p style="text-align: right; margin-left: 80px">
			<a href="?s=uebungen">Zur&uuml;ck zur &Uuml;bersicht</a></p>
		</div></div>