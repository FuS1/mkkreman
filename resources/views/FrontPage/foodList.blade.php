<!DOCTYPE html>
<html lang="zh">
<head>
    @relativeInclude('include.meta')
<style>
   
    .food-swiper .swiper-slide > img {
        width:100%;
    }

    .food-swiper .swiper-slide-next > img{
        transform: scale(1.8);
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
                        <img src="{{ asset( 'storage/'.$_mainFood->file_path ) }}" alt="">
                    </div>
                @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <div>
                <h2>招牌豚骨拉麵</h2>
                <div>
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
            // loop: true,
            speed: 800,     
            slidesPerGroup: 1,   
            centeredSlides:true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            // pagination: {
            //     el: ".swiper-pagination",
            //     clickable: true,
            // },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                    slidesPerGroup: 2,
                    centeredSlides:false,
                },
                1200: {
                    slidesPerView: 3,
                    slidesPerGroup: 3,  
                    spaceBetween: 120,
                    centeredSlides:false,
                }
            }
        });
    </script>
