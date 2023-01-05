<!DOCTYPE html>
<html lang="zh">
<head>
    @relativeInclude('include.meta')
</head>
<body>
    @relativeInclude('include.header')
    <main>
        <div class="innerPage">
            <div class="container">
                <div class="title">
                <img src="{{ asset('FrontPage/public/img/index-seminar-story.png') }}" alt="創業故事">
                <h2>Story</h2>
                </div>
                <div class="row news_page">
                @foreach ($seminarStory as $_seminarStory)
                    <div class="col-lg-4 col-6">
                        <a href="/seminar/story/{{ $_seminarStory->id }}" class="news_page_item">
                            <div class="news_page_pic"><img src="{{ asset( 'storage/'.$_seminarStory->file_path ) }}" alt=""></div>
                            <div class="news_page_text" style="background-color:#efefef; border:none; color:#132C53; text-align:center;">
                                <h3>{{ $_seminarStory->title }}</h3>
                                <p class="content">{{ $_seminarStory->short_description }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
                </div>
            </div>
            <div class="join_video_link mt-5">
                <a class="mt-5 mx-2" style="background-color: #132C53; max-width: 420px;" href="/seminar/post">創業知識部落格</a>
                <a class="mt-5 mx-2" style="max-width: 420px;" href="/seminar#seminarForm">馬上報名課程</a>
            </div>
        </div>

    </main>
    @relativeInclude('include.footer')
    @relativeInclude('include.script')


    seminarStory