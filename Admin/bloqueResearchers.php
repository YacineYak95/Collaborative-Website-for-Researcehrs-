<?php require_once("../Models/db_connection.php"); ?>
<?php require_once("../Models/functions.php"); ?>

<?php $searcherSet = getSearchers(); ?>
<?php $color = getColor(basename($_SERVER['PHP_SELF']));?>

<html>
    <head>
        <link href="../Style/chercheurStyle.css" type="text/css" rel=" stylesheet"  />
        <script src="../Scripts/chercheurScript.js"></script>
        <script src="../Scripts/jquery-3.1.1.js"></script>
        <script>
                    $(document).ready(function(){

                            $('.bloque').click(function(){
                                var clickBtnValue = $(this).val();
                                var ajaxurl = 'ajax.php',
                                data =  {'bloque': clickBtnValue};
                                $.post(ajaxurl, data, function (response) {
                                    // Response div goes here.
                                    alert("action performed successfully");
                                    location.reload();
                                });
                            });

                           $('.delete').click(function(){
                                var clickBtnValue = $(this).val();
                                var ajaxurl = 'ajax.php',
                                data =  {'delete': clickBtnValue};
                                $.post(ajaxurl, data, function (response) {
                                    // Response div goes here.
                                    alert("action performed successfully");
                                    location.reload();
                                });
                            });

                });
    </script>
    </head>


    <body style="background-color:<?php echo strtoupper($color); ?>;">
        <?php 
            require("header.php");        
        ?>

            <input type="text" id="search" onkeyup="searchPhd()" placeholder="Search for names.." title="Type in a name">

            <table id="SearcherTable">
                    <thead>
                        <tr class="header">
                            <th style="width:20%;" onclick="sort_table(searchers, 0, asc1); asc1 *= -1; asc2 = 1; asc3 = 1;">First name</th>
                            <th style="width:20%;">Last name</th>
                            <th style="width:20%;" onclick="sort_table(searchers, 5, asc3); asc1 *= -1; asc2 = 1; asc3 = 1;">Research field</th>
                            <th style="width:20%;">Bloque</th>
                            <th style="width:20%;">Delete</th>


                        </tr>
                    </thead>

                    <tbody id="searchers">
                                    <?php while ($searcher = mysqli_fetch_assoc($searcherSet)) { ?>
                                                <tr> 
                                                                <?php $url = "SearcherProfil.php?last_name=".$searcher['last_name']."&first_name=".$searcher['first_name']."&country=".$searcher['country']."&search_field=".$searcher['search_field'].""; ?>

                                                        <td><a href="<?php echo $url; ?>"> 
                                                                <?php echo $searcher['first_name']; ?>
                                                        
                                                        
                                                        </a></td>     

                                                        <td> <?php echo $searcher['last_name']; ?></td>
                                                        <td><?php echo $searcher['search_field']; ?></td>
                                                        <td><button class="bloque" name="bloque" value="<?php echo $searcher['ID'];?>" />Bloquer</td>

                                                         <td><button class="delete" name="delete" value="<?php echo $searcher['ID'];?>" />Delete</td>                                                       
                                                        
                                                </tr>

                                        
                                    <?php } ?>

                    </tbody>    


            </table>



                <?php 
                require("../Views/footer.php"); 
                ?>      

    </body>

</html>
