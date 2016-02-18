<?php
// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console

$words = array('frog','risk','kick');
$means = array('かえる','危険','蹴る');
$images = array('frog.jpg','risk.jpg','kick.jpg');

echo 'image learning!<br>';
echo $words[1];
echo '<br><br><br><br><br>';


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


// SELECT文を実行する
$sql = "select id, word from main";

if ($result = $db->query($sql)) {
    // 連想配列を取得
    while ($row = $result->fetch_assoc()) {
        echo "<br>".$row["id"] . $row["word"];
    }
    // 結果セットを閉じる
    $result->close();
}





// DB接続を閉じる
$db->close();
?>