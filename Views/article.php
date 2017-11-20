<?php
    if (!isset($_GET['page'])) {
        header('Location: ./index.php');
        exit();
    }
    $page = (int) $_GET['page'];
    $start = ($page - 1) * 10;
?>

<html>
    <head>
        <link href="../Style/style.css" type="text/css" rel=" stylesheet"  type='text/css' />

    </head>


    <body>
            <?php require("header.php"); ?>

        <?php

            $newsSet = getNewsInRange($start, 10);
            $newsCount = getNewsCount();
            $pagesCount = ceil($newsCount / 10);

        ?>
    

                            <div id="allnews">

                                    <?php while ($news = $newsSet->fetch_assoc()) { ?>
                                        <div class="LessNews">
                                            <a href="News.html">
                                                <h3><?php echo $news['title']; ?></h3>
                                                <p><?php echo $news['description']; ?></p>
                                            </a>
                                        </div>
                                    <?php } ?>

                                    <?php for ($i=1; $i <= $pagesCount; $i++) { ?>
                                        <a href="./article.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                    <?php } ?>
        
                            </div>


            </div>

                <?php 
                require("footer.php"); 
                ?>      

    </body>

</html>
