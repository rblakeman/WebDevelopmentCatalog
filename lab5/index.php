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
                <span id="Filter">Sort - </span>
                <select name = "sort">
                    <option value="name">Name</option>
                    <option value="nascending">-->Ascending</option>
                    <option value="ndescending">-->Descending</option>
                    <option value="type">Price</option>
                    <option value="tascending">-->Ascending</option>
                    <option value="tdescending">-->Descending</option>
                </select>
                <br>
                
                <span id="Filter">Filter - </span>
                Name:
                <input type="text" name="name" placeholder="Product Name" value="<?=$_GET['name']?>"/>
                Status:
                <input type="checkbox" name="status" value="available" checked>Available
                <input type="checkbox" name="status" value="checkedout" checked>Checked Out
                <br>
                Type:
                <input type="checkbox" name="type" value="tablet" checked>Tablet
                <input type="checkbox" name="type" value="camera" checked>Camera
                <input type="checkbox" name="type" value="vrheadset" checked>VR Headset
                <input type="checkbox" name="type" value="webcam" checked>Webcam
                <input type="checkbox" name="type" value="smartphone" checked>Smartphone
                <input type="checkbox" name="type" value="laptop" checked>Laptop
                <input type="checkbox" name="type" value="microphone" checked>Microphone
            </form>
        </nav>
        <?php
            $host = 'us-cdbr-iron-east-05.cleardb.net';
            $dbname = 'heroku_802d0206eb50421';
            $username = 'b589bb7b7cae8b';
            $password = '1cff1392';
            $dbConn = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
            $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $dbData = $dbConn->query("SELECT * FROM device ORDER BY deviceName ASC");
            if ($_GET['sort'] == "name" || $_GET['sort'] == "nascending")
                $dbData = $dbConn->query('SELECT * FROM device ORDER BY deviceName ASC');
            else if ($_GET['sort'] == "ndescending")
                $dbData = $dbConn->query('SELECT * FROM device ORDER BY deviceName DESC');
            
            else if ($_GET['sort'] == "price" || $_GET['sort'] == "pascending")
                $dbData = $dbConn->query('SELECT * FROM device ORDER BY price ASC');
            else if ($_GET['sort'] == "pdescending")
                $dbData = $dbConn->query('SELECT * FROM device ORDER BY price DESC');
            
            $dbArray = $dbData->fetchAll();
            ?><div id="bar"><div id="row2">
                <div id="column2">Name</div>
                <div id="column2">Type</div>
                <div id="column2">Price</div>
                <div id="column2">Status</div>
            </div></div>
            <?php
            for ($i = 0; $i < sizeof($dbArray); $i++)
            {
                ?><div id="whitecol">
                <div id="row"><?php
                if ($i % 2 == 0) {
                    ?><div id="column"><?php
                    echo $dbArray[$i]['deviceName'];
                    ?></div><div id="column"><?php
                    echo $dbArray[$i]['deviceType'];
                    ?></div><div id="column"><?php
                    echo $dbArray[$i]['price'];
                    ?></div><div id="column"><?php
                    echo $dbArray[$i]['status'];
                    ?></div></div><?php
                    ?><div id="greycol"><?php
                }
                else {
                    ?><div id="column"><?php
                    echo $dbArray[$i]['deviceName'];
                    ?></div><div id="column"><?php
                    echo $dbArray[$i]['deviceType'];
                    ?></div><div id="column"><?php
                    echo $dbArray[$i]['price'];
                    ?></div><div id="column"><?php
                    echo $dbArray[$i]['status'];
                    ?></div></div><?php
                }
                ?></div><?php
            }
            
        ?>
    </body>
    <footer>
        <hr>
            CST 336. 2017&copy; Blakeman <br />
            <strong>Disclaimer:</strong> The information is used for academic purposes only. <br />
    </footer>
</html>