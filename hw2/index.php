<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Homework 2 </title>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    </head>
    <body>
        <header>
            <h1 style="display:inline-block;">Random Number Generator</h1>
        </header>
        <nav>
            <a class="clickHyperlink" href="index.php">Click!</a>
            <div></div>
            <a class="buttonHyperlink" href="index.php"><img src="img/button.jpg"/></a>
        </nav>
        <main>
            <div id="displayed numbers"><?php
                echo  nl2br ("\n");
                $amount = rand(0,51);
                $zero = false;
                echo "Result(s): ";
                if ($amount == 0) {
                        echo "You got 0! What are the odds??";
                        $zero = true;
                }
                else {
                    for ($i = 0; $i < $amount; $i++)
                    {
                        echo $ray[$i] = rand(0,100);
                        echo " ";
                    }
                    for ($j = 0; $j < count($ray); $j++)
                    {
                        $sum += $ray[$j];
                    }
                    echo  nl2br ("\n");
                    echo  nl2br ("\n");
                    echo "Wow! You got: ";
                }

            ?>
            <span id="points"><?php
            if (!$zero) {
                echo $sum;
                echo "pts!";
            }
            ?></span>
            <?php
            if (!$zero) {
                echo " ";
                echo  nl2br ("\n");
                echo "For an average of: ";
                echo $sum/count($ray);
                echo " from ";?>
            <span id="numbers"><?php
                echo count($ray);
                echo " numbers.";
                ?></span><?php
                echo  nl2br ("\n");
                echo  nl2br ("\n");
                if (!$zero) {
                    $haroldnum = $sum%5;
                }
                $haroldnum += 1;
            }
            ?></div>
            <div id="haroldtxt">
                Your prize! <span id="limitededition">Limited Edition</span> Harold #
                <?php
                if (!$zero) {
                    echo $haroldnum;
                }
                else {
                    echo "no harold for youuu";
                }
                ?>!
            </div>
            <div id="haroldimg">
                <img src="img/harold<?php echo $haroldnum ?>.png"/>
            </div>
            <div id="picturecaption">
                (prize determined by sum modulo 5)
            </div>
        </main>
        <footer>
            <hr>
            CST 336. 2017&copy; Blakeman <br />
            <strong>Disclaimer:</strong> The information is used for academic purposes only. <br />
        </footer>
    </body> 
</html>