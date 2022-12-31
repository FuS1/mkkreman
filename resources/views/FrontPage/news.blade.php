<!DOCTYPE html>
<html lang="zh">
<head>
    @relativeInclude('include.meta')
</head>
<body>
    @relativeInclude('include.header')
    <main>
        <div class="page_banner">
            <img src="{{ asset( 'storage/'.$news->banner_file_path ) }}" alt="">
        </div>
        
        <div class="container">
            <div class="news-banner"><h1>{{ $news->title }}</h1></div>
            {!! $news->content !!}
        </div>

    </main>
    @relativeInclude('include.footer')
    @relativeInclude('include.script')