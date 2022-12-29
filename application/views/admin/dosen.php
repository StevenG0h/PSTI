<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <a href="" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambahDosenModal">Tambah Dosen</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Dosen</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tabelDosen" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Dosen</th>
                            <th>Inisial Dosen</th>
                            <th>NIP</th>
                            <th>Email</th>
                            <th>Kompetensi</th>
                            <th>Mata Kuliah</th>
                            <th>Jabatan Fungsional</th>
                            <th>Pangkat</th>
                            <th>Sertifikat Pendidik</th>
                            <th>Gambar</th>
                            <th style="width:8% ;">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Dosen</th>
                            <th>Inisial Dosen</th>
                            <th>NIP</th>
                            <th>Email</th>
                            <th>Kompetensi</th>
                            <th>Mata Kuliah</th>
                            <th>Jabatan Fungsional</th>
                            <th>Pangkat</th>
                            <th>Sertifikat Pendidik</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach ($dosen as $key => $value) {
                        ?>
                            <tr>
                                <td><?= $value->nama_dosen ?></td>
                                <td><?= $value->inisial_dosen ?></td>
                                <td><?= $value->nip_dosen ?></td>
                                <td><?= $value->email_dosen ?></td>
                                <td><?= $value->kompetensi_dosen ?></td>
                                <td><?= $value->makul_dosen ?></td>
                                <td><?= $value->jabatan_fungsional ?></td>
                                <td><?= $value->pangkat ?></td>
                                <td><?= $value->sertifikat_pendidik ?></td>
                                <td><img src="<?= base_url('uploads/dosen/'.$value->gambar_dosen) ?>" style="width:60%;height:stretch;"></td>
                                <td>
                                    <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ubahDosenModal<?= $value->id_dosen ?>"><i class="fas fa-fw fa-pen"></i></a>
                                    <a href="<?= base_url('admin/hapus_dosen/' . $value->id_dosen) ?>"><button class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></button></a>

                                </td>
                            </tr>
                            <!-- Ubah Dosen Modal-->
                            <div class="modal fade" id="ubahDosenModal<?= $value->id_dosen ?>" tabindex="-1" role="dialog" aria-labelledby="ubahDosenModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ubahDosenModalLabel">Ubah Dosen</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form action="<?= base_url('admin/ubah_dosen') ?>" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="form-group mb-3">
                                                    <input type="hidden" name="id_dosen" value="<?= $value->id_dosen ?>">
                                                    <input type="text" class="form-control" name="nama_dosen" placeholder="Nama Dosen" value="<?= $value->nama_dosen ?>">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <input type="text" class="form-control" name="inisial_dosen" placeholder="Inisial Dosen" value="<?= $value->inisial_dosen ?>">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <input type="text" class="form-control" name="nip_dosen" placeholder="NIP Dosen" value="<?= $value->nip_dosen ?>">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <input type="text" class="form-control" name="email_dosen" placeholder="Email Dosen" value="<?= $value->email_dosen ?>">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <textarea class="form-control" name="kompetensi_dosen" placeholder="Kompetensi Dosen"><?= $value->kompetensi_dosen ?></textarea>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <textarea type="text" class="form-control" name="makul_dosen" placeholder="Mata Kuliah Dosen"><?= $value->makul_dosen ?></textarea>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <textarea type="text" class="form-control" name="jabatan_fungsional" placeholder="Jabatan Fungsional"><?= $value->jabatan_fungsional ?></textarea>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <select name="sertifikat_pendidik" id="" class="form-control">
                                                        <option value="Sudah Tersertifikasi" <?php if($value->sertifikat_pendidik == "Sudah Tersertifikasi"){echo "selected";} ?>>Sudah Tersertifikasi</option>
                                                        <option value="Belum Tersertifikasi" <?php if($value->sertifikat_pendidik == "Belum Tersertifikasi"){echo "selected";} ?>>Belum Tersertifikasi</option>
                                                    </select>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="image" name="gambar_dosen" placeholder="Gambar Dosen">
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

<!-- Tambah Dosen Modal-->
<div class="modal fade" id="tambahDosenModal" tabindeDosen="-1" role="dialog" aria-labelledby="tambahDosenModalLabel" arDosen-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDosenModalLabel">Tambah Dosen</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('admin/tambah_dosen') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="nama_dosen" placeholder="Nama Dosen" required>
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="inisial_dosen" placeholder="Inisial Dosen" required>
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="nip_dosen" placeholder="NIP Dosen" required>
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="email_dosen" placeholder="Email Dosen" required>
                    </div>
                    <div class="form-group mb-3">
                        <textarea class="form-control" name="kompetensi_dosen" placeholder="Kompetensi Dosen" required></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <textarea class="form-control" name="makul_dosen" placeholder="Mata Kuliah Dosen" required></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <textarea class="form-control" name="jabatan_fungsional" placeholder="Jabatan Fungsional Dosen" required></textarea>
                    </div>
                    <div class="form-group mb-3">
						<select name="sertifikat_pendidik" id="" class="form-control">
							<option value="Sudah Tersertifikasi" >Sudah Tersertifikasi</option>
							<option value="Belum Tersertifikasi" >Belum Tersertifikasi</option>
						</select>
					</div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="gambar_dosen" placeholder="Gambar Dosen">
                        <label for="image" class="custom-file-label">Gambar Dosen</label>
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