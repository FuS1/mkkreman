<!DOCTYPE html>
<html lang="zh_tw">
<head>
	@relativeInclude('layout.html_head')
	<script>
		$(function() {

			var seminar_participant_id = getUrlParam('seminar_participant_id');
			var seminar_id ;
			if(seminar_participant_id){
				exec('seminar/participant','GET',{
					seminar_participant_id : seminar_participant_id
				},function(response){
					seminar_data = flattenObject(response);
					seminar_id = seminar_data['seminar_id'];
					console.log(seminar_data);
					for(var i in seminar_data){
						$("[name="+replaceAll(i,".","\\.")+"]").each(function( index ) {
							if($(this).is('input') || $(this).is('select') ){
								$(this).val(seminar_data[i]);
							}else if($(this).is('span')){
								$(this).text(seminar_data[i]);
							}else if($(this).is('div')){
								$(this).html(seminar_data[i]);
							}
						});
					}
				});
			}

			$(".btn-save-seminar-participant").on('click',function(){

				let form = $("#seminar-participant-form");

				if( form[0].reportValidity() ){

					let data = getFormData(form,{
						seminar_participant_id : seminar_participant_id,
						seminar_id: seminar_id,
						memo: form.find('[name=memo]').html()
					});
					
					console.log(data)
					exec('seminar/participant','POST',data,function(response){
						console.log(response);
						window.location.assign('./seminar_participant_list?seminar_id='+response['seminar_id']);
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
				<h1 class="text-1xl md:text-2xl font-bold text-gray-600 inline-block align-middle">報名者設定</h1>
			</div>
			<hr class="my-6 h-px bg-gray-200 border-0 dark:bg-gray-700">
		</div>
		<div class="container mx-auto px-8">
			<form id="seminar-participant-form">
				<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
					<div class="justify-center">	
						<label for="name" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">姓名</label>
						<input type="input" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
					</div>
					<div class="justify-center">	
						<label for="gender" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">性別</label>
						<select name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
							<option selected></option>
							<option value="男">男</option>
							<option value="女">女</option>
							<option value="其他">其他</option>
						</select>
					</div>
					<div class="justify-center">	
						<label for="age_range" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">年齡區間</label>
						<select name="age_range" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
							<option selected></option>
							<option value="20-29">20-29歲</option>
							<option value="30-39">30-39歲</option>
							<option value="40-49">40-49歲</option>
							<option value="50-59">50-59歲</option>
							<option value="60+"  >60歲以上</option>
						</select>
					</div>
					<div class="justify-center">	
						<label for="phone_number" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">手機號碼</label>
						<input type="input" name="phone_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
					</div>
					<div class="justify-center">	
						<label for="contact_number" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">聯絡電話</label>
						<input type="input" name="contact_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
					</div>
					<div class="justify-center">	
						<label for="contact_time" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">方便聯絡時間</label>
						<select name="contact_time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
							<option selected></option>
							<option value="上午 09:00-12:00">上午 09:00-12:00</option>
							<option value="中午 12:00-13:00">中午 12:00-13:00</option>
							<option value="下午 13:00-18:00">下午 13:00-18:00</option>
							<option value="晚上 18:00-21:00">晚上 18:00-21:00</option>
						</select>
					</div>
					<div class="justify-center">	
						<label for="amount" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">出席人數</label>
						<input type="number" name="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" min="0" required>
					</div>
					<div class="justify-center">	
						<label for="receive_type" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">收件方式</label>
						<input type="input" name="receive_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
					</div>
					<div class="justify-center">	
						<label for="receive_detail" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">LINE / Email</label>
						<input type="input" name="receive_detail" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
					</div>
					<div class="justify-center">	
						<label for="is_check" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">是否已確認</label>
						<select name="is_check" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
							<option selected value="0">尚未確認</option>
							<option value="1">已確認</option>
						</select>					
					</div>
					<div class="justify-center">	
						<label for="memo" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">備註</label>
						<div name="memo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" contenteditable="true" ></div>					
					</div>
				</div>
			</form>
		</div>

		<hr class="my-6 h-px bg-gray-200 border-0 dark:bg-gray-700">

		<div class="container mx-auto mb-8 px-8 flex justify-center">
			<a href="javascript:history.back();" class="px-6 py-3 text-black font-medium rounded-lg text-sm no-underline bg-gray-200 hover:bg-gray-300">返回</a>	
			<button class="px-6 py-3 ml-6 text-white font-medium rounded-lg text-sm no-underline bg-cyan-800 hover:bg-cyan-900 btn-save-seminar-participant">儲存</button>	
		</div>
	</div>

</body>
</html>






