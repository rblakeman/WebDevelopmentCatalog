<?php
function getDatabaseConnection() {
    $host = 'us-cdbr-iron-east-05.cleardb.net';
    $dbname = 'heroku_802d0206eb50421';
    $username = 'b589bb7b7cae8b';
    $password = '1cff1392';
    
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbConn; 
}
?>
