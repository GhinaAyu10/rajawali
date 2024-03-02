<div class="container-fluid">
    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-newspaper"></i> Form Edit Pegawai</h5>
    </div>

    <?php foreach($pegawai as $u) : ?>

    <form method="post" action="<?= base_url('admin/pegawai/edit_pegawai') ?>">
        <div class="form-group">
            <label>Nama Pegawai</label>
            <input type="hidden" name="id_pegawai" value="<?= $u->id_pegawai ?>">
            <input type="text" name="namapgw" value="<?= $u->namapgw ?>" class="form-control">
            <?= form_error('namapgw', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>NIP</label>
            <input type="text" name="nippgw" value="<?= $u->nippgw ?>" class="form-control">
            <?= form_error('nippgw', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamatpgw" value="<?= $u->alamatpgw ?>" class="form-control">
            <?= form_error('alamatpgw', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Telepon</label>
            <input type="number" name="telppgw" value="<?= $u->telppgw ?>" class="form-control">
            <?= form_error('alamatpgw', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="row form-group mb-5">
            <div class="col">
                <label>Tempat Lahir</label>
                <input type="text" name="tptlahirp" value="<?= $u->tptlahirp ?>" class="form-control">
                <?= form_error('tptlahirp', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Tanggal Lahir</label>
                <input type="date" name="tgllahirp" value="<?= $u->tgllahirp ?>" class="form-control">
                <?= form_error('tgllahirp', '<p class="text-danger small ml-3">') ?>
            </div>
        </div>
    
        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Ubah</button>
        <a href="<?= base_url('admin/pegawai') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

    <?php endforeach; ?>

</div>