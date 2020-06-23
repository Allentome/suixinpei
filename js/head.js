$(function(){
    $('.h-nav li').hover(function(){
        $(this).children('.h-dropdown').toggle();
    });
    $('.h-dropdown-a').hover(function(){
        $(this).toggleClass('menuFocused');
    })


});
