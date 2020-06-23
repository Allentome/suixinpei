$(function () {
    $(window).scroll(function () {
        var nowTop = $(document).scrollTop();
        if (nowTop > 100) {
            $('.menu').css({
                position: 'fixed',
                top: 0,
                left: '50%',
                marginLeft: -480
            });
            $('.totop').show()
        } else {
            $('.menu').css({
                position: 'static',
                left: 0,
                margin: '0 auto'
            });
            $('.totop').hide()
        }
    });
    $('.totop').click(function(){
        $('html,body').animate({
            scrollTop: 0
        })
    });

});