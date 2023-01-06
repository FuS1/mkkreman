// menu
$(function(){
    $(".header_menu").click(function(){
        $(this).toggleClass("active");
        $(".header_mask, .header_nav").fadeToggle(300);
    })
    
    $(".header_mask").click(function(){
        $(".header_menu").click();
    })

    // top
    $(".btn-top").click(function(){
        $("html, body").animate({scrollTop: 0}, 300);
    })
    
    // select
    $(".select-common_active").click(function(){
        $(this).parents(".select-common").find(".select-common_list").slideToggle(300);
    })
    $(".select-common_list li").click(function(){
        let select = $(this).html();
        $(this).parents(".select-common").find(".select-common_active span").html(select);
        $(this).parents(".select-common").find(".select-common_list").slideUp(300);
        
    })
    $(".recruit_select_list li").click(function(){
        $(this).addClass("active").siblings("li").removeClass("active");
    })
    $(document).click(function (event) {
        var selectArea = $(".select-common");
        if (!selectArea.is(event.target) && selectArea.has(event.target).length === 0) {
            $(".select-common_list").slideUp(300);
        }
    });
    
    
})
