// menu
$(function() {
    $(".header_menu").on('click',function(){
        $(this).toggleClass("active");
        $(".header_mask, .header_nav").fadeToggle(300);
    })
    
    // top
    $(".btn-top").on('click',function(){
        $("html, body").animate({scrollTop: 0}, 300);
    })
});
