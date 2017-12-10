<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <title>Final Project</title>
        
        <a href="login.php">Log In</a>
    </head>
    <body>
        <nav>
            <form method="sumbit">
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
                <input type="checkbox" name="ps4" value="true">PS4
                <input type="checkbox" name="switch" value="true">Switch
                <input type="checkbox" name="wiiu" value="true">WiiU
                <br>
            </form>
        </nav>
        
        <span id="categories">
            
        </span>
        <span id='games'>
        <?php
            include 'php/api.php';
            $dbConn = getDatabaseConnection(); 
            $sql = "SELECT * from ".$sql;
            
            $statement = $dbConn->prepare($sql); 
            $statement->execute(); 
            $records = $statement->fetchAll();
            
            /*foreach($dbArray as $result) {
                echo "<span id='platform'>".$result['platform']."</span>"
                echo "<span id='name'>".$result['name']."</span>"
                echo "<span id='genre'></span>"
                echo "<span id='esrb'></span>"
                echo "<span id='price'></span>"
                
            }*/

        ?>
        </span>
    </body>
    <footer>
        <hr>
        CST 336. 2017&copy; Blakeman <br />
        <strong>Disclaimer:</strong> The information is used for academic purposes only. <br />
    </footer>
</html>