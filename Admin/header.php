
<?php require_once("../Models/db_connection.php"); ?>
<?php require_once("../Models/functions.php"); ?>
<?php
//session_start();
//Get cover page path
$pic = getHeaderPic();
?>
<!-- return current name page -->
<?php $color = getColor("".basename($_SERVER['PHP_SELF']));
        $page_name=basename($_SERVER['PHP_SELF']);
        $colorMenu = getColorMenu();
?>


<html>
    <head>
        <link href="../Style/style.css" type="text/css" rel=" stylesheet"  />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="../Scripts/chercheurScript.js"></script>
        <script src="../Scripts/jquery-3.1.1.js"></script>
 

                

    </head>

    <body>

                        <div id="header">
                            <img src="<?php echo "../images/$pic" ?>" width="100%" height="100%" />
                            <div id="coverPic">
                            <form  method="post" action="../Controllers/HeaderController.php" enctype="multipart/form-data">
                                <input type="file" name="fichier" size="30">               
                                <input type="color" name="color" value="<?php echo $color; ?>"/>
                                <input type="hidden" name="page_name" value="<?php echo $page_name; ?>">
                                <input type="submit" name="submit" value="Apply Changes">

                                </form>
                            </div>
                        </div>


                        <div id="NavBar">
                            <ul id="nav" style="background-color:<?php echo $colorMenu?>"> 
                                    <li style="float:left;"><a href="bloqueResearchers.php">Gestion</a></li>                  
                                    <li style="float:left;"><a class="active" href="manageResearchers.php">Demande d'adhesion</a></li>
                                    <li style="float:left;"><a class="active" href="index.php">Deconnecter</a></li>

                            </ul>   
                                    



                        </div>


    </body>

</html>
