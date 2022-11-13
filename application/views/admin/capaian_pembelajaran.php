<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <a href="" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambahCPModal">Tambah Capaian Pembelajaran</a>

    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Capaian Pembelajaran</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tabelCapaianPembelajaran" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Komponen Capaian Pembelajaran</th>
                            <th>Kode</th>
                            <th>Capaian Pembelajaran Lulusan</th>
                            <th style="width:10% ;">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Komponen Capaian Pembelajaran</th>
                            <th>Kode</th>
                            <th>Capaian Pembelajaran Lulusan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach ($capaian_pembelajaran as $key => $value) {
                        ?>
                            <tr>
                                <td><?= $value->komponen_capaian_pembelajaran ?></td>
                                <td><?= $value->kode ?></td>
                                <td><?= $value->capaian_pembelajaran_lulusan ?></td>
                                <td>
                                    <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ubahCPModal<?= $value->id_capaian_pembelajaran ?>"><i class="fas fa-fw fa-pen"></i></a>
                                    <a href="<?= base_url('admin/hapus_capaian_pembelajaran/' . $value->id_capaian_pembelajaran) ?>"><button class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></button></a>
                                </td>
                            </tr>
                            <!-- Ubah Capaian Pembelajaran Modal-->
                            <div class="modal fade" id="ubahCPModal<?= $value->id_capaian_pembelajaran ?>" tabindex="-1" role="dialog" aria-labelledby="ubahCPModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ubahCPModalLabel">Ubah Capaian Pembelajaran</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form action="<?= base_url('admin/ubah_capaian_pembelajaran') ?>" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="form-group mb-3">
                                                    <input type="hidden" name="id_capaian_pembelajaran" value="<?= $value->id_capaian_pembelajaran ?>">
                                                    <input type="text" class="form-control" name="komponen_capaian_pembelajaran" placeholder="Komponen Capaian Pembelajaran" value="<?= $value->komponen_capaian_pembelajaran ?>">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <textarea class="form-control" name="kode" id="editor_ubah_<?= $value->id_capaian_pembelajaran ?>" placeholder="Kode"><?= $value->kode ?></textarea>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <textarea class="form-control" name="capaian_pembelajaran_lulusan" id="editor_ubah1_<?= $value->id_capaian_pembelajaran ?>" placeholder="Capaian Pembelajaran Lulusan"><?= $value->capaian_pembelajaran_lulusan ?></textarea>
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
                            <script>
                                ClassicEditor
                                    .create(document.querySelector('#editor_ubah_<?= $value->id_capaian_pembelajaran ?>'))
                                    .then(editor => {
                                        console.log(editor);
                                    })
                                    .catch(error => {
                                        console.error(error);
                                    });
                            </script>
                            <script>
                                ClassicEditor
                                    .create(document.querySelector('#editor_ubah1_<?= $value->id_capaian_pembelajaran ?>'))
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

<!-- Tambah Capaian Pembelajaran Modal-->
<div class="modal fade" id="tambahCPModal" tabindex="-1" role="dialog" aria-labelledby="tambahCPModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahCPModalLabel">Tambah Capaian Pembelajaran</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('admin/tambah_capaian_pembelajaran') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="komponen_capaian_pembelajaran" placeholder="Komponen Capaian Pembelajaran">
                    </div>
                    <div class="form-group mb-3">
                        <textarea class="form-control" name="kode" id="editor_tambah" placeholder="Kode"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <textarea class="form-control" name="capaian_pembelajaran_lulusan" id="editor_tambah1" placeholder="Capaian Pembelajaran Lulusan"></textarea>
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