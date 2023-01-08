<!DOCTYPE html>
<html lang="zh_tw">
<head>
	@relativeInclude('layout.html_head')
	<script>
		const page = 'recruitment';
		$(function() {

			exec('pageContent','GET',{
				page : page
			},function(response){
				page_content_data = flattenObject(response);
				console.log(page_content_data);
				for(var i in page_content_data){
					$("[name="+replaceAll(i,".","\\.")+"]").each(function( index ) {
						if($(this).is('input') || $(this).is('select') || $(this).is('textarea') ){
							$(this).val(page_content_data[i]);
						}else if($(this).is('span')){
							$(this).text(page_content_data[i]);
						}else if($(this).is('div')){
							$(this).html(page_content_data[i]);
						}
					});
				}

				if(page_content_data['banner_file_url']){
					let img = $('#page-content-form #banner_file').parent().find('img');
					img.attr('src',page_content_data['banner_file_url']);	
					img.removeClass('hidden');	
				}
				$('#iframe').attr('src',"/_admin_/page_editor?page="+page+"&position=top");
				$('#bottom_iframe').attr('src',"/_admin_/page_editor?page="+page+"&position=bottom");
			});
			
			
			$(".btn-save-pageContent").on('click',function(){
				let form = $("#page-content-form");

				if( form[0].reportValidity() ){
					
					let data = getFormData(form,{
						page : page,
						banner_file	: form.find('#banner_file')[0].files[0],
						content : document.getElementById('iframe').contentWindow.getEditorContent(),
						bottom_content : document.getElementById('bottom_iframe').contentWindow.getEditorContent()
					});
					
					console.log(data)
					exec('pageContent','POST',data,function(response){
						console.log(response);
						window.location.reload();
					});
				}

			});
		});

	</script>
</head>

<body class="flex bg-gray-50">
	<div class="md:w-1/3 lg:w-1/4 xl:w-1/6 2xl:w-1/7 bg-[#062851]">
		@relativeInclude('layout.side_menu')
	</div>
	<div class="md:w-2/3 lg:w-3/4 xl:w-5/6 2xl:w-6/7">
		<div class="py-5 px-5 w-full">
			<div class="mb-2">
				<h1 class="text-1xl md:text-2xl font-bold text-gray-600 inline-block align-middle">人才招募頁面設定</h1>
			</div>
			<hr class="my-6 h-px bg-gray-200 border-0 dark:bg-gray-700">
		</div>
		<div class="container mx-auto px-8">
			<form id="page-content-form">
				<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
					<div class="justify-center">	
						<label class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Banner圖</label>
						<div class="mb-2">
							<input id="banner_file" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" type="file">
							<p class="mt-1 text-sm text-gray-500 dark:text-gray-300">限 PNG, JPG, GIF，解析度 1900 * 370 px，建議先<a class="text-orange-600" href="https://tinypng.com" target="_blank">壓縮</a></p>
							<img class="max-w-full min-h-10 max-h-48 max-h-full h-auto rounded-lg shadow-xl dark:shadow-gray-800 mb-3 hidden mx-auto" src="">
						</div>
					</div>
				</div>
				<div class="w-full">
					<div class="justify-center">	
						<label class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">頁面內容</label>
						<iframe id="iframe" class="w-full" style="max-width:1280px;" height="800px">

						</iframe>
					</div>
				</div>
				<div class="w-full">
					<div class="justify-center">	
						<label class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">底部頁面內容</label>
						<iframe id="bottom_iframe" class="w-full" style="max-width:1280px;" height="800px">

						</iframe>
					</div>
				</div>
			</form>
		</div>

		<hr class="my-6 h-px bg-gray-200 border-0 dark:bg-gray-700">

		<div class="container mx-auto mb-8 px-8 flex justify-center">
			<button class="px-6 py-3 ml-6 text-white font-medium rounded-lg text-sm no-underline bg-cyan-800 hover:bg-cyan-900 btn-save-pageContent">儲存</button>	
		</div>
	</div>
</body>
</html>






