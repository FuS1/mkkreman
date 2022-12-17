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
            transform: scale(0.75);
            margin-top: 3rem;
        }
        .food-swiper .swiper-slide-next .content-bottom > img{
            transform: scale(1);
            margin-top: 0rem;
        }
    }

    .food_info{
        margin-top: 3rem;
        text-align:center;
    }
    .food_info > .description{
        text-align:center;
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
        
        <div class="container">
            <div class="title">
                <img src="{{ asset('FrontPage/public/img/title-food.svg') }}" alt="阿良真誠推薦">
            </div>
            <div class="swiper-container food-swiper">
                <div class="swiper-wrapper">
                @foreach ($mainFood as $_mainFood)
                    <div class="swiper-slide">
                        <div class="content-bottom">
                            <img src="{{ asset( 'storage/'.$_mainFood->file_path ) }}" alt="">
                        </div>
                    </div>
                @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <div class="food_info">
                <h2><strong>招牌豚骨拉麵</strong></h2>
                <div class="description">
                    豬大骨湯底，透著淡淡的牡蠣白，營養不油膩；<br>
                    搭配舞火智商的叉燒肉<br>
                    香氣撲鼻，美味無雙，初訪必點。
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
        var swiperNews = new Swiper(".food-swiper", {
            slidesPerView: 1.5,
            spaceBetween: 30,
            loop: true,
            speed: 800,     
            slidesPerGroup: 1,   
            centeredSlides:true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                // 768: {
                //     slidesPerView: 2,
                //     slidesPerGroup: 2,
                //     centeredSlides:false,
                // },
                768: {
                    loop: false,
                    slidesPerView: 3,
                    slidesPerGroup: 3,  
                    spaceBetween: 60,
                    centeredSlides:false,
                }
            }
        });
    </script>
