<!DOCTYPE html>
<html lang="zh_tw">
<head>
	@relativeInclude('layout.html_head')
	<script>
		$(function() {
			$(".login-btn").on('click',function(){
				exec('login','POST',getFormData($('form')),function(response){
					console.log(response);
					setLocalStorage('adminData',response);
					window.location.assign('./');
				});
			});
		});
	</script>
</head>
<body>
	<!-- <div class="lg:flex items-center justify-center bg-black bg-[url('https://picsum.photos/500/')] bg-opacity-5 bg-no-repeat bg-cover"> -->
	<div class="lg:flex items-center justify-center bg-black bg-[url('{{ mix('/AdminPage/img/bg.jpg') }}')] bg-opacity-5 bg-no-repeat bg-cover">
		<div class="lg:w-1/2 xl:max-w-screen-sm rounded shadow-lg bg-indigo-100 bg-slate-100 py-12 h-screen">
			<div class="py-6 flex justify-center lg:px-12">
				<div class="cursor-pointer flex items-center">
					<div>
						<img class="w-10 text-indigo-500" src="/AdminPage/img/favicon.png">
					</div>
					<div class="text-4xl text-indigo-800 tracking-wide ml-2 font-semibold">麵匡匡拉麵食堂</div>
				</div>
			</div>
			<div class="mt-10 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-16 xl:px-24 xl:max-w-2xl">
				<div class="mt-12">
					<form>
						<div>
							<div class="text-sm font-bold text-gray-700 tracking-wide">帳號 Account</div>
							<input class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" type="" name="account">
						</div>
						<div class="mt-8">
							<div class="flex justify-between items-center">
								<div class="text-sm font-bold text-gray-700 tracking-wide">
									密碼 Password
								</div>
							</div>
							<input class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" type="password" name="password">
						</div>
						<div class="mt-10">
							<button class="bg-indigo-500 text-gray-100 p-4 w-full rounded-full tracking-wide
							font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-indigo-600
							shadow-lg login-btn">
								登入
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- <div class="hidden lg:flex items-center justify-center bg-indigo-100 flex-1 h-screen">
			<div class="transform duration-200 w-full">
				<img class="h-screen w-full"  src="https://picsum.photos/1000/">
			</div>
		</div> -->
	</div>
</body>
</html>






