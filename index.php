<?php
    // A simple PHP script demonstrating how to connect to MySQL.
    // Press the 'Run' button on the top to start the web server,
    // then click the URL that is emitted to the Output tab of the console.
    
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "il_service";
    $dbport = 3306;
    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);
    
    // Check connection
    if ($db->connect_error) {
        echo "Connected successfully (".$db->host_info.")";
        die("Connection failed: " . $db->connect_error);
    } 
    echo "Connected successfully (".$db->host_info.")";

    //SQL文
    $sql = "SELECT * FROM main;";
    //実行
    $result = mysqli_query($db,$sql);
    
    echo "<pre>";
    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
        echo $row[0]."<br>";
    }
    
    echo "</pre>";
?>