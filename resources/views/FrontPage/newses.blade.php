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
                @foreach ($news as $_news)
                    <div class="col-lg-4 col-6">
                    @if ($_news->is_pass) 
                        <a href="/news/{{ $_news->id }}" class="news_page_item cutoff">
                    @else
                        <a href="/news/{{ $_news->id }}" class="news_page_item">
                    @endif
                            <div class="news_page_pic"><img src="{{ asset( 'storage/'.$_news->file_path ) }}" alt=""></div>
                            <div class="news_page_text">
                                <h3>{{ $_news->title }}</h3>
                                <p class="content">{{ $_news->short_description }}</p>
                            @if (empty($_news->ended_ymd)) 
                                <p class="date">{{ $_news->started_ymd }}</p>
                            @else
                                <p class="date">{{ $_news->started_ymd }} - {{ $_news->ended_ymd }}</p>
                            @endif
                            </div>
                        </a>
                    </div>
                @endforeach
                </div>
            </div>
        </div>

        <div class="container">
            {!! $pageContent->bottom_content !!}
        </div>

    </main>
    @relativeInclude('include.footer')
    @relativeInclude('include.script')