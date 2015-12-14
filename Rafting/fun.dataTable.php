<script src="//code.jquery.com/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="//cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="//cdn.datatables.net/buttons/1.1.0/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="//cdn.datatables.net/buttons/1.1.0/js/buttons.flash.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js" type="text/javascript"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js" type="text/javascript"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js" type="text/javascript"></script>
<script src="//cdn.datatables.net/buttons/1.1.0/js/buttons.html5.min.js" type="text/javascript"></script>
<script src="//cdn.datatables.net/buttons/1.1.0/js/buttons.print.min.js" type="text/javascript"></script>

<!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.1.0/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css">
<script type="text/javascript">
	$(document).ready(function() {
		$('#myTable').dataTable( {
			"autoWidth" : false,
			"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
			columnDefs: [	{ orderable: false, "targets": [-1, -2] }	],
			"language": {
					"lengthMenu": "每頁顯示 _MENU_ 筆資料",
					"zeroRecords": "找不到資料",
					"info": "第 _PAGE_ 頁，共 _PAGES_ 頁",
					"infoEmpty": "目前尚無任何資料",
					"infoFiltered": "(filtered from _MAX_ total records)",
					"loadingRecords": "載入中...",
					"processing":     "處理中...",
					"search":         "搜尋：",
					"paginate": {
							"first":      "首頁",
							"last":       "最後一頁",
							"next":       "下一頁",
							"previous":   "上一頁"
					}
			}
		} );
		$('#outputTable').dataTable( {
			"autoWidth" : false,
			dom: 'Bfrtip',
			"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
			buttons: [
				'copyHtml5',
				'excelHtml5',
				'csvHtml5',
				'pdfHtml5',
				'print'
			],
			columnDefs: [	{ orderable: false, "targets": [-1, -2] }	],
			"language": {
					"lengthMenu": "每頁顯示 _MENU_ 筆資料",
					"zeroRecords": "找不到資料",
					"info": "第 _PAGE_ 頁，共 _PAGES_ 頁",
					"infoEmpty": "目前尚無任何資料",
					"infoFiltered": "(filtered from _MAX_ total records)",
					"loadingRecords": "載入中...",
					"processing":     "處理中...",
					"search":         "搜尋：",
					"paginate": {
							"first":      "首頁",
							"last":       "最後一頁",
							"next":       "下一頁",
							"previous":   "上一頁"
					}
			}
		} );
	} );
</script>