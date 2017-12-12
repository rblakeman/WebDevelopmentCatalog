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
        <form class="reset" method="post">
            <input type="submit" name="reset" class="btn btn-warning" value="Log Out">
        </form>
    </head>
    
    <?php
        include 'php/api.php';
        
        if (isset($_GET['added'])) {
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
            if (isset($_GET['newprice'])) {
                $newprice = $_GET['newprice'];
                $newprice = trim($newprice, "$");
            }
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
        <div class="container">
        <header> New </header>
        <form method="get">
            <div class="form-group">
                <label for="exampleFormControlInput1">Name: </label>
                <input type="text" name="newname" class="form-control" id="exampleFormControlInput1" value="<?=$dbArray[0]['name']?>" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Year: </label>
                <input type="number" name="newyear" class="form-control" id="exampleFormControlInput1" value="<?=$dbArray[0]['year']?>" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">ESRB Rating: </label>
                <select name="newesrb" class="form-control" id="exampleFormControlSelect1" >
                    <option value="1" <?php if ($dbArray[0]['esrb'] == 1) echo "selected"?> >E</option>
                    <option value="11" <?php if ($dbArray[0]['esrb'] == 11) echo "selected"?> >E10</option>
                    <option value="21" <?php if ($dbArray[0]['esrb'] == 21) echo "selected"?> >T</option>
                    <option value="31" <?php if ($dbArray[0]['esrb'] == 31) echo "selected"?> >M</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Price: </label>
                <input type="text" name="newprice" class="form-control" id="exampleFormControlInput1" value="$<?=$dbArray[0]['price']?>" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Platform: </label>
                <select name="newplatform" class="form-control" id="exampleFormControlSelect1" >
                    <option value="1" <?php if ($dbArray[0]['platform'] == 1) echo "selected"?> >PC</option>
                    <option value="11" <?php if ($dbArray[0]['platform'] == 11) echo "selected"?> >Switch</option>
                    <option value="21" <?php if ($dbArray[0]['platform'] == 21) echo "selected"?> >PS4</option>
                    <option value="31" <?php if ($dbArray[0]['platform'] == 31) echo "selected"?> >WiiU</option>
                </select>
            </div>
            <input type="submit" name="added" class="btn btn-success" id="validate" value="Add" disabled="disabled">
        </form>
        </div>
        <script type="text/javascript" src="js/validation.js"></script>
    </body>
    <footer>
        <hr>
        CST 336. 2017&copy; Blakeman <br />
        <strong>Disclaimer:</strong> The information is used for academic purposes only. <br />
    </footer>
</html>