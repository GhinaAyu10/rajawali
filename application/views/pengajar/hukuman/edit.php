<div class="container-fluid">
    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-newspaper"></i> Form Edit Hukuman Siswa</h5>
    </div>

    <?php foreach($hukuman as $u) : ?>

    <form method="post" action="<?= base_url('pengajar/hukuman/edit_hukuman') ?>">
        <div class="row form-group mr-1 ml-1">
            <label for="siswa">Nama Siswa</label>
            <select name="siswa" class="form-control">
                <option value="">-- Pilih Siswa --</option>
                <?php foreach($siswa as $n) : ?>
                    <option value="<?= $n->id_siswa ?>" <?= $u->siswa === $n->id_siswa ? 'selected' : '' ?>><?= $n->namasis ?></option>
                <?php endforeach ?>
            </select>
            <?= form_error('siswa', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Pelanggaran</label>
            <input type="text" name="pelanggaran" value="<?= $u->pelanggaran ?>" class="form-control">
            <?= form_error('pelanggaran', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" value="<?= $u->deskripsi ?>" class="form-control">
            <?= form_error('deskripsi', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Hukuman Akhir</label>
            <input type="text" name="hukumakhir" value="<?= $u->hukumakhir ?>" class="form-control">
            <?= form_error('hukumakhir', '<p class="text-danger small ml-3">') ?>
        </div>
        <input type="hidden" name="id_hukuman" value="<?= $u->id_hukuman ?>">
    
        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Ubah</button>
        <a href="<?= base_url('pengajar/hukuman') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

    <?php endforeach; ?>

</div>