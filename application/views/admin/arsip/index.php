<div class="container-fluid">
    <div class="alert alert-info mb-4" role="alert">
        <h5><i class="fas fa-fw fa-book"></i> Transaksi Arsip Digital</h5>
    </div>

    <?= $this->session->flashdata('pesan') ?>

    <div class="row mb-2">
        <div class="col">
            <?= anchor('admin/arsip/add','<button class="btn btn-md btn-primary mb-3"><i class="fas fa-plus mr-1"></i> TAMBAH DATA</button>') ?>
        </div>
        <div class="row">
            <div class="col"><form action="<?= base_url('admin/arsip/print') ?>" method="post">
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
            <th>NAMA</th>
            <th>LOKASI</th>
            <th>LEMARI</th>
            <th>KATEGORI</th>
            <th>TANGGAL</th>
            <th>RAK</th>
            <th>BOX</th>
            <th>MAP</th>
            <th>PETUGAS</th>
            <th colspan="3" style="text-align: center;">AKSI</th>
        </tr>

        <?php
        $do = 1;

        foreach($arsip as $d) : ?>

            <tr>
                <td width="20px"><?= $do++ ?></td>
                <td><?= $d->namaarsip ?></td>
                <td><?= $d->namalok ?></td>
                <td><?= $d->namalemari ?></td>
                <td><?= $d->namakat ?></td>
                <td><?= $d->tglarsip ?></td>
                <td><?= $d->no_rak ?></td>
                <td><?= $d->no_box ?></td>
                <td><?= $d->no_map ?></td>
                <td><?= $d->username ?></td>
                <td width="15px"><a href="<?= base_url(); ?>uploads/<?= $d->filearsip ?>"><div class="btn btn-sm btn-success"><i class="fa fa-download"></i></div></a></td>
                <td width="15px"><?= anchor('admin/arsip/edit/'.$d->id_arsip,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                <td width="15px"><?= anchor('admin/arsip/delete/'.$d->id_arsip,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
            </tr>

        <?php endforeach ?>
    </table>

</div>