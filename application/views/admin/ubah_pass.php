<div class="container-fluid">
	<div class="card p-3">
		<div class="col-md-4 px-0">
			<h3>Ubah Password</h3>
            <?= $this->session->flashdata('pesan') ?>
			<form class="mb-3" method="POST" action="<?= base_url('admin/ubah_pwd_dosen') ?>">
				<input type="hidden" value="<?= $user->id_dosen ?>" name="id_dosen">
				<input type="password" name="oldPassword" class="form-control mb-3" placeholder="Ketikkan password lama anda...">
				<input type="password" name="password" class="form-control" placeholder="Ketikkan password baru anda...">
				<input type="submit" class="btn btn-primary mt-3">
			</form>
		</div>
	</div>
</div>
