<?php session_start() ?>
<?php require_once("../Models/db_connection.php"); ?>
<?php require_once("../Models/functions.php"); ?>

<?php $color = getColor(basename($_SERVER['PHP_SELF']));?>

<html>
    <head>
        <link href="../Style/style.css" type="text/css" rel=" stylesheet"  />
    </head>


    <body style="background-color:<?php echo strtoupper($color); ?>;">

    
                        <div id="imgDesc"> <img  src="../images/logo.png" width="50%" height="20%" /></div>
                       
                        <div id="Description">
                        <p>  Le site web propose une plateforme de collaboration entre chercheurs du monde entier. Cela inclut la

                                présentation des objectifs du site et des news, une liste de chercheurs triée par pays et par domaine de

                        recherche, une liste de conférences et journaux. Chaque chercheur doit s’inscrire pour mettre son CV,

                        pouvoir contacter les autres chercheurs et soumettre des commentaires.</p>

                <?php 
                require("../Views/footer.php"); 
                ?>      
    </body>

</html>
