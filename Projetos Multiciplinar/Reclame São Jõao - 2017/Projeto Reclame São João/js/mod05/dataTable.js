$(document).ready(function() {
	$('#table').DataTable( {
		"language": {
			"url": "http://cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
		},
		"drawCallback": function () {
			$('.dataTables_paginate > .pagination').addClass('pagination-sm');
		},
		"order": [],
		"aoColumnDefs": [{
			'bSortable': false,
			'aTargets': [-1] /* 1st one, start by the right */
		}]
	} );
} );