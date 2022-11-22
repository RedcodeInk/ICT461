<?php
    $blob_id = $_REQUEST['blob_id']; 
    //gets the request variable from the url that contains the id of the 
    //blob that we want to retrieve from the databse
    mysql_connect('student', 'root', 'root') 
    OR DIE('Unable to connect to database! Please try again later.');
    mysql_select_db('student');
    
    $sql = "SELECT blob_id, blob_name, blob_url FROM tblBlob";
    $result = mysql_query($sql) or exit("QUERY FAILED!");
    if ($result):
        while ($row = mysql_fetch_array($result)):
            echo('<h2><a href="' . $row['blob_url'] . '">' . $row['blob_name'] . '</a></h2>');
            echo('<br />');
            echo('<img alt="' . $row['blob_name'] . '" src="doImage.php?blob_id=' . $row['blob_id'] . '&resize=280,215" />');
            echo('<br /><hr />');
        endwhile;
    endif;
?>