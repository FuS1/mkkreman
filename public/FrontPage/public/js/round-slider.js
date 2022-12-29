// 預設
let range = 80;
let showNum = 6;
let rotateUnit = 80 / 6;
let rotateOffset = 90 - (range / 2);
let activeIndex = 3;
let deg, reverse;
let Firstimg, FirstLink, Secondimg, SecondLink, Thirdimg, ThirdLink;
let originLength = $(".recc_slider_item").length;
let lastNum = originLength + 1;

// 前後各加一個預備
if(originLength >= 5){
    let firstli = $("<li></li>").attr("data-index","0").attr("data-intro","#intro2").addClass("recc_slider_item opa-0");
    let firstItem = $("<a href=''><img src='' class='recc_slider_img'></a>");
    firstli.append(firstItem);
    $("#wheel").prepend(firstli);
    
    let lastli = $("<li></li>").attr("data-index",lastNum).attr("data-intro","#intro1").addClass("recc_slider_item opa-0");
    let lastItem = $("<a href=''><img src='' class='recc_slider_img'></a>");
    lastli.append(lastItem);
    $("#wheel").append(lastli);
}else if(originLength == 4) {
    let firstli = $("<li></li>").attr("data-index","0").attr("data-intro","#intro3").addClass("recc_slider_item opa-0");
    let firstItem = $("<a href=''><img src='' class='recc_slider_img'></a>");
    firstli.append(firstItem);
    $("#wheel").prepend(firstli);

    for(let i=0; i<2; i++) {
        let dataIndex = lastNum + i;
        let dataIntro = i + 1;
        let lastli = $("<li></li>").attr("data-index",dataIndex).attr("data-intro","#intro" + dataIntro).addClass("recc_slider_item opa-0");
        let lastItem = $("<a href=''><img src='' class='recc_slider_img'></a>");
        lastli.append(lastItem);
        $("#wheel").append(lastli);
    }
}else if(originLength == 3) {
    let firstli = $("<li></li>").attr("data-index","0").attr("data-intro","#intro1").addClass("recc_slider_item opa-0");
    let firstItem = $("<a href=''><img src='' class='recc_slider_img'></a>");
    firstli.append(firstItem);
    $("#wheel").prepend(firstli);

    for(let i=0; i<3; i++) {
        let dataIndex = lastNum + i;
        let dataIntro = i + 1;
        let lastli = $("<li></li>").attr("data-index",dataIndex).attr("data-intro","#intro" + dataIntro).addClass("recc_slider_item opa-0");
        let lastItem = $("<a href=''><img src='' class='recc_slider_img'></a>");
        lastli.append(lastItem);
        $("#wheel").append(lastli);
    }
}else if(originLength == 2) {
    let firstli = $("<li></li>").attr("data-index","0").attr("data-intro","#intro1").addClass("recc_slider_item opa-0");
    let firstItem = $("<a href=''><img src='' class='recc_slider_img'></a>");
    firstli.append(firstItem);
    $("#wheel").prepend(firstli);

    for(let i=0; i<4; i++) {
        let dataIndex = lastNum + i;
        let dataIntro;
        if(i < 2) {
            dataIntro = i + 1;
        }else {
            dataIntro = i - 1;
        }
        let lastli = $("<li></li>").attr("data-index",dataIndex).attr("data-intro","#intro" + dataIntro).addClass("recc_slider_item opa-0");
        let lastItem = $("<a href=''><img src='' class='recc_slider_img'></a>");
        lastli.append(lastItem);
        $("#wheel").append(lastli);
    }
}else if(originLength == 1) {
    let firstli = $("<li></li>").attr("data-index","0").attr("data-intro","#intro1").addClass("recc_slider_item opa-0");
    let firstItem = $("<a href=''><img src='' class='recc_slider_img'></a>");
    firstli.append(firstItem);
    $("#wheel").prepend(firstli);

    for(let i=0; i<5; i++) {
        let dataIndex = lastNum + i;
        let dataIntro = 1;
        let lastli = $("<li></li>").attr("data-index",dataIndex).attr("data-intro","#intro" + dataIntro).addClass("recc_slider_item opa-0");
        let lastItem = $("<a href=''><img src='' class='recc_slider_img'></a>");
        lastli.append(lastItem);
        $("#wheel").append(lastli);
    }
}

function reccSliderItem(){
    // 參數RWD
    if($(window).width()>991){
        range = 80;
    }else if($(window).width()>575) {
        range = 130;
    }else {
        range = 320;
    }
    rotateUnit = range / 6;
    rotateOffset = 90 - (range / 2);

    // 一開始的位置
    $(".recc_slider_item").each(function(){
        let index = $(this).attr("data-index");
        deg = rotateUnit * index + rotateOffset;
        reverse = rotateUnit * index * (-1) - rotateOffset;
        $(this).css("transform","rotateZ(" + deg + "deg)");
        $(this).find(".recc_slider_img").css("transform","rotateZ(" + reverse + "deg)");
        if(index == 1){
            Firstimg = $(this).find(".recc_slider_img").attr("src");
            FirstLink = $(this).find("a").attr("href");
        }else if(index == 2){
            Secondimg = $(this).find(".recc_slider_img").attr("src");
            SecondLink = $(this).find("a").attr("href");
        }else if(index == 3){
            Thirdimg = $(this).find(".recc_slider_img").attr("src");
            ThirdLink = $(this).find("a").attr("href");
        }
    })
    $(".recc_slider_item[data-index='" + lastNum + "']").find(".recc_slider_img").attr("src",Firstimg);
    $(".recc_slider_item[data-index='" + lastNum + "']").find("a").attr("href",FirstLink);
    if(originLength >= 5) {
        $(".recc_slider_item[data-index='0']").find("a").attr("href",FirstLink);
    }else if(originLength == 4) {
        $(".recc_slider_item[data-index='6']").find(".recc_slider_img").attr("src",Secondimg);
        $(".recc_slider_item[data-index='6']").find("a").attr("href",SecondLink);
        $(".recc_slider_item[data-index='0']").find("a").attr("href",ThirdLink);
    }else if(originLength == 3) {
        $(".recc_slider_item[data-index='5']").find(".recc_slider_img").attr("src",Secondimg);
        $(".recc_slider_item[data-index='5']").find("a").attr("href",SecondLink);
        $(".recc_slider_item[data-index='6']").find(".recc_slider_img").attr("src",Thirdimg);
        $(".recc_slider_item[data-index='6']").find("a").attr("href",ThirdLink);
        $(".recc_slider_item[data-index='0']").find("a").attr("href",FirstLink);
    }else if(originLength == 2) {
        $(".recc_slider_item[data-index='3'],.recc_slider_item[data-index='5']").find(".recc_slider_img").attr("src",Firstimg);
        $(".recc_slider_item[data-index='3'],.recc_slider_item[data-index='5']").find("a").attr("href",FirstLink);
        $(".recc_slider_item[data-index='4'],.recc_slider_item[data-index='6']").find(".recc_slider_img").attr("src",Secondimg);
        $(".recc_slider_item[data-index='4'],.recc_slider_item[data-index='6']").find("a").attr("href",SecondLink);
        $(".recc_slider_item[data-index='0']").find("a").attr("href",FirstLink);
    }else if(originLength == 1) {
        $(".recc_slider_item").each(function(){
            $(this).find(".recc_slider_img").attr("src",Firstimg);
            $(this).find("a").attr("href",FirstLink);
        })
    }
    
    $(".recc_slider_item[data-index='" + activeIndex + "']").addClass("active");
};

// 對應的介紹文
function reccIntro() {
    $(".recc_slider_item").each(function(){
        if($(this).hasClass("active")) {
            let introTarget = $(this).data("intro");
            $(introTarget).addClass("active").siblings(".recc_intro_item").removeClass("active");
        }
    })
}

// 隱藏、出現
function ShoworHide() {
    if($(window).width()>991) {
        $(".recc_slider_item").each(function(){
            let index = $(this).attr("data-index");
            if(index >= 1 && index <= 5) {
                $(this).removeClass("opa-0");
            }else {
                $(this).addClass("opa-0");
            }
        })
    }else if($(window).width()>575) {
        $(".recc_slider_item").each(function(){
            let index = $(this).attr("data-index");
            if(index >= 2 && index <= 4) {
                $(this).removeClass("opa-0");
            }else {
                $(this).addClass("opa-0");
            }
        })
    }else {
        $(".recc_slider_item").each(function(){
            let index = $(this).attr("data-index");
            if(index == 3) {
                $(this).removeClass("opa-0");
            }else {
                $(this).addClass("opa-0");
            }
        })
    }
}

// 向左轉
function slideLeft(length, newIndex, thisIndex) {
    if(originLength >= 5) {
        let Second_img = $(".recc_slider_item[data-index='2']").find(".recc_slider_img").attr("src");
        let Second_Link = $(".recc_slider_item[data-index='2']").find("a").attr("href");  
        let Second_Intro = $(".recc_slider_item[data-index='2']").attr("data-intro");
        $(".recc_slider_item[data-index='0']").find(".recc_slider_img").attr("src",Second_img);
        $(".recc_slider_item[data-index='0']").find("a").attr("href",Second_Link);
        $(".recc_slider_item[data-index='0']").attr("data-intro",Second_Intro);
    } else if(originLength == 4) {
        let Third_img = $(".recc_slider_item[data-index='3']").find(".recc_slider_img").attr("src");
        let Third_Link = $(".recc_slider_item[data-index='3']").find("a").attr("href");  
        let Third_Intro = $(".recc_slider_item[data-index='3']").attr("data-intro");
        $(".recc_slider_item[data-index='0']").find(".recc_slider_img").attr("src",Third_img);
        $(".recc_slider_item[data-index='0']").find("a").attr("href",Third_Link);
        $(".recc_slider_item[data-index='0']").attr("data-intro",Third_Intro);
    }else if(originLength == 3) {
        let First_img = $(".recc_slider_item[data-index='1']").find(".recc_slider_img").attr("src");
        let First_Link = $(".recc_slider_item[data-index='1']").find("a").attr("href");  
        let First_Intro = $(".recc_slider_item[data-index='1']").attr("data-intro");
        $(".recc_slider_item[data-index='0']").find(".recc_slider_img").attr("src",First_img);
        $(".recc_slider_item[data-index='0']").find("a").attr("href",First_Link);
        $(".recc_slider_item[data-index='0']").attr("data-intro",First_Intro);
    }else if(originLength == 2) {
        let First_img = $(".recc_slider_item[data-index='1']").find(".recc_slider_img").attr("src");
        let First_Link = $(".recc_slider_item[data-index='1']").find("a").attr("href");  
        let First_Intro = $(".recc_slider_item[data-index='1']").attr("data-intro");
        $(".recc_slider_item[data-index='0']").find(".recc_slider_img").attr("src",First_img);
        $(".recc_slider_item[data-index='0']").find("a").attr("href",First_Link);
        $(".recc_slider_item[data-index='0']").attr("data-intro",First_Intro);
    }
    $(".recc_slider_item").each(function(){
        thisIndex = parseInt($(this).attr("data-index"));
        if(thisIndex == 0){
            newIndex = length;
        }else {
            newIndex = thisIndex - 1;
        }

        if($(this).hasClass("active")){
            $(this).removeClass("active");
        }

        $(this).attr("data-index",newIndex);
        deg = rotateUnit * newIndex + rotateOffset;
        reverse = rotateUnit * newIndex * (-1) - rotateOffset;
        $(this).css("transform","rotateZ(" + deg + "deg)");
        $(this).find(".recc_slider_img").css("transform","rotateZ(" + reverse + "deg)");
        ShoworHide();
    }) 
    $(".recc_slider_item[data-index='" + activeIndex + "']").addClass("active");
    let activeIntro = $(".recc_slider_item[data-index='" + activeIndex + "']").attr("data-intro");
    $(activeIntro).addClass("active").siblings(".recc_intro_item").removeClass("active");
}

// 向右轉
function slideRight(length, newIndex, thisIndex) {
    let Lastimg = $(".recc_slider_item[data-index='" + originLength + "']").find(".recc_slider_img").attr("src");
    let LastLink = $(".recc_slider_item[data-index='" + originLength + "']").find("a").attr("href");  
    let LastIntro = $(".recc_slider_item[data-index='" + originLength + "']").attr("data-intro");
    $(".recc_slider_item[data-index='0']").find(".recc_slider_img").attr("src",Lastimg);
    $(".recc_slider_item[data-index='0']").find("a").attr("href",LastLink);  
    $(".recc_slider_item[data-index='0']").attr("data-intro",LastIntro);
    $(".recc_slider_item").each(function(){
        thisIndex = parseInt($(this).attr("data-index"));

        if(thisIndex == length){
            newIndex = 0;
        }else {
            newIndex = thisIndex + 1;
        }

        if($(this).hasClass("active")){
            $(this).removeClass("active");
        }

        $(this).attr("data-index",newIndex);
        deg = rotateUnit * newIndex + rotateOffset;
        reverse = rotateUnit * newIndex * (-1) - rotateOffset;
        $(this).css("transform","rotateZ(" + deg + "deg)");
        $(this).find(".recc_slider_img").css("transform","rotateZ(" + reverse + "deg)");
        ShoworHide();
    });
    $(".recc_slider_item[data-index='" + activeIndex + "']").addClass("active");
    let activeIntro = $(".recc_slider_item[data-index='" + activeIndex + "']").attr("data-intro");
    $(activeIntro).addClass("active").siblings(".recc_intro_item").removeClass("active");
}

reccSliderItem();
ShoworHide();
reccIntro()
$(window).on("resize scroll",function(){
    reccSliderItem();
    ShoworHide();
    reccIntro()
})

// 點選箭頭
$(".slider-arrow").click(function(){
    let length = $(".recc_slider_item").length - 1;
    let newIndex, thisIndex;
    // 向左轉
    if($(this).hasClass("slider-arrow-next")){
        slideLeft(length, newIndex, thisIndex);
    }else if($(this).hasClass("slider-arrow-prev")){
         // 向右轉
         slideRight(length, newIndex, thisIndex);
    }
})

// 滑鼠拖曳
const reccInner = document.querySelector(".recc_inner");
let isPressDown = false;
let cursorXFrom, cursorXTo;

reccInner.addEventListener("mousedown", (e) => {
    isPressDown = true;
    cursorXFrom = e.offsetX;
})

reccInner.addEventListener("mouseup", (e) => {
    isPressDown = false;
    cursorXTo = e.offsetX;
    let dragDistance = cursorXTo - cursorXFrom;
    let length = $(".recc_slider_item").length - 1;
    let newIndex, thisIndex;
    if(dragDistance > 0) {
        slideRight(length, newIndex, thisIndex);
    }else if (dragDistance < 0) {
        slideLeft(length, newIndex, thisIndex);
    }
})

$(".recc_slider_item>div").click(function(){
    window.open();
})