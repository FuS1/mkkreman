<!DOCTYPE html>
<html lang="zh_tw">
<head>
	@relativeInclude('layout.html_head')
	<script>
		$(function() {
			var table = initTabulator("#food-table",{
				rowHeight:200,
				initialSort:[
					{column:"sort_idx", dir:"asc"},
				],
				columns: [{
						title: "品名",
						field: "title",
						width: '',
						headerFilter: "input",
						responsive:false,
					},
					{
						title: "商品縮圖",
						field: "file_url",
						width: '',
						headerSort: false,
						formatter: function(cell, formatterParams){
							if(cell.getValue()){
								return '<img class="max-w-full min-h-2 max-h-full h-auto rounded-lg shadow-xl dark:shadow-gray-800" src="'+cell.getValue()+'">';
							}
						}
					},
					{
						title: "商品描述",
						field: "description",
						width: '',
						headerSort: false,
						formatter: 'html'
					},
					{
						title: "排序",
						field: "sort_idx",
						headerSort: true,
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
										'<button class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-l" onclick="changeSeminarMediaSort('+cell.getRow().getData()['id']+',\'forward\')">'+
											'排序往前'+
										'</button>'+
										'<button class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-r" onclick="changeSeminarMediaSort('+cell.getRow().getData()['id']+',\'backward\')">'+
											'排序往後'+
										'</button>'+
										'<button class="bg-red-700 hover:bg-red-800 text-gray-100 font-bold py-2 px-4 rounded-r" onclick="deleteSeminarMedia('+cell.getRow().getData()['id']+')">'+
											'刪除'+
										'</button>'+
									'</div>';
						}
					},
				],
				ajaxURL: ENV['APP_API_URL'] + "admin/tabulator/food",
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

			$("#btn-save-food").on('click',function(){

				let form = $("#add-food-modal form");

				if( form[0].reportValidity() ){
					let data = getFormData(form,{
						file:form.find('#food_file')[0].files[0],
						description:form.find('[name=description]').val()
					});
					console.log(data)
					exec('food','POST',data,function(response){
						console.log(response);
						window.location.reload();
					});
				}

			});
		});

		var deleteSeminarMedia = function(food_id){
			exec('food','DELETE',{
				food_id:food_id
			},function(response){
				console.log(response);
				window.location.reload();
			});
		}

		var changeSeminarMediaSort = function(food_id,action){
			exec('food/sort','PUT',{
				food_id:food_id,
				action:action,
			},function(response){
				console.log(response);
				window.location.reload();
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
				<h1 class="text-1xl md:text-2xl font-bold text-gray-600 inline-block align-middle">商品設定</h1>
			</div>
			<hr class="my-6 h-px bg-gray-200 border-0 dark:bg-gray-700">
			<button class="px-6 py-3 text-white font-medium rounded-lg text-sm no-underline bg-[#062851] hover:bg-[#03152b] hover:text-blue-200" type="button" data-modal-toggle="add-food-modal">
				增加商品
			</button>
			<hr class="my-2 h-px bg-gray-200 border-0 dark:bg-gray-700">
			<div class="table-responsive" id="food-table"></div>
		</div>
	</div>

	<!-- Main modal -->
	<div id="add-food-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
		<div class="relative p-4 w-full max-w-md h-full md:h-auto">
			<!-- Modal content -->
			<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
				<!-- Modal header -->
				<div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
					<h3 class="text-xl font-medium text-gray-900 dark:text-white">
					增加商品
					</h3>
					<button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="add-food-modal">
						<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
						<span class="sr-only">Close modal</span>
					</button>
				</div>
				<!-- Modal body -->
				<div class="py-6 px-6 lg:px-8">
					<form class="space-y-6" action="#">
						<div>
							<label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">商品名</label>
							<input type="input" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="招牌拉麵" required>
						</div>
						<div>
							<label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">商品資訊</label>
							<textarea type="input" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required></textarea>
						</div>
						<div>
							<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="file_input">圖檔</label>
							<input id="food_file" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" required>
							<p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">限 PNG, JPG, GIF，解析度____ * ____ px，建議先<a class="text-orange-600" href="https://tinypng.com" target="_blank">壓縮</a></p>
						</div>
					</form>
				</div>
				<!-- Modal footer -->
				<div class="py-6 text-center">
					<button id="btn-save-food" type="button" class="text-white bg-[#062851] hover:bg-[#03152b] focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-blue-100 focus:z-10">儲存</button>
				</div>
			</div>
		</div>
	</div>
	
	
</body>
</html>






