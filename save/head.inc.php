<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>pfadinet - Pfadi&uuml;bungen online</title>
<?php
if(!$_GET['s']) {
echo "<meta http-equiv='refresh' content='0; URL=index.php?s=home'>";
$inc = "1";
}
?>
<meta name="author" content="Luzi Sennhauser v/o Atreju">
<meta name="author" content="Luzi Sennhauser v/o Atreju">
<meta name="publisher" content="Luzi Sennhauser v/o Atreju">
<meta name="copyright" content="Luzi Sennhauser v/o Atreju">
<meta name="description" content="pfadinet ist ein Portal für Pfadfinder. Hauptsächlich steht der Austausch von Samstags-Nachmittag-Übungen. Es können genau die passenden Übungen abgefragt werden und selbstverständlich kann man auch selbst eine Übung eintragen! Und alles ohne Anmeldung!">
<meta name="keywords" content="pfadinet, Pfadiübung, Pfadiübungen, Pfadi, Übungen, Samstag, Nachmittag, Spass, Geländespiel, Atelier, Basteln, Spiel, Sport, Scoutnet, PBS, Suche, Portal, Austausch">
<meta name="page-topic" content="Gesellschaft">
<meta name="page-type" content="Katalog Verzeichnis">
<meta name="audience" content="Alle"><meta http-equiv="content-language" content="de">
<meta name="robots" content="index, nofollow">
<meta name="DC.Creator" content="Luzi Sennhauser v/o Atreju">
<meta name="DC.Publisher" content="Luzi Sennhauser v/o Atreju">
<meta name="DC.Rights" content="Luzi Sennhauser v/o Atreju">
<meta name="DC.Description" content="pfadinet ist ein Portal für Pfadfinder. Hauptsächlich steht der Austausch von Samstags-Nachmittag-Übungen. Es können genau die passenden Übungen abgefragt werden und selbstverständlich kann man auch selbst eine Übung eintragen! Und alles ohne Anmeldung!">
<meta name="DC.Language" content="de">
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="default.css" rel="stylesheet" type="text/css" media="screen" />
<link href="print.css" rel="stylesheet" type="text/css" media="print" />
<script type="text/javascript">
<!--
function weiterleitung() {
	location.href="index.php?s=backup";
}
function hilfe(seite) {
	window.open("hilfe.php?s="+seite, "Hilfe", "despendent=yes, width=600, height=500, top=100, left=200");
}
document.formular.name.style.backgroundColor = '';
document.formular.nachricht.style.backgroundColor = '';
function senden2() {
	if(!document.formular.name.value) {
		document.formular.name.style.backgroundColor = 'red';
	}
	if(!document.formular.nachricht.value) {
		document.formular.nachricht.style.backgroundColor = 'red';
	}
	if(document.formular.nachricht.value && document.formular.name.value) {
		document.formular.submit();
	}
}
function absenden() {
var meldungen = new Array();
	if(!document.formular.Name.value) {
		meldungen.push("Sie m&uuml;ssen einen Namen eingeben");
		document.formular.Name.style.backgroundColor = "red";
	}
	if(!document.formular.Titel.value) {
		meldungen.push("Sie m&uuml;ssen einen &Uuml;bungstitel eingeben");
		document.formular.Titel.style.backgroundColor = "red";
	}
	if(!document.formular.Beschreibung.value) {
		meldungen.push("Sie m&uuml;ssen eine Beschreibung eingeben");
		document.formular.Beschreibung.style.backgroundColor = "red";
	}
	var endung = document.formular.Protokoll.value.substr(document.formular.Protokoll.value.length-4, 4);
	if(endung != ".doc" && endung != ".xls" && endung != ".txt" && endung != ".pdf" && document.formular.Protokoll.value) {
		meldungen.push("Es k&ouml;nnen nur *.doc-, *.xls-, *.txt-, *.pdf-Dateien als Protokolle angenommen werden");
		document.formular.Protokoll.style.color = "red";
	}
	if(!document.formular.a1.checked && !document.formular.a2.checked && !document.formular.a3.checked && !document.formular.a4.checked && !document.formular.a5.checked) {
		meldungen.push("Die &Uuml;bung muss bei mindestens einem Wetter durchf&uuml;hrbar sein");
		document.getElementById("wetter").style.color = "red";
	}

	if(!document.formular.b1.checked && !document.formular.b2.checked && !document.formular.b3.checked && !document.formular.b4.checked) {
		meldungen.push("Die &Uuml;bung muss bei mindestens einer Jahreszeit durchf&uuml;hrbar sein");
		document.getElementById("jahreszeit").style.color = "red";
	}
	if(!document.formular.c1.checked && !document.formular.c2.checked && !document.formular.c3.checked && !document.formular.c4.checked && !document.formular.c5.checked) {
		meldungen.push("Die &Uuml;bung muss mit mindestens einer Stufe durchf&uuml;hrbar sein");
		document.getElementById("stufe").style.color = "red";
	}
	if(meldungen.length == 0) {
		if(!document.formular.Material.value) {
			document.formular.Material.innerHTML = "Es wird kein Material ben&ouml;tigt";
		}
		document.formular.submit();
	}
	else {
		document.getElementById('fehler').style.display = "block";
		document.getElementById('fehler').innerHTML = meldungen.join("<br />");
		window.scrollTo(0, 380);
	}
}
var ids = new Array("stern1", "stern2", "stern3", "stern4", "stern5");
var start = new Array("", "", "", "", "");
function starten() {
	for(var i = 0; i < 5; i++) {
		start[i] = document.getElementById(ids[i]).src;
	}
}
function ostern() {
	for(var i = 0; i < 5; i++) {
		document.getElementById(ids[i]).src = start[i];
	}
}
//-->
</script>
<script language="javascript" type="text/javascript">
<!--
function senden() {
document.formular.Name.style.backgroundColor = '';
document.formular.Kommentar.style.backgroundColor = '';
	if(!document.formular.Name.value || !document.formular.Kommentar.value) {
		document.getElementById('fehler').innerHTML = "Sie m&uuml;ssen das Formular vollst&auml;ndig ausf&uuml;llen.";
	}
	else {
		document.formular.submit();
	}
	if(!document.formular.Name.value) {
		document.formular.Name.style.backgroundColor = 'red';
	}
	if(!document.formular.Kommentar.value) {
		document.formular.Kommentar.style.backgroundColor = 'red';
	}
}
//-->
</script>
<?php if($_GET['bew']) { ?>
<script type="text/javascript">
<!--
function stern(anz) {
var a = "";
}
//-->
</script>
<?php } else { ?>
<script type='text/javascript'>
<!--
function stern(anz) {
	for(var i = 0; i < 6; i++) {
		if(i < anz) {
			document.getElementById(ids[i]).src = 'images/ganz.png';
		}
		else {
			document.getElementById(ids[i]).src = 'images/kein.png';
		}
	}
}
//-->
</script>
<?php } ?>

</head>
