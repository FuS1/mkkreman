<!DOCTYPE html>
<html lang="zh_tw">
<head>
	@relativeInclude('layout.html_head')
	<script>
		$(function() {

			var drink_id = getUrlParam('drink_id');
			if(drink_id){
				exec('drink','GET',{
					drink_id : drink_id
				},function(response){
					drink_data = flattenObject(response);
					console.log(drink_data);
					for(var i in drink_data){
						$("[name="+replaceAll(i,".","\\.")+"]").each(function( index ) {
							if($(this).is('input') || $(this).is('select') ){
								$(this).val(drink_data[i]);
							}else if($(this).is('span')){
								$(this).text(drink_data[i]);
							}else if($(this).is('div')){
								$(this).html(drink_data[i]);
							}else if($(this).is('textarea')){
								$(this).val(drink_data[i].replaceAll('<br />',"\n"));
							}
						});
					}

					if(drink_data['file_url']){
						let img = $('#drink-form #drink_file').parent().find('img');
						img.attr('src',drink_data['file_url']);	
						img.removeClass('hidden');	
					}

					initTinymce('#content');	
				});
			}else{
				initTinymce('#content');
			}
			
			$(".btn-save-drink").on('click',function(){
				let form = $("#drink-form");
				if( form[0].reportValidity() ){
					let data = getFormData(form,{
						drink_id : drink_id,
						file	: form.find('#drink_file')[0].files[0],
						short_description : $('[name="short_description"]').val().replace(/\r?\n/g, '<br />'),
						// content : tinymce.get("content").getContent(),
					});

					
					console.log(data)
					exec('drink','POST',data,function(response){
						console.log(response);
						window.location.assign('./drink_list');
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
				<h1 class="text-1xl md:text-2xl font-bold text-gray-600 inline-block align-middle">清爽飲品設定</h1>
			</div>
			<hr class="my-6 h-px bg-gray-200 border-0 dark:bg-gray-700">
		</div>
		<div class="container mx-auto px-8">
			<form id="drink-form">
				<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 py-1 mb-2">
					<div class="justify-center">	
						<label for="title" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">品名</label>
						<input type="input" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="招牌豚骨拉麵" required>
					</div>
					<div class="justify-center">	
						<label for="short_description" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">短描述（建議50字以內）</label>
						<textarea style="height:100px;" name="short_description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="豬大骨湯底，透著淡淡的牡蠣白，營養不油膩；&#10;搭配武火炙燒的叉燒肉，&#10;香氣撲鼻，美味無雙，初訪必點。" required></textarea>
					</div>
					<div class="justify-center">
						<label class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="drink_file">圖檔</label>
						<img class="max-w-full min-h-10 max-h-48 max-h-full h-auto rounded-lg shadow-xl dark:shadow-gray-800 mb-3 hidden mx-auto" src="">
						<input id="drink_file" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" type="file">
						<p class="mt-1 text-sm text-gray-500 dark:text-gray-300">限 PNG, JPG, GIF，解析度500 * 500 px，建議先<a class="text-orange-600" href="https://tinypng.com" target="_blank">壓縮</a></p>
					</div>
				</div>
				<!-- <div>
					<div class="justify-center">	
						<label for="content" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">詳細介紹</label>
						<div id="content" name="content"></div>
					</div>
				</div> -->
			</form>
		</div>

		<hr class="my-6 h-px bg-gray-200 border-0 dark:bg-gray-700">

		<div class="container mx-auto mb-8 px-8 flex justify-center">
			<a href="./drink_list" class="px-6 py-3 text-black font-medium rounded-lg text-sm no-underline bg-gray-200 hover:bg-gray-300">返回</a>	
			<button class="px-6 py-3 ml-6 text-white font-medium rounded-lg text-sm no-underline bg-cyan-800 hover:bg-cyan-900 btn-save-drink">儲存</button>	
		</div>
	</div>
</body>
</html>






