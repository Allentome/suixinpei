$(function () {
    $('.add').click(function () {
        var vala = $('.amount').text();
        vala++;
        $('.amount').html(vala);
    });
    $('.minus').click(function () {
        if ($('.amount').text()<=1) {
            $('.amount').html('1');
        } else {
            var valm = $('.amount').text();
            valm--;
            $('.amount').html(valm);
        };
    });
});