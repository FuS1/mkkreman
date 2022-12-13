<!DOCTYPE html>
<html lang="zh_tw">
<head>
	@relativeInclude('layout.html_head')
	<script>
		$(function() {

			var store_id = getUrlParam('store_id');
			if(store_id){
				exec('store','GET',{
					store_id : store_id
				},function(response){
					store_data = flattenObject(response);
					console.log(store_data);
					for(var i in store_data){
						$("[name="+replaceAll(i,".","\\.")+"]").each(function( index ) {
							if($(this).is('input') || $(this).is('select') || $(this).is('textarea') ){
								$(this).val(store_data[i]);
							}else if($(this).is('span')){
								$(this).text(store_data[i]);
							}else if($(this).is('div')){
								$(this).html(store_data[i]);
							}
						});
					}

					if(store_data['file_url']){
						let img = $('#store-form #store_file').parent().find('img');
						img.attr('src',store_data['file_url']);	
						img.removeClass('hidden');	
					}

					initTinymce('#content');	
				});
			}else{
				initTinymce('#content');
			}
			
			$(".btn-save-store").on('click',function(){
				let form = $("#store-form");

				if( form[0].reportValidity() ){
					
					let data = getFormData(form,{
						store_id : store_id,
						file	: form.find('#store_file')[0].files[0],
					});

					
					console.log(data)
					exec('store','POST',data,function(response){
						console.log(response);
						window.location.assign('./store_list');
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
				<h1 class="text-1xl md:text-2xl font-bold text-gray-600 inline-block align-middle">門市設定</h1>
			</div>
			<hr class="my-6 h-px bg-gray-200 border-0 dark:bg-gray-700">
		</div>
		<div class="container mx-auto px-8">
			<form id="store-form">
				<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
					<div class="justify-center">	
						<label for="title" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">門市名稱</label>
						<input type="input" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="招牌豚骨拉麵" required>
					</div>
					<div class="justify-center">	
						<label class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="city">門市狀態</label>
						<select name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
							<option value="籌備中"  >籌備中  </option>
							<option value="半日試賣">半日試賣</option>
							<option value="全日試賣">全日試賣</option>
							<option value="正常營運">正常營運</option>
							<option value="裝修中"  >裝修中  </option>
							<option value="暫停營業">暫停營業</option>
							<option value="已停業"  >已停業  </option>
						</select>
					</div>
					<div class="justify-center">	
						<label class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">門市位置</label>
						<div class="flex mb-2">
							<label class="flex items-center text-sm font-medium text-gray-900 dark:text-gray-300 w-10 align-middle" for="city">縣市</label>
							<select id="city" name="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
								<option value="臺北市">臺北市</option>
								<option value="基隆市">基隆市</option>
								<option value="新北市">新北市</option>
								<option value="宜蘭縣">宜蘭縣</option>
								<option value="新竹市">新竹市</option>
								<option value="新竹縣">新竹縣</option>
								<option value="桃園市">桃園市</option>
								<option value="苗栗縣">苗栗縣</option>
								<option value="臺中市">臺中市</option>
								<option value="彰化縣">彰化縣</option>
								<option value="南投縣">南投縣</option>
								<option value="嘉義市">嘉義市</option>
								<option value="嘉義縣">嘉義縣</option>
								<option value="雲林縣">雲林縣</option>
								<option value="臺南市">臺南市</option>
								<option value="高雄市">高雄市</option>
								<option value="屏東縣">屏東縣</option>
								<option value="臺東縣">臺東縣</option>
								<option value="花蓮縣">花蓮縣</option>
								<option value="澎湖縣">澎湖縣</option>
								<option value="金門縣">金門縣</option>
								<option value="連江縣">連江縣</option>
								<option value="南海島">南海島</option>
							</select>
						</div>
						<div class="flex mb-2">
							<label for="address" class="flex items-center text-sm font-medium text-gray-900 dark:text-gray-300 w-10 align-middle">完整地址</label>
							<input type="input" name="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="新北市三重區重新路一段10號之1" required>
						</div>
						<div class="mb-2">
							<label class="flex items-center text-sm font-medium text-gray-900 dark:text-gray-300 align-middle" for="store_file">門市地圖圖檔</label>
							<input id="store_file" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" type="file">
							<p class="mt-1 text-sm text-gray-500 dark:text-gray-300">限 PNG, JPG, GIF，解析度340 * 340 px，建議先<a class="text-orange-600" href="https://tinypng.com" target="_blank">壓縮</a></p>
							<img class="max-w-full min-h-10 max-h-48 max-h-full h-auto rounded-lg shadow-xl dark:shadow-gray-800 mb-3 hidden mx-auto" src="">
						</div>
					</div>
					
					<div class="justify-center">	
						<label class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">開放職缺</label>
						<div class="flex mb-2">
							<label class="flex items-center text-sm font-medium text-gray-900 dark:text-gray-300 w-10 align-middle">主管</label>
							<select id="job_ma" name="job_ma" class="flex-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
								<option value="1">招募中</option>
								<option value="0">未招募</option>
							</select>
						</div>
						<div class="flex mb-2">
							<label class="flex items-center text-sm font-medium text-gray-900 dark:text-gray-300 w-10 align-middle">全職</label>
							<select id="job_full_time" name="job_full_time" class="flex-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
								<option value="1">招募中</option>
								<option value="0">未招募</option>
							</select>
						</div>
						<div class="flex mb-2">
							<label class="flex items-center text-sm font-medium text-gray-900 dark:text-gray-300 w-10 align-middle">計時</label>
							<select id="job_part_time" name="job_part_time" class="flex-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
								<option value="1">招募中</option>
								<option value="0">未招募</option>
							</select>
						</div>
						<div class="mb-2">
							<label for="job_url" class="items-center text-sm font-medium text-gray-900 dark:text-gray-300 align-middle">職缺資訊網址</label>
							<input type="input" name="job_url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="新北市三重區重新路一段10號之1">
						</div>
					</div>
					<div class="justify-center">	
						<label class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">付款方式</label>
						<div class="flex mb-2">
							<label class="flex items-center text-sm font-medium text-gray-900 dark:text-gray-300 w-10 align-middle">現金</label>
							<select id="pay_cash" name="pay_cash" class="flex-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
								<option value="1">可</option>
								<option value="0">不可</option>
							</select>
						</div>
						<div class="flex mb-2">
							<label class="flex items-center text-sm font-medium text-gray-900 dark:text-gray-300 w-10 align-middle">信用卡</label>
							<select id="pay_credit_card" name="pay_credit_card" class="flex-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
								<option value="1">可</option>
								<option value="0">不可</option>
							</select>
						</div>
						<div class="flex mb-2">
							<label class="flex items-center text-sm font-medium text-gray-900 dark:text-gray-300 w-10 align-middle">LINE PAY</label>
							<select id="pay_line_pay" name="pay_line_pay" class="flex-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
								<option value="1">可</option>
								<option value="0">不可</option>
							</select>
						</div>
					</div>
					<div class="justify-center">	
						<label class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">運送方式</label>
						<div class="flex mb-2">
							<label class="flex items-center text-sm font-medium text-gray-900 dark:text-gray-300 w-10 align-middle">自取</label>
							<select id="can_to_go" name="can_to_go" class="flex-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
								<option value="1">可</option>
								<option value="0">不可</option>
							</select>
						</div>
						<div class="flex mb-2">
							<label class="flex items-center text-sm font-medium text-gray-900 dark:text-gray-300 w-10 align-middle">外送</label>
							<select id="can_delivery" name="can_delivery" class="flex-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
								<option value="1">可</option>
								<option value="0">不可</option>
							</select>
						</div>
					</div>
					<div class="justify-center">	
						<label class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">訂餐網址（未開放則不需輸入）</label>
						<div class="flex mb-2">
							<label class="flex items-center text-sm font-medium text-gray-900 dark:text-gray-300 w-10 align-middle">大麥</label>
							<input type="input" name="maifood_url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="https://www.maifood.com.tw/">
						</div>
						<div class="flex mb-2">
							<label class="flex items-center text-sm font-medium text-gray-900 dark:text-gray-300 w-10 align-middle">Uber Eat</label>
							<input type="input" name="uber_eat_url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="https://www.ubereats.com/">
						</div>
						<div class="flex mb-2">
							<label class="flex items-center text-sm font-medium text-gray-900 dark:text-gray-300 w-10 align-middle">Food Panda</label>
							<input type="input" name="food_panda_url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="https://www.foodpanda.com.tw/">
						</div>
					</div>
				</div>
			</form>
		</div>

		<hr class="my-6 h-px bg-gray-200 border-0 dark:bg-gray-700">

		<div class="container mx-auto mb-8 px-8 flex justify-center">
			<a href="./store_list" class="px-6 py-3 text-black font-medium rounded-lg text-sm no-underline bg-gray-200 hover:bg-gray-300">返回</a>	
			<button class="px-6 py-3 ml-6 text-white font-medium rounded-lg text-sm no-underline bg-cyan-800 hover:bg-cyan-900 btn-save-store">儲存</button>	
		</div>
	</div>
</body>
</html>






