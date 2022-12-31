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
            <div class="container">
                <div class="title">
                    <img src="{{ asset('FrontPage/public/img/title-news.svg') }}" alt="最新消息">
                    <h2>Latest News</h2>
                </div>
                <div class="row news_page">
                    <div class="col-lg-4 col-6">
                        <a href="" class="news_page_item">
                            <div class="news_page_pic"><img src="{{ asset('FrontPage/public/img/news-pic.png') }}" alt=""></div>
                            <div class="news_page_text">
                                <h3>麵匡匡內湖金湖店正式開幕</h3>
                                <p class="content">開幕活動於OO/OO~OO/OO~~~</p>
                                <p class="date">2022.08.01-2022.08.31</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-6">
                        <a href="" class="news_page_item">
                            <div class="news_page_pic"><img src="{{ asset('FrontPage/public/img/news-pic.png') }}" alt=""></div>
                            <div class="news_page_text">
                                <h3>麵匡匡內湖金湖店正式開幕</h3>
                                <p class="content">開幕活動於OO/OO~OO/OO~~~</p>
                                <p class="date">2022.08.01-2022.08.31</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-6">
                        <a href="" class="news_page_item">
                            <div class="news_page_pic"><img src="{{ asset('FrontPage/public/img/news-pic.png') }}" alt=""></div>
                            <div class="news_page_text">
                                <h3>麵匡匡內湖金湖店正式開幕</h3>
                                <p class="content">開幕活動於OO/OO~OO/OO~~~</p>
                                <p class="date">2022.08.01-2022.08.31</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-6">
                        <a href="" class="news_page_item cutoff">
                            <div class="news_page_pic"><img src="{{ asset('FrontPage/public/img/news-pic.png') }}" alt=""></div>
                            <div class="news_page_text">
                                <h3>麵匡匡內湖金湖店正式開幕</h3>
                                <p class="content">開幕活動於OO/OO~OO/OO~~~</p>
                                <p class="date">2022.08.01-2022.08.31</p>
                            </div>
                        </a>
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