<div class="container-fluid">

    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-user"></i> Form Tambah Hukuman Siswa</h5>
    </div>

    <form method="post" action="<?= base_url('pengajar/hukuman/add_hukuman') ?>">
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
            <label>Pelanggaran</label>
            <input type="text" name="pelanggaran" placeholder="Masukkan Pelanggaran" class="form-control">
            <?= form_error('pelanggaran', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" placeholder="Masukkan Deskripsi" class="form-control">
            <?= form_error('deskripsi', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Hukuman Akhir</label>
            <input type="text" name="hukumakhir" placeholder="Masukkan Hukuman Akhir" class="form-control">
            <?= form_error('hukumakhir', '<p class="text-danger small ml-3">') ?>
        </div>
    
        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Tambah</button>
        <a href="<?= base_url('pengajar/hukuman') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

</div>