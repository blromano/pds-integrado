$(document).ready(function() {
    $('.tableJS').DataTable({
		"lengthChange": false,
		"paging":   false,
		"info":     false,
		"filter":     false,

	});

	 $('.relatorioTabular').DataTable({
// 		"lengthChange": false,
// "paging":   false,
// 		"info":     false,
// 		"filter":     false,

	});

	 $('#tendencia').DataTable( {
        "order": [[ 3, "desc" ]]
    } );

// 	 $('.tendenciosos').DataTable({
// 	 	"order": [[3, 'desc']];
// // 		"lengthChange": false,
// // "paging":   false,
// // 		"info":     false,
// // 		"filter":     false,

// 	});

} );
