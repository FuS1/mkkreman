<!DOCTYPE html>
<html lang="zh_tw">
<head>
	@relativeInclude('layout.html_head')
	<link rel="stylesheet" href="{{ asset('FrontPage/lib/css/bootstrap/bootstrap.css') }}">
	<link  href="{{ mix('FrontPage/public/css/style.css') }}" rel="stylesheet"><!-- tinymce -->
	<script>

		var getEditorContent = function(){
			return tinymce.get("content").getContent()	
		}

		$(function() {
			initTinymce('#content',{
				// theme_advanced_menubar_location : "top",
				// menubar:false,
				inline: true,
				height:'100%'
			});
		});
		
	</script>
</head>

<body class="bg-gray-50" style="height:99vh;">
	<div id="content" class="tinymce-body" name="content" style="border: 3px solid rgb(219 213 219); margin-top: 78px;min-height: 90vh;">
		{!! $pageContent->editor_content ?? null !!}
	</div>
</body>
</html>






