<title>後台 - {{ config('env.APP_CHINESE_NAME') }}</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:type" content="type" />  
<meta property="og:title" content="{{ config('env.APP_CHINESE_NAME') }}" />
<meta property="og:description" content="{{ config('env.APP_CHINESE_DESCRIPTION') }}" />
<meta property="og:image" content="{{ mix('/AdminPage/img/favicon.png') }}" />
<meta property="og:url" content="{{ config('env.APP_URL') }}" />
<meta property="og:site_name" content="{{ config('env.APP_CHINESE_NAME') }}" />
<link rel="icon" href="{{ mix('/AdminPage/img/favicon.png') }}">

<!-- font-awesome -->
<link  href="{{ asset('lib/font-awesome/css/all.min.css') }}" rel="stylesheet">

<!-- flowbite -->
<script src="{{ asset('lib/flowbite/flowbite.js') }}" type="text/javascript"></script>
<script src="{{ asset('lib/flowbite/datepicker.js') }}" type="text/javascript"></script>

<!-- tabulator -->
<script src="{{ asset('lib/tabulator/tabulator.min.js') }}" type="text/javascript"></script>
<link  href="{{ asset('lib/tabulator/tabulator.min.css') }}" rel="stylesheet">
<link  href="{{ asset('lib/tabulator/tabulator_bootstrap4.min.css') }}" rel="stylesheet">

<script src="{{ asset('lib/xlsx.full.min.js') }}" type="text/javascript" ></script>

<!-- tinymce -->
<script src="{{ asset('lib/tinymce/tinymce.min.js') }}"></script>
 
<!-- app -->
<link  href="{{ mix('AdminPage/css/app.css') }}" rel="stylesheet">
<script src="{{ mix('AdminPage/js/app.js') }}" type="text/javascript" ></script>
