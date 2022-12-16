<!DOCTYPE html>
<html lang="zh_tw">
<head>
	@relativeInclude('layout.html_head')
	<link  href="{{ mix('FrontPage/public/css/style.css') }}" rel="stylesheet"><!-- tinymce -->
	<script>

		var getEditorContent = function(){
			return tinymce.get("content").getContent()	
		}

		$(function() {
			initTinymce('#content',{
				// theme_advanced_menubar_location : "top",
				menubar:false,
				inline: true,
				height:'100%'
			});
		});
		
	</script>
</head>

<body style="border:3px solid rgb(209 213 219); height:99vh;">
	<div id="content" class="tinymce-body" name="content">
		{!! $pageContent->content !!}
	</div>
</body>
</html>






