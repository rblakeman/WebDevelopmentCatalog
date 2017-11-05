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
        <div id="title">Lab 6</div>
        <br>
        <nav>
            <?php
            $host = 'localhost';
            $dbname = 'tech_devices_app';
            $dbusername = 'root';
            #$dbpassword = '1cff1392';
            $dbConn = new PDO("mysql:host=$host; dbname=$dbname", $dbusername);
            $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            if (isset($_POST['updateUser'])) { //checks whether admin has submitted form.
                $sql = "UPDATE User
                        SET firstName = :fName,
                        lastName  = :lName,
                        email = :emaill,
                        phone = :phonee,
                        role = :rolee,
                        deptId = :dept
                        WHERE id = :id";
                $np = array();
                
                $np[':fName'] = $_POST['firstName'];
                $np[':lName'] = $_POST['lastName'];
                $np[':emaill'] = $_POST['email'];
                $np[':phonee'] = $_POST['phone'];
                $np[':rolee'] = $_POST['role'];
                $np[':dept'] = $_POST['deptId'];
                $np[':id'] = $_POST['userId'];
                
                $stmt = $dbConn->prepare($sql);
                $stmt->execute($np);
                header("Location: home.php");
            }
            else {
                $dispatch2 = "SELECT * FROM User ORDER BY firstName ASC";
                $dbData2 = $dbConn->query($dispatch2);
                $dbArray2 = $dbData2->fetchAll();
                
                $id = $_GET['userId'];
                $found = false;
                for ($i = 0; $i < sizeof($dbArray2); $i++)
                {
                    if ($id == $dbArray2[$i]['id'])
                    {
                        $fname = $dbArray2[$i]['firstName'];
                        $lname = $dbArray2[$i]['lastName'];
                        $email = $dbArray2[$i]['email'];
                        $phone = $dbArray2[$i]['phone'];
                        $role = $dbArray2[$i]['role'];
                        $deptId = $dbArray2[$i]['deptId'];
                        $userId = $dbArray2[$i]['id'];
                        $found = true;
                    }
                    else if ($i == sizeof($dbArray2) - 1 && !$found)
                    {
                        echo "error";
                    }
                }
            }
            
            ?>
            <form method="POST">
                <input type="hidden" name="userId" value="<?=$userId?>" />
                First Name:<input type="text" name="firstName" value="<?=$fname?>"/>
                <br />
                Last Name:<input type="text" name="lastName" value="<?=$lname?>"/>
                <br/>
                Email: <input type= "email" name ="email" value="<?=$email?>"/>
                <br/>
                Phone Number: <input type ="text" name= "phone" value="<?=$phone?>"/>
                <br />
                Role: 
                <select name="role" value="<?=$role?>">
                    <option value=""> - Select One - </option>
                    <option value="staff">Staff</option>
                    <option value="student">Student</option>
                    <option value="faculty">Faculty</option>
                </select>
                <br />
                Department: 
                <select name="deptId" value="<?=$deptId?>">
                    <option value="" > Select One </option>
                    <option value="1" > 1 - Computer Science </option>
                    <option value="2" > 2 - Statistics </option>
                    <option value="3" > 3 - Design </option>
                    <option value="4" > 4 - Economics </option>
                    <option value="5" > 5 - Drama </option>
                    <option value="6" > 6 - Biology </option>
                    
                </select>
                <input type="submit" name="updateUser" value="Update User">
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