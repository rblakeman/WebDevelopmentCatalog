<!DOCTYPE html>
<html>
    <head>
        <?php
            $error = False;
            $normal = True;
            $red = $blue = $green = 0;
            $bold = $italic = "normal";
            $underline = "none";
            
            if (isset($_GET['formSubmit'])) {
                $typedtext = $_GET['tex'];
                
                if ($_GET['order'] == "normal") {
                    $normal = True;
                }
                else if ($_GET['order'] == "reversed") {
                    $normal = False;
                    for ($i = strlen($typedtext); $i >= 0; $i--)
                    {
                        $newstring = $newstring . $typedtext[$i];
                    }
                    $typedtext = $newstring;
                }
                else {
                    $error = True;
                }
                
                $red = $_GET['red'];
                if ($red == "red")
                {
                    $error = True;
                }
                $green = $_GET['green'];
                if ($green == "green")
                {
                    $error = True;
                }
                $blue = $_GET['blue'];
                if ($blue == "blue")
                {
                    $error = True;
                }
                
                if ($_GET['bold'] == "boldvalue") { #font-weight:
                    $bold = "bold";
                }
                else {
                    $bold = "normal";
                }
                if ($_GET['italic'] == "italicvalue") { # font-style
                    $italic = "italic";
                }
                else {
                    $italic = "normal";
                }
                if ($_GET['underline'] == "underlinevalue") { #text-decoration
                    $underline = "underline";
                }
                else {
                    $underline = "none";
                }
            }
        ?>
        
        <meta charset="utf-8" />
        <title>Print Machine</title>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
        <style>
            @import url("css/style.css");
            <?php 
            echo '#toprint {';
                echo 'font-size: 50px;';
                echo 'font-weight:'.$bold.';';
                echo 'font-style:'.$italic.';';
                echo 'text-decoration:'.$underline.';';
                echo 'color: rgb('.$red.', '.$green.', '.$blue.');';
            echo '}';
            ?>
        </style>
    </head>
    <body>
        
        <br>
        <div id="HeadTitle">Print Machine</div>
        <br>
        <main>
            <div id="error">
                <?php
                if ($error) {
                    echo "Error, please double check form options and resubmit";
                }
                ?>
            </div>
            <div id="toprint">
                <?php
                if (!$error) {
                    echo $typedtext;
                }
                ?>
            </div>
            <div id="InputForm"><form>
                <div id="InputTitle">Please Enter Word and Fill Out Forms</div>
                <input type="text" name="tex" placeholder="What to print?" value="<?=$_GET['tex']?>"/>
                <br>
                <input type = "radio" id = "lefttoright" name = "order" value = "normal">
                    <label for = "normal"></label><label for="lefttoright"> Normal </label>
                <input type= "radio" id= "righttoleft" name = "order" value = "reversed">
                    <label for = "reversed"></label><label for ="righttoleft"> Reversed </label>
                <br>
                
                <input type="number" name="red" placeholder="Red" value="rednum" min="0" max="255"/>
                <input type="number" name="green" placeholder="Green" value="greennum" min="0" max="255"/>
                <input type="number" name="blue" placeholder="Blue" value="bluenum" min="0" max="255"/>
                <br>
                
                <input type="checkbox" name="bold" value="boldvalue"/>Bold
                <input type="checkbox" name="italic" value="italicvalue"/>Italic
                <input type="checkbox" name="underline" value="underlinevalue"/>Underline
                <input type="submit" name="formSubmit" value="Submit"/>
            </form></div>
        </main>
        <br>
        <footer>
            <hr>
            CST 336. 2017&copy; Blakeman <br />
            <strong>Disclaimer:</strong> The information is used for academic purposes only. <br />
        </footer>
    </body>
    
</html>