var amount = 0;
var result = [];
var score = 0;
var average = 0;
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
        $('#Score').append("0");
    }
    else {
        zeroResult(false);
        
        for (var i = 0; i < amount; i++)
        {
            result.push(getRandomInt(0,100));
            //$('#Debug').append(result.length);
            $('#List').append(result[result.length-1]);
            $('#List').append(' ');
        }
        
        for (var point of result)
        {
            score += point;
        }
        $('#Score').append(score);
        average = score/amount;
        $('#Average').append(average+' from '+amount+' numbers');
        
        showPrize((score%5)+1);
    }
}

function zeroResult(iszero) {
    if (iszero) {
        $('#Zero').show();
        $('#Average').hide();
    } else {
        $('#Zero').hide();
        $('#Average').show();
    }
}

function showPrize(num) {
    $('#Card').append(num);
    $('#Harold').append('<img src="img/harold'+num+'.png"/>');
}

function getRandomInt(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min)) + min; //The maximum is exclusive and the minimum is inclusive
}