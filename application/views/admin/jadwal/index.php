<div class="container-fluid">
    <div class="alert alert-info mb-4" role="alert">
        <h5><i class="fas fa-fw fa-book"></i> Transaksi Jadwal Kelas</h5>
    </div>

    <?= $this->session->flashdata('pesan') ?>

    <div class="row mb-2">
        <div class="col">
            <?= anchor('admin/jadwal/add','<button class="btn btn-md btn-primary mb-3"><i class="fas fa-plus mr-1"></i> TAMBAH DATA</button>') ?>
        </div>
        <div class="row">
            <div class="col"><form action="<?= base_url('admin/jadwal/print') ?>" method="post">
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
            <th>ANGKATAN</th>
            <th>PELAJARAN</th>
            <th>PENGAJAR</th>
            <th>JADWAL</th>
            <th colspan="3" style="text-align: center;">AKSI</th>
        </tr>

        <?php
        $do = 1;

        foreach($jadwal as $d) : ?>

            <tr>
                <td width="20px"><?= $do++ ?></td>
                <td><?= $d->namaakt ?></td>
                <td><?= $d->namapel ?></td>
                <td><?= $d->namapgj ?></td>
                <td><?= $d->darijam ?> s/d <?= $d->sampaijam ?></td>
                <td width="15px"><?= anchor('admin/jadwal/edit/'.$d->id_jadwal,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                <td width="15px"><?= anchor('admin/jadwal/delete/'.$d->id_jadwal,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
            </tr>

        <?php endforeach ?>
    </table>

</div>