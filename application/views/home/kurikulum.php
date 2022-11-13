<!-- Start Page Title Area -->
<div class="page-title-area bg-1">
    <div class="container">
        <div class="page-title-content">
            <h2>KURIKULUM</h2>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Map Area -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-6 mt-5 mb-5" style="font-family: Open Sans, sans-serif;">
            <h3>Profil Lulusan Program Studi Teknik Informatika</h3>
            <table class="table table-responsive table-bordered font-weight-normal">
                <tr class="text-center">
                    <th>NO</th>
                    <th>PROFIL LULUSAN</th>
                    <th>DESKRIPSI</th>
                    <th>KEMAMPUAN</th>
                </tr>
                <?php

                $i = 1;
                foreach ($profil_lulusan as $key => $value) { ?>

                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $value->profil_lulusan ?></td>
                        <td><?= $value->deskripsi ?></td>
                        <td><?= $value->kemampuan ?></td>
                    </tr>

                <?php } ?>
            </table>
            <h3>Capaian Pembelajaran Lulusan Program Studi Teknik Informatika</h3>
            <table class="table table-bordered">
                <tr class="text-center">
                    <th>NO</th>
                    <th>KOMPONEN CP</th>
                    <th>KODE</th>
                    <th>CAPAIAN PEMBELAJARAN LULUSAN</th>
                </tr>
                <?php

                $i = 1;
                foreach ($capaian_pembelajaran as $key => $value) { ?>

                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $value->komponen_capaian_pembelajaran ?></td>
                        <td><?= $value->kode ?></td>
                        <td><?= $value->capaian_pembelajaran_lulusan ?></td>
                    </tr>

                <?php } ?>
            </table>

            <h3>Rincian Kurikulum</h3>
            <img src="<?= base_url('uploads/kurikulum/' . $kurikulum_aktif->rincian_kurikulum) ?>" alt="">
        </div>
    </div>

    <!-- Semester 1-8 -->
    <div class="row">
        <?php foreach ($semester as $key => $value) { ?>
            <div class="col-lg-6 col-md-6 mt-3 mb-3" style="font-family: Open Sans, sans-serif;">
                <h3><?= $value->semester ?></h3>
                <img src="<?= base_url('uploads/semester/' . $value->file_gambar) ?>" alt="">
            </div>
        <?php } ?>
    </div>

    <div class="mb-2">
        <p>Lihat Kurikulum Sebelumnya</p>
        <ol>
            <?php foreach ($kurikulum_tidak_aktif as $key => $value) { ?>
                <li>
                    <a href="<?= base_url("home/kurikulum_lama/".$value->id_kurikulum)?>"><?= $value->kurikulum ?></a>
                </li>
            <?php } ?>
        </ol>
    </div>

</div>
<!-- End Map Area -->