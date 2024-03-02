<div class="container-fluid">
    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-user"></i> Daftar Siswa di PT. Rajawali Buana Indah Wiratama</h5>
    </div>

    <?= $this->session->flashdata('pesan') ?>

    <div class="row mb-2">
        <div class="col">
            <?= anchor('pegawai/siswa/add','<button class="btn btn-md btn-primary mb-3"><i class="fas fa-plus mr-1"></i> TAMBAH DATA</button>') ?>
        </div>
        <div class="row">
            <div class="col mr-3">
                <?= anchor('pegawai/siswa/print','<button class="btn btn-md btn-success mb-3"><i class="fas fa-print mr-1"></i> CETAK DATA</button>') ?>
            </div>
        </div>
    </div>
    
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>ANGKATAN</th>
            <th>NIK</th>
            <th>JENIS</th>
            <th>ALAMAT</th>
            <th>KELAHIRAN</th>
            <th>TELEPON</th>
            <th colspan="2">AKSI</th>
        </tr>

        <?php
        $no = 1;

        foreach($siswa as $u) : ?>

            <tr>
                <td width="20px"><?= $no++ ?></td>
                <td><?= $u->namasis ?></td>
                <td><?= $u->namaakt ?></td>
                <td><?= $u->niksis ?></td>
                <td><?= $u->jenissis ?></td>
                <td><?= $u->alamatsis ?></td>
                <td><?= $u->tptlahirs ?>, <?= $u->tgllahirs ?></td>
                <td><?= $u->telpsis ?></td>
                <td width="20px"><?= anchor('pegawai/siswa/edit/'.$u->id_siswa,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                <td width="20px"><?= anchor('pegawai/siswa/delete/'.$u->id_siswa,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
            </tr>

        <?php endforeach ?>
    </table>

</div>