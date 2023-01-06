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
                        <span>全部門市</span>
                        <img src="{{ asset('FrontPage/public/img/select-triangle.svg') }}" alt="">
                    </div>
                    <ul class="recruit_select_list select-common_list">
                        <li area='全部門市'class="active">全部門市</li>
                        <li area='北部'>北部（雙北、基隆、新竹、桃園、宜蘭）</li>
                        <li area='中部'>中部（臺中、苗栗、彰化、南投、雲林）</li>
                        <li area='南部'>南部（高雄、臺南、嘉義、屏東）</li>
                        <li area='東部'>東部（花蓮、臺東）</li>
                        <li area='外島'>外島（金門）</li>
                    </ul>
                </div>
            </div>
            <div class="container">
                <div class="row store_content">

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

        $(function(){
            

            $(".recruit_select li").click(function(){
                getStores($(this).attr('area'));
            })
            getStores('全部門市')
        })
        

        function getStores(area){
            var data={};
            if(area!=='全部門市'){
                data['area'] = area;
            }
            $('.store_content').empty();

            $.ajax({
                url :'api/store',
                type:'get',
                dataType:'json',
                data:data,
                success: function(stores) {
                    console.log(stores);
                    if(!stores.length){
                        $('.store_content').html('<div style="text-align: center;font-size: 22px;border: 3px solid #132c53; border-radius: 8px;padding: 15px;width: fit-content;margin: auto;">尚未開設門市，敬請期待</div>')
                        return;
                    }
                    stores.forEach(function(store) {
                        var _dom = storeTpl.clone();
                        _dom.find('.map_link').attr('href','https://www.google.com/maps/place/'+store['address']);
                        _dom.find('.store_map > iframe').attr('src','https://www.google.com/maps/embed/v1/place?q='+store['address']+'&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8');
                        _dom.find('.title').text(store['title']);
                        _dom.find('.address').text(store['address']);
                        _dom.find('.phone').text(store['phone']);
                        if(!store['pay_cash']){
                            _dom.find('.pay_cash').addClass('invalid');
                        }
                        if(!store['pay_credit_card']){
                            _dom.find('.pay_credit_card').addClass('invalid');
                        }
                        if(!store['pay_line_pay']){
                            _dom.find('.pay_line_pay').addClass('invalid');
                        }
                        if(!store['uber_eat_url']){
                            _dom.find('.uber').remove();
                        }else{
                            _dom.find('.uber').on('click',function(){
                                window.open(store['uber_eat_url']);
                            });
                        }
                        if(!store['food_panda_url']){
                            _dom.find('.panda').remove();
                        }else{
                            _dom.find('.panda').on('click',function(){
                                window.open(store['food_panda_url']);
                            });
                        }
                        if(!store['maifood_url']){
                            _dom.find('.line').remove();
                        }else{
                            _dom.find('.line').on('click',function(){
                                window.open(store['maifood_url']);
                            });
                        }
                        $('.store_content').append(_dom)
                    });
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
                }
            });
        }


        var storeTpl = $('<div class="col-lg-4">'+
                        '<div class="store_item">'+
                            '<a class="map_link" href="https://www.google.com/maps/place/台北市內湖區金湖路396號" target="_blank">點擊連結MAP</a>'+
                            '<div class="store_map">'+
                                '<iframe src="https://www.google.com/maps/embed/v1/place?q=台北市內湖區金湖路396號&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"  width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'+
                            '</div>'+
                            '<div class="store_name">'+
                                '<h3 class="title">內湖金湖店</h3>'+
                                '<div class="store_name_copy">'+
                                    '<span>複製地址</span>'+
                                    '<img src="FrontPage/public/img/icon-copy.svg" alt="">'+
                                '</div>'+
                            '</div>'+
                            '<p class="store_address"><span>地址：</span><span class="address">台北市內湖區金湖路396號</span></p>'+
                            '<p class="store_address"><span>電話：</span><span class="phone">02-34564641</span></p>'+
                            '<div class="row store_tag-box">'+
                                '<div class="col-4"><div class="store_tag pay_cash">現金付款</div></div>'+
                                '<div class="col-4"><div class="store_tag pay_credit_card">可刷信用卡</div></div>'+
                                '<div class="col-4"><div class="store_tag pay_line_pay">LINE PAY</div></div>'+
                                '<div class="col-4"><div class="store_tag uber">Uber eat</div></div>'+
                                '<div class="col-4"><div class="store_tag panda">foodpanda</div></div>'+
                                '<div class="col-4"><div class="store_tag line">LINE線上點餐</div></div>'+
                            '</div>'+
                        '</div>'+
                    '</div>');

    </script>