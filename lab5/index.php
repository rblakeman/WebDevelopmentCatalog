<!DOCTYPE html>
<html>
    <head>
        <title>Lab 5</title>
        <meta charset="utf-8" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="title">Tech Checkout</div>
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
                <input type="submit" name="submit" value="Submit">
                <br>
                
                <span id="Filter">Filter - </span>
                Name:
                <input type="text" name="typedtext" placeholder="Product Name" value="<?=$_GET['typedtext']?>"/>
                Status:
                <input type="checkbox" name="available" value="true">Available
                <input type="checkbox" name="checkedout" value="true">Checked Out
                <br>
                Type:
                <input type="checkbox" name="tablet" value="true">Tablet
                <input type="checkbox" name="camera" value="true">Camera
                <input type="checkbox" name="vrheadset" value="true">VR Headset
                <input type="checkbox" name="webcam" value="true">Webcam
                <input type="checkbox" name="smartphone" value="true">Smartphone
                <input type="checkbox" name="laptop" value="true">Laptop
                <input type="checkbox" name="microphone" value="true">Microphone
            </form>
        </nav>
        <?php
            $host = 'us-cdbr-iron-east-05.cleardb.net';
            $dbname = 'heroku_802d0206eb50421';
            $username = 'b589bb7b7cae8b';
            $password = '1cff1392';
            $dbConn = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
            $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $dispatch = "SELECT * FROM device ";
            
            # Filter
            if (!empty($_GET['name'])); # Name
                #$dispatch = $dispatch . "WHERE deviceName == '" . $_GET['device-name'] . "'";
            
            if ($_GET['available'] == "true") # Status
                $dispatch = $dispatch . "WHERE status == 'Available' OR ";
            if ($_GET['checkedout'] == "true")
                $dispatch = $dispatch . "WHERE status == 'CheckedOut' OR ";
                
            if ($_GET['tablet'] == "true") # Type
                $dispatch = $dispatch . "WHERE deviceType == available OR ";
            if ($_GET['camera'] == "true")
                $dispatch = $dispatch . "WHERE deviceType == available OR ";
            if ($_GET['vrheadset'] == "true")
                $dispatch = $dispatch . "WHERE deviceType == available OR ";
            if ($_GET['webcam'] == "true")
                $dispatch = $dispatch . "WHERE deviceType == available OR ";
            if ($_GET['smartphone'] == "true")
                $dispatch = $dispatch . "WHERE deviceType == available OR ";
            if ($_GET['laptop'] == "true")
                $dispatch = $dispatch . "WHERE deviceType == available OR ";
            if ($_GET['microphone'] == "true")
                $dispatch = $dispatch . "WHERE deviceType == available OR ";
            
            # Sort
            if ($_GET['sort'] == "name" || $_GET['sort'] == "nascending") # Name
                $dispatch = $dispatch . "ORDER BY deviceName ASC";
            else if ($_GET['sort'] == "ndescending")
                $dispatch = $dispatch . "ORDER BY deviceName DESC";
            else if ($_GET['sort'] == "price" || $_GET['sort'] == "pascending") # Price
                $dispatch = $dispatch . "ORDER BY price ASC";
            else if ($_GET['sort'] == "pdescending")
                $dispatch = $dispatch . "ORDER BY price DESC";
            else # Default Case
                $dispatch = $dispatch . "ORDER BY deviceName ASC";
            
            echo $dispatch;
            #$dispatch = "SELECT * FROM device ORDER BY deviceName ASC";
            $dbData = $dbConn->query($dispatch);
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
                ?><div id="row"><div id="column"><?php
                echo $dbArray[$i]['deviceName'];
                ?></div><div id="column"><?php
                echo $dbArray[$i]['deviceType'];
                ?></div><div id="column"><?php
                echo $dbArray[$i]['price'];
                ?></div><div id="column"><?php
                echo $dbArray[$i]['status'];
                ?></div></div><?php
            }
            
        ?>
    </body>
    <footer>
        <hr>
            CST 336. 2017&copy; Blakeman <br />
            <strong>Disclaimer:</strong> The information is used for academic purposes only. <br />
    </footer>
</html>