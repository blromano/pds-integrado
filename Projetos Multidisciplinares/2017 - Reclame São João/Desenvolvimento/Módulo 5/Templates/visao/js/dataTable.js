$(document).ready(function() {
	$('#table').DataTable( {
		"language": {
			"url": "https://cdn.datatables.net/plug-ins/1.10.13/i18n/Portuguese.json"
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