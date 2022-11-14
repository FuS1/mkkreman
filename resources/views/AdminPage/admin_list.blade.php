<!DOCTYPE html>
<html lang="zh_tw">
<head>
	@relativeInclude('layout.html_head')
	<script>
		$(function() {
			var table = initTabulator("#admin-table",{
				columns: [
					{
						title: "姓名",
						field: "name",
						width: '',
						headerFilter: "input",
					},{
						title: "帳號",
						field: "account",
						width: '',
						headerFilter: "input",
						responsive:false,
					},
					{
						title: "建立時間",
						field: "created_at",
						width: 130,
						headerFilter: "input",
						headerSort: true,
					},
					{
						title: "",
						field: "",
						width: 200,
						responsive:false,
						headerSort: false,
						formatter: function(cell, formatterParams) {
							return  '<div class="inline-flex">'+
										'<button class="bg-red-700 hover:bg-red-800 text-gray-100 font-bold py-2 px-4 rounded ml-2" onclick="resetAdminPassword('+cell.getRow().getData()['id']+')">'+
											'重置密碼'+
										'</button>'+
										'<button class="bg-red-700 hover:bg-red-800 text-gray-100 font-bold py-2 px-4 rounded ml-2" onclick="deleteAdmin('+cell.getRow().getData()['id']+')">'+
											'刪除'+
										'</button>'+
									'</div>';
						}
					},
				],
				ajaxURL: ENV['APP_API_URL'] + "admin/tabulator/admin",
				ajaxURLGenerator: function(url, config, params) {
					params.filter = params.filter.map(function(e) {
						return e;
					});
					
					params.customFilter = [];
					
					url += "?";
					for(let i in params){
						url +=( "&"+ i + "=" + encodeURIComponent(JSON.stringify(params[i]))) ;
					}
					return url;
				}
			});

			$('#btn-add-admin').on('click',function(){
				let form = $("#add-admin-modal form");
				if( form[0].reportValidity() ){
					exec('admin','POST',getFormData(form),function(response){
						Swal.fire({
							title: '密碼為: '+response['password'],
						}).then(function(result) {
							window.location.reload();
						});
					});
				}
			});

		});

		var deleteAdmin = function(admin_id){
			Swal.fire({
				title: '確定刪除?',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: '刪除',
				reverseButtons: true
			}).then(function(result) {
				if (result.isConfirmed) {
					exec('admin','DELETE',{
						admin_id:admin_id
					},function(response){
						console.log(response);
						window.location.reload();
					});
				}
			});
		}

		var resetAdminPassword = function(admin_id){
			Swal.fire({
				title: '確定重置密碼?',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: '重置密碼',
				reverseButtons: true
			}).then(function(result) {
				if (result.isConfirmed) {
					exec('admin/password/reset','PUT',{
						admin_id:admin_id
					},function(response){
						Swal.fire({
							title: '密碼為: '+response['password'],
						}).then(function(result) {
							window.location.reload();
						});
					});
				}
			});
		}
	</script>
</head>

<body class="flex bg-gray-50">
	<div class="md:w-1/3 lg:w-1/4 xl:w-1/6 2xl:w-1/7">
		@relativeInclude('layout.side_menu')
	</div>
	<div class="md:w-2/3 lg:w-3/4 xl:w-5/6 2xl:w-6/7">
		<div class="py-5 px-5 w-full">
			<div class="mb-2">
				<h1 class="text-1xl md:text-2xl font-bold text-gray-600 inline-block align-middle">後台帳號設定</h1>
			</div>
			<hr class="my-6 h-px bg-gray-200 border-0 dark:bg-gray-700">
			<button class="px-6 py-3 text-white font-medium rounded-lg text-sm no-underline bg-[#062851] hover:bg-[#03152b] hover:text-blue-200" type="button" data-modal-toggle="add-admin-modal">
				增加後台帳號
			</button>
			<hr class="my-2 h-px bg-gray-200 border-0 dark:bg-gray-700">
			<div class="table-responsive" id="admin-table"></div>
		</div>
	</div>

	<!-- Main modal -->
	<div id="add-admin-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
		<div class="relative p-4 w-full max-w-md h-full md:h-auto">
			<!-- Modal content -->
			<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
				<!-- Modal header -->
				<div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
					<h3 class="text-xl font-medium text-gray-900 dark:text-white">
						增加後台帳號
					</h3>
					<button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="add-admin-modal">
						<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
						<span class="sr-only">Close modal</span>
					</button>
				</div>
				<!-- Modal body -->
				<div class="py-6 px-6 lg:px-8">
					<form class="space-y-6" action="#">
						<div>
							<label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">姓名</label>
							<input type="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="系統管理員" required>
						</div>
						<div>
							<label for="account" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">帳號</label>
							<input type="account" name="account" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="登入帳號" required>
						</div>
					</form>
				</div>
				<!-- Modal footer -->
				<div class="py-6 text-center">
					<button id="btn-add-admin" type="button" class="text-white bg-[#062851] hover:bg-[#03152b] focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-blue-100 focus:z-10">儲存</button>
				</div>
			</div>
		</div>
	</div>


</body>
</html>






