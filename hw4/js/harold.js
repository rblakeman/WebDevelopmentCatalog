var amount = 0;
var result;
var score = 0;
var haroldnum = 0;
var harolds = ['img/harold1.png', 'img/harold2.png', 'img/harold3.png', 'img/harold4.png', 'img/harold5.png'];

createButton();
calculateScore();

function createButton() {
    $('#Button').append('<a class="buttonHyperlink" href="index.html"><img src="img/button.jpg"/></a>')
}

function calculateScore() {
    amount = getRandomInt(0,51);
    $('#Button').append(amount); //Debug
    
    if (amount == 0) {
        zeroResult(true);
    }
    else {
        zeroResult(false);
        
        for (var i = 0; i < amount; i++)
        {
            result.append(getRandomInt(0,100));
            $('#Points').append(result[result.length-1]);
            $('#Points').append(' ');
        }
        
        for (var points in result)
        {
            //score += points;
        }
        
        showPrize(score%5);
    }
}

function zeroResult(iszero) {
    if (iszero) {
        $('#Zero').show();
    } else {
        $('#Zero').hide();
    }
}

function showPrize(num) {
    $('#Harold').append('<img src="img/harold');
    $('#Harold').append('num');
    $('#Harold').append('.png"/>');
}

function getRandomInt(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min)) + min; //The maximum is exclusive and the minimum is inclusive
}