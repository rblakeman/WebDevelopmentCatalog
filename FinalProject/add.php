<?php
    session_start();
?>

<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
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
    <?php
        include 'php/api.php';
        
        if (isset($_GET['Add'])) {
            $valid = true;
            if (isset($_GET['newname']))
                $newname = $_GET['newname'];
            else
                $valid = false; 
            if (isset($_GET['newyear']))
                $newyear = $_GET['newyear'];
            else
                $valid = false; 
            if (isset($_GET['newesrb']))
                $newesrb = $_GET['newesrb'];
            else
                $valid = false; 
            if (isset($_GET['newprice']))
                $newprice = $_GET['newprice'];
            else
                $valid = false; 
            if (isset($_GET['newplatform']))
                $newplatform = $_GET['newplatform'];
            else
                $valid = false; 
            
            if ($valid)
            {
                $sql = "INSERT INTO games (name, year, esrb, price, platform) VALUES ('";
                $sql = $sql.$newname."', ";
                $sql = $sql.$newyear.", ";
                $sql = $sql.$newesrb.", ";
                $sql = $sql.$newprice.", ";
                $sql = $sql.$newplatform.")";
                newData($sql);
                header("Location: admin.php");
            }
            else {
                echo "Error, please double check all form fields";
            }
        }
    ?>
    <body>
        <head> New </head>
        <form method="get">
            Name: <input type="text" name="newname">
            <br>
            Year: <input type="number" name="newyear">
            <br>
            ESRB Rating: <select name="newesrb">
                <option value="1" <?php if ($dbArray[0]['esrb'] == 1) echo "selected"?> >E</option>
                <option value="11" <?php if ($dbArray[0]['esrb'] == 11) echo "selected"?> >E10</option>
                <option value="21" <?php if ($dbArray[0]['esrb'] == 21) echo "selected"?> >T</option>
                <option value="31" <?php if ($dbArray[0]['esrb'] == 31) echo "selected"?> >M</option>
            </select>
            <br>
            Price: <input type="text" name="newprice">
            <br>
            Platform: <select name="newplatform" >
                <option value="1" <?php if ($dbArray[0]['platform'] == 1) echo "selected"?> >PC</option>
                <option value="11" <?php if ($dbArray[0]['platform'] == 11) echo "selected"?> >Switch</option>
                <option value="21" <?php if ($dbArray[0]['platform'] == 21) echo "selected"?> >PS4</option>
                <option value="31" <?php if ($dbArray[0]['platform'] == 31) echo "selected"?> >WiiU</option>
            </select>
            <br>
            <input type="submit" name="Add" value="added">
        </form>
    </body>
    <footer>
        <hr>
        CST 336. 2017&copy; Blakeman <br />
        <strong>Disclaimer:</strong> The information is used for academic purposes only. <br />
    </footer>
</html>