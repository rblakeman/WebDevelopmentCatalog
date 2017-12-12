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
    
    <body>
        <div class="container">
        <header> <strong>Admin</strong> </header>
        <form method="post">
            <input type='submit' name='newid' class="btn btn-primary" value="Add New Game" formaction='add.php'>
        </form>
        <table class="table">
            <thead>
              <tr>
                <th>id</th>
                <th>Platform</th>
                <th>Name</th>
                <th>Year</th>
                <th>ESRB</th>
                <th>Price</th>
              </tr>
            </thead>
            <tbody>
        <?php
        $auth = $_SESSION['auth'];
        if ($auth) {
            include 'php/api.php';
            $statement = "games";
            $dbArray = getData($statement);
            $total = $avg = $sum = 0;
            foreach($dbArray as $result) {
                echo "<form method='get'>";
                echo "<tr";
                    if ($result['platform'] == 1) {
                        echo " class='active'>";
                        echo "<td>".$result['id']."</td>";
                        echo "<td><img src='logo/pclogo";
                    }
                    else if ($result['platform'] == 11) {
                        echo " class='danger'>";
                        echo "<td>".$result['id']."</td>";
                        echo "<td><img src='logo/switchlogo";
                    }
                    else if ($result['platform'] == 21) {
                        echo " class='info'>";
                        echo "<td>".$result['id']."</td>";
                        echo "<td><img src='logo/ps4logo";
                    }
                    else if ($result['platform'] == 31) {
                        echo ">";
                        echo "<td>".$result['id']."</td>";
                        echo "<td><img src='logo/wiiulogo";
                    }
                echo ".png' width=42 height=42></td>";
                echo "<td>".$result['name']."</td>";
                echo "<td>".$result['year']."</td>";
                echo "<td><img src='esrb/";
                    if ($result['esrb'] == 1)
                        echo "e";
                    else if ($result['esrb'] == 11)
                        echo "e10";
                    else if ($result['esrb'] == 21)
                        echo "t";
                    else if ($result['esrb'] == 31)
                        echo "m";
                echo ".png' width=34 height=48></td>";
                echo "<td>$".$result['price']."</td>";
                echo "<input type='hidden' name='updateid' value='".$result['id']."'>";
                echo "<td><input type='submit' name='updatebutton' class='btn btn-secondary' value='Update' formaction='update.php'></td>";
                echo "</tr>";
                echo "</form>";
                $total += 1;
                $sum += $result['price'];
            }
            $avg = $sum/$total;
            echo "</tbody>";
            echo "</table>";
            
            echo "<table class='table table-striped'>";
            echo "<thead>";
            echo "<tr>";
                echo "<th><button name='totalbutton' class='btn btn-info' id='reportbtn1'>Total Number of Games</button></th>";
                echo "<th><button name='averagebutton' class='btn btn-info' id='reportbtn2'>Average Price of Games</button></th>";
                echo "<th><button name='sumbutton' class='btn btn-info' id='reportbtn3'>Sum of all Games</button></th>";
            echo "</tr>";
            echo "<tr>";
                echo "<th><span id='total' style='visibility:hidden'>".$total." Games</span></th>";
                echo "<th><span id='avg' style='visibility:hidden'>$".number_format($avg, 2)." Average Price</span></th>";
                echo "<th><span id='sum' style='visibility:hidden'>$".$sum." Total Cost</span></th>";
            echo "</tr>";
            echo "</thead>";
            echo "</table>";
        }
        else {
            session_destroy();
            header("Location: index.php");
        }
        ?>
        </div>
    </body>
    <script type="text/javascript" src="js/validation.js"></script>
    <footer>
        <hr>
        CST 336. 2017&copy; Blakeman <br />
        <strong>Disclaimer:</strong> The information is used for academic purposes only. <br />
    </footer>
</html>