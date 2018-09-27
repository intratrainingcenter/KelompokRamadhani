$(document).ready(function(){
	$('.detail').click(function() {
		var kelas = $('.pilkel').val();
		var isi = '';
		var no = 1;
		$.ajax({
			url: '/PKT/show/'+kelas,
			type: 'GET',
			data: '',
		})
		.done(function(data){
			$.each(data, function(index, el) {
				isi += '<tr>' +
					   '<td>'+ no++ +'</td>' +
					   '<td>'+ el.nama_siswa +'</td>' +
					   '<td>'+ el.NIS +'</td>' +
					   '</tr>';
			});
			console.log(isi);
			$('#datpik').html(isi);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	});
	// $('.pilkel').change(function() {
	// 	var kelas = $(this).val();
	// 	var isi = '';
	// 	var no = 1;
	// 	$.ajax({
	// 		url: '/PKT/show/'+kelas,
	// 		type: 'GET',
	// 		data: '',
	// 	})
	// 	.done(function(data){
	// 		$.each(data, function(index, el) {
	// 			isi += '<tr>' +
	// 				   '<td>'+ no++ +'</td>' +
	// 				   '<td>'+ el.nama_siswa +'</td>' +
	// 				   '<td>'+ el.NIS +'</td>' +
	// 				   '</tr>';
	// 		});
	// 		console.log(isi);
	// 		$('#datpik').html(isi);
	// 	})
	// 	.fail(function() {
	// 		console.log("error");
	// 	})
	// 	.always(function() {
	// 		console.log("complete");
	// 	});
		
	// });
});