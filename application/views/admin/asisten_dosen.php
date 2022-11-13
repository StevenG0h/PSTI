<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <a href="" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambahAsistenDosenModal">Tambah Dosen</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Asisten Dosen</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tabelAsistenDosen" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Asisten</th>
                            <th>Mata Kuliah Asisten</th>
                            <th>Gambar Asisten</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Asisten</th>
                            <th>Mata Kuliah Asisten</th>
                            <th>Gambar Asisten</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach ($asisten_dosen as $key => $value) {
                        ?>
                            <tr>
                                <td><?= $value->nama_asisten ?></td>
                                <td><?= $value->makul_asisten ?></td>
                                <td><img src="<?= base_url('uploads/ail/'.$value->gambar_asisten) ?>" style="width:auto;height:150px;"></td>
                                <td>
                                    <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ubahAsistenDosenModal<?= $value->id_asisten ?>"><i class="fas fa-fw fa-pen"></i></a>
                                    <a href="<?= base_url('admin/hapus_asisten/' . $value->id_asisten) ?>"><button class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></button></a>

                                </td>
                            </tr>
                            <!-- Ubah Dosen Modal-->
                            <div class="modal fade" id="ubahAsistenDosenModal<?= $value->id_asisten ?>" tabindex="-1" role="dialog" aria-labelledby="ubahAsistenDosenModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ubahAsistenDosenModalLabel">Ubah Asisten</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form action="<?= base_url('admin/ubah_asisten') ?>" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="form-group mb-3">
                                                    <input type="hidden" name="id_asisten" value="<?= $value->id_asisten ?>">
                                                    <input type="text" class="form-control" name="nama_asisten" placeholder="Nama Asisten" value="<?= $value->nama_asisten ?>">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <textarea type="text" class="form-control" name="makul_asisten" placeholder="Mata Kuliah Asisten"><?= $value->makul_asisten ?></textarea>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="image" name="gambar_asisten" placeholder="Gambar Asisten">
                                                    <label for="image" class="custom-file-label">Gambar Asisten</label>
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
<div class="modal fade" id="tambahAsistenDosenModal" tabindeDosen="-1" role="dialog" aria-labelledby="tambahAsistenDosenModalLabel" arDosen-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahAsistenDosenModalLabel">Tambah Asisten Dosen</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('admin/tambah_asisten') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="nama_asisten" placeholder="Nama Asisten" required>
                    </div>
                    <div class="form-group mb-3">
                        <textarea class="form-control" name="makul_asisten" placeholder="Mata Kuliah Asisten" required></textarea>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="gambar_asisten" placeholder="Gambar Asisten">
                        <label for="image" class="custom-file-label">Gambar Asisten</label>
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