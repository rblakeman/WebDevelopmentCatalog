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
        <div id="title">Login</div>
        <br>
        <nav>
            <?php
            $host = 'localhost';
            $dbname = 'tech_devices_app';
            $dbusername = 'root';
            #$dbpassword = '1cff1392';
            $dbConn = new PDO("mysql:host=$host; dbname=$dbname", $dbusername);
            $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $dispatch = "SELECT * FROM Admin";
            $dbData = $dbConn->query($dispatch);
            $dbArray = $dbData->fetchAll();
            
            $auth = $_SESSION['auth'];
            echo $auth;
            if (isset($_POST['submit']) && !$auth)
            {
                $isset = true;
                $typedusername = $_POST['typedusername'];
                $typepassword = $_POST['typedpassword'];
                for ($i = 0; $i < sizeof($dbArray); $i++)
                {
                    if ($typedusername == $dbArray[$i]['username'])
                    {
                        if ($typepassword == $dbArray[$i]['password'])
                        {
                            $auth = $_SESSION['auth'] = true;
                            $_SESSION['fname'] = $dbArray[$i]['firstName'];
                            $_SESSION['lname'] = $dbArray[$i]['lastName'];
                            $_SESSION['user'] = $typedusername;
                            $_SESSION['pass'] = $typepassword;
                            $_SESSION['key'] = $dbArray[$i]['adminid'];
                            header("Location: home.php");
                            break;
                        }
                        else
                        {
                            ?><div id="Error">Wrong Password</div><?php
                            $auth = $_SESSION['auth'] = false;
                            break;
                        }
                    }
                    if ($i == sizeof($dbArray)-1)
                    {
                        ?><div id="Error">No Records of that Username were found</div><?php
                        $auth = $_SESSION['auth'] = false;
                    }
                }
            }
            else
            {
                $isset = false;
                $auth = false;
            }
            if (!$auth)
            {
                ?>
                <form method="post">
                    <input type="text" name="typedusername" placeholder="Username" value="<?=$_POST['typedusername']?>"/>
                    <input type="password" name="typedpassword" placeholder = "Password" value="<?=$_POST['typedpassword']?>"/>
                    <input type="submit" name="submit" value="Submit">
                </form>
                <?php
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
            }?>
            <form method="post">
                <input type="submit" name="reset" value="Reset Session">
            </form>
            CST 336. 2017&copy; Blakeman <br />
            <strong>Disclaimer:</strong> The information is used for academic purposes only. <br />
    </footer>
</html>