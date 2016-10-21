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
    die("Connection failed: " . $db->connect_error);
    } 
    echo "Connected successfully (".$db->host_info.")";

    // CSVファイル取得
    $filepath = "data/test.csv";
    
    $file = new SplFileObject($filepath); 
    $file->setFlags(SplFileObject::READ_CSV);
    
    // 全行のINSERTデータ格納用
    $ins_values = "";
    
    // ファイル内のデータループ
    foreach ( $file as $key => $line ) {
 
        // 配列の値がすべて空か判定
        $judge = count( array_count_values( $line ) );
         
        if( $judge == 0 ){
             
            // 配列の値がすべて空の時の処理
            continue;
        }
         
        // 1行毎のINSERTデータ格納用
        $values = "";
 
        foreach ( $line as $line_key => $str ) {
             
            if( $line_key > 0 ){
 
                $values .= ", ";
            }
 
            // INSERT用のデータ作成
            //$values .= "'".mb_convert_encoding( $str, "utf-8", "sjis" )."'";
            $values .= $str;
        }
         
        if( !empty( $ins_values ) ){ 
            $ins_values .= ", ";
        }
        $ins_values .= "(". $values . ")";
    }
 
    //$sql_insert = "REPLACE INTO il_service.main (id, level)  VALUES (5552, 9);";
    //$sql_insert = "REPLACE INTO il_service.main ( id, flag, word, initial, level, kind, image_name, jp_mean_1, wordclass_1, jp_mean_2, wordclass_2, jp_mean_3, wordclass_3, jp_mean_4, wordclass_4, jp_mean_5, wordclass_5, created ) VALUES " . $ins_values;
    
    //SQL文実行
    $sql_insert = "REPLACE INTO il_service.main ( id, flag, word) VALUES " . $ins_values;
    //成功なら1
    $result = mysqli_query($db,$sql_insert);
    
    echo "<pre>";
    print_r( "result".$result );
    echo "</pre>";
     
    echo "<pre>";
    print_r( "sql_insert".$sql_insert );
    echo "</pre>";
?>