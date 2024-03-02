<div class="container-fluid">
    <div class="alert alert-info mb-4" role="alert">
        <h5><i class="fas fa-fw fa-book"></i> Transaksi Jadwal Kelas</h5>
    </div>

    <?= $this->session->flashdata('pesan') ?>

    <div class="row mb-2">
        <div class="col"></div>
        <div class="row">
            <div class="col"><form action="<?= base_url('pengajar/jadwal/print') ?>" method="post">
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
            </tr>

        <?php endforeach ?>
    </table>

</div>