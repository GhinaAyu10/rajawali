<div class="container-fluid">
    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-user"></i> Daftar Hukuman Siswa di PT. Rajawali Buana Indah Wiratama</h5>
    </div>

    <?= $this->session->flashdata('pesan') ?>
    
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>NIK</th>
            <th>PELANGGARAN</th>
            <th>DESKRIPSI</th>
            <th>HUKUMAN</th>
        </tr>

        <?php
        $no = 1;

        foreach($hukuman as $u) : ?>

            <tr>
                <td width="20px"><?= $no++ ?></td>
                <td><?= $u->namasis ?></td>
                <td><?= $u->niksis ?></td>
                <td><?= $u->pelanggaran ?></td>
                <td><?= $u->deskripsi ?></td>
                <td><?= $u->hukumakhir ?></td>
            </tr>

        <?php endforeach ?>
    </table>

</div>