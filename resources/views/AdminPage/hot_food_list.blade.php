<!DOCTYPE html>
<html lang="zh_tw">
<head>
	@relativeInclude('layout.html_head')
	<script>
		$(function() {
			var table = initTabulator("#hotfood-table",{
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
						title: "商品圖檔",
						field: "file_url",
						width: '',
						headerSort: false,
						formatter: function(cell, formatterParams){
							if(cell.getValue()){
								return '<img class="max-w-full min-h-2 max-h-full h-auto rounded-lg shadow-xl dark:shadow-gray-800 mx-auto" src="'+cell.getValue()+'">';
							}
						}
					},
					{
						title: "排序",
						field: "sort_idx",
						headerSort: true,
					},
					{
						title: "",
						field: "",
						width: 250,
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
										'<a href="./hot_food?hotfood_id='+cell.getRow().getData()['id']+'" class="bg-[#062851] hover:bg-[#03152b] text-gray-100 font-bold py-2 px-4 rounded">'+
											'編輯'+
										'</a>'+
										'<button class="bg-red-700 hover:bg-red-800 text-gray-100 font-bold py-2 px-4 rounded-r" onclick="deleteSeminarMedia('+cell.getRow().getData()['id']+')">'+
											'刪除'+
										'</button>'+
									'</div>';
						}
					},
				],
				ajaxURL: ENV['APP_API_URL'] + "admin/tabulator/hotfood",
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

			$("#btn-save-hotfood").on('click',function(){

				let form = $("#add-hotfood-modal form");

				if( form[0].reportValidity() ){
					let data = getFormData(form,{
						file:form.find('#hotfood_file')[0].files[0],
						description:form.find('[name=description]').val().replace(/\r?\n/g, '<br />')
					});
					console.log(data)
					exec('hotfood','POST',data,function(response){
						console.log(response);
						window.location.reload();
					});
				}

			});
		});

		var deleteSeminarMedia = function(hotfood_id){
			exec('hotfood','DELETE',{
				hotfood_id:hotfood_id
			},function(response){
				console.log(response);
				window.location.reload();
			});
		}

		var changeSeminarMediaSort = function(hotfood_id,action){
			exec('hotfood/sort','PUT',{
				hotfood_id:hotfood_id,
				action:action,
			},function(response){
				console.log(response);
				window.location.reload();
			});
		}


	</script>
</head>


<body class="flex bg-gray-50">
	<div class="md:w-1/3 lg:w-1/4 xl:w-1/6 2xl:w-1/7 bg-[#062851]">
		@relativeInclude('layout.side_menu')
	</div>
	<div class="md:w-2/3 lg:w-3/4 xl:w-5/6 2xl:w-6/7">
		<div class="py-5 px-5 w-full">
			<div class="mb-2">
				<h1 class="text-1xl md:text-2xl font-bold text-gray-600 inline-block align-middle">人氣推薦設定</h1>
			</div>
			<hr class="my-6 h-px bg-gray-200 border-0 dark:bg-gray-700">
			<a href="./hot_food" class="px-6 py-3 text-white font-medium rounded-lg text-sm no-underline bg-[#062851] hover:bg-[#03152b] hover:text-blue-200">增加人氣推薦商品</a>
			<hr class="my-2 h-px bg-gray-200 border-0 dark:bg-gray-700">
			<div class="table-responsive" id="hotfood-table"></div>
		</div>
	</div>
</body>
</html>






