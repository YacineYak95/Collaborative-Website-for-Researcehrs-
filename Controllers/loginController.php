<?php session_start(); ?>
<?php require_once("../Models/db_connection.php"); ?>
<?php require_once("../Models/functions.php"); ?>
<?php
            global $db;
            $query = "SELECT * ";
            $query .= "FROM Searcher ";
            $query .= "WHERE last_name = '".$_POST["User"]."' AND password = '".md5($_POST["password"])."' ;";
            $result = $db->query($query);

            if ($result->num_rows > 0) {
                $_SESSION["User"] = $_POST["User"];
            } else {
            echo "0 results";
            }
    ?>
<?php
header("Location: ../Views/index.php");
exit(0);
?>