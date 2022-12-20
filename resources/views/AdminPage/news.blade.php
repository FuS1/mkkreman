<!DOCTYPE html>
<html lang="zh_tw">
<head>
	@relativeInclude('layout.html_head')
	<script>
		$(function() {

			var news_id = getUrlParam('news_id');
			if(news_id){
				exec('news','GET',{
					news_id : news_id
				},function(response){
					news_data = flattenObject(response);
					console.log(news_data);
					for(var i in news_data){
						$("[name="+replaceAll(i,".","\\.")+"]").each(function( index ) {
							if($(this).is('input') || $(this).is('select') || $(this).is('textarea') ){
								$(this).val(news_data[i]);
							}else if($(this).is('span')){
								$(this).text(news_data[i]);
							}else if($(this).is('div')){
								$(this).html(news_data[i]);
							}
						});
					}

					if(news_data['file_url']){
						let img = $('#news-form #news_file').parent().find('img');
						img.attr('src',news_data['file_url']);	
						img.removeClass('hidden');	
					}

					if(news_data['banner_file_url']){
						let img = $('#news-form #banner_file').parent().find('img');
						img.attr('src',news_data['banner_file_url']);	
						img.removeClass('hidden');	
					}

					if(news_data['started_at']){
						$('[name="started_at_date"]').val(news_data['started_at'].split(' ')[0]);
						$('[name="started_at_time"]').val(news_data['started_at'].split(' ')[1]);
					}

					if(news_data['ended_at']){
						$('[name="ended_at_date"]'	).val(news_data['ended_at'].split(' ')[0]);
						$('[name="ended_at_time"]'	).val(news_data['ended_at'].split(' ')[1]);
					}

					initTinymce('#content');	
				});
			}else{
				initTinymce('#content');
			}
			

			$(".btn-save-news").on('click',function(){
				let form = $("#news-form");

				if( form[0].reportValidity() ){

					let started_at_time = $('[name="started_at_time"]').val().split(':');
					started_at_time 	= started_at_time[0] + ':' + started_at_time[1] + ':00';

					let ended_at_time 	= $('[name="ended_at_time"]').val().split(':');
					ended_at_time 		= ended_at_time[0] + ':' + ended_at_time[1] + ':00';


					let data = getFormData(form,{
						news_id : news_id,
						file	: form.find('#news_file')[0].files[0],
						banner_file: form.find('#banner_file')[0].files[0],
						started_at : $('[name="started_at_date"]').val() + ' ' + started_at_time,
						ended_at   : $('[name="ended_at_date"]'  ).val() + ' ' + ended_at_time,
						content : tinymce.get("content").getContent(),
					});

					exec('news','POST',data,function(response){
						console.log(response);
						window.location.assign('./news_list');
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
				<h1 class="text-1xl md:text-2xl font-bold text-gray-600 inline-block align-middle">最新消息設定</h1>
			</div>
			<hr class="my-6 h-px bg-gray-200 border-0 dark:bg-gray-700">
		</div>
		<div class="container mx-auto px-8">
			<form id="news-form">
				<div class="grid grid-cols-1 mb-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
					<div class="justify-center">	
						<label for="title" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">標題</label>
						<input type="input" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="開幕式買二送一" required>
					</div>
					<div class="justify-center">	
						<label for="short_description" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">短描述（建議50字以內）</label>
						<textarea style="height:100px;" name="short_description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="豬大骨湯底，透著淡淡的牡蠣白，營養不油膩；&#10;搭配武火炙燒的叉燒肉，&#10;香氣撲鼻，美味無雙，初訪必點。" required></textarea>
					</div>
					<div class="justify-center">	
						<label class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="is_top">置頂</label>
						<select id="is_top" name="is_top" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
							<option value="0">否</option>
							<option value="1">是</option>
						</select>
					</div>
				</div>
				<div class="grid grid-cols-1 mb-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
					<div class="justify-center">
						<label class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="news_file">集合頁圖檔</label>
						<img class="max-w-full min-h-10 max-h-48 max-h-full h-auto rounded-lg shadow-xl dark:shadow-gray-800 mb-3 hidden mx-auto" src="">
						<input id="news_file" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" type="file">
						<p class="mt-1 text-sm text-gray-500 dark:text-gray-300">限 PNG, JPG, GIF，解析度 390 × 390 px，建議先<a class="text-orange-600" href="https://tinypng.com" target="_blank">壓縮</a></p>
					</div>
					<div class="justify-center">
						<label class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="banner_file">資訊頁頂部圖檔</label>
						<img class="max-w-full min-h-10 max-h-48 max-h-full h-auto rounded-lg shadow-xl dark:shadow-gray-800 mb-3 hidden mx-auto" src="">
						<input id="banner_file" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" type="file">
						<p class="mt-1 text-sm text-gray-500 dark:text-gray-300">限 PNG, JPG, GIF，解析度 ___ × ___ px，建議先<a class="text-orange-600" href="https://tinypng.com" target="_blank">壓縮</a></p>
					</div>
					<div class="justify-center">	
						<label class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="show_in_index">顯示於首頁</label>
						<select id="show_in_index" name="show_in_index" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
							<option value="0">否</option>
							<option value="1">是</option>
						</select>
					</div>
				</div>
				<div class="grid grid-cols-1 mb-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
					<div class="justify-center">	
						<label for="started_at" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">活動開始時間</label>
						<input datepicker datepicker-format="yyyy-mm-dd" type="text" name="started_at_date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="請選擇日期" required>
						<input type="time" name="started_at_time" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
					</div>
					<div class="justify-center">	
						<label for="ended_at" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">活動結束時間</label>
						<input datepicker datepicker-format="yyyy-mm-dd" type="text" name="ended_at_date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="請選擇日期" required>
						<input type="time" name="ended_at_time" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
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
			<a href="./news_list" class="px-6 py-3 text-black font-medium rounded-lg text-sm no-underline bg-gray-200 hover:bg-gray-300">返回</a>	
			<button class="px-6 py-3 ml-6 text-white font-medium rounded-lg text-sm no-underline bg-cyan-800 hover:bg-cyan-900 btn-save-news">儲存</button>	
		</div>
	</div>
</body>
</html>






