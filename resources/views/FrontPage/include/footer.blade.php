
<?php
    $footer = \App\Models\PageContent::where('page','footer')->first();
?>

<footer class="footer">
    {!! $footer->content !!}
    <div class="btn-top">
        <div class="btn-top_pic">
            <img src="{{ asset('FrontPage/public/img/arrow-top.svg') }}" alt="">
        </div>
    </div>
</footer>