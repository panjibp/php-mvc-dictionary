<?php foreach($data as $mhs) : ?>
	<li class="list-group-item">
		<?= $mhs['nama']; ?>
		<a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge bg-danger" style="text-decoration: none; float: right; margin-left: 5px;" onclick="return confirm('Yakin?')">hapus</a>
		<a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['id']; ?>" class="badge bg-success tampilModalUbah" style="text-decoration: none; float: right; margin-left: 5px;" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $mhs['id']; ?>">ubah</a>
		<a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge bg-primary" style="text-decoration: none; float: right;">detail</a>
	</li>
<?php endforeach; ?>