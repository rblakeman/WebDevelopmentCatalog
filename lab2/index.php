<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Lab 2 </title>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <header>
            
        </header>
        <nav>
            
        </nav>
        <main>
            <p>Bar = 10pts. Bell = 5pts. Cherry = 1pts. Seven = 50pts</p>
            <?php
                $icon[0] = "img/bar.jpg";
                $icon[1] = "img/bell.jpg";
                $icon[2] = "img/cherry.jpg";
                $icon[3] = "img/seven.jpg";
            ?>
            <figure id="symbolIcon">
                <img src=<?php echo $icon[$result[0]=rand(0,3)] ?> alt="Icon" />
                <img src=<?php echo $icon[$result[1]=rand(0,3)] ?> alt="Icon" />
                <img src=<?php echo $icon[$result[2]=rand(0,3)] ?> alt="Icon" />
                <img src=<?php echo $icon[$result[3]=rand(0,3)] ?> alt="Icon" />
            </figure>
            <?php
                $bar = $bell = $cherry = $seven = $score = 0;
                for ($i = 0; $i < 4; $i++)
                {
                    if ($result[$i] == 0)
                        $bar = $bar + 1;
                    else if ($result[$i] == 1)
                        $bell = $bell + 1;
                    else if ($result[$i] == 2)
                        $cherry = $cherry + 1;
                    else if ($result[$i] == 3)
                        $seven = $seven + 1;
                }
                if ($bar >= 3)
                    $score = 10*$bar;
                if ($bell >= 3)
                    $score = 5*$bell;
                if ($cherry >= 3)
                    $score = 1*$cherry;
                if ($seven >= 3)
                    $score = 50*$seven;
                
                echo "Score: ";
                echo $score;
            ?>
            
        </main>
        <footer>
            <hr>
            CST 336. 2017&copy; Blakeman <br />
            <strong>Disclaimer:</strong> The information is used for academic purposes only. <br />
        </footer>
    </body> 
</html>