$(document).ready(function () {
	$('#datatable').DataTable({
		'lengthMenu': [
			[5, 10, 15, 20, -1],
			[5, 10, 15, 20, 'All']
		]
	})
})
