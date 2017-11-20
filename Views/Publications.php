<?php require_once("../Models/db_connection.php"); ?>
<?php require_once("../Models/functions.php"); ?>
<?php $color = getColor(basename($_SERVER['PHP_SELF']));?>
<?php $publicationSet = getPublications(); ?>

<html>
    <head>
        <link href="../Style/publicationStyle.css" type="text/css" rel=" stylesheet"  />
    </head>


    <body style="background-color:<?php echo strtoupper($color); ?>;">  
                <?php 
                    require("../Views/header.php");        
                ?>


                            <input type="text" id="searchPublication" onkeyup="searchPhd()" placeholder="Search for names.." title="Type in a name">

            <table id="publicationTable">
                    <thead>
                        <tr class="header">
                            <th style="width:33%;" onclick="sort_table(searchers, 0, asc1); asc1 *= -1; asc2 = 1; asc3 = 1;">Titre</th>
                            <th style="width:33%;" onclick="sort_table(searchers, 3, asc2); asc1 *= -1; asc2 = 1; asc3 = 1;">Domaine</th>
                            <th style="width:33%;" onclick="sort_table(searchers, 5, asc3); asc1 *= -1; asc2 = 1; asc3 = 1;">Date publication</th>
                        </tr>
                    </thead>

                    <tbody id="publications">

                  
    
                                <?php 
                                while ($publication = mysqli_fetch_assoc($publicationSet)) { ?>
                                        <a> 
                                                <tr> 
                                                        <td><?php echo $publication['title']; ?></td>
                                                        <td><?php echo $publication['field']; ?></td>
                                                        <td><?php echo $publication['date_upload']; ?></td>
                                                     
                                                </tr>
                                        </a>
                                        <a href="Views/Events.php?id=<?php echo $event['id']; ?>">
                                        </a>
                                    <?php } ?>
                        
                        
     
                        
                        
                        

                    </tbody>    


            </table>


    


                <?php 
                require("../Views/footer.php"); 
                ?>      

    </body>

</html>
