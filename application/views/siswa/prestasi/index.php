<div class="container-fluid">
    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-user"></i> Daftar Prestasi Siswa di PT. Rajawali Buana Indah Wiratama</h5>
    </div>

    <?= $this->session->flashdata('pesan') ?>
    
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>NIK</th>
            <th>KOMPETISI</th>
            <th>JUARA</th>
            <th>TINGKAT</th>
            <th>DESKRIPSI</th>
            <th>AKSI</th>
        </tr>

        <?php
        $no = 1;

        foreach($prestasi as $u) : ?>

            <tr>
                <td width="20px"><?= $no++ ?></td>
                <td><?= $u->namasis ?></td>
                <td><?= $u->niksis ?></td>
                <td><?= $u->kompetisi ?></td>
                <td><?= $u->juara ?></td>
                <td><?= $u->tingkat ?></td>
                <td><?= $u->despres ?></td>
                <td width="15px"><a href="<?= base_url(); ?>uploads/<?= $u->filesertif ?>"><div class="btn btn-sm btn-success"><i class="fa fa-download"></i></div></a></td>
            </tr>

        <?php endforeach ?>
    </table>

</div>