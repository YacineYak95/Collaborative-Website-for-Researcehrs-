<?php session_start(); ?>
<?php require_once("../Models/db_connection.php"); ?>
<?php require_once("../Models/functions.php"); ?>
<?php
$_SESSION["User"] = $_POST["firstname"];
addSearcher($_POST["firstname"],$_POST["lastname"],$_POST["country"],$_POST["country"],$_POST["field"],$_POST["biblio"],$_POST["birth"],
$_POST["grade"],$_POST["affiliation"],$_POST["email"], md5($_POST["password"]),$_POST["publications"]);
if( isset($_POST['submit']) ) // si formulaire soumis
{
    $content_dir = '/Applications/MAMP/htdocs/Uploads/CV'; // dossier où sera déplacé le fichier
    $tmp_file = $_FILES['fichier']['tmp_name'];
    if( !is_uploaded_file($tmp_file) )
    {
        exit("Le fichier est introuvable");
    }
    $type_file = $_FILES['fichier']['type'];
    if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') )
    {
        exit("Le fichier n'est pas une image");
    }
    $name_file = $_FILES['fichier']['name'];
    if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
    {
        exit("Impossible de copier le fichier dans $content_dir");
    }
}
header("Location: ../Views/index.php");
exit(0);
?>
