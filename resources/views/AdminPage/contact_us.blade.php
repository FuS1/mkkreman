<!DOCTYPE html>
<html lang="zh_tw">
<head>
	@relativeInclude('layout.html_head')
	<script>
		$(function() {


			exec('system_variable','GET',{},function(system_variable_data){
				console.log(system_variable_data);

				
				['contact_us_franchise_email_recipient','contact_us_opinion_email_recipient','contact_us_cooperation_email_recipient'].forEach(function(field) {
					try {
						data = system_variable_data.find(function(_system_variable_data){
							return _system_variable_data.field === field;
						});
						$('[name="'+field+'"]').val(JSON.parse(data.value).join(','));
					} catch (error) {
						
					}
				});
			});
			
			

			$(".btn-save-email-recipient").on('click',function(){

				let form = $("#email-recipient-form");

				if( form[0].reportValidity() ){
					
					let data = getFormData(form);

					['contact_us_franchise_email_recipient','contact_us_opinion_email_recipient','contact_us_cooperation_email_recipient'].forEach(function(field) {
						if(data[field]){
							data[field] = data[field].replaceAll('，', ',').split(',');
							data[field] = data[field].map(function(value){
								return value.trim();
							});
						}else{
							data[field]=[];
						}

						exec('system_variable/'+field,'PUT',{
							value:data[field]
						},function(response){
							console.log(response);
							setTimeout(function() {
								window.location.reload();
							}, 700);
						});
					});

					console.log(data)
					
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
				<h1 class="text-1xl md:text-2xl font-bold text-gray-600 inline-block align-middle">聯絡我們設定</h1>
			</div>
			<hr class="my-6 h-px bg-gray-200 border-0 dark:bg-gray-700">
		</div>
		<div class="container mx-auto px-8">
			<form id="email-recipient-form">
				<h1 class="text-1xl md:text-2xl font-bold text-gray-600 inline-block align-middle">Email收件人設定</h1>
				<hr class="my-6 h-px bg-gray-200 border-0 dark:bg-gray-700">
				<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-5">
					<div class="justify-center">	
						<label for="contact_us_franchise_email_recipient" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">加盟諮詢</label>
						<input type="input" name="contact_us_franchise_email_recipient" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="請以 , 符號分隔" required>
						<p class="mt-1 text-sm text-gray-500 dark:text-gray-300">請以 , 符號分隔</p>
					</div>
				</div>
				<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-5">
					<div class="justify-center">	
						<label for="contact_us_opinion_email_recipient" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">意見反映</label>
						<input type="input" name="contact_us_opinion_email_recipient" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="請以 , 符號分隔" required>
						<p class="mt-1 text-sm text-gray-500 dark:text-gray-300">請以 , 符號分隔</p>
					</div>
				</div>
				<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-5">
					<div class="justify-center">	
						<label for="contact_us_cooperation_email_recipient" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">合作諮詢</label>
						<input type="input" name="contact_us_cooperation_email_recipient" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="請以 , 符號分隔" required>
						<p class="mt-1 text-sm text-gray-500 dark:text-gray-300">請以 , 符號分隔</p>
					</div>
				</div>
			</form>
			<div class="container mx-auto mb-8 px-8 flex justify-center">
				<button class="px-6 py-3 ml-6 text-white font-medium rounded-lg text-sm no-underline bg-cyan-800 hover:bg-cyan-900 btn-save-email-recipient">儲存</button>	
			</div>
		</div>
		
	</div>

</body>
</html>






