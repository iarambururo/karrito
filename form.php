<?php

//CREDENTIALS FOR DB
define ('DBSERVER', '10.14.4.159');
define ('DBUSER', 'Ian');
define ('DBPASS','Zubiri19');
define ('DBNAME','karritoa');

//LET'S INITIATE CONNECT TO DB
$connection = mysql_connect(DBSERVER, DBUSER, DBPASS) or die("Can't connect to server. Please check credentials and try again");
$result = mysql_select_db(DBNAME) or die("Can't select database. Please check DB name and try again");

//CREATE QUERY TO DB AND PUT RECEIVED DATA INTO ASSOCIATIVE ARRAY
if (isset($_REQUEST['query'])) {
    $query = $_REQUEST['query'];
    $sql = mysql_query ("SELECT Izena FROM errezetak WHERE Izena LIKE '%{$query}%'");
	$array = array();
    while ($row = mysql_fetch_array($sql)) {
        $array[] = array (
            'label' => $row['Izena'],
            'value' => $row['Izena'],
        );
    }
    //RETURN JSON ARRAY
    echo json_encode ($array);
}

?>