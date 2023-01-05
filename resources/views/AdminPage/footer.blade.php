<!DOCTYPE html>
<html lang="zh_tw">
<head>
	@relativeInclude('layout.html_head')
	<script>
		const page = 'footer';
		$(function() {

			exec('pageContent','GET',{
				page : page
			},function(response){
				page_content_data = flattenObject(response);
				console.log(page_content_data);
				$('#iframe').attr('src',"/_admin_/page_editor?page="+page+"&position=top");
			});
			
			
			$(".btn-save-pageContent").on('click',function(){
				let form = $("#page-content-form");

				if( form[0].reportValidity() ){
					
					let data = getFormData(form,{
						page : page,
						content : document.getElementById('iframe').contentWindow.getEditorContent(),
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
				<h1 class="text-1xl md:text-2xl font-bold text-gray-600 inline-block align-middle">頁尾設定</h1>
			</div>
			<hr class="my-6 h-px bg-gray-200 border-0 dark:bg-gray-700">
		</div>
		<div class="container mx-auto px-8">
			<form id="page-content-form">
				<div class="w-full">
					<div class="justify-center">	
						<label class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">頁面內容</label>
						<iframe id="iframe" class="w-full" style="max-width:1280px;" height="800px">

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






