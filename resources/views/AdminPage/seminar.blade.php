<!DOCTYPE html>
<html lang="zh_tw">
<head>
	@relativeInclude('layout.html_head')
	<script>
		$(function() {

			var seminar_id = getUrlParam('seminar_id');
			if(seminar_id){
				exec('seminar','GET',{
					seminar_id : seminar_id
				},function(response){
					seminar_data = flattenObject(response);
					console.log(seminar_data);
					for(var i in seminar_data){
						$("[name="+replaceAll(i,".","\\.")+"]").each(function( index ) {
							if($(this).is('input') || $(this).is('select') || $(this).is('textarea') ){
								$(this).val(seminar_data[i]);
							}else if($(this).is('span')){
								$(this).text(seminar_data[i]);
							}
						});
					}

					$('[name="started_at_date"]').val(seminar_data['started_at'].split(' ')[0]);
					$('[name="started_at_time"]').val(seminar_data['started_at'].split(' ')[1]);
					$('[name="ended_at_date"]'	).val(seminar_data['ended_at'].split(' ')[0]);
					$('[name="ended_at_time"]'	).val(seminar_data['ended_at'].split(' ')[1]);
				});
			}
			

			$(".btn-save-seminar").on('click',function(){

				let form = $("#seminar-form");

				if( form[0].reportValidity() ){

					let started_at_time = $('[name="started_at_time"]').val().split(':');
					started_at_time 	= started_at_time[0] + ':' + started_at_time[1] + ':00';

					let ended_at_time 	= $('[name="ended_at_time"]').val().split(':');
					ended_at_time 		= ended_at_time[0] + ':' + ended_at_time[1] + ':00';

					let data = getFormData(form,{
						seminar_id : seminar_id,
						started_at : $('[name="started_at_date"]').val() + ' ' + started_at_time,
						ended_at   : $('[name="ended_at_date"]'  ).val() + ' ' + ended_at_time,
					});

					
					console.log(data)
					exec('seminar','POST',data,function(response){
						console.log(response);
						window.location.assign('./seminar_list');
					});
				}

			});
		});

	</script>
</head>

<body class="flex bg-gray-50">
	<div class="md:w-1/3 lg:w-1/4 xl:w-1/6 2xl:w-1/7">
		@relativeInclude('layout.side_menu')
	</div>
	<div class="md:w-2/3 lg:w-3/4 xl:w-5/6 2xl:w-6/7">
		<div class="py-5 px-5 w-full">
			<div class="mb-2">
				<h1 class="text-1xl md:text-2xl font-bold text-gray-600 inline-block align-middle">講座設定</h1>
			</div>
			<hr class="my-6 h-px bg-gray-200 border-0 dark:bg-gray-700">
		</div>
		<div class="container mx-auto px-8">
			<form id="seminar-form">
				<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
					<div class="justify-center">	
						<label for="title" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">講座名稱</label>
						<input type="input" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="台北內湖場" required>
					</div>
					<div class="justify-center">	
						<label for="address" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">講座地址</label>
						<input type="input" name="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="台北市內湖區新湖二路68號6樓" required>
					</div>
					<div class="justify-center">	
						<label for="qop" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">講座剩餘名額</label>
						<input type="number" name="qop" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="10" placeholder="請輸入數字" required>
						<p class="mt-1 text-sm text-red-700">僅顯示於前台用</p>
					</div>
					<div class="justify-center">	
						<label for="started_at" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">講座開始時間</label>
						<input datepicker datepicker-format="yyyy-mm-dd" type="text" name="started_at_date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="請選擇日期" required>
						<input type="time" name="started_at_time" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="07:30" max="21:00" step="300" required >
					</div>
					<div class="justify-center">	
						<label for="ended_at" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">講座結束時間</label>
						<input datepicker datepicker-format="yyyy-mm-dd" type="text" name="ended_at_date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="請選擇日期" required>
						<input type="time" name="ended_at_time" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="07:30" max="21:00" step="300" required>
					</div>
				</div>
			</form>
		</div>

		<hr class="my-6 h-px bg-gray-200 border-0 dark:bg-gray-700">

		<div class="container mx-auto mb-8 px-8 flex justify-center">
			<a href="./seminar_list" class="px-6 py-3 text-black font-medium rounded-lg text-sm no-underline bg-gray-200 hover:bg-gray-300">返回</a>	
			<button class="px-6 py-3 ml-6 text-white font-medium rounded-lg text-sm no-underline bg-cyan-800 hover:bg-cyan-900 btn-save-seminar">儲存</button>	
		</div>
	</div>

</body>
</html>






