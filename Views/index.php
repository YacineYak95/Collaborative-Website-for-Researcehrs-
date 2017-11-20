<?php session_start() ?>
<?php require_once("../Models/db_connection.php"); ?>
<?php require_once("../Models/functions.php"); ?>

<?php $newsSet = getNews(9);?>
<?php 
$eventSet = getEvents();
$color = getColor(basename($_SERVER['PHP_SELF']));

 ?>

<html>
    <head>
        <link href="../Style/style.css" type="text/css" rel=" stylesheet"  />
    </head>


    <body style="background-color:<?php echo strtoupper($color); ?>;">  

                    <?php 
                        require("header.php");
                    ?>
                        <!-- Diaporama du Image 4 News -->
                        <div id="middle" class="SideBar" >
                            <div id="slider">                                    
                                    <div id="contenu">
                                        <?php $cpt = 0; ?>
                                        <?php while (($cpt < 4) && ($news = mysqli_fetch_assoc($newsSet))) { ?>
                                                <div class="image">
                                                    <a href="Views/News.php?id=<?php echo $news['id']; ?>">
                                                        <img src="<?php echo $news['image']; ?>" width="100%" height="100%" />
                                                    </a>
                                                    <div class="text_picture">
                                                        <h2><?php echo $news['title']; ?></h2>
                                                    </div>
                                                </div>
                                                <?php $cpt = $cpt + 1; ?>
                                        <?php } ?>
                                    </div>
                            </div>

                            <div id="LessNewsContent">
                                <?php while ($news = mysqli_fetch_assoc($newsSet)) { ?>
                                    <div class="LessNews">
                                        <a href="Views/News.php">
                                            <h3><?php echo $news['title']; ?></h3>
                                            <p><?php echo $news['description']; ?></p>
                                            </a>
                                    </div>
                                <?php } ?>
                                <a href="./article.php?page=1">&gt;&gt; Voir tous les articles</a>
                            </div>

                        </div>


                        <div id="right" class="SideBar">
                                <div id="events">

                                    <?php while ($event = mysqli_fetch_assoc($eventSet)) { ?>
                                        <div class="LessNews">
                                            <a href="../Views/Events.php?id=<?php echo $event['id']; ?>">
                                                <h3><?php echo $event['title']; ?></h3>
                                                <p><?php echo $event['description']; ?></p>
                                            </a>
                                        </div>
                                    <?php } ?>
                                   
                            </div>

                        </div>

                                 <?php 
                                    require("../Views/footer.php");        
                                 ?>

    </body>

</html>

