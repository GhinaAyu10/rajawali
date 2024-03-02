<div class="container-fluid">
    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-newspaper"></i> Form Edit Pengajar</h5>
    </div>

    <?php foreach($pengajar as $u) : ?>

    <form method="post" action="<?= base_url('admin/pengajar/edit_pengajar') ?>">
        <div class="form-group">
            <label>Nama Pengajar</label>
            <input type="hidden" name="id_pengajar" value="<?= $u->id_pengajar ?>">
            <input type="text" name="namapgj" value="<?= $u->namapgj ?>" class="form-control">
            <?= form_error('namapgj', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>NIP</label>
            <input type="text" name="nippgj" value="<?= $u->nippgj ?>" class="form-control">
            <?= form_error('nippgj', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamatpgj" value="<?= $u->alamatpgj ?>" class="form-control">
            <?= form_error('alamatpgj', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Telepon</label>
            <input type="number" name="telppgj" value="<?= $u->telppgj ?>" class="form-control">
            <?= form_error('alamatpgj', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="row form-group mb-5">
            <div class="col">
                <label>Tempat Lahir</label>
                <input type="text" name="tptlahirj" value="<?= $u->tptlahirj ?>" class="form-control">
                <?= form_error('tptlahirj', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Tanggal Lahir</label>
                <input type="date" name="tgllahirj" value="<?= $u->tgllahirj ?>" class="form-control">
                <?= form_error('tgllahirj', '<p class="text-danger small ml-3">') ?>
            </div>
        </div>
    
        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Ubah</button>
        <a href="<?= base_url('admin/pengajar') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

    <?php endforeach; ?>

</div>