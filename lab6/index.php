<!DOCTYPE html>
<html>
    <head>
        <title>Lab 6</title>
        <meta charset="utf-8" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="title">Lab 6</div>
        <nav>
            <?php
            $host = 'localhost';
            $dbname = 'tech_devices_app';
            $username = 'root';
            #$password = '1cff1392';
            $dbConn = new PDO("mysql:host=$host; dbname=$dbname", $username);
            $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $dispatch = "SELECT * FROM Admin";
            $dbData = $dbConn->query($dispatch);
            $dbArray = $dbData->fetchAll();
            $isset = false;
            if (isset($_POST['submit']))
            {
                $isset = true;
            }
            if ($isset)
            {
                $typedusername = $_POST['typedusername'];
                $typepassword = $_POST['typedpassword'];
                $failed = true;
            }
            ?>
            <form method="post">
                <input type="text" name="typedusername" placeholder="Username" value="<?=$_POST['typedusername']?>"/>
                <input type="password" name="typedpassword" placeholder = "Password" value="<?=$_POST['typedpassword']?>"/>
                <input type="submit" name="submit" value="Submit">
            </form>
            <?php
            if ($isset)
            {
                for ($i = 0; $i < sizeof($dbArray); $i++)
                {
                    if ($typedusername == $dbArray[$i]['username'])
                    {
                        if ($typepassword == $dbArray[$i]['password'])
                        {
                            echo "Successful Login<br>";
                            echo "Welcome Back: ".$dbArray[$i]['firstName']." ".$dbArray[$i]['lastName'];
                            break;
                        }
                        else
                        {
                            echo "Wrong Password<br>";
                            break;
                        }
                    }
                    if ($i == sizeof($dbArray)-1)
                    {
                        echo "No Records of that Username was found<br>";
                    }
                }
            }

            ?>
        </nav>
    </body>
    <footer>
        <hr>
            CST 336. 2017&copy; Blakeman <br />
            <strong>Disclaimer:</strong> The information is used for academic purposes only. <br />
    </footer>
</html>