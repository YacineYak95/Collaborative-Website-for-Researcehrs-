<?php session_start() ?>
<?php require_once("../Models/db_connection.php"); ?>
<?php
// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

    global $db;

    $query = "SELECT * ";
    $query .= "FROM Conference WHERE title='".$_SESSION["conf"]."'";

    $result = mysqli_query($db, $query);




    header("Content-type: text/xml");
    
$nodes = array();
// Iterate through the rows, adding XML nodes for each
$row=$result->fetch_assoc();

  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lng", $row['lng']);


echo $dom->saveXML();
$myfile = fopen("../Scripts/newfile.txt", "w") or die("Unable to open file!");
$txt = $dom->saveXML();
fwrite($myfile, $txt);
fclose($myfile);

    ?>