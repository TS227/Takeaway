$(function() {
    $('body').on('click', '#addFav', function(e) {
        var food_id = $(this).data('foodid');
        $.ajax({
            method: 'POST',
            url: './ajax/togglefav.php',
            dataType: 'json',
            data: {food_id: food_id},
        })
        .done(function(rtnData) {
            console.log(rtnData);
            $('#addFav').text('Remove from Favorites').attr('id', 'removeFav');
        });
    });

    $('body').on('click', '#removeFav', function(e) {
        var food_id = $(this).data('foodid');
        $.ajax({
            method: 'POST',
            url: './ajax/togglefav.php',
            dataType: 'json',
            data: {food_id: food_id},
        })
        .done(function(rtnData) {
            console.log(rtnData);
            $('#removeFav').text('Add to Favorites').attr('id', 'addFav');
        });
    });
});