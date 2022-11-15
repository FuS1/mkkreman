<!DOCTYPE html>
<html lang="zh_tw">
<head>
	@relativeInclude('layout.html_head')
	<script>
		$(function() {
			var table = initTabulator("#seminar-table",{
				// rowHeight:250,
				columns: [{
						title: "講座名稱",
						field: "title",
						width: '',
						headerFilter: "input",
						responsive:false,
					},
					{
						title: "講座地址",
						field: "address",
						width: '',
						headerFilter: "input",
						headerSort: true,
					},
					{
						title: "講座開始時間",
						field: "started_at",
						width: '',
						headerFilter: "input",
						headerSort: true,
					},
					{
						title: "前台顯示剩餘名額",
						field: "qop",
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
						width: 250,
						responsive:false,
						headerSort: false,
						formatter: function(cell, formatterParams) {
							return  '<div class="inline-flex">'+
										'<a href="./seminar?seminar_id='+cell.getRow().getData()['id']+'" class="bg-[#062851] hover:bg-[#03152b] text-gray-100 font-bold py-2 px-4 rounded">'+
											'編輯'+
										'</a>'+
										'<a href="./seminar_participant_list?seminar_id='+cell.getRow().getData()['id']+'" class="bg-green-700 hover:bg-green-800 text-gray-100 font-bold py-2 px-4 rounded ml-2">'+
											'報名人員'+
										'</a>'+
										'<button class="bg-red-700 hover:bg-red-800 text-gray-100 font-bold py-2 px-4 rounded ml-2" onclick="deleteSeminar('+cell.getRow().getData()['id']+')">'+
											'刪除'+
										'</button>'+
									'</div>';
						}
					},
				],
				ajaxURL: ENV['APP_API_URL'] + "admin/tabulator/seminar",
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

			$('.btn-add-seminar').on('click',function(){
				window.location.assign('./seminar');
			});

		});

		var deleteSeminar = function(seminar_id){
			exec('seminar','DELETE',{
				seminar_id:seminar_id
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
				<h1 class="text-1xl md:text-2xl font-bold text-gray-600 inline-block align-middle">講座設定</h1>
			</div>
			<hr class="my-6 h-px bg-gray-200 border-0 dark:bg-gray-700">
			<a href="./seminar" class="px-6 py-3 text-white font-medium rounded-lg text-sm no-underline bg-[#062851] hover:bg-[#03152b] hover:text-blue-200">增加講座</a>
			<hr class="my-2 h-px bg-gray-200 border-0 dark:bg-gray-700">
			<div class="table-responsive" id="seminar-table"></div>
		</div>
	</div>
</body>
</html>






