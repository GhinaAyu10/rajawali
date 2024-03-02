<div class="container-fluid">
    <div class="alert alert-info mb-4" role="alert">
        <h5><i class="fas fa-fw fa-book"></i> Transaksi Pembayaran Pendidikan</h5>
    </div>

    <?= $this->session->flashdata('pesan') ?>

    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>NO</th>
            <th>NAMA SISWA</th>
            <th>JENIS PEMBAYARAN</th>
            <th>JUMLAH</th>
            <th>TANGGAL PEMBAYARAN</th>
            <th style="text-align: center;">AKSI</th>
        </tr>

        <?php
        $do = 1;

        foreach($bayar as $d) : ?>

            <tr>
                <td width="20px"><?= $do++ ?></td>
                <td><?= $d->namasis ?></td>
                <td><?= $d->namabi ?></td>
                <td>Rp<?php $a = $d->jumlahbi; echo number_format(($a), 0); ?></td>
                <td><?php $b = strtotime($d->tglbayar); echo date("j F Y",$b); ?></td>
                <td width="15px"><?= anchor('siswa/bayar/individu/'.$d->id_bayar,'<div class="btn btn-sm btn-success"><i class="fa fa-print"></i></div>') ?></td>
            </tr>

        <?php endforeach ?>
    </table>

</div>