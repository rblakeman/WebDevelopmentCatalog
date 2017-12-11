<?php
    session_start();
?>

<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Final Project</title>
        <?php
        if (isset($_POST['reset']))
        {
            session_destroy();
            header("Location: index.php");
        }?>
        <form method="post">
            <input type="submit" name="reset" value="Log Out">
        </form>
    </head>
    
    <body>
        <header> Log In </header>
        <?php
            include 'php/api.php';
            $statement = "admin ".$dispatch;
            $dbArray = getData($statement);
            
            $auth = $_SESSION['auth'];
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
                            $_SESSION['user'] = $typedusername;
                            $_SESSION['pass'] = $typepassword;
                            $_SESSION['key'] = $dbArray[$i]['adminid'];
                            header("Location: admin.php");
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
                    <div class="form-group">
                        <label for="testuser">Username</label>  <small id="userHelp" class="form-text text-muted">admin</small>
                        <input type="text" name="typedusername" class="form-control" id="testuser" aria-describedby="userHelp" placeholder="Username" value="<?=$_POST['typedusername']?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="testpass">Password</label> <small id="passHelp" class="form-text text-muted">s3cr3t</small>
                        <input type="password" name="typedpassword" class="form-control" id="testpass" aria-describedby="passHelp" placeholder="Password" value="<?=$_POST['typedpassword']?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
                <?php
            }
        ?>
    </body>
    
    <footer>
        <hr>
        CST 336. 2017&copy; Blakeman <br />
        <strong>Disclaimer:</strong> The information is used for academic purposes only. <br />
    </footer>
</html>