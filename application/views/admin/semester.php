<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <a href="" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambahSemesterModal">Tambah Semester</a>

    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Semester</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tabelSemester" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Semester</th>
                            <th>File Gambar</th>
                            <th style="width:12% ;">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Semester</th>
                            <th>File Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach ($semester as $key => $value) {
                        ?>
                            <tr>
                                <td><?= $value->semester ?></td>
                                <!-- <td><?= $value->file_gambar ?></td> -->
                                <td style="width: 512px;">
                                    <?php if ($value->file_gambar == null) { ?>
                                        Tidak ada gambar
                                    <?php } else { ?>
                                        <img src="<?= base_url('uploads/semester/' . $value->file_gambar) ?>" style="width:40%;height:stretch;">
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ubahSemesterModal<?= $value->id_semester ?>"><i class="fas fa-fw fa-pen"></i></a>
                                    <a href="<?= base_url('admin/hapus_semester/' . $id_kurikulum . "/" . $value->id_semester) ?>"><button class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></button></a>
                                </td>
                            </tr>
                            <!-- Ubah Semester Modal-->
                            <div class="modal fade" id="ubahSemesterModal<?= $value->id_semester ?>" tabindex="-1" role="dialog" aria-labelledby="ubahSemesterLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ubahSemesterModalLabel">Ubah Semester</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form action="<?= base_url('admin/ubah_semester') ?>" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="form-group mb-3">
                                                    <input type="hidden" name="id_kurikulum" value="<?= $id_kurikulum ?>">
                                                    <input type="hidden" name="id_semester" value="<?= $value->id_semester ?>">
                                                    <input type="text" class="form-control" name="semester" value="<?= $value->semester ?>" required>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="image" name="file_gambar" placeholder="File Gambar">
                                                    <label for="image" class="custom-file-label">File Gambar</label>
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
                                    .create(document.querySelector('#editor_ubah_<?= $value->id_semester ?>'))
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

<!-- Tambah Semester Modal-->
<div class="modal fade" id="tambahSemesterModal" tabindex="-1" role="dialog" aria-labelledby="tambahSemesterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahSemesterModalLabel">Tambah Semester</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('admin/tambah_semester') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <input type="hidden" name="id_kurikulum" value="<?= $id_kurikulum ?>">
                        <input type="text" class="form-control" name="semester" placeholder="Semester" required>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="file_gambar" placeholder="File Gambar">
                        <label for="image" class="custom-file-label">File Gambar</label>
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