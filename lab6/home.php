<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lab 6</title>
        <meta charset="utf-8" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="title">Lab 6</div>
        <br>
        <nav>
            <?php
            $host = 'localhost';
            $dbname = 'tech_devices_app';
            $dbusername = 'root';
            #$dbpassword = '1cff1392';
            $dbConn = new PDO("mysql:host=$host; dbname=$dbname", $dbusername);
            $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $dispatch1 = "SELECT * FROM Admin";
            $dbData1 = $dbConn->query($dispatch1);
            $dbArray1 = $dbData1->fetchAll();
            
            $auth = $_SESSION['auth'];
            if ($auth)
            {
                $fname = $_SESSION['fname'];
                $lname = $_SESSION['lname'];
                $user = $_SESSION['user'];
                $pass = $_SESSION['pass'];
                $key = $_SESSION['key'];
                
                echo "Successful Login<br>";
                echo "Welcome Back: ".$dbArray[$i]['firstName']." ".$dbArray[$i]['lastName']."<br>";
                echo "<br>";
                
                $dispatch2 = "SELECT * FROM Admin ORDER BY firstName ASC";
                $dbData2 = $dbConn->query($dispatch2);
                $dbArray2 = $dbData2->fetchAll();
                
                echo "Users:<br>";
                for ($i = 0; $i < sizeof($dbArray2); $i++)
                {
                    echo $dbArray2[$i]['firstName']." ".$dbArray2[$i]['lastName'];
                    echo "<br>";
                }
            }
            else {
                //failed authentication, send to login screen
                session_destroy();
                header("Location: index.php");
            }
            ?>
        </nav>
    </body>
    <footer>
        <br>
        <hr>
            <?php
            if (isset($_POST['reset']))
            {
                session_destroy();
                header("Location: index.php");
            }?>
            <form method="post">
                <input type="submit" name="reset" value="Logout">
            </form>
            CST 336. 2017&copy; Blakeman <br />
            <strong>Disclaimer:</strong> The information is used for academic purposes only. <br />
    </footer>
</html>