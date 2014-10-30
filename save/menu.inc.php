<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<div id="menu">
	<ul>
		<li<?php if($_GET['s'] == "home") { ?> class="active"<?php } ?>>
		<a href="?s=home">Home</a></li>
		<li<?php if($_GET['s'] == "uebungen" || $_GET['s'] == "hinzufuegen" || $_GET['s'] == "senden" || $_GET['s'] == "suche" || $_GET['s'] == "bearbeiten" || $_GET['s'] == "bearbeiten2") { ?> class="active"<?php } ?>><a href="?s=uebungen">&Uuml;bungen</a></li>
		<li<?php if($_GET['s'] == "login" || $_GET['s'] == "log") { ?> class="active"<?php } ?>><a href="?s=login"><?php
		if($_SESSION['status'] == "admin" && $_GET['s'] != "login") {
			echo "Logout";
		}
		else {
			echo "Login";
		}
		?></a></li>
		<?php if($_SESSION['status'] == "admin") {
		?>
		<li<?php if($_GET['s'] == "freischalten2" || $_GET['s'] == "freischalten") { ?> class="active"<?php } ?>><a href="?s=freischalten2" style="width:130px">Freischalten</a></li>
		<li<?php if($_GET['s'] == "backup") { ?> class="active"<?php } ?>><a href="?s=backup" style="width:70px">Backup</a></li>
		<?php
		}
		?>
		<li<?php if($_GET['s'] == "kontakt" || $_GET['s'] == "mail") { ?> class="active"<?php } ?>><a href="?s=kontakt">
		Kontakt</a></li>
	</ul>
	<img src="images/help.png" onclick="hilfe('hilfe')" alt="Hilfe" title="Hilfe">
</div>