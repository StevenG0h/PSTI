<div class="container-fluid">
<h1>kehadiran sekarang</h1>
<p><?= $status ?></p>
<p><?= $keterangan ?></p>
<p><?= $last_updated ?></p>
<div class="col-md-4">
    <h1>set hadir</h1>
    <form method="POST" action="<?= base_url('admin/hadir') ?>">
        <input type="hidden" value="<?= $id_dosen ?>" name="id_dosen">
        <input type="text" name="keterangan" class="form-control">
        <input type="submit" class="btn btn-primary mt-3">
    </form>
    <h1>tidak hadir</h1>
    <form method="POST" action="<?= base_url('admin/tidakHadir') ?>">
        <input type="hidden" value="<?= $id_dosen ?>" name="id_dosen">
        <input type="text" name="keterangan" class="form-control">
        <input type="submit" class="btn btn-primary mt-3">
    </form>
</div>
</div>
