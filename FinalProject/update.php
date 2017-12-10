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
        <form>
            <input type="text" placeholder="getName();" value="newname">
            <input type="number" placeholder="getYear();" value="newyear">
            <select name="esrb">
                <option value="e">E</option>
                <option value="e10">E10</option>
                <option value="t">T</option>
                <option value="m">M</option>
            </select>
            <input type="text" placeholder="getPrice();" value="newprice">
            <select name="platform">
                <option value="pc">PC</option>
                <option value="ps4">PS4</option>
                <option value="switch">Switch</option>
                <option value="wiiu">WiiU</option>
            </select>
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