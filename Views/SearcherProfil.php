<?php
session_start();
?>
<?php require_once("../Models/db_connection.php"); ?>
<?php require_once("../Models/functions.php"); ?>
<?php $color = getColor(basename($_SERVER['PHP_SELF']));?>


<html>
<head>

   

</style>
</head>

<body style="background-color:<?php echo strtoupper($color); ?>;">

                  <?php 
                        require("header.php");
                    ?>

                                         <div class="LessNews">
                                               Nom : <h3><?php echo $_GET['last_name']; ?></h3>
                                      

                                        </div>

  <div class="LessNews">
    Prenom : <h3><?php echo $_GET['first_name'];   ?></h3>

 </div>
<div class="LessNews">
    Biblhiographie : <h3><?php echo $_GET['biblio'];  ?></h3>

 </div>

  <div class="LessNews">
   Affiliation : <h3><?php echo $_GET['affiliation'];  ?></h3>

 </div>

  <div class="LessNews">
   Publications : <h3><?php echo $_GET['publications'];  ?></h3>

 </div>

<?php if( isset($_SESSION["User"])) { ?>

  <div class="LessNews">
   Domaine de recherche : <h3><?php echo $_GET['search_field'];  ?></h3>

 </div>

  <div class="LessNews">
   Pays : <h3><?php echo $_GET['pays'];  ?></h3>

 </div>

  <div class="LessNews">
   Email : <h3><?php echo $_GET['email'];  ?></h3>
<?php }?>
 </div>
</body>
</html>