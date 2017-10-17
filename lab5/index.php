<!DOCTYPE html>
<html>
    <head>
        <title>Lab 5</title>
        <meta charset="utf-8" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <nav>
            <form>
                <input type="radio" id="lavailable" name="status" value="available">
                <label for="Available"></label><label for="lavailable"> Available </label>
                <input type="radio" id="lcheckedout" name="status" value="checkedout">
                <label for="CheckedOut"></label><label for="lcheckedout"> CheckedOut </label>
            </form>
        </nav>
        <?php
            $host = 'us-cdbr-iron-east-05.cleardb.net';
            $dbname = 'heroku_802d0206eb50421';
            $username = 'b589bb7b7cae8b';
            $password = '1cff1392';
            $dbConn = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
            $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $dbData = $dbConn->query("SELECT * FROM device"); //WHERE deviceType = 'Camera'"); // gets data base object
            $dbArray = $dbData->fetchAll(); // gets associative array of data
            ?><div id="bar">
                <div id="names">Name</div>
                <div id="types">Type</div>
                <div id="available">Status</div>
                <br>
            </div>
            <?php
            for ($i = 0; $i < sizeof($dbArray); $i++)
            {
                if ($i % 2 == 0) {
                    ?><div id="whitecol">
                    <div id="names"><?php
                    echo $dbArray[$i]['deviceName'];
                    ?></div><div id="types"><?php
                    echo $dbArray[$i]['deviceType'];
                    ?></div><div id="available"><?php
                    echo $dbArray[$i]['status'];
                    ?></div><?php
                    echo "<br>";
                    ?></div><?php
                }
                else {
                    ?><div id="greycol">
                    <div id="names"><?php
                    echo $dbArray[$i]['deviceName'];
                    ?></div><div id="types"><?php
                    echo $dbArray[$i]['deviceType'];
                    ?></div><div id="available"><?php
                    echo $dbArray[$i]['status'];
                    ?></div><?php
                    echo "<br>";
                    ?></div><?php
                }
            }
            
        ?>
    </body>
    <footer>
        <hr>
            CST 336. 2017&copy; Blakeman <br />
            <strong>Disclaimer:</strong> The information is used for academic purposes only. <br />
    </footer>
</html>