<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <a href="" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambahAkunDosenModal">Tambah Akun Dosen</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Akun Login Dosen</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tabelAkunDosen" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Dosen</th>
                            <th>NIP Dosen</th>
                            <th>status</th>
                            <th>keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Dosen</th>
                            <th>NIP Dosen</th>
                            <th>Password</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach ($kehadirans as $key => $value) {

                        ?>
                            <tr>
                                <td><?= $value->nama_dosen ?></td>
                                <td><?= $value->nip_dosen ?></td>
                                <td><?= $value->status ?></td>
                                <td><?= $value->keterangan ?></td>
                                <!-- <td>
                                    <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ubahAkunDosenModal<?= $value->id_login_dosen ?>"><i class="fas fa-fw fa-pen"></i></a>
                                    <a href="<?= base_url('admin/hapus_akun/' . $value->id_login_dosen) ?>"><button class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></button></a>

                                </td> -->
                            </tr>
                            <!-- Ubah Dosen Modal-->
                            <!-- <div class="modal fade" id="ubahAkunDosenModal<?= $value->id_login_dosen ?>" tabindex="-1" role="dialog" aria-labelledby="ubahAkunDosenModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ubahAkunDosenModalLabel">Ubah Akun Dosen</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div> -->
                                        <!-- <form action="<?= base_url('admin/ubah_akun') ?>" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="form-group mb-3">
                                                    <input type="hidden" name="id_login_dosen" value="<?= $value->id_login_dosen ?>">
                                                    <select class="form-control" name="id_dosen" id="" required>
                                                        <option value="<?=$value->id_dosen?>"><?=$value->nama_dosen?></option>
                                                        <?php foreach ($dosen as $key => $value2) { ?>
                                                            <option value="<?= $value2->id_dosen ?>"><?= $value2->nama_dosen ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <input type="text" class="form-control" name="password" placeholder="Password" value="<?= $value->password ?>">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <select class="form-control" name="level" id="" required>
                                                        <option value="<?=$value->level?>"><?=$level?></option>
                                                        <option value="<?=$level_value?>"><?=$level_name?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                            </div>
                                        </form> -->
                                    <!-- </div>
                                </div>
                            </div> -->
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
<div class="modal fade" id="tambahAkunDosenModal" tabindeDosen="-1" role="dialog" aria-labelledby="tambahAkunDosenModalLabel" arDosen-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahAkunDosenModalLabel">Tambah Akun Dosen</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('admin/tambah_akun') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <!-- <input type="text" class="form-control" name="nip_dosen" placeholder="NIP Dosen" required> -->
                        <select class="form-control" name="id_dosen" id="" required>
                            <option disabled selected value>Pilih Dosen</option>
                            <?php foreach ($dosen as $key => $value) { ?>
                                <option value="<?= $value->id_dosen ?>"><?= $value->nama_dosen ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group mb-3">
                        <!-- <input type="text" class="form-control" name="level" placeholder="Level" required> -->
                        <select class="form-control" name="level" id="" required>
                            <option disabled selected value>Pilih level</option>
                            <option value="0">Kaprodi</option>
                            <option value="1">Dosen</option>
                        </select>
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