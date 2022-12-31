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
            <div class="title title-store">
                <img src="{{ asset('FrontPage/public/img/title-store.svg') }}" alt="門市資訊">
                <h2>Store Information</h2>
            </div>
            <div class="recruit_select-box">
                <label for="">選擇區域</label>
                <div class="recruit_select select-common">
                    <div class="recruit_select_active select-common_active">
                        <span>北部</span>
                        <img src="{{ asset('FrontPage/public/img/select-triangle.svg') }}" alt="">
                    </div>
                    <ul class="recruit_select_list select-common_list">
                        <li class="active">北部</li>
                        <li>中部</li>
                        <li>南部</li>
                        <li>東部</li>
                    </ul>
                </div>
            </div>
            <div class="container">
                <div class="row store_content">
                    <div class="col-lg-4">
                        <div class="store_item">
                            <a href="https://www.google.com/maps/place/台北市內湖區金湖路396號" target="_blank">點擊連結MAP</a>
                            <div class="store_map">
                                <iframe src="https://www.google.com/maps/embed/v1/place?q=台北市內湖區金湖路396號&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"  width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <div class="store_name">
                                <h3>內湖金湖店</h3>
                                <div class="store_name_copy">
                                    <span>複製地址</span>
                                    <img src="{{ asset('FrontPage/public/img/icon-copy.svg') }}" alt="">
                                </div>
                            </div>
                            <p class="store_address"><span>地址：</span><span>台北市內湖區金湖路396號</span></p>
                            <div class="row store_tag-box">
                                <div class="col-4"><div class="store_tag">現金付款</div></div>
                                <div class="col-4"><div class="store_tag">可刷信用卡</div></div>
                                <div class="col-4"><div class="store_tag">LINE PAY</div></div>
                                <div class="col-4"><div class="store_tag uber">Uber eat</div></div>
                                <div class="col-4"><div class="store_tag panda">foodpanda</div></div>
                                <div class="col-4"><div class="store_tag line">LINE線上點餐</div></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="store_item">
                            <a href="https://www.google.com/maps/place/台北市信義區莊敬路410號" target="_blank">點擊連結MAP</a>
                            <div class="store_map">
                            <iframe src="https://www.google.com/maps/embed/v1/place?q=台北市信義區莊敬路410號&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <div class="store_name">
                                <h3>台北莊敬店</h3>
                                <div class="store_name_copy">
                                    <span>複製地址</span>
                                    <img src="{{ asset('FrontPage/public/img/icon-copy.svg') }}" alt="">
                                </div>
                            </div>
                            <p class="store_address"><span>地址：</span><span>台北市信義區莊敬路410號</span></p>
                            <div class="row store_tag-box">
                                <div class="col-4"><div class="store_tag">現金付款</div></div>
                                <div class="col-4"><div class="store_tag invalid">可刷信用卡</div></div>
                                <div class="col-4"><div class="store_tag invalid">LINE PAY</div></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="store_item">
                            <a href="https://www.google.com/maps/place/台灣台北市文山區景文街21號" target="_blank">點擊連結MAP</a>
                            <div class="store_map">
                            <iframe src="https://www.google.com/maps/embed/v1/place?q=台灣台北市文山區景文街21號&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <div class="store_name">
                                <h3>捷運景美店</h3>
                                <div class="store_name_copy">
                                    <span>複製地址</span>
                                    <img src="{{ asset('FrontPage/public/img/icon-copy.svg') }}" alt="">
                                </div>
                            </div>
                            <p class="store_address"><span>地址：</span><span>台北市文山區景文街21號</span></p>
                            <div class="row store_tag-box">
                                <div class="col-4"><div class="store_tag">現金付款</div></div>
                                <div class="col-4"><div class="store_tag invalid">可刷信用卡</div></div>
                                <div class="col-4"><div class="store_tag invalid">LINE PAY</div></div>
                            </div>
                        </div>
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

    <script>
        $(".store_name_copy").each(function(){
            this.addEventListener('click', function(){
                const range = document.createRange();
                // 將指定元素內容加到 Range 中
                const texts = this.parentElement.nextElementSibling.lastChild;
                range.selectNode(texts);
                // 取得 Selection 物件
                const selection = window.getSelection();
                // 先清空當前選取範圍
                selection.removeAllRanges();
                // 加入 Range 
                selection.addRange(range);
  
                document.execCommand('copy');
                selection.removeAllRanges();

            })
            // $(this).click(function){
            // }
        })
    </script>