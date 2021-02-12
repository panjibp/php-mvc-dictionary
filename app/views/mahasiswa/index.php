<div class="container mt-4">

	<div class="row">
		<div class="col-lg-6">
			<?php Flasher::flash(); ?>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6 mb-3">
			<button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
			Tambah Data Mahasiswa
			</button>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6 mb-3">
			<form action="" method="">	
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Cari mahasiswa..." name="keyword" id="keyword" autocomplete="off">
					<button class="btn btn-primary" type="submit" id="tombolCari" name="tombolCari">Cari</button>
				</div>
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<h3 class="pb-3"><?= $data['title']; ?></h3>
			<ul class="list-group" id="dataLiveSearch">
				<?php foreach($data['mahasiswa'] as $mhs) : ?>
					<li class="list-group-item">
						<?= $mhs['nama']; ?>
						<a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge bg-danger" style="text-decoration: none; float: right; margin-left: 5px;" onclick="return confirm('Yakin?')">hapus</a>
						<a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['id']; ?>" class="badge bg-success tampilModalUbah" style="text-decoration: none; float: right; margin-left: 5px;" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $mhs['id']; ?>">ubah</a>
						<a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge bg-primary" style="text-decoration: none; float: right;">detail</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>





<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      	<form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
      		<input type="hidden" name="id" id="id">
	      	<div class="mb-3">
			  <label for="nama" class="form-label">Nama</label>
			  <input type="text" class="form-control" id="nama" name="nama">
			</div>
			<div class="mb-3">
			  <label for="nim" class="form-label">NIM</label>
			  <input type="number" class="form-control" id="nim" name="nim">
			</div>
			<div class="mb-3">
			  <label for="email" class="form-label">Email</label>
			  <input type="email" class="form-control" id="email" name="email">
			</div>
			<div class="mb-3">
				<label for="jurusan">Jurusan</label>
				<select class="form-select" id="jurusan" name="jurusan">
					<option selected hidden>Pilih Jurusan</option>
					<option value="Teknik Informatika">Teknik Informatika</option>
					<option value="Sistem Informasi">Sistem Informasi</option>
					<option value="Sistem Komputer">Sistem Komputer</option>
				</select>
			</div>

      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-primary">Tambah Data</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
	    </form>
      </div>
    </div>
  </div>
</div>