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
    <body>
        <header> Admin </header>
        <form method="get">
            <input type='submit' name='newid' value="Add New Game" formaction='update.php'>
        <?php
            include 'php/api.php';
            $statement = "games";
            $dbArray = getData($statement);
            
            foreach($dbArray as $result) {
                echo "<div id='row'>";
                echo "<span id='platform'><img src='logo/";
                    if ($result['platform'] == 1)
                        echo "pclogo";
                    else if ($result['platform'] == 11)
                        echo "switchlogo";
                    else if ($result['platform'] == 21)
                        echo "ps4logo";
                    else if ($result['platform'] == 31)
                        echo "wiiulogo";
                echo ".png' width=42 height=42></span>";
                echo "<span id='name'> ".$result['name']." </span>";
                echo "<span id='year'> ".$result['year']." </span>";
                echo "<span id='esrb'><img src='esrb/";
                    if ($result['esrb'] == 1)
                        echo "e";
                    else if ($result['esrb'] == 11)
                        echo "e10";
                    else if ($result['esrb'] == 21)
                        echo "t";
                    else if ($result['esrb'] == 31)
                        echo "m";
                echo ".png' width=34 height=48></span>";
                echo "<span id='price'> $".$result['price']." </span>";
                ?><input type='submit' name='updateid' value="<?=$_GET['id']=$result['id']?>" formaction='update.php'><?php
                echo "</div>";
            }
        ?>
        </form>
    </body>
    <footer>
        <hr>
        CST 336. 2017&copy; Blakeman <br />
        <strong>Disclaimer:</strong> The information is used for academic purposes only. <br />
    </footer>
</html>