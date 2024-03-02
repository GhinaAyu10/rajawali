<div class="container-fluid">
    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-user"></i> Daftar Biaya di PT. Rajawali Buana Indah Wiratama</h5>
    </div>

    <?= $this->session->flashdata('pesan') ?>

    <div class="row mb-2">
        <div class="col">
            <?= anchor('admin/biaya/add','<button class="btn btn-md btn-primary mb-3"><i class="fas fa-plus mr-1"></i> TAMBAH DATA</button>') ?>
        </div>
        <div class="row">
            <div class="col mr-3">
                <?= anchor('admin/biaya/print','<button class="btn btn-md btn-success mb-3"><i class="fas fa-print mr-1"></i> CETAK DATA</button>') ?>
            </div>
        </div>
    </div>
    
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>NO</th>
            <th>NAMA BIAYA</th>
            <th>JUMLAH BIAYA</th>
            <th colspan="2">AKSI</th>
        </tr>

        <?php
        $no = 1;

        foreach($biaya as $u) : ?>

            <tr>
                <td width="20px"><?= $no++ ?></td>
                <td><?= $u->namabi ?></td>
                <td>Rp<?php $a = $u->jumlahbi; echo number_format(($a), 0); ?></td>
                <td width="20px"><?= anchor('admin/biaya/edit/'.$u->id_biaya,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                <td width="20px"><?= anchor('admin/biaya/delete/'.$u->id_biaya,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
            </tr>

        <?php endforeach ?>
    </table>

</div>