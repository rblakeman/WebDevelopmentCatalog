<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Lab 2 </title>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    </head>
    <body>
        <header>
            <h1>Slot Machine</h1>
        </header>
        <nav>
            
        </nav>
        <main>
            <table>
                <tr>
                    <th>Symbol</th>
                    <th>Points</th>
                </tr>
                <tr>
                    <td>Cherry</td>
                    <td>1pts</td>
                </tr>
                <tr>
                    <td>Bell</td>
                    <td>5pts</td>
                </tr>
                <tr>
                    <td>Bar</td>
                    <td>10pts</td>
                </tr>
                <tr>
                    <td>Seven</td>
                    <td>50pts</td>
                </tr>
            </table>
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
                if ($bar >= 3) {
                    $score = 10*$bar;
                    echo "Score: ";
                    echo $score;
                    echo "pts";
                    
                    echo  nl2br ("\n");
                    
                    echo $bar;
                    echo " Bars";
                }
                else if($bell >= 3) {
                    $score = 5*$bell;
                    echo "Score: ";
                    echo $score;
                    echo "pts";
                    
                    echo  nl2br ("\n");
                    
                    echo $bell;
                    echo " Bells";
                }
                else if ($cherry >= 3) {
                    $score = 1*$cherry;
                    echo "Score: ";
                    echo $score;
                    echo "pts";
                    
                    echo  nl2br ("\n");
                                        
                    echo $cherry;
                    echo " Cherries";
                }
                else if ($seven >= 3) {
                    $score = 50*$seven;
                    echo "Score: ";
                    echo $score;
                    echo "pts";
                    
                    echo  nl2br ("\n");
                    
                    echo $seven;
                    echo " Sevens";
                }
                else {
                    echo "Try Again!";
                }
            ?>
            
        </main>
        <footer>
            <hr>
            CST 336. 2017&copy; Blakeman <br />
            <strong>Disclaimer:</strong> The information is used for academic purposes only. <br />
        </footer>
    </body> 
</html>