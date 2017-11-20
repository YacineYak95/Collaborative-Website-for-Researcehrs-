<?php require_once("../Models/db_connection.php"); ?>
<?php require_once("../Models/functions.php"); ?>

<?php $journalSet = getJournals(); ?>
<?php $color = getColor(basename($_SERVER['PHP_SELF']));?>

<html>
    <head>
        <link href="../Style/style.css" type="text/css" rel=" stylesheet"  />
    </head>


    <body style="background-color:<?php echo strtoupper($color); ?>;">  
            <div id="content">
        <?php 
            require("../Views/header.php");        
        ?>


                        
                            <div id="LessNewsContent">
                                <?php while ($journal = mysqli_fetch_assoc($journalSet)) { ?>
                                    <a href="<?php echo $journal['link_journal']; ?>" >
                                        <div class="LessNews">
                                            <a href="<?php echo $journal['link_journal']; ?>" target="_blank">
                                                <h3><?php echo $journal['title']; ?></h3>
                                            
                                                <p> <?php echo $journal['editor']; ?> </p>
                                                <p> <?php echo $journal['impact_factor']; ?> </p>

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
