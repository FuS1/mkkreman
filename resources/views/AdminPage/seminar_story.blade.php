<!DOCTYPE html>
<html lang="zh_tw">
<head>
	@relativeInclude('layout.html_head')
	<script>
		$(function() {

			var seminar_story_id = getUrlParam('seminar_story_id');
			if(seminar_story_id){
				exec('seminar/story','GET',{
					seminar_story_id : seminar_story_id
				},function(response){
					seminar_story_data = flattenObject(response);
					console.log(seminar_story_data);
					for(var i in seminar_story_data){
						$("[name="+replaceAll(i,".","\\.")+"]").each(function( index ) {
							if($(this).is('input') || $(this).is('select') ){
								$(this).val(seminar_story_data[i]);
							}else if($(this).is('span')){
								$(this).text(seminar_story_data[i]);
							}else if($(this).is('div')){
								$(this).html(seminar_story_data[i]);
							}else if($(this).is('textarea')){
								$(this).val(seminar_story_data[i].replaceAll('<br />',"\n"));
							}
						});
					}

					if(seminar_story_data['file_url']){
						let img = $('#seminar-story-form #seminar_story_file').parent().find('img');
						img.attr('src',seminar_story_data['file_url']);	
						img.removeClass('hidden');	
						
					}

					if(seminar_story_data['banner_file_url']){
						let img = $('#seminar-story-form #banner_file').parent().find('img');
						img.attr('src',seminar_story_data['banner_file_url']);	
						img.removeClass('hidden');	
					}


					initTinymce('#content');	
				});
			}else{
				initTinymce('#content');
			}
			

			$(".btn-save-seminar_story").on('click',function(){

				let form = $("#seminar-story-form");

				if( form[0].reportValidity() ){
					let data = getFormData(form,{
						seminar_story_id : seminar_story_id,
						file	: form.find('#seminar_story_file')[0].files[0],
						banner_file	: form.find('#banner_file')[0].files[0],
						content : tinymce.get("content").getContent(),
					});

					
					console.log(data)
					exec('seminar/story','POST',data,function(response){
						console.log(response);
						window.location.assign('./seminar_story_list');
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
				<h1 class="text-1xl md:text-2xl font-bold text-gray-600 inline-block align-middle">創業故事設定</h1>
			</div>
			<hr class="my-6 h-px bg-gray-200 border-0 dark:bg-gray-700">
		</div>
		<div class="container mx-auto px-8">
			<form id="seminar-story-form">
				<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
					<div class="justify-center">	
						<label for="title" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">標題</label>
						<input type="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="創業心得" required>
					</div>
					<div class="justify-center">	
						<label for="short_description" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">短描述（建議50字以內）</label>
						<textarea style="height:100px;" name="short_description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="豬大骨湯底，透著淡淡的牡蠣白，營養不油膩；&#10;搭配武火炙燒的叉燒肉，&#10;香氣撲鼻，美味無雙，初訪必點。" required></textarea>
					</div>
					<div class="justify-center">	
						<label class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="show_in_index">顯示於首頁</label>
						<select id="show_in_index" name="show_in_index" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
							<option value="0">否</option>
							<option value="1">是</option>
						</select>
					</div>
				</div>
				<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
					<div class="justify-center">
						<label class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="seminar_story_file">集合頁圖檔</label>
						<img class="max-w-full min-h-10 max-h-48 max-h-full h-auto rounded-lg shadow-xl dark:shadow-gray-800 mb-3 hidden mx-auto" src="">
						<input id="seminar_story_file" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" type="file">
						<p class="mt-1 text-sm text-gray-500 dark:text-gray-300">限 PNG, JPG, GIF，解析度 390 × 390 px，建議先<a class="text-orange-600" href="https://tinypng.com" target="_blank">壓縮</a></p>
					</div>
					<div class="justify-center">
						<label class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="banner_file">資訊頁頂部圖檔</label>
						<img class="max-w-full min-h-10 max-h-48 max-h-full h-auto rounded-lg shadow-xl dark:shadow-gray-800 mb-3 hidden mx-auto" src="">
						<input id="banner_file" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" type="file">
						<p class="mt-1 text-sm text-gray-500 dark:text-gray-300">限 PNG, JPG, GIF，解析度 1900 * 370 px，建議先<a class="text-orange-600" href="https://tinypng.com" target="_blank">壓縮</a></p>
					</div>
				</div>
				<div>
					<div class="justify-center">	
						<label for="content" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">內文</label>
						<div id="content" name="content"></div>
					</div>
				</div>
			</form>
		</div>

		<hr class="my-6 h-px bg-gray-200 border-0 dark:bg-gray-700">

		<div class="container mx-auto mb-8 px-8 flex justify-center">
			<a href="./seminar_story_list" class="px-6 py-3 text-black font-medium rounded-lg text-sm no-underline bg-gray-200 hover:bg-gray-300">返回</a>	
			<button class="px-6 py-3 ml-6 text-white font-medium rounded-lg text-sm no-underline bg-cyan-800 hover:bg-cyan-900 btn-save-seminar_story">儲存</button>	
		</div>
	</div>
</body>
</html>






