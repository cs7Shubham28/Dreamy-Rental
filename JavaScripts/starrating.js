var rateIndex = -1;

$(document).ready(function() {
    resetStarColor();

    if (localStorage.getItem('rateIndex') != null) {
        rateIndex = parseInt(localStorage.getItem('rateIndex'));
        setStars(rateIndex);
    }

    $('.rate').on('click', function() {
        rateIndex = parseInt($(this).data('index'));
        localStorage.setItem('rateIndex', rateIndex); 
        setStars(rateIndex);
        $('#rateIndex').val(rateIndex);
        saveToTheDB();
    });
    

    $('.rate').mouseover(function() {
        resetStarColor();
        var currentIndex = parseInt($(this).data('index'));
        setStars(currentIndex);
    });

    $('.rate').mouseleave(function() {
        resetStarColor();
        if (rateIndex != -1) {
            setStars(rateIndex);
        }
    });
});

function saveToTheDB() {
    var rateIndex = $('#rateIndex').val();
    var name = $('#name').val();
    $.ajax({
        url: 'User/index.php',
        type: 'POST',
        dataType: 'json',
        data: {
            save: 1,
            rateIndex: rateIndex,
            name: name
        },
        success: function(response) {
            window.location.reload();
        }
    });
}

function setStars(max) {
    for (var i = 0; i <= max; i++) {
        $('.rate:eq(' + i + ')').css('color', 'yellow');
    }
}

function resetStarColor() {
    $('.rate').css('color', 'white');
}
