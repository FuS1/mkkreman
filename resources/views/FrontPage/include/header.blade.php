

@if (Request::path() == 'seminar')
    <div class="fixed-btn-join">
        <a href="" class="btn-reserve"><img src="{{ asset('FrontPage/public/img/btn-reserve.png') }}"></a>
        <a href="" class="btn-consult"><img src="{{ asset('FrontPage/public/img/btn-consult.png') }}" ></a>
    </div>
@else
    <div class="fixed-btn">
        <a href="" class="btn-order"><img src="{{ asset('FrontPage/public/img/here.svg') }}"><span>線上<br class="d-sm-none">訂餐</span></a>
        <a href="/food"><span>完整<br class="d-sm-none">菜單</span></a>
    </div>
@endif

<header class="header">
    <div class="container position-relative d-lg-block d-flex align-items-center justify-content-between">
        <div class="header_mask"></div>
        <nav class="header_nav">
            <ul class="d-flex align-items-center justify-content-center">
            <li><a href="/aboutUs">關於我們</a></li>
                <li><a href="/food">美味餐點</a></li>
                <li><a href="/news">最新消息</a></li>
                <li class="header_nav_space"><a href="/"></a></li>
                <li><a href="/store">門市資訊</a></li>
                <li><a href="/recruitment">人才招募</a></li>
                <li><a href="/seminar">我要加盟</a></li>
            </ul>
        </nav>
        <div class="header_logo">
            <a href="/" class="header_logo_box"></a>
            <div class="header_logo_mask d-lg-block d-none"></div>
            <a href="/"> <img class="header_logo_pic" src="{{ asset('FrontPage/public/img/logo.svg') }}" alt=""></a>
        </div>
        <div class="header_menu d-lg-none"><img src="{{ asset('FrontPage/public/img/icon_menu.png') }}" alt=""></div>
    </div>
</header>
