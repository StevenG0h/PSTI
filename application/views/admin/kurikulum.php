<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <a href="" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambahKurikulumModal">Tambah Kurikulum</a>

    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kurikulum</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tabelKurikulum" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kurikulum</th>
                            <th>Rincian Kurikulum</th>
                            <th>Status</th>
                            <th style="width:12% ;">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Kurikulum</th>
                            <th>Rincian Kurikulum</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach ($kurikulum as $key => $value) {
                        ?>
                            <tr>
                                <td><?= $value->kurikulum ?></td>
                                <td style="width: 512px;">
                                    <?php if ($value->rincian_kurikulum == null) { ?>
                                        Tidak ada gambar
                                    <?php } else { ?>
                                        <img src="<?= base_url('uploads/kurikulum/' . $value->rincian_kurikulum) ?>" style="width:40%;height:stretch;">
                                    <?php } ?>
                                </td>
                                <td><?php if($value->status == 1) echo "Aktif";
                                else echo "Tidak Aktif"; ?></td>
                                <td>
                                    <a href="<?= base_url('admin/semester/' . $value->id_kurikulum) ?>" class="btn btn-sm btn-info"><i class="fas fa-fw fa-clipboard"></i></a>
                                    <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ubahKurikulumModal<?= $value->id_kurikulum ?>"><i class="fas fa-fw fa-pen"></i></a>
                                    <a href="<?= base_url('admin/hapus_kurikulum/' . $value->id_kurikulum) ?>"><button class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></button></a>
                                </td>
                            </tr>
                            <!-- Ubah Kurikulum Modal-->
                            <div class="modal fade" id="ubahKurikulumModal<?= $value->id_kurikulum ?>" tabindex="-1" role="dialog" aria-labelledby="ubahKurikulumModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ubahKurikulumModalLabel">Ubah Kurikulum</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form action="<?= base_url('admin/ubah_kurikulum') ?>" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="form-group mb-3">
                                                    <input type="hidden" name="id_kurikulum" value="<?= $value->id_kurikulum ?>">
                                                    <input type="text" class="form-control" name="kurikulum" placeholder="Kurikulum" value="<?= $value->kurikulum ?>">
                                                </div>
                                                <div class="custom-file mb-3">
                                                    <input type="file" class="custom-file-input" id="image" name="rincian_kurikulum" placeholder="Rincian Kurikulum">
                                                    <label for="image" class="custom-file-label">Rincian Kurikulum</label>
                                                </div>
                                                <div class="form-group-mb-3">
                                                    <select class="form-control" name="status" id="" required>
                                                        <option disabled>Pilih Status</option>
                                                        <?php
                                                            if($value->status == 0) {
                                                        ?>
                                                            <option value="<?=$value->status?>">Tidak Aktif</option>
                                                            <option value="1">Aktif</option>
                                                        <?php
                                                            }
                                                            else {
                                                        ?>
                                                            <option value="<?=$value->status?>">Aktif</option>
                                                            <option value="0">Tidak Aktif</option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- <script>
                                ClassicEditor
                                    .create(document.querySelector('#editor_ubah_<?= $value->id_kurikulum ?>'))
                                    .then(editor => {
                                        console.log(editor);
                                    })
                                    .catch(error => {
                                        console.error(error);
                                    });
                            </script> -->
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

<!-- Tambah Kurikulum Modal-->
<div class="modal fade" id="tambahKurikulumModal" tabindex="-1" role="dialog" aria-labelledby="tambahKurikulumModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahKurikulumModalLabel">Tambah Kurikulum</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('admin/tambah_kurikulum') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="kurikulum" placeholder="Kurikulum" required>
                    </div>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" id="image" name="rincian_kurikulum" placeholder="Rincian Kurikulum">
                        <label for="image" class="custom-file-label">Rincian Kurikulum</label>
                    </div>
                    <div class="form-group-mb-3">
                        <select class="form-control" name="status" id="" required>
                            <option disabled selected value>Pilih Status</option>
                            <option value="0">Tidak Aktif</option>
                            <option value="1">Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- <script>
    ClassicEditor
        .create(document.querySelector('#editor_tambah'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script> -->