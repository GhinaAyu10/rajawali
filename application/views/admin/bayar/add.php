<div class="container-fluid">

    <div class="alert alert-info mb-4" role="alert">
        <h5><i class="fas fa-fw fa-book"></i> Tambah Pembayaran Pendidikan</h5>
    </div>

    <form method="post" action="<?= base_url('admin/bayar/add_bayar') ?>">
        <div class="form-group">
            <label for="siswa">Nama Siswa</label>
            <select name="siswa" class="form-control">
                <option value="">-- Pilih Siswa --</option>
                <?php foreach($siswa as $n) : ?>
                <option value="<?= $n->id_siswa ?>"><?= $n->namasis ?></option>
                <?php endforeach ?>
            </select>
            <?= form_error('siswa', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label for="biaya">Jenis Pembayaran</label>
            <select name="biaya" class="form-control">
                <option value="">-- Pilih Jenis --</option>
                <?php foreach($biaya as $n) : ?>
                <option value="<?= $n->id_biaya ?>"><?= $n->namabi ?> - <?= $n->jumlahbi ?></option>
                <?php endforeach ?>
            </select>
            <?= form_error('biaya', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label for="tglbayar">Tanggal Pembayaran</label>
            <input type="date" name="tglbayar" placeholder="Masukkan Tanggal Pembayaran" class="form-control">
            <?= form_error('tglbayar', '<p class="text-danger small ml-3">') ?>
        </div>

        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Tambah</button>
        <a href="<?= base_url('admin/bayar') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

</div>