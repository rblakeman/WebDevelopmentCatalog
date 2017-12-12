$('form input').keyup(function() {
    var empty = false;
    $('form input').each(function() {
        if ($(this).val() == '') {
            empty = true;
        }
        else if ($(this).val() == "$") {
            empty = true;
        }
    });

    if (empty) {
        $('#validate').attr('disabled', 'disabled');
    } else {
        $('#validate').removeAttr('disabled');
    }
});

$('#reportbtn1').click(function() {
    $("#reportbtn1").class = 'btn btn-secondary';
    document.getElementById("total").style.visibility = "visible";
})
$('#reportbtn2').click(function() {
    $("#reportbtn1").class = 'btn btn-secondary';
    document.getElementById("avg").style.visibility = "visible";
})
$('#reportbtn3').click(function() {
    $("#reportbtn1").class = 'btn btn-secondary';
    document.getElementById("sum").style.visibility = "visible";
})
