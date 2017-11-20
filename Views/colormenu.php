<?php require_once("../Models/db_connection.php"); ?>
<?php require_once("../Models/functions.php"); ?>
<?php
if (isset($_POST['menu'])) {
setColorMenu($_POST['menu']);
}
?>