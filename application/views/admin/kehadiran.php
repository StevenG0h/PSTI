<div class="container-fluid">
    <h1>kehadiran sekarang</h1>
<div class="card p-3">
<p>Status : <?= $user->status ?></p>
<p>Keterangan : <?= $user->keterangan ?></p>
<p>Terakhir kali di ubah : <?= $user->last_updated ?></p>
<div class="col-md-4 px-0">
        <form class="mb-3" method="POST" action="<?= base_url('admin/hadirStatus') ?>">
            <input type="hidden" name="id_dosen" value="<?= $user->id_dosen ?>">
            <?php if($user->status == 'Hadir'){ ?>
                <button type="submit" name="status" class="btn btn-success mt-3 d-flex justify-content-end rounded-pill col-md-2 col-4  p-1" value="Tidak Hadir">
                    <div class="toggle bg-white p-2 w-25 rounded-circle"></div>
                </button>
                <?php }else { ?>
                    <button type="submit" name="status" class="btn btn-danger mt-3 rounded-pill col-md-2 col-4 p-1" value="Hadir">
                        <div class="toggle bg-white p-2 rounded-circle" style="width:0;"> </div>
                    </button>
            <?php }; ?>

        </form>
        <h3>Keterangan</h3>
        <form class="mb-3" method="POST" action="<?= base_url('admin/hadirKeterangan') ?>">
            <input type="hidden" value="<?= $user->id_dosen ?>" name="id_dosen">
            <input type="text" name="keterangan" class="form-control">
            <input type="submit" class="btn btn-primary mt-3">
        </form>
    </div>
</div>
</div>
