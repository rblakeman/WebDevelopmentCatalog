<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <title>Final Project</title>
        
        <a href="index.php">Cancel</a>
        
        <script>
            $("button").click(function()
            {
                $.ajax({
                    type: "get",
                    url: "php/api.php",
                    dataType: "json",
                    data: {
                        'typedusername': $('#typedusername').val(),
                        'typedpassword' : $('#typedpassword').val(),
                        'action': 'validate-password'
                    },
                    success: function(data,status) {
                        debugger;
                        if (data.length > 0) {
                            $('#password-valid').html("Successful Login");
                            $('#password-invalid').empty();
                        }
                        else {
                            $('#password-invalid').html("Failed Login");
                            $('#password-valid').empty();
                        }
                    }
                });
            });
        </script>
    </head>
    <body>
        <header> Log In </header>
        <form onsubmit="return false;">
            <input type="text" name="typedusername" placeholder="Username" value="<?=$_POST['typedusername']?>"/>
            <input type="password" name="typedpassword" placeholder="Password" value="<?=$_POST['typedpassword']?>"/>
            <button>Log In</button>
            <span id="password-valid"></span> <span id="password-invalid"></span>
        </form>
    </body>
    <footer>
        <hr>
        CST 336. 2017&copy; Blakeman <br />
        <strong>Disclaimer:</strong> The information is used for academic purposes only. <br />
    </footer>
</html>