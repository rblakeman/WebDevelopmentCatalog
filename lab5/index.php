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
                    <option value="price">Price</option>
                    <option value="pascending">-->Ascending</option>
                    <option value="pdescending">-->Descending</option>
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
            
            $i = 0; # counter
            $tempfilter = array();
            # Filter
            if (!empty($_GET['typedtext'])) {# Name
                $tempfilter[$i] = " deviceName LIKE '%" . $_GET['typedtext'] . "%' ";
                $i++;
            }

            if ($_GET['available'] == "true") { # Status
                $tempfilter[$i] = " status = 'Available' ";
                $i++;
            }
            if ($_GET['checkedout'] == "true") {
                $tempfilter[$i] =  " status = 'CheckedOut' ";
                $i++;
            }
            if ($_GET['tablet'] == "true") { # Type
                $tempfilter[$i] = " deviceType = 'Tablet' ";
                $i++;
            }
            if ($_GET['camera'] == "true") {
                $tempfilter[$i] =  " deviceType = 'Camera' ";
                $i++;
            }
            if ($_GET['vrheadset'] == "true") {
                $tempfilter[$i] =  " deviceType = 'VR Headset' ";
                $i++;
            }
            if ($_GET['webcam'] == "true") {
                $tempfilter[$i] =  " deviceType = 'Webcam' ";
                $i++;
            }
            if ($_GET['smartphone'] == "true")  {
                $tempfilter[$i] =  " deviceType = 'Smartphone' ";
                $i++;
            }
            if ($_GET['laptop'] == "true")  {
                $tempfilter[$i] =  " deviceType = 'Laptop' ";
                $i++;
            }
            if ($_GET['microphone'] == "true") {
                $tempfilter[$i] =  " deviceType = 'Microphone' ";
                #$i++;
            }
            for ($j = 0; $j < count($tempfilter); $j++) #concat that filter string!
            {
                if ($j == 0 && !empty($tempfilter[0]))
                {
                    $dispatch = $dispatch . "WHERE";
                }
                $dispatch = $dispatch . $tempfilter[$j];
                if (strpos($tempfilter[$j], 'deviceName') && !empty($tempfilter[$j+1]))
                {
                    $dispatch = $dispatch . " AND";
                }
                else if (strpos($tempfilter[$j], 'status') && strpos($tempfilter[$j+1],'deviceType'))
                {
                    $dispatch = $dispatch . " AND";
                }
                else {
                    if (!empty($tempfilter[$j+1]))
                    {
                        $dispatch = $dispatch . " OR";
                    }
                }
            }
            
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
            
            #echo $dispatch;
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