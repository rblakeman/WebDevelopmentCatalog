<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <?php
            $person = array(
                "name" => "Alice",
                "imgUrl" => "./profile_pics/alice.png",
                "cards" => array(
                    array(
                        "suit" => "hearts",
                        "value" => "4"
                    ),
                    array(
                        "suit" => "clubs",
                        "value" => "10"
                    )
                )
            );
            
            function displayPerson($person) {
                // show profile pic
                echo "<img src='".$person["profilePicUrl"]."'>";
                
                // iterate through $person's "cards"
                for ($i = 0; $i < count($person["cards"]); $i++)
                {
                    $card = $person["cards"][$i];
                    
                    //contruct the imgURL for each card
                    $imgURL = "./cards/".$card["suit"]."/".$card["value"].".png";
                    
                    //transte this to HTML
                    echo "<img src='".$imgURL."'>";
                }
            }
            
            function calculateHandValue($cards) {
                $sum = 0;
                foreach ($cards as $card)
                {
                    $sum += $card["value"];
                }
                /*for ($i = 0; $i<ocunt($cards); $i++)
                {
                    $sum += $cards[$i]["value"];
                }*/
                return $sum;
            }
                        
            //echo "name: ".$person["name"]."<br>";
            //echo "imgURL: ".$person["imgUrl"]."<br>";
            displayPerson($person);
        ?>
    </body>
</html>