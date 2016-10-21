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

    //SQL command
    $sql = "SELECT * FROM main;";
    //Run SQL
    $result = mysqli_query($db,$sql);
    

    //単語リスト数取得
    $count = 0;
    //単語格納
    $aray = [];
    
    
    echo "<pre>";
    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
        $array[$count] = $row;
        echo $count."   ".$array[$count][0]."<br>";
        $count++;
    }
    echo "</pre>";
    
    
    //単語配列からランダム抜き出し
    $rand_keys = array_rand($array, 1);
    echo $rand_keys. "<br>";
    echo $array[$rand_keys][0];
    
    //printf ("%s (%s)\n", $row[0], $row[4]);
?>


