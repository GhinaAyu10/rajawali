<div class="container-fluid">
    <div class="alert alert-warning mb-4" role="alert">
        <h5><i class="fas fa-fw fa-user"></i> Detail Informasi Siswa</h5>
    </div>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>NAMA</th>
            <th>ANGKATAN</th>
            <th>NIK</th>
            <th>ALAMAT</th>
            <th>KELAHIRAN</th>
            <th>TELEPON</th>
            <th>JENIS</th>
            <th>PERUSAHAAN</th>
            <th>JABATAN</th>
        </tr>

        <?php
        foreach($siswa as $u) : ?>
            <tr.
                <td><?= $u->namasis ?></td>
                <td><?= $u->namaakt ?></td>
                <td><?= $u->niksis ?></td>
                <td><?= $u->alamatsis ?></td>
                <td><?= $u->tptlahirs ?>, <?= $u->tgllahirs ?></td>
                <td><?= $u->telpsis ?></td>
                <td><?= $u->jenissis ?></td>
                <td><?= $u->perusahaansis ?></td>
                <td><?= $u->jabatansis ?></td>
            </tr>
        <?php endforeach ?>
    </table><br>
    
    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-user"></i> Detail Prestasi Siswa</h5>
    </div>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>NAMA</th>
            <th>KOMPETISI</th>
            <th>JUARA</th>
            <th>TINGKAT</th>
            <th>DESKRIPSI</th>
        </tr>

        <?php
        foreach($prestasi as $u) : ?>
            <tr>
                <td><?= $u->namasis ?></td>
                <td><?= $u->kompetisi ?></td>
                <td><?= $u->juara ?></td>
                <td><?= $u->tingkat ?></td>
                <td><?= $u->despres ?></td>
            </tr>
        <?php endforeach ?>
    </table><br>

    <div class="alert alert-danger mb-4" role="alert">
        <h5><i class="fas fa-fw fa-user"></i> Detail Hukuman Siswa</h5>
    </div>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>NAMA</th>
            <th>PELANGGARAN</th>
            <th>DESKRIPSI</th>
            <th>HUKUMAN</th>
        </tr>

        <?php
        foreach($hukuman as $u) : ?>
            <tr>
                <td><?= $u->namasis ?></td>
                <td><?= $u->pelanggaran ?></td>
                <td><?= $u->deskripsi ?></td>
                <td><?= $u->hukumakhir ?></td>
            </tr>
        <?php endforeach ?>
    </table><br>

    <center><a href="<?= base_url('admin/siswa') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>

</div>