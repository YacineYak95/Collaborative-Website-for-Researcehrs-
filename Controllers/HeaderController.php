<?php require_once("../Models/db_connection.php"); ?>
<?php require_once("../Models/functions.php"); ?>
<?php
 
if( isset($_POST['submit']) && $_FILES['fichier']['tmp_name']) // si formulaire soumis
{   
    $content_dir = '/Applications/MAMP/htdocs/Uploads/'; // dossier où sera déplacé le fichier
    $tmp_file = $_FILES['fichier']['tmp_name'];
    if( !is_uploaded_file($tmp_file) )
    {
        exit("Le fichier est introuvable");
    }
    $type_file = $_FILES['fichier']['type'];
    if( !strstr($type_file, 'png') && !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') )
    {
        exit("Le fichier n'est pas une image");
    }
    $name_file = $_FILES['fichier']['name'];
    if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
    {
        exit("Impossible de copier le fichier dans $content_dir");
    }
    setHeaderPic($name_file);
    header("Location: ../Views/index.php");
    exit(0);
}

if( isset($_POST['color']) ) // si formulaire soumis
 {
    setColor($_POST["page_name"],$_POST["color"]);
 }
header("Location: ../Views/index.php");

?>