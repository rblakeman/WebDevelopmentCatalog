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
        
        if (isset($_GET['updated'])) {
            $id = $_GET['id'];
            $statement = "games WHERE id=".$id;
            $dbArray = getData($statement);
            
            if (isset($_GET['newname']))
                $newname = $_GET['newname'];
            else
                $newname = $dbArray[0]['name'];
            if (isset($_GET['newyear']))
                $newyear = $_GET['newyear'];
            else
                $newyear = $dbArray[0]['year'];
            if (isset($_GET['newesrb']))
                $newesrb = $_GET['newesrb'];
            else
                $newesrb = $dbArray[0]['esrb'];
            if (isset($_GET['newprice']))
                $newprice = $_GET['newprice'];
            else
                $newprice = $dbArray[0]['price'];
            if (isset($_GET['newplatform']))
                $newplatform = $_GET['newplatform'];
            else
                $newplatform = $dbArray[0]['platform'];    
            
            $sql = "UPDATE games SET name = '".$newname;
            $sql = $sql."', year = ".$newyear;
            $sql = $sql.", esrb = ".$newesrb;
            $sql = $sql.", price = ".$newprice;
            $sql = $sql.", platform = ".$newplatform;
            $sql = $sql." WHERE id = ".$id;
            updateData($sql);
            header("Location: admin.php");
        }
        
        if (!isset($_GET['updateid']))
        {
            header("Location: admin.php");
        }
        $id = $_GET['updateid'];
        $statement = "games WHERE id=".$id;
        $dbArray = getData($statement);

    ?>
    <body>
        <head> Update </head>
        <form method="get">
            Name: <input type="text" name="newname" value="<?=$dbArray[0]['name']?>" >
            <br>
            Year: <input type="number" name="newyear" value="<?=$dbArray[0]['year']?>" >
            <br>
            ESRB Rating: <select name="newesrb">
                <option value="1" <?php if ($dbArray[0]['esrb'] == 1) echo "selected"?> >E</option>
                <option value="11" <?php if ($dbArray[0]['esrb'] == 11) echo "selected"?> >E10</option>
                <option value="21" <?php if ($dbArray[0]['esrb'] == 21) echo "selected"?> >T</option>
                <option value="31" <?php if ($dbArray[0]['esrb'] == 31) echo "selected"?> >M</option>
            </select>
            <br>
            Price: <input type="text" name="newprice" value="$<?=$dbArray[0]['price']?>" >
            <br>
            Platform: <select name="newplatform" >
                <option value="1" <?php if ($dbArray[0]['platform'] == 1) echo "selected"?> >PC</option>
                <option value="11" <?php if ($dbArray[0]['platform'] == 11) echo "selected"?> >Switch</option>
                <option value="21" <?php if ($dbArray[0]['platform'] == 21) echo "selected"?> >PS4</option>
                <option value="31" <?php if ($dbArray[0]['platform'] == 31) echo "selected"?> >WiiU</option>
            </select>
            <br>
            
            <input type="hidden" name="id" value="<?=$dbArray[0]['id']?>" >
            <?php   echo "<input type='submit' name='updated' value='Update' formaction='update.php?id=".$dbArray[0]['id']."'>";
                    echo "<input type='submit' name='deleted' value='Delete' formaction='delete.php?id=".$dbArray[0]['id']."'>";    ?>
        </form>
    </body>
    <footer>
        <hr>
        CST 336. 2017&copy; Blakeman <br />
        <strong>Disclaimer:</strong> The information is used for academic purposes only. <br />
    </footer>
</html>