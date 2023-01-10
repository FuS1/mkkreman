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

        <div class="innerPage">
        {!! $pageContent->content !!}

            <div class="recruit_joinus">
                <div class="title">
                    <img src="{{ asset('FrontPage/public/img/title-joinUs.svg') }}" alt="門市職缺">
                    <h2>join us</h2>
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
                    <div class="row recruit_joinus_content">
                        <!-- <div class="col-lg-4 col-6">
                            <div class="recruit_joinus_item">
                                <div class="recruit_joinus_pic">
                                    <img src="{{ asset('FrontPage/public/img/shop-1.png') }}" alt="">
                                </div>
                                <div class="recruit_joinus_inform">
                                    <div class="recruit_joinus_name">
                                        <h3>捷運景美店</h3>
                                        <img src="{{ asset('FrontPage/public/img/icon-pin.png') }}" alt="">
                                    </div>
                                    <ul>
                                        <li>地址：台北市文山區景文街21號</li>
                                        <li>電話：02-89313001</li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="col-4"><a class="recruit_joinus_job" href="">主管</a></div>
                                    <div class="col-4"><a class="recruit_joinus_job invalid" href="">正職</a></div>
                                    <div class="col-4"><a class="recruit_joinus_job" href="">計時</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <div class="recruit_joinus_item">
                                <div class="recruit_joinus_pic">
                                    <img src="{{ asset('FrontPage/public/img/shop-2.png') }}" alt="">
                                </div>
                                <div class="recruit_joinus_inform">
                                    <div class="recruit_joinus_name">
                                        <h3>內湖金湖店</h3>
                                        <img src="{{ asset('FrontPage/public/img/icon-pin.png') }}" alt="">
                                    </div>
                                    <ul>
                                        <li>地址：台北市內湖區金湖路396號</li>
                                        <li>電話：02-26330005</li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="col-4"><a class="recruit_joinus_job invalid" href="">主管</a></div>
                                    <div class="col-4"><a class="recruit_joinus_job" href="">正職</a></div>
                                    <div class="col-4"><a class="recruit_joinus_job" href="">計時</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <div class="recruit_joinus_item">
                                <div class="recruit_joinus_pic">
                                    <img src="{{ asset('FrontPage/public/img/shop-3.png') }}" alt="">
                                </div>
                                <div class="recruit_joinus_inform">
                                    <div class="recruit_joinus_name">
                                        <h3>台北莊敬店</h3>
                                        <img src="{{ asset('FrontPage/public/img/icon-pin.png') }}" alt="">
                                    </div>
                                    <ul>
                                        <li>地址：台北市信義區莊敬路410號</li>
                                        <li>電話：02-27852585</li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="col-4"><a class="recruit_joinus_job invalid" href="">主管</a></div>
                                    <div class="col-4"><a class="recruit_joinus_job" href="">正職</a></div>
                                    <div class="col-4"><a class="recruit_joinus_job" href="">計時</a></div>
                                </div>
                            </div>
                        </div> -->
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

        $(function(){
            $(".recruit_joinus_job").each(function(){
                if($(this).hasClass("invalid")){
                    $(this).removeAttr("href");
                }
            })
            
            $(".recruit_select li").click(function(){
                getStores($(this).attr('area'));
            })
            getStores('全部門市')
        });        

        function getStores(area){
            var data={};
            if(area!=='全部門市'){
                data['area'] = area;
            }
            $('.recruit_joinus_content').empty();

            $.ajax({
                url :'api/store',
                type:'get',
                dataType:'json',
                data:data,
                success: function(stores) {
                    console.log(stores);
                    if(!stores.length){
                        $('.recruit_joinus_content').html('<div style="text-align: center;font-size: 22px;border: 3px solid #132c53; border-radius: 8px;padding: 15px;width: fit-content;margin: auto;">尚未開設門市，敬請期待</div>')
                        return;
                    }
                    stores.forEach(function(store) {
                        var _dom = storeTpl.clone();
                        _dom.find('.map_link').attr('href','https://www.google.com/maps/place/'+store['address']);
                        _dom.find('.title').text(store['title']);
                        _dom.find('.address').text(store['address']);
                        _dom.find('.phone').text(store['phone']);
                        _dom.find('.store_img').attr('src',store['file_url'])
                        if(!store['job_ma']){
                            _dom.find('.job_ma').addClass('invalid');
                        }
                        if(!store['job_full_time']){
                            _dom.find('.job_full_time').addClass('invalid');
                        }
                        if(!store['job_part_time']){
                            _dom.find('.job_part_time').addClass('invalid');
                        }
                        if(mobileCheck()){
                            _dom.find('.recruit_joinus_job').attr('href',"tel:"+store['phone'])
                        }else{
                            _dom.find('.recruit_joinus_job').on('click',function(){
                                Swal.fire('詳細與應徵請電洽門市');
                            });
                        }
                        $('.recruit_joinus_content').append(_dom)
                    });
                    


                }
            });
        }


        var storeTpl = $('<div class="col-lg-4 col-6">'+
                            '<div class="recruit_joinus_item">'+
                                '<div class="recruit_joinus_pic">'+
                                    '<img class="store_img" src="./public/img/shop-1.png" alt="">'+
                                '</div>'+
                                '<div class="recruit_joinus_inform">'+
                                    '<div class="recruit_joinus_name">'+
                                        '<h3 class="title"></h3>'+
                                        '<a class="map_link" target="_blank"><img src="/FrontPage/public/img/icon-pin.png" alt=""></a>'+
                                    '</div>'+
                                    '<ul>'+
                                        '<li>地址：<span class="address">台北市文山區景文街21號</span></li>'+
                                        '<li>電話：<span class="phone">02-89313001</span></li>'+
                                    '</ul>'+
                                '</div>'+
                                '<div class="row">'+
                                    '<div class="col-4"><a class="recruit_joinus_job job_ma">主管</a></div>'+
                                    '<div class="col-4"><a class="recruit_joinus_job job_full_time">正職</a></div>'+
                                    '<div class="col-4"><a class="recruit_joinus_job job_part_time">計時</a></div>'+
                                '</div>'+
                            '</div>'+
                        '</div>');


        
        function mobileCheck() {
            let check = false;
            (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
            return check;
        };

    </script>