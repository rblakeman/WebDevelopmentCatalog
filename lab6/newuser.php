<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lab 6</title>
        <meta charset="utf-8" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="title">New User</div>
        <br>
        <nav>
            <?php
            if (isset($_GET['addUser']))
            {
                $host = 'us-cdbr-iron-east-05.cleardb.net';
                $dbname = 'heroku_802d0206eb50421';
                $username = 'b589bb7b7cae8b';
                $password = '1cff1392';
                $dbConn = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
                $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                $np = array();
                $np[':fName'] = $_GET['firstName'];
                $np[':lName'] = $_GET['lastName'];
                $np[':email'] = $_GET['email'];
                $np[':phone'] = $_GET['phone'];
                $np[':role'] = $_GET['role'];
                $np[':deptId'] = $_GET['deptId'];
                
                $sql = "INSERT INTO User
                        (firstName, lastName, email, phone, role, deptId) 
                        VALUES
                        (:fName, :lName, :email, :phone, :role, :deptId)";
                
                $stmt=$dbConn->prepare($sql);
                $stmt->execute($np);
                
                header("Location: home.php");
            }
            ?>
            <form method="GET">
                First Name:<input type="text" name="firstName"/>
                <br />
                Last Name:<input type="text" name="lastName"/>
                <br/>
                Email: <input type= "email" name ="email"/>
                <br/>
                Phone Number: <input type ="text" name= "phone"/>
                <br />
                Role: 
                <select name="role">
                    <option value=""> - Select One - </option>
                    <option value="staff">Staff</option>
                    <option value="student">Student</option>
                    <option value="faculty">Faculty</option>
                </select>
                <br />
                Department: 
                <select name="deptId">
                    <option value="" > Select One </option>
                    <option value="1" > 1 - Computer Science </option>
                    <option value="2" > 2 - Statistics </option>
                    <option value="3" > 3 - Design </option>
                    <option value="4" > 4 - Economics </option>
                    <option value="5" > 5 - Drama </option>
                    <option value="6" > 6 - Biology </option>
                    
                </select>
                <input type="submit" name="addUser" value="Add User">
            </form>
        </nav>
    </body>
    <footer>
        <br>
        <hr>
            <?php
            if (isset($_POST['reset']))
            {
                session_destroy();
                header("Location: index.php");
            }?>
            <form method="post">
                <input type="submit" name="reset" value="Logout">
            </form>
            CST 336. 2017&copy; Blakeman <br />
            <strong>Disclaimer:</strong> The information is used for academic purposes only. <br />
    </footer>
</html>