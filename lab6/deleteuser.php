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
        <div id="title">Delete User</div>
        <br>
        <nav>
            <?php
            $host = 'localhost';
            $dbname = 'tech_devices_app';
            $dbusername = 'root';
            #$dbpassword = '1cff1392';
            $dbConn = new PDO("mysql:host=$host; dbname=$dbname", $dbusername);
            $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "DELETE FROM User 
                    WHERE id = " . $_GET['userId'];
            
            $stmt = $dbConn->prepare($sql);
            $stmt->execute();
            header("Location: home.php");
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