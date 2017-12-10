<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <title>Final Project</title>
        
        <a href="index.php">Cancel</a>
        
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
    </head>
    <body>
        <form method="post">
            <input type="text" name="typedusername" placeholder="Username" value="<?=$_POST['typedusername']?>"/>
            <input type="password" name="typedpassword" placeholder="Password" value="<?=$_POST['typedpassword']?>"/>
            <input type="submit" name="submit" value="Log In" formaction="admin.php">
        </form>
        <?php
            if (!empty($_POST['typedusername']) || !empty($_POST['typedpassword']))
            {
                
            }
        ?>
    </body>
    <footer>
        <hr>
        CST 336. 2017&copy; Blakeman <br />
        <strong>Disclaimer:</strong> The information is used for academic purposes only. <br />
    </footer>
</html>