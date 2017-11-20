<?php

//confirm if there is no error with a query
function confirmQuery($resultSet) {
        if (!$resultSet) {
                die("Database query failed.");
        }
}



/* the news are sorted from the most recent to the least one */
function getNews($limit=0) {
    global $db;
    $query  = "SELECT * ";
    $query .= "FROM News ";
    $query .= "ORDER BY date_of_publication DESC";
    if ($limit > 0) {
        $query .= " LIMIT {$limit}";
    }
    $newsSet = mysqli_query($db, $query);
    confirmQuery($newsSet);
    return $newsSet;
}


/* the events are sorted from the most recent to the least one */
function getEvents($limit=0) {
    global $db;
    $query  = "SELECT * ";
    $query .= "FROM Event ";
    $query .= "ORDER BY date_of_publication DESC";
    if ($limit > 0) {
        $query .= " LIMIT {$limit}";
    }
    $eventSet = mysqli_query($db, $query);
    confirmQuery($eventSet);
    return $eventSet;
}

//get all researcher that are accepted 
function getSearchers($limit=0){

    global $db;

    $query = "SELECT * ";
    $query .= "FROM Searcher WHERE accepted='1' ";
    if ($limit > 0) {
        $query .= " LIMIT {$limit}";
    }

    $searcherSet = mysqli_query($db, $query);
    confirmQuery($searcherSet);
    return $searcherSet;

}

//get reseachers request to join the web site
function getResearchersRequest($limit=0){

    global $db;

    $query = "SELECT * ";
    $query .= "FROM Searcher WHERE accepted='0' OR bloqued='1' ";
    if ($limit > 0) {
        $query .= " LIMIT {$limit}";
    }

    $searchersRequest = mysqli_query($db, $query);
    confirmQuery($searchersRequest);
    return $searchersRequest;

}

//getpublications
function getPublications($limit=0){

    global $db;

    $query = "SELECT * ";
    $query .= "FROM Publication ";
    $query .= "ORDER BY date_upload DESC";

    

    if ($limit > 0) {
        $query .= " LIMIT {$limit}";
    }

    $publicationSet = mysqli_query($db, $query);
    confirmQuery($publicationSet);

    return $publicationSet;

}

//get journals from databse
function getJournals($limit=0){

    global $db;

    $query = "SELECT * ";
    $query .= "FROM Journal ";
    $query .= "ORDER BY title DESC";

    if ($limit > 0 ) {

        $query .= "LIMIT {$limit} ";
    }

    $journalSet = mysqli_query($db,$query);
    confirmQuery($journalSet);
    return $journalSet;


}
//retreive the list of conferences via database sortend by time
function getConferences($limit=0){

    global $db;

    $query = "SELECT * ";
    $query .= "FROM Conference ";
    $query .= "ORDER BY date_soumission DESC, date_occure DESC , title DESC ";

    if ($limit > 0 ) {

        $query .= "LIMIT {$limit} ";
    }

    $conferenceSet = mysqli_query($db,$query);
    confirmQuery($conferenceSet);
    return $conferenceSet;


}

//add a researcher using the sign un form
function addSearcher($lastname,$firstname,$country,$continent,$searchFiled,$biblio,$date_birth,$grade,$affiliation,$email,$pswd,$publications){

    global $db;

    $query = "INSERT INTO Searcher ";
    $query .= "(first_name,last_name,country,continent,search_field,biblio,date_birth,Grade,affiliation,email,password,publications) ";
    $query .= "VALUES ('{$firstname}', '{$lastname}', '{$country}','{$continent}','{$searchFiled}','{$biblio}','{$date_birth}','{$grade}',
    '{$affiliation}','{$email}','{$pswd}','{$publications}')"; 
    
    $result = mysqli_query($db,$query);
  

}
//set background color of a page that has the name pagename
function setColor($pageName,$color){

  global $db;

    $query = "UPDATE ColorPage SET color='".$color."' WHERE name_page='".$pageName."'" ;
    $result = mysqli_query($db,$query);
}
//Set the path of the header picture
function setHeaderPic($path){

  global $db;

    $query = "UPDATE Header SET link='".$path."' WHERE ID='1'" ;
    $result = mysqli_query($db,$query);
}
//get the path of the header picture
function getHeaderPic(){
    global $db;

    $query = "SELECT link FROM Header WHERE ID='1'";

    $result = $db->query($query);
    confirmQuery($result);
    
    $row=$result->fetch_assoc();
    return $row["link"];

}
//get background color for a page that hane pagename as a name 
function getColor($pageName){
    global $db;

    $query = "SELECT color FROM ColorPage WHERE name_page='".$pageName."'";

    $result = $db->query($query);
    confirmQuery($result);
    
    $row=$result->fetch_assoc();
    return $row["color"];

}

//get number of news

function getNewsCount() {
    global $db;

    $query = "SELECT COUNT(*) AS Count FROM News";
    $result = $db->query($query);
    confirmQuery($result);
    $row=$result->fetch_assoc();
    return $row["Count"];
}


// News are indexed starting from 0
function getNewsInRange($start, $number_of_news) {
    global $db;

    $query = "SELECT * FROM News ORDER BY date_of_publication DESC LIMIT {$start}, {$number_of_news}";
    $result = $db->query($query);
    confirmQuery($result);
    return $result;
}

//accept research using ID
function acceptResearcher($id){

    global $db;

    $query = "UPDATE Searcher SET accepted='1',bloqued='0' WHERE ID='".$id."'" ;

    $result = mysqli_query($db,$query);

}

//bloque researcher using ID
function bloqueResearcher($id){

    global $db;

    $query = "UPDATE Searcher SET bloqued='1' WHERE ID='".$id."'" ;
    $result = mysqli_query($db,$query);

}

//Delete researcher via ID
function deleteResearcher($id){

    global $db;

    $query = "DELETE FROM Searcher WHERE ID='".$id."'" ;
    $result = mysqli_query($db,$query);

}

//Set the color of the navigation menu
function setColorMenu($color){

  global $db;

    $query = "UPDATE Header SET colorMenu='".$color."'" ;
    $result = mysqli_query($db,$query);
}

//get the color of the navigation menu

function getColorMenu(){
    global $db;

    $query = "SELECT colorMenu FROM Header ";

    $result = $db->query($query);
    confirmQuery($result);
    
    $row=$result->fetch_assoc();
    return $row["colorMenu"];

}

?>