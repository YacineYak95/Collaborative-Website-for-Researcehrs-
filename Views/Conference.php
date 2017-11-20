<?php require_once("../Models/db_connection.php"); ?>
<?php require_once("../Models/functions.php"); ?>
<?php $color = getColor(basename($_SERVER['PHP_SELF']));?>
<?php $coferenceSet = getConferences(); ?>
<html>
    <head>
        <link href="../Style/style.css" type="text/css" rel=" stylesheet"  />
    </head>



    <body style="background-color:<?php echo strtoupper($color); ?>;">                <?php 
                    require("../Views/header.php");        
                ?>
                
                            <div id="LessNewsContent">
                                <?php while ($confernce = mysqli_fetch_assoc($coferenceSet)) { ?>
                                <?php $url = "index_conference.php?title=".$confernce["title"]."&location=".$confernce["location"]."&date_soumission=".$confernce["date_soumission"]."&past_edition=".$confernce["past_edition"]."&description=".$confernce["Description"]."&occure=".$confernce["date_occure"]; ?>
                                    <a href="<?php echo $url ?>" >
                                        <div class="LessNews">
                                            <a href="<?php echo $url ?>" target="_blank">
                                                <h3><?php echo $confernce['title']; ?></h3>
                                            
                                                <p> <?php echo $confernce['location']; ?> </p>
                                                <p> <?php echo $confernce['date_soumission']; ?> </p>

                                                </a>
                                        </div>
                                    </a>

                                <?php } ?>
                                <a href="article.php">1</a> <a href="#">2</a> <a href="#">3</a>
                            </div>



                <?php 
                require("../Views/footer.php"); 
                ?>      

    </body>

</html>
