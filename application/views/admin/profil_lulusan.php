<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

	<a href="" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambahPLModal">Tambah Profil
		Lulusan</a>

	<script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data Profil Lulusan</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="tabelProfilLulusan" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Profil Lulusan</th>
							<th>Deskripsi</th>
							<th>Kemampuan</th>
							<th>Gambar</th>
							<th>Video</th>
							<th>Media ditampilkan</th>
							<th>Tampil</th>
							<th style="width:10% ;">Aksi</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Profil Lulusan</th>
							<th>Deskripsi</th>
							<th>Kemampuan</th>
							<th>Gambar</th>
							<th>Video</th>
							<th>Media ditampilkan</th>
							<th>Tampil</th>
							<th>Aksi</th>
						</tr>
					</tfoot>
					<tbody>
						<?php
                        foreach ($profil_lulusan as $key => $value) {
                        ?>
						<tr>
							<td><?= $value->profil_lulusan ?></td>
							<td><?= $value->deskripsi ?></td>
							<td><?= $value->kemampuan ?></td>
							<td><?= $value->gambar ?></td>
							<td><?= $value->video ?></td>
							<td><?php if($value->media == 1){echo "Video";}else{echo "Gambar";} ?></td>
							<td><?php if($value->tampilkan == 1){echo "Tampil";}else{echo "Tidak Tampil";} ?></td>
							<td>
								<a href="" class="btn btn-sm btn-success" data-toggle="modal"
									data-target="#ubahPLModal<?= $value->id_profil_lulusan ?>"><i
										class="fas fa-fw fa-pen"></i></a>
								<a href="<?= base_url('admin/hapus_profil_lulusan/' . $value->id_profil_lulusan) ?>"><button
										class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></button></a>
							</td>
						</tr>
						<!-- Ubah Profil Lulusan Modal-->
						<div class="modal fade" id="ubahPLModal<?= $value->id_profil_lulusan ?>" tabindex="-1"
							role="dialog" aria-labelledby="ubahPLModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="ubahPLModalLabel">Ubah Profil Lulusan</h5>
										<button class="close" type="button" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
									<form action="<?= base_url('admin/ubah_profil_lulusan') ?>" method="POST"
										enctype="multipart/form-data">
										<div class="modal-body">
											<div class="form-group mb-3">
												<input type="hidden" name="id_profil_lulusan"
													value="<?= $value->id_profil_lulusan ?>">
												<input type="text" class="form-control" name="profil_lulusan"
													placeholder="Profil Lulusan" value="<?= $value->profil_lulusan ?>">
											</div>
											<div class="custom-file mb-3">
												<label class="custom-file-label">Video</label>
												<input type="file" class="custom-file-input" name="video"
													placeholder="Profil Lulusan">
											</div>
											<div class="custom-file mb-3">
												<label class="custom-file-label">Gambar</label>
												<input type="file" class="custom-file-input" name="gambar"
													placeholder="Profil Lulusan">
											</div>
											<div class="form-group mb-3">
												<select name="" id="" class="form-control">
													<?php foreach($kurikulum as $k):?>
													<option value="<?= $k->id_kurikulum ?>"
														<?php if($k->id_kurikulum == $value->kode_kurikulum){echo "selected"; } ?>>
														<?= $k->kurikulum ?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<div class="form-group mb-3">
												<select name="media" id="" class="form-control">
													<option value="0" <?php if($value->media == 0){echo "selected";} ?>>Tampilkan gambar</option>
													<option value="1" <?php if($value->media == 1){echo "selected";} ?>>Tampilkan Video</option>
												</select>
											</div>
											<div class="form-group mb-3">
												<select name="tampilkan" id="" class="form-control">
													<option value="1" <?php if($value->tampilkan == 1){echo "selected";} ?>>Tampilkan Profil Lulusan</option>
													<option value="0" <?php if($value->tampilkan == 0){echo "selected";} ?>>Tidak Tampilkan Profil Lulusan</option>
												</select>
											</div>
											<div class="form-group mb-3">
												<textarea class="form-control" name="deskripsi"
													id="editor_ubah_<?= $value->id_profil_lulusan ?>"
													placeholder="Deskripsi"><?= $value->deskripsi ?></textarea>
											</div>
											<div class="form-group mb-3">
												<textarea class="form-control" name="kemampuan"
													id="editor_ubah1_<?= $value->id_profil_lulusan ?>"
													placeholder="Kemampuan"><?= $value->kemampuan ?></textarea>
											</div>
										</div>
										<div class="modal-footer">
											<button class="btn btn-sm btn-secondary" type="button"
												data-dismiss="modal">Cancel</button>
											<button type="submit" class="btn btn-sm btn-primary">Ubah</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<script>
							ClassicEditor
								.create(document.querySelector('#editor_ubah_<?= $value->id_profil_lulusan ?>'))
								.then(editor => {
									console.log(editor);
								})
								.catch(error => {
									console.error(error);
								});

						</script>
						<script>
							ClassicEditor
								.create(document.querySelector('#editor_ubah1_<?= $value->id_profil_lulusan ?>'))
								.then(editor => {
									console.log(editor);
								})
								.catch(error => {
									console.error(error);
								});

						</script>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Tambah Profil Lulusan Modal-->
<div class="modal fade" id="tambahPLModal" tabindex="-1" role="dialog" aria-labelledby="tambahPLModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahPLModalLabel">Tambah Profil Lulusan</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="<?= base_url('admin/tambah_profil_lulusan') ?>" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group mb-3">
						<input type="text" class="form-control" name="profil_lulusan" placeholder="Profil Lulusan">
					</div>
					<div class="custom-file mb-3">
						<label class="custom-file-label">Video</label>
						<input type="file" class="custom-file-input" name="video" placeholder="Profil Lulusan">
					</div>
					<div class="custom-file mb-3">
						<label class="custom-file-label">Gambar</label>
						<input type="file" class="custom-file-input" name="gambar" placeholder="Profil Lulusan">
					</div>
					<div class="form-group mb-3">
						<select name="media" id="" class="form-control">
							<option value="1">Tampilkan gambar</option>
							<option value="0">Tampilkan Video</option>
						</select>
					</div>
					<div class="form-group mb-3">
						<select name="kode_kurikulum" id="" class="form-control">
							<?php foreach($kurikulum as $k):?>
							<option value="<?= $k->id_kurikulum ?>"><?= $k->kurikulum ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group mb-3">
						<textarea class="form-control" name="deskripsi" id="editor_tambah"
							placeholder="Deskripsi"></textarea>
					</div>
					<div class="form-group mb-3">
						<textarea class="form-control" name="kemampuan" id="editor_tambah1"
							placeholder="Kemampuan"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-sm btn-primary">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	ClassicEditor
		.create(document.querySelector('#editor_tambah'))
		.then(editor => {
			console.log(editor);
		})
		.catch(error => {
			console.error(error);
		});

</script>

<script>
	ClassicEditor
		.create(document.querySelector('#editor_tambah1'))
		.then(editor => {
			console.log(editor);
		})
		.catch(error => {
			console.error(error);
		});

</script>
