
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
        <script>
                    $(document).ready(function(){
                    $('#send').click(function(){
                        var clickBtnValue = $("#menu").val();
                        alert(clickBtnValue);
                        var ajaxurl = '../Controllers/colormenu.php',
                        data =  {'menu': clickBtnValue};
                        $.post(ajaxurl, data, function (response) {
                            // Response div goes here.
                            alert("action Effectuer");
                        });
                    });

                });
    </script>

                

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

                        <div id="login">
                                            <form method="post" action="../Controllers/loginController.php">
                                                <div id="email">
                                                    <?php   if (!isset( $_SESSION["User"])){?>
                                                    Email:<br />
                                                    <input type="text" name="User" value="" />
                                                    <?php }else{?>
                                                    <h2> Bienvenu <?php echo $_SESSION["User"]; ?>  </h2>
                                                            <button type="button" class="btn btn-default btn-sm" onclick="location.href='../Controllers/logoutController.php'" >
                                                            <span class="glyphicon glyphicon-log-out"></span> Log out
                                                            </button> 
                                                    <?php } ?>
                                                </div>
                                            
                                                <?php   if (!isset( $_SESSION["User"])){?>

                                                <div id="password">
                                                    Password:<br />
                                                    <input type="password" name="password" value="" />
                                                </div>

                                                <input type="submit" value="login"/>
                                            </form>
                            <p style="font-size:12px;">Vous n'avez pas de compte ? <a href="signin.php">Inscrivez-vous!</a></p>
                            <?php } ?>

                        </div>

                        <div id="NavBar">
                            <ul id="nav" style="background-color:<?php echo $colorMenu?>">                   
                                     <li style="float:left;"><a class="active" href="index.php">Acceuil</a></li>
                                    <li style="float:left;"><a class="active" href="Chercheurs.php">Chercheurs</a></li>
                                    <li style="float:left;"><a href="Publications.php">Publications</a></li>
                                    <li style="float:left;"><a href="Journaux.php">Journaux</a></li>
                                    <li style="float:left;"><a href="Conference.php">conférence</a></li>
                                    <li style="float:left;"><a href="Contact.php">contact</a></li>
                                    <li style="float:left;"><a href="apropos.php">Knowledge</a></li>
                                    
                                    <input type="color" id="menu" name="menu" value="<?php echo $colorMenu; ?>"> </input>
                                     <button  id="send" name="send" > change color </button>
                                    
                            </ul>   
                                    



                        </div>


    </body>

</html>
