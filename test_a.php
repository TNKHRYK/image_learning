<?php

    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "il_service";
    $dbport = 3306;
    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);
    
    // Check connection
    if ($db->connect_error) {
     die("Connection failed: " . $db->connect_error);
    } 
    echo "Connected successfully (".$db->host_info.")";


    //MySQL命令
    $sql_insert = "INSERT INTO il_service.main (id)  VALUES (99);";
    $result = mysqli_query($db,$sql_insert);
    
    
    print_r( "result".$result );
    
    echo "<pre>";
    print_r( $sql_insert );
    echo "</pre>";

?>