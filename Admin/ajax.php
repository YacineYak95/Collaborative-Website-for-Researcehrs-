<?php require_once("../Models/db_connection.php"); ?>
<?php require_once("../Models/functions.php"); ?>
<?php
if (isset($_POST['accept'])) {
acceptResearcher($_POST['accept']);
}

if (isset($_POST['bloque'])) {
bloqueResearcher($_POST['bloque']);
}


if (isset($_POST['delete'])) {
deleteResearcher($_POST['delete']);
}
?>