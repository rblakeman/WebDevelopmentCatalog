<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lab 6</title>
        <meta charset="utf-8" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
    </head>
    <body>
        <div id="title">Lab 6</div>
        <br>
            <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this user?");
            }
            </script>
        <nav>
            <?php
            $host = 'us-cdbr-iron-east-05.cleardb.net';
            $dbname = 'heroku_802d0206eb50421';
            $username = 'b589bb7b7cae8b';
            $password = '1cff1392';
            $dbConn = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
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
                
                ?><div id="Success">Successful Login</div><?php
                echo "Welcome Back: ".$fname." ".$lname."<br>";
                echo "<br>";
                
                $dispatch2 = "SELECT * FROM User ORDER BY firstName ASC";
                $dbData2 = $dbConn->query($dispatch2);
                $dbArray2 = $dbData2->fetchAll();
                
                if (isset($_POST['newuser']))
                {
                    header("Location: newuser.php");
                }
                ?>
                <form method="post">
                    <input type="submit" name="newuser" value="Add New User">
                </form>
                <?php
                
                ?><div id="Underline">Users:</div><?php
                for ($i = 0; $i < sizeof($dbArray2); $i++)
                {
                    if ($i % 2 == 0)
                    {
                        ?><span id="grey"><?php
                    }
                    echo $dbArray2[$i]['firstName']." ".$dbArray2[$i]['lastName'];
                    ?><span id="ids"><?php
                    echo " id:".$dbArray2[$i]['id'];
                    ?></span><?php
                    echo " "."[<a href='updateuser.php?userId=".$dbArray2[$i]['id']."'>Update</a>]";
                    echo "[<a onclick='return confirmDelete()' href='deleteuser.php?userId=".$dbArray2[$i]['id']."'>Delete</a>]<br/>";

                    echo "<br>";
                    if ($i % 2 == 0)
                    {
                        ?></span><?php
                    }
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