<?php
    //returns array with 100 URLs to images from Pixabay.com, based on a "keyword"
    function getImageURLs($keyword, $orientation="horizontal") {
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://pixabay.com/api/?key=5589438-47a0bca778bf23fc2e8c5bf3e&q=$keyword&image_type=photo&orientation=$orientation&safesearch=true&per_page=100",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache"
          ),
        ));
        
        $jsonData = curl_exec($curl);
        $data = json_decode($jsonData, true); //true makes it an array!
        
        $imageURLs = array();
        for ($i = 0; $i < 99; $i++) {
        $imageURLs[] = $data['hits'][$i]['webformatURL'];
        }
        $err = curl_error($curl);
        curl_close($curl);
        
        return $imageURLs;
    }

    $backgroundImage = "img/sea.jpg";
    
    if(isset($_GET['keyword']))
        include 'api/pixabayAPI.php';
        $keyword = $_GET['keyword'];
        $orientation = "horizontal";
        $imageURLs = getImageURLs($keyword, $orientation);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Image Carousel</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            @import url("css/style.css");
            body {
                background-image: url(<?=$backgroundImage?>);
            }
        </style>
    </head>
    <body>
        <br>
        <?php
            if (!isset($imageURLs)) {
                echo "<h2>Type a keyword a display a slideshow with random images from Pixabay.";
            } else {
        ?>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php
                    for($i = 0; $i < 7; $i++) {
                        echo "<li data-targe'#carousel-example-generic' data-slide-to='$i'";
                        echo ($i == 0) ? "class='active'" : " ";
                        echo "></li>";
                    }
                ?>
            </ol>
            <div class="carousel-inner" role="listbox">
                <?php
                    for($i = 0; $i < 7; $i++) {
                        do {
                            $randomIndex = rand(0, count($imageURLs));
                        } while(!isset($imageURLs[$randomIndex]));
                        
                        echo '<div class="item ';
                        echo ($i==0) ? "active" : "";
                        echo '">';
                        echo '<img src="' . $imageURLs[$randomIndex] . '">';
                        echo '</div';
                        unset($imageURLs[$randomIndex]);
                    }
                ?>
            </div>
            
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"?>
            <span class="glyphicon glyphicpn-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicpn-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
        <?php
            }
        ?>
        <br>
        <form>
            <input type="text" name="keyword" placeholder="keyword" value="<?=$_GET['keyword']?>"/>
            <input type = "radio" id = "lhorizontal" name = "layout" value = "horizontal">
            <label for = "Horizontal"></label><label for="lhorizontal"> Horizontal </label>
            <input type= "raido" id= "lvertical" name = "layout" value = "vertical">
            <label for = "Vetical"></label><label for ="lvertical"> Vetical </label>
            <select name = "category">
                <option value ="">Select One</option>
                <option value="ocean">Sea</option>
                <option>Forest</option>
            </select>
            <input type="submit" value="Search"/>
        </form>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <footer>
            <hr>
            CST 336. 2017&copy; Blakeman <br />
            <strong>Disclaimer:</strong> The information is used for academic purposes only. <br />
        </footer>
    </body> 
</html>