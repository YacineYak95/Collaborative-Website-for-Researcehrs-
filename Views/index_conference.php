<?php session_start() ?>
<?php require_once("../Models/db_connection.php"); ?>
<?php require_once("../Models/functions.php"); ?>
<?php 
    $_SESSION["conf"] = $_GET["title"];
    $description = $_GET["description"];
    $title = $_GET["title"];
    $date_soumission = $_GET["date_soumission"];
    $location= $_GET["location"];
    $past_edition= $_GET["past_edition"];
    $occure= $_GET["occure"];

 ?>

<?php $color = getColor(basename($_SERVER['PHP_SELF']));?>

<html>
    <head>
        <link href="../Style/style.css" type="text/css" rel=" stylesheet"  />
        <script src="../Scripts/geolocation.js"></script>


            <style>
      #map {
        height: 60%;
        width: 100%;
       }
#floating-panel {
  position: relative;
  top: 2px;
  left: auto;
  right:auto;
  z-index: 5;
  background-color: #fff;
  border: 1px solid #999;
  text-align: center;
  font-family: 'Roboto','sans-serif';
  width:150px;
}
       
    </style>
    </head>


    <body style="background-color:<?php echo strtoupper($color); ?>;">  
            <div id="content">
                    <?php 
                        require("../Views/header.php");
                    ?>
    
                        <div id="middle" class="SideBar" >
                        
                            <div id="slider">   
                                  <div id="floating-panel">
                                            <b>Mode of Travel: </b>
                                            <select id="mode">
                                            <option value="DRIVING">Driving</option>
                                            <option value="WALKING">Walking</option>
                                            <option value="BICYCLING">Bicycling</option>
                                            <option value="TRANSIT">Transit</option>
                                            </select>
                                    </div>
                                    <div id="map">

 
                                    </div>    

      
                                        <script async defer 
                                                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDf2ylNkop0M6q6YysTgUWlosG-9LMBmZQ&callback=initMap">
                                        </script>                            
                                        <?php echo $description; ?>
                                        
                            </div>

                            <div id="LessNewsContent">
                                    <div class="LessNews">
                                        <a href="Views/News.php">
                                            <h3><?php echo $past_edition ?></h3>
                                            </a>
                                    </div>
                            </div>

                        </div>


                        <div id="right" class="SideBar">
                                <div id="events">
 
                                        <div class="LessNews">
                                            <h2 style="color:white;">Date importante</h2>
                                        </div>
                                    
                                        <div class="LessNews">
                                            <a href=" ">
                                                <a href="#"><h3><?php echo $date_soumission ?></h3></a>
                                            </a>
                                        </div>


                                        <div class="LessNews">
                                            <a href=" ">
                                                <a href="#"><h3><?php echo $occure; ?></h3></a>
                                            </a>
                                        </div>     
                                        
                                         <div class="LessNews">
                                            <h2 style="color:white;">Location</h2>
                                        </div>
                                        <div class="LessNews">
                                            <a href=" ">
                                                <a href="#"><h3><?php echo $location; ?></h3></a>
                                            </a>
                                        </div>                              
                            </div>

                        </div>

            </div>
                                             <?php 
                                    require("../Views/footer.php");        
                                 ?>

    </body>

</html>
