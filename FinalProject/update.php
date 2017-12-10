<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <title>Final Project</title>
                
        <script>
            function validateUsername()
            {
                $.ajax({
                    type: "get",
                    url: "api.php",
                    dataType: "json",
                    data: {
                        'username': $('#username').val(),
                        'action': 'validate-username'
                    },
                    success: function(data,status) {
                        debugger;
                        if (data.length > 0) {
                            $('#username-invalid').html("Username is taken");
                            $('#username-valid').empty();
                        }
                        else {
                            $('#username-valid').html("Username is available");
                            $('#username-invalid').empty();
                        }
                    },
                });
            }
        </script>
        <a href="index.php">Log Out</a>
    </head>
    <?php
        include 'php/api.php';
        if (isset($_GET['updateid']))
        {
            $id = $_GET['updateid'];
            $statement = "games WHERE id=".$id;
            $dbArray = getData($statement);
        }
        else if (isset($_GET['newid']))
        {
            
        }
        else {
            header("Location: admin.php");
        }

    ?>
    <body>
        <form method="post">
            Name: <input type="text" placeholder="<?=$dbArray[0]['name']?>" value="<?=$_POST['newname']?>">
            <br>
            Year: <input type="number" placeholder="<?=$dbArray[0]['year']?>" value="<?=$_POST['newyear']?>">
            <br>
            ESRB Rating: <select name="esrb">
                <option value="e" <?php if ($dbArray[0]['esrb'] == 1) echo "selected"?> >E</option>
                <option value="e10" <?php if ($dbArray[0]['esrb'] == 11) echo "selected"?> >E10</option>
                <option value="t" <?php if ($dbArray[0]['esrb'] == 21) echo "selected"?> >T</option>
                <option value="m" <?php if ($dbArray[0]['esrb'] == 31) echo "selected"?> >M</option>
            </select>
            <br>
            Price: <input type="text" placeholder="$<?=$dbArray[0]['price']?>" value="<?=$_POST['newprice']?>">
            <br>
            Platform: <select name="platform">
                <option value="pc" <?php if ($dbArray[0]['platform'] == 1) echo "selected"?> >PC</option>
                <option value="switch" <?php if ($dbArray[0]['platform'] == 11) echo "selected"?> >Switch</option>
                <option value="ps4" <?php if ($dbArray[0]['platform'] == 21) echo "selected"?> >PS4</option>
                <option value="wiiu" <?php if ($dbArray[0]['platform'] == 31) echo "selected"?> >WiiU</option>
            </select>
            <br>
            <input type="submit" value="Update" formaction="admin.php">
            <input type="button" value="Delete">
        </form>
    </body>
    <footer>
        <hr>
        CST 336. 2017&copy; Blakeman <br />
        <strong>Disclaimer:</strong> The information is used for academic purposes only. <br />
    </footer>
</html>