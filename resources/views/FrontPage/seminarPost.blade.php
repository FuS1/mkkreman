<!DOCTYPE html>
<html lang="zh">
<head>
    @relativeInclude('include.meta')
</head>
<body>
    @relativeInclude('include.header')
    <main>
        <div class="page_banner">
            <img src="{{ asset( 'storage/'.$seminarPost->banner_file_path ) }}" alt="">
        </div>
        
        <div class="container">
            <div class="news-banner"><h1>{{ $seminarStory->title }}</h1></div>
            {!! $seminarPost->content !!}
        </div>

    </main>
    @relativeInclude('include.footer')
    @relativeInclude('include.script')