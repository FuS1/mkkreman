<!DOCTYPE html>
<html lang="zh_tw">
<head>
	@relativeInclude('layout.html_head')
	<script>
		$(function() {
			var table = initTabulator("#seminar-participant-table",{
				// rowHeight:250,
				columns: [{
						title: "姓名",
						field: "name",
						width: '',
						headerFilter: "input",
						responsive:false,
					},
					{
						title: "性別",
						field: "gender",
						width: '',
						headerFilter: "input",
						headerSort: true,
					},
					{
						title: "年齡",
						field: "age_range",
						width: '',
						headerFilter: "input",
						headerSort: true,
					},
					{
						title: "手機號碼",
						field: "phone_number",
						width: '',
						headerFilter: "input",
						headerSort: true,
					},
					{
						title: "聯絡電話",
						field: "contact_number",
						width: '',
						headerFilter: "input",
						headerSort: true,
					},
					{
						title: "方便聯絡時間",
						field: "contact_time",
						width: '',
						headerFilter: "input",
						headerSort: true,
					},
					{
						title: "收件方式",
						field: "receive_type",
						width: '',
						headerFilter: "input",
						headerSort: true,
					},
					{
						title: "LINE / Email",
						field: "receive_detail",
						width: '',
						headerFilter: "input",
						headerSort: true,
					},
					{
						title: "出席人數",
						field: "amount",
						width: '',
						headerFilter: "input",
						headerSort: true,
					},
					{
						title: "是否已確認",
						field: "is_check",
						width: '',
						headerFilter: "input",
						headerSort: true,
						formatter: function(cell, formatterParams) {
							switch (cell.getValue()) {
								case 1:
									return '已確認';
									break;
							
								case 0:
								default:
									return '尚未確認';
									break;
							}
						}
					},
					{
						title: "備註",
						field: "memo",
						width: '',
						headerFilter: "input",
						headerSort: true,
						formatter: "html"
					},
					{
						title: "報名時間",
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
										'<a href="./seminar_participant?seminar_participant_id='+cell.getRow().getData()['id']+'" class="bg-[#062851] hover:bg-[#03152b] text-gray-100 font-bold py-2 px-4 rounded">'+
											'編輯'+
										'</a>'+
										'<button class="bg-red-700 hover:bg-red-800 text-gray-100 font-bold py-2 px-4 rounded ml-2" onclick="deleteSeminarParticipant('+cell.getRow().getData()['id']+')">'+
											'刪除'+
										'</button>'+
									'</div>';
						}
					},
				],
				ajaxURL: ENV['APP_API_URL'] + "admin/tabulator/seminar/participant",
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

		});

		var deleteSeminarParticipant = function(seminar_participant_id){
			exec('seminar/participant','DELETE',{
				seminar_participant_id:seminar_participant_id
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
				<h1 class="text-1xl md:text-2xl font-bold text-gray-600 inline-block align-middle">報名者列表</h1>
			</div>
			<hr class="my-6 h-px bg-gray-200 border-0 dark:bg-gray-700">
			<a href="./seminar_list" class="px-6 py-3 text-black font-medium rounded-lg text-sm no-underline bg-gray-200 hover:bg-gray-300 hover:text-blue-800">返回講座列表</a>
			<hr class="my-2 h-px bg-gray-200 border-0 dark:bg-gray-700">
			<div class="table-responsive" id="seminar-participant-table"></div>
		</div>
	</div>
</body>
</html>






