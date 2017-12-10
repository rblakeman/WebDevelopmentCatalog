<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <title>Final Project</title>
        
        <a href="login.php">Log In</a>
    </head>
    <body>
        <nav>
            <form method="post">
                <span id="Filter"><strong>Sort - </strong></span>
                <select name = "sorttype">
                    <option value="name">Name</option>
                    <option value="year">Year</option>
                    <option value="price">Price</option>
                </select>
                <select name = "sortorder">
                    <option value="ascending">Asc</option>
                    <option value="descending">Desc</option>
                </select>
                <input class="btn btn-primary btn-sm" type="submit" name="submit" value="Submit">
                <br>
                    
                <strong><span id="Filter">Filter - </span> Name:</strong>  <input type="text" name="typedtext" placeholder="Game Name" value="<?=$_GET['typedtext']?>"/>
                <strong> Year:</strong> <input type="number" name="year" width:"4" style="width: 4em" value="year">
                <br>
                <strong>Platform:</strong>
                <input type="checkbox" name="pc" value="true">PC
                <input type="checkbox" name="switch" value="true">Switch
                <input type="checkbox" name="ps4" value="true">PS4
                <input type="checkbox" name="wiiu" value="true">WiiU
                <br>
            </form>
        </nav>
        
        <span id="categories">
        </span>
        <span id='games'>
        <?php
            $i = 0; # counter
            $tempfilter = array();
            # Filter
            if (!empty($_POST['typedtext'])) {# Name
                $tempfilter[$i] = " name LIKE '%" . $_POST['typedtext'] . "%' ";
                $i++;
            }
            if ($_POST['pc'] == "true") { # pc
                $tempfilter[$i] = " platform = 1 ";
                $i++;
            }
            if ($_POST['switch'] == "true") { # switch
                $tempfilter[$i] = " platform = 11 ";
                $i++;
            }
            if ($_POST['ps4'] == "true") { # ps4
                $tempfilter[$i] = " platform = 21 ";
                $i++;
            }
            if ($_POST['wiiu'] == "true") { # wiiu
                $tempfilter[$i] = " platform = 31 ";
                $i++;
            }
            if ($_POST['year'] != null){
                $tempfilter[$i] = " year = ".$_POST['year']." ";
                $i++;
            }
            
            for ($j = 0; $j < count($tempfilter); $j++) #concat that filter string!
            {
                if ($j == 0 && !empty($tempfilter[0]))
                {
                    $dispatch = $dispatch . "WHERE";
                }
                $dispatch = $dispatch . $tempfilter[$j];
                if (strpos($tempfilter[$j], 'title') && !empty($tempfilter[$j+1]))
                {
                    $dispatch = $dispatch . " AND";
                }
                else if (strpos($tempfilter[$j], 'genre') && strpos($tempfilter[$j+1],'yearReleased'))
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
            if ($_POST['sorttype'] == "name" && $_POST['sortorder'] == "ascending") # Name
                $dispatch = $dispatch . "ORDER BY name ASC";
            else if ($_POST['sorttype'] == "name" && $_POST['sortorder'] == "descending")
                $dispatch = $dispatch . "ORDER BY name DESC";
            else if ($_POST['sorttype'] == "year" && $_POST['sortorder'] == "ascending")
                $dispatch = $dispatch . "ORDER BY year ASC";
            else if ($_POST['sorttype'] == "year" && $_POST['sortorder'] == "descending")
                $dispatch = $dispatch . "ORDER BY year DESC";
            else if ($_POST['sorttype'] == "price" && $_POST['sortorder'] == "ascending")
                $dispatch = $dispatch . "ORDER BY price ASC";
            else if ($_POST['sorttype'] == "price" && $_POST['sortorder'] == "descending")
                $dispatch = $dispatch . "ORDER BY price DESC";
        
            include 'php/api.php';
            $statement = "games ".$dispatch;
            $dbArray = getData($statement);
            
            foreach($dbArray as $result) {
                echo "<div id='row'>";
                echo "<span id='platform'><img src='logo/";
                    if ($result['platform'] == 1)
                        echo "pclogo";
                    else if ($result['platform'] == 11)
                        echo "switchlogo";
                    else if ($result['platform'] == 21)
                        echo "ps4logo";
                    else if ($result['platform'] == 31)
                        echo "wiiulogo";
                echo ".png' width=42 height=42></span>";
                echo "<span id='name'> ".$result['name']." </span>";
                echo "<span id='year'> ".$result['year']." </span>";
                echo "<span id='esrb'><img src='esrb/";
                    if ($result['esrb'] == 1)
                        echo "e";
                    else if ($result['esrb'] == 11)
                        echo "e10";
                    else if ($result['esrb'] == 21)
                        echo "t";
                    else if ($result['esrb'] == 31)
                        echo "m";
                echo ".png' width=34 height=48></span>";
                echo "<span id='price'> $".$result['price']." </span>";
                echo "</div>";
                
            }
        ?>
        </span>
    </body>
    <footer>
        <hr>
        CST 336. 2017&copy; Blakeman <br />
        <strong>Disclaimer:</strong> The information is used for academic purposes only. <br />
    </footer>
</html>