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
            $host = 'us-cdbr-iron-east-05.cleardb.net';
            $dbname = 'heroku_802d0206eb50421';
            $username = 'b589bb7b7cae8b';
            $password = '1cff1392';
            $dbConn = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
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