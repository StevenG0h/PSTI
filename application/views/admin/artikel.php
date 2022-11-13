<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <a href="" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambahArtikelModal">Tambah Artikel</a>

    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Artikel</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tabelArtikel" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th style="width:8% ;">Tanggal</th>
                            <th>Kategori</th>
                            <th>Gambar</th>
                            <th style="width:8% ;">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th>Tanggal</th>
                            <th>Kategori</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach ($artikel as $key => $value) {
                        ?>
                            <tr>
                                <td><?= $value->judul_artikel ?></td>
                                <td><?= substr(strip_tags($value->isi_artikel), 0, 200)?>.....</td>
                                <td><?= $value->tanggal_artikel ?></td>
                                <td><?= $value->kategori_artikel ?></td>
                                <td>
                                    <?php if ($value->gambar_artikel == null) { ?>
                                        Tidak ada gambar
                                    <?php } else { ?>
                                        <img src="<?= base_url('uploads/artikel/' . $value->gambar_artikel) ?>" style="width:100%;height:stretch;">
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ubahArtikelModal<?= $value->id_artikel ?>"><i class="fas fa-fw fa-pen"></i></a>
                                    <a href="<?= base_url('admin/hapus_artikel/' . $value->id_artikel) ?>"><button class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></button></a>

                                </td>
                            </tr>
                            <!-- Ubah Artikel Modal-->
                            <div class="modal fade" id="ubahArtikelModal<?= $value->id_artikel ?>" tabindex="-1" role="dialog" aria-labelledby="ubahArtikelModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ubahArtikelModalLabel">Ubah Artikel</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form action="<?= base_url('admin/ubah_artikel') ?>" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="form-group mb-3">
                                                    <input type="hidden" name="id_artikel" value="<?= $value->id_artikel ?>">
                                                    <input type="text" class="form-control" name="judul_artikel" placeholder="Judul Artikel" value="<?= $value->judul_artikel ?>">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <textarea class="form-control" name="isi_artikel" id="editor_ubah_<?= $value->id_artikel ?>" placeholder="Isi Artikel"><?= $value->isi_artikel ?></textarea>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <select class="form-control" name="kategori_artikel" placeholder="Kategori Artikel">
                                                        <option selected hidden="hidden" value="<?= $value->kategori_artikel ?>"><?= $value->kategori_artikel ?></option>
                                                        <option value="berita">Berita</option>
                                                        <option value="prestasi">Prestasi</option>
                                                    </select>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="image" name="gambar_artikel" placeholder="Gambar Artikel">
                                                    <label for="image" class="custom-file-label">Gambar Artikel</label>
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
                                    .create(document.querySelector('#editor_ubah_<?=$value->id_artikel?>'))
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

<!-- Tambah Artikel Modal-->
<div class="modal fade" id="tambahArtikelModal" tabindex="-1" role="dialog" aria-labelledby="tambahArtikelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahArtikelModalLabel">Tambah Artikel</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('admin/tambah_artikel') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="judul_artikel" placeholder="Judul Artikel" required>
                    </div>
                    <div class="form-group mb-3">
                        <textarea class="form-control" name="isi_artikel" id="editor_tambah" placeholder="Isi Artikel"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <select class="form-control" name="kategori_artikel" placeholder="Kategori Artikel">
                            <option value="berita">Berita</option>
                            <option value="prestasi">Prestasi</option>
                        </select>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="gambar_artikel" placeholder="Gambar Artikel" required>
                        <label for="image" class="custom-file-label">Gambar Artikel</label>
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