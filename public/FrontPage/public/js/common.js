// menu
$(".header_menu").click(function(){
    $(this).toggleClass("active");
    $(".header_mask, .header_nav").fadeToggle(300);
})

// top
$(".btn-top").click(function(){
    $("html, body").animate({scrollTop: 0}, 300);
})