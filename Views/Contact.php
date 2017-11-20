<?php session_start() ?>
<?php require_once("../Models/db_connection.php"); ?>
<?php require_once("../Models/functions.php"); ?>

<?php $color = getColor(basename($_SERVER['PHP_SELF']));?>

<html>
    <head>
        <link href="../Style/style.css" type="text/css" rel=" stylesheet"  />
    </head>



    <body style="background-color:<?php echo strtoupper($color); ?>;">
    
                <?php 
                    require("../Views/header.php");        
                 ?>
    

                 <?php 
                require("../Views/footer.php"); 
                ?>      

    </body>

</html>
