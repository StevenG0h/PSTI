<div class="container-fluid">
	<di class="container-lg">
		<div class="card">
			<div class="card-header">
				<h5 class="modal-title" id="ubahDosenModalLabel">Ubah Profil</h5>
			</div>
			<form action="<?= base_url('admin/ubah_dosen') ?>" method="POST" enctype="multipart/form-data" class="card-body col-md-7">
				<div class="modal-body co">
					<div class="form-group mb-3">
						<input type="hidden" name="id_dosen" value="<?= $user->id_dosen ?>">
						<input type="text" class="form-control" name="nama_dosen" placeholder="Nama Dosen"
							value="<?= $user->nama_dosen ?>">
					</div>
					<div class="form-group mb-3">
						<input type="text" class="form-control" name="inisial_dosen" placeholder="Inisial Dosen"
							value="<?= $user->inisial_dosen ?>">
					</div>
					<div class="form-group mb-3">
						<input type="text" class="form-control" name="nip_dosen" placeholder="NIP Dosen"
							value="<?= $user->nip_dosen ?>">
					</div>
					<div class="form-group mb-3">
						<input type="text" class="form-control" name="email_dosen" placeholder="Email Dosen"
							value="<?= $user->email_dosen ?>">
					</div>
					<div class="form-group mb-3">
						<textarea class="form-control" name="kompetensi_dosen"
							placeholder="Kompetensi Dosen"><?= $user->kompetensi_dosen ?></textarea>
					</div>
					<div class="form-group mb-3">
						<textarea type="text" class="form-control" name="makul_dosen"
							placeholder="Mata Kuliah Dosen"><?= $user->makul_dosen ?></textarea>
					</div>
					<div class="form-group mb-3">
						<textarea type="text" class="form-control" name="jabatan_fungsional"
							placeholder="Jabatan Fungsional"><?= $user->jabatan_fungsional ?></textarea>
					</div>
					<div class="form-group mb-3">
						<select name="sertifikat_pendidik" id="" class="form-control">
							<option value="Sudah Tersertifikasi" <?php if($user->sertifikat_pendidik == "Sudah Tersertifikasi"){echo "selected";} ?>>Sudah Tersertifikasi</option>
							<option value="Belum Tersertifikasi" <?php if($user->sertifikat_pendidik == "Belum Tersertifikasi"){echo "selected";} ?>>Belum Tersertifikasi</option>
						</select>
					</div>
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="image" name="gambar_dosen"
							placeholder="Gambar Dosen">
						<label for="image" class="custom-file-label">Gambar Dosen</label>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-sm btn-primary">Ubah</button>
				</div>
			</form>
		</div>
</div>
</div>
