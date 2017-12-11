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

function getData($sql) {
    $dbConn = getDatabaseConnection(); 
    $sql = "SELECT * from ".$sql;
    echo $sql;
    $statement = $dbConn->prepare($sql); 
    $statement->execute(); 
    return $dbArray = $statement->fetchAll();
}

function deleteData($sql) {
    $dbConn = getDatabaseConnection(); 
    echo $sql;
    $statement = $dbConn->prepare($sql); 
    $statement->execute();
}

function validateUser($typedusername, $typedpassword) {
    $statement = "admin WHERE username = ".$typedusername;
    $data = getData($statement);
    if (!empty($data))
    {
        if ($data[0]['password'] == $typedpassword)
        {
            echo "Successful Login";
            echo json_encode("Welcome Back: ".$data[0]['username']);
        }
    }
    echo "Failed Login";
}

if ($_GET['action'] == 'validate-password' )
{
    $typedusername = $_GET['typedusername'];
    $typedpassword = $_GET['typedpassword'];
    validateUser($typedusername, $typedpassword); 
}
?>
