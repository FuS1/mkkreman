<!DOCTYPE html>
<html lang="zh">
<head>
    @relativeInclude('include.meta')
<style>
   
    .food-swiper .swiper-slide .content-bottom > img {
        width:100%;
    }

    @media screen and (min-width: 768px) {
    
        .food-swiper .swiper-slide .content-bottom > img {
            transform: scale(0.6);
            margin-top: 3rem;
        }
        .food-swiper .swiper-slide-next .content-bottom > img{
            transform: scale(1);
            margin-top: 0rem;
        }
    }

    .food_info{
        text-align:center;
    }
    .mainFood > h2{
        font-family: "KaiminSoStd";
        text-align: center;
        margin: 0 0 2.5rem 0;
        color: #132C53;
    }
    .food_info > .description{
        text-align:center;
        line-height: 2rem;
    }

</style>
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
            
            <!-- <div class="menu_intro">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="{{ asset('FrontPage/public/img/menu-step.svg') }}" alt="">
                        </div>
                        <div class="col-sm-6">
                            <img src="{{ asset('FrontPage/public/img/menu-graphic.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div> -->

            <img class="menu_title" src="{{ asset('FrontPage/public/img/menu-title.svg') }}" alt="阿良真誠推薦">

            <div class="menu_slider">
                <img class="menu_slider_title" src="{{ asset('FrontPage/public/img/menu-series-1.svg') }}" alt="拉麵系列">
                <div class="container">
                    <div class="swiper-container menu-swiper" id="noodle-swiper">
                        <div class="swiper-wrapper">
                        @foreach ($mainFoods as $key => $food)
                            <div class="swiper-slide">
                                <div class="menu-swiper_pic"><img src="{{ asset( 'storage/'.$food->file_path ) }}" alt=""></div>
                                <div class="menu-swiper_text">
                                    <h3>{{$food->title}}</h3>
                                    <p>{!! $food->short_description !!}</p>
                                </div>
                            </div>
                        @endforeach
                        @foreach ($mainFoods as $key => $food)
                            <div class="swiper-slide">
                                <div class="menu-swiper_pic"><img src="{{ asset( 'storage/'.$food->file_path ) }}" alt=""></div>
                                <div class="menu-swiper_text">
                                    <h3>{{$food->title}}</h3>
                                    <p>{!! $food->short_description !!}</p>
                                </div>
                            </div>
                        @endforeach
                        </div>      
                    </div>
                    <div class="menu-swiper_arrow next" id="noodle-next"><img src="{{ asset('FrontPage/public/img/menu-slider-arrow-next.svg') }}" alt=""></div>
                    <div class="menu-swiper_arrow prev" id="noodle-prev"><img src="{{ asset('FrontPage/public/img/menu-slider-arrow-prev.svg') }}" alt=""></div> 
                </div>
            </div>

            <div class="menu_slider sideDish">
                <img class="menu_slider_title" src="{{ asset('FrontPage/public/img/menu-series-2.svg') }}" alt="紫味小菜">
                <div class="container">
                    <div class="swiper-container menu-swiper" id="side-swiper">
                        <div class="swiper-wrapper">
                        @foreach ($sideFoods as $key => $food)
                            <div class="swiper-slide">
                                <div class="menu-swiper_pic"><img src="{{ asset( 'storage/'.$food->file_path ) }}" alt=""></div>
                                <div class="menu-swiper_text">
                                    <h3>{{$food->title}}</h3>
                                    <p>{!! $food->short_description !!}</p>
                                </div>
                            </div>
                        @endforeach
                        @foreach ($sideFoods as $key => $food)
                            <div class="swiper-slide">
                                <div class="menu-swiper_pic"><img src="{{ asset( 'storage/'.$food->file_path ) }}" alt=""></div>
                                <div class="menu-swiper_text">
                                    <h3>{{$food->title}}</h3>
                                    <p>{!! $food->short_description !!}</p>
                                </div>
                            </div>
                        @endforeach
                        </div>      
                    </div>
                    <div class="menu-swiper_arrow next" id="side-next"><img src="{{ asset('FrontPage/public/img/menu-slider-arrow-next.svg') }}" alt=""></div>
                    <div class="menu-swiper_arrow prev" id="side-prev"><img src="{{ asset('FrontPage/public/img/menu-slider-arrow-prev.svg') }}" alt=""></div> 
                </div>
            </div>

            <div class="menu_slider drink">
                <img class="menu_slider_title" src="{{ asset('FrontPage/public/img/menu-series-3.svg') }}" alt="清爽飲品">
                <div class="container">
                    <div class="swiper-container menu-swiper" id="drink-swiper">
                        <div class="swiper-wrapper">
                        @foreach ($drinks as $key => $food)
                            <div class="swiper-slide">
                                <div class="menu-swiper_pic"><img src="{{ asset( 'storage/'.$food->file_path ) }}" alt=""></div>
                                <div class="menu-swiper_text">
                                    <h3>{{$food->title}}</h3>
                                    <p>{!! $food->short_description !!}</p>
                                </div>
                            </div>
                        @endforeach
                        @foreach ($sideFoods as $key => $food)
                            <div class="swiper-slide">
                                <div class="menu-swiper_pic"><img src="{{ asset( 'storage/'.$food->file_path ) }}" alt=""></div>
                                <div class="menu-swiper_text">
                                    <h3>{{$food->title}}</h3>
                                    <p>{!! $food->short_description !!}</p>
                                </div>
                            </div>
                        @endforeach
                        </div>      
                    </div>
                    <div class="menu-swiper_arrow next" id="drink-next"><img src="{{ asset('FrontPage/public/img/menu-slider-arrow-next.svg') }}" alt=""></div>
                    <div class="menu-swiper_arrow prev" id="drink-prev"><img src="{{ asset('FrontPage/public/img/menu-slider-arrow-prev.svg') }}" alt=""></div> 
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
        var swiper1 = new Swiper("#noodle-swiper", {
            slidesPerView: 1,
            spaceBetween: 0,
            centeredSlides: true,
            loop: true,
            slideToClickedSlide: true,
            navigation: {
                nextEl: "#noodle-next",
                prevEl: "#noodle-prev",
            },
            breakpoints: {
                700: {
                    slidesPerView: 3,
                }
            },
            // on: {
            //   click(event) {
            //       swiper1.slideTo(this.clickedIndex);	
            //   },
            // },
        });
        var swiper2 = new Swiper("#side-swiper", {
            slidesPerView: 1,
            spaceBetween: 0,
            centeredSlides: true,
            loop: true,
            slideToClickedSlide: true,
            navigation: {
                nextEl: "#side-next",
                prevEl: "#side-prev",
            },
            breakpoints: {
                700: {
                    slidesPerView: 3,
                }
            }
            // on: {
            //   click(event) {
            //       swiper2.slideTo(this.clickedIndex);	
            //   },
            // },
        });
        var swiper3 = new Swiper("#drink-swiper", {
            slidesPerView: 1,
            spaceBetween: 0,
            centeredSlides: true,
            loop: true,
            slideToClickedSlide: true,
            navigation: {
                nextEl: "#drink-next",
                prevEl: "#drink-prev",
            },
            breakpoints: {
                700: {
                    slidesPerView: 3,
                }
            }
            // on: {
            //   click(event) {
            //       swiper3.slideTo(this.clickedIndex);	
            //   },
            // },
        });
    </script>