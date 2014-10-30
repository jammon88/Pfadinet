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

$id = $_GET['id'];
if($_GET['a'] == "ja") {
$aendern = "UPDATE uebungen Set Freigeschalten = 'ja' WHERE id = '".$id."'";
 $update = mysql_query($aendern);
}
if($_GET['a'] == "de") {
$loeschen = "DELETE FROM uebungen WHERE id = '".$id."'";
$loesch = mysql_query($loeschen);
			if(file_exists("../protokolle/".$id.".doc")) {
				unlink("../protokolle/".$id.".doc");
			}
			if(file_exists("../protokolle/".$id.".xls")) {
				unlink("../protokolle/".$id.".xls");
			}
			if(file_exists("../protokolle/".$id.".txt")) {
				unlink("../protokolle/".$id.".txt");
			}
			if(file_exists("../protokolle/".$id.".pdf")) {
				unlink("../protokolle/".$id.".pdf");
			}
}
?>
			<div class="post">
			<h1 class="title"><?php if($_GET['a'] == "ja"){echo "Freischalten";}if($_GET['a'] == "de") {echo "L&ouml;schen";}?></h1>
			<div class="entry" style="padding-top:0">
			<p>Die &Uuml;bung wurde <?php if($_GET['a'] == "ja"){echo "freigeschalten";}if($_GET['a'] == "de") {echo "gel&ouml;scht";}?>.<br />
			<a href="?s=uebungen">Zur&uuml;ck zur &Uuml;bungs&uuml;bersicht</a><br />
			<?php if($_SESSION['status'] == "admin") {
				echo "<a href='?s=freischalten2'>Zur&uuml;ck, um weitere &Uuml;bungen freizuschalten.</a>";
                         }
			?>
			</p>
			</div>
		</div>