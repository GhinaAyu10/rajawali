<div class="container-fluid">
    <div class="alert alert-info mb-4" role="alert">
        <h5><i class="fas fa-fw fa-book"></i> Transaksi Pembayaran Pendidikan</h5>
    </div>

    <?= $this->session->flashdata('pesan') ?>

    <div class="row mb-2">
        <div class="col">
            <?= anchor('pegawai/bayar/add','<button class="btn btn-md btn-primary mb-3"><i class="fas fa-plus mr-1"></i> TAMBAH DATA</button>') ?>
        </div>
        <div class="row">
            <div class="col"><form action="<?= base_url('pegawai/bayar/print') ?>" method="post">
                <input style="width: 150px;" placeholder="Dari Tanggal" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="tgl_awal">
            </div>
            <div class="col">
                <input style="width: 150px;" placeholder="Sampai Tanggal" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="tgl_akhir">
            </div>
            <div class="col mr-3">
                <button type="submit" class="btn btn-success btn-normal"><i class="fas fa-print mr-2"></i>CETAK DATA</button>
                </form>
            </div>
        </div>
    </div>

    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>NO</th>
            <th>NAMA SISWA</th>
            <th>JENIS PEMBAYARAN</th>
            <th>JUMLAH</th>
            <th>TANGGAL PEMBAYARAN</th>
            <th colspan="3" style="text-align: center;">AKSI</th>
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
                <td width="15px"><?= anchor('pegawai/bayar/individu/'.$d->id_bayar,'<div class="btn btn-sm btn-success"><i class="fa fa-print"></i></div>') ?></td>
                <td width="15px"><?= anchor('pegawai/bayar/edit/'.$d->id_bayar,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                <td width="15px"><?= anchor('pegawai/bayar/delete/'.$d->id_bayar,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
            </tr>

        <?php endforeach ?>
    </table>

</div>