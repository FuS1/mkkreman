<!DOCTYPE html>
<html lang="zh">
<head>
    @relativeInclude('include.meta')
</head>
<body>
    @relativeInclude('include.header')
    <main>
        <div class="page_banner">
            <img src="{{ asset( 'storage/'.$pageContent->banner_file_path ) }}" alt="">
        </div>
        
        <div class="container">
            {!! $pageContent->content !!}
        </div>
        
        <div class="innerPage">
            
            <img class="about_meat d-sm-block d-none" src="{{ asset('FrontPage/public/img/about-meat.svg') }}" alt="">
            <img class="about_meat d-sm-none" src="{{ asset('FrontPage/public/img/about-meat-m.svg') }}" alt="">
            
            <div class="about_character">
                <div class="container">
                    <div class="title">
                        <img src="{{ asset('FrontPage/public/img/title-role.svg') }}" alt="麵匡匡人物">
                        <h2>Character Introduction</h2>
                    </div>
                    <div class="swiper-container characterPic">
                        <div class="swiper-wrapper">
                        @foreach ($aboutUsPerson as $_aboutUsPerson)
                            <div class="swiper-slide">
                                <div class="about_character_pic">
                                    <img  class="person" src="{{ asset( 'storage/'.$_aboutUsPerson->file_path ) }}" alt="">
                                </div>
                                <div class="about_character_text">
                                    <div class="inner">
                                        <div style="border: 0.15rem dashed #122C53;text-align: center;padding: 4px 3px;width: fit-content;font-size: 17px;font-weight: bold;margin: auto;margin-bottom: 15px;letter-spacing: 9px;">
                                            {{$_aboutUsPerson->slogan}}
                                        </div>
                                        <div>{!! $_aboutUsPerson->short_description !!}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>    
                    </div>
                    <div class="swiper-button-next character_arrow" id="character_arrow_next"></div>
                    <div class="swiper-button-prev character_arrow" id="character_arrow_prev"></div> 
                </div>
            </div>
            
            <div class="about_btn">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6"> <a href="#">更多MKK創業故事</a></div>
                        <div class="col-sm-6"> <a href="#">更多MKK創業故事</a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            {!! $pageContent->bottom_content !!}
        </div>

    </main>
    @relativeInclude('include.footer')
    @relativeInclude('include.script')
    <script>
        var swiperPic = new Swiper(".characterPic", {
            slidesPerView: 1,
            spaceBetween: 20,
            shortSwipes:false,
            longSwipesMs:100,
            centeredSlides: true,
            loop: true,
            speed: 800,
            slideToClickedSlide: true,
            navigation: {
                nextEl: "#character_arrow_next",
                prevEl: "#character_arrow_prev",
            },
            breakpoints: {
                600: {
                    spaceBetween: 20,
                    slidesPerView: 3,
                },
                768: {
                    spaceBetween: 100,
                    slidesPerView: 3,
                },
            },
        });

        function characterIntro() {
            let introHeight_max = 0, introHeight_prev = 0;
            $(".about_character_text").each(function(){
                let introHeight = $(this).height();
                if(introHeight > introHeight_max) {
                    introHeight_max = introHeight;
                }else {
                    introHeight_prev = introHeight;
                }
            })
            introHeight_max = introHeight_max + 24;
            $(".characterPic").css("padding-bottom","calc(55px + " + introHeight_max + "px)");
            $(".character_arrow").each(function(){
                $(this).css("bottom","calc(" + introHeight_max + "px / 2)");
            })
        }
        characterIntro();
        $(window).on("resize scroll",function(){
            characterIntro();
        });
    </script>
    