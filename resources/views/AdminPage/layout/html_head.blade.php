<title>後台 - 麵匡匡拉麵食堂</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:type" content="type" />  
<meta property="og:title" content="麵匡匡拉麵食堂" />
<meta property="og:description" content="吾蜂美味集團--台式拉麵--特色餐飲，精緻、平價、美味，堅持用好湯、好麵，用心做好一碗拉麵，平價也能做到精緻美味，招牌豚骨湯、秘製麻辣醬、炙燒叉燒肉" />
<meta property="og:image" content="/AdminPage/img/favicon.png" />
<meta property="og:url" content="https://mkkreman.com" />
<meta property="og:site_name" content="麵匡匡拉麵食堂" />
<link rel="icon" href="/AdminPage/img/favicon.png">

<!-- font-awesome -->
<link  href="{{ asset('lib/font-awesome/css/all.min.css') }}" rel="stylesheet">

<!-- flowbite -->
<script src="{{ asset('lib/flowbite/flowbite.js') }}" type="text/javascript" ></script>
<script src="{{ asset('lib/flowbite/datepicker.js') }}" type="text/javascript" ></script>

<!-- tabulator -->
<script src="{{ asset('lib/tabulator/tabulator.min.js') }}" type="text/javascript" ></script>
<link  href="{{ asset('lib/tabulator/tabulator.min.css') }}" rel="stylesheet">
<link  href="{{ asset('lib/tabulator/tabulator_bootstrap4.min.css') }}" rel="stylesheet">

<!-- tinymce -->
<script src="{{ asset('lib/tinymce/tinymce.min.js') }}"></script>
 
<!-- app -->
<link  href="{{ asset('AdminPage/css/app.css') }}" rel="stylesheet">
<script src="{{ asset('AdminPage/js/app.js') }}" type="text/javascript" ></script>

<script>
    window.ENV = {
        APP_URL : "{{ config('env.APP_URL') }}",
        APP_API_URL : "{{ config('env.APP_API_URL') }}",
    };
    
</script>