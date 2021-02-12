$(function() {

	$('.tombolTambahData').on('click', function() {
		$('#formModalLabel').html('Tambah Data Mahasiswa');
		$('.modal-footer button[type=submit]').html('Tambah Data');
		$('#nama').val('');
        $('#nim').val('');
        $('#email').val('');
        $('#jurusan').val('Pilih Jurusan');
        $('#id').val('');
	});

	$('.tampilModalUbah').on('click', function() {
		$('#formModalLabel').html('Ubah Data Mahasiswa');
		$('.modal-footer button[type=submit]').html('Ubah Data');
		$('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/ubah');

		const id = $(this).data('id'); // "this" adalah yang diklik
		
		$.ajax({
			url: 'http://localhost/phpmvc/public/mahasiswa/getubah',
			data: {id : id}, // id kiri adalah nama data yg dikirim; id kanan adalah isi const id
			method: 'post',
			dataType: 'json',
			success: function(data) {
				$('#nama').val(data.nama);
				$('#nim').val(data.nim);
				$('#email').val(data.email);
				$('#jurusan').val(data.jurusan);
				$('#id').val(data.id);
			}
		});
	});

	setTimeout(function() {
		$('.alert').alert('close');
	}, 2500);

	$('#keyword').on('keyup', function() {
		const keyword = $('#keyword').val();
		$.ajax({
			url: 'http://localhost/phpmvc/public/mahasiswa/search',
			data: {keyword : keyword}, // keyword kiri adalah nama data yg dikirim; keyword kanan adalah isi const keyword
			method: 'post',
			success: function(data) {
				$('#dataLiveSearch').html(data);
			}
		});
	});

});