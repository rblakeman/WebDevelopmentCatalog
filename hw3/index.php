<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Print Machine</title>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <br>
        <main>
            <form action="Print" method="post">
                <input type="text" name="tex" placeholder="What to print?" value="<?=$_GET['tex']?>"/>
                <input type = "radio" id = "lefttoright" name = "order" value = "normal">
                    <label for = "normal"></label><label for="lefttoright"> Normal </label>
                <input type= "radio" id= "righttoleft" name = "order" value = "reversed">
                    <label for = "reversed"></label><label for ="righttoleft"> Reversed </label>
                <br>
                
                <input type="number" name="red" placeholder="255" value="num" min="0" max="255">Red
                <input type="number" name="green" placeholder="255" value="num" min="0" max="255">Green
                <input type="number" name="blue" placeholder="255" value="num" min="0" max="255">Blue
                <br>
                
                <input type="checkbox" name="bold" value="boldvalue" />Bold
                <input type="checkbox" name="italic" value="italicvalue" />Italic
                <input type="checkbox" name="underline" value="underlinevalue" />Underline
                <input type="submit" name="formSubmit" value="Submit" />
            </form>

        </main>
        <footer>
            
        </footer>
    </body>
    
</html>