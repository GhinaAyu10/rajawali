<div class="container-fluid">

    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-user"></i> Form Tambah Pengajar</h5>
    </div>

    <form method="post" action="<?= base_url('admin/pengajar/add_pengajar') ?>">
        <div class="form-group">
            <label>Nama Pengajar</label>
            <input type="text" name="namapgj" placeholder="Masukkan Nama Pengajar" class="form-control">
            <?= form_error('namapgj', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>NIP</label>
            <input type="number" name="nippgj" placeholder="Masukkan NIP" class="form-control">
            <?= form_error('nippgj', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamatpgj" placeholder="Masukkan Alamat" class="form-control">
            <?= form_error('alamatpgj', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Telepon</label>
            <input type="number" name="telppgj" placeholder="Masukkan Telepon" class="form-control">
            <?= form_error('alamatpgj', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="row form-group mb-5">
            <div class="col">
                <label>Tempat Lahir</label>
                <input type="text" name="tptlahirj" placeholder="Masukkan Tempat Lahir" class="form-control">
                <?= form_error('tptlahirj', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Tanggal Lahir</label>
                <input type="date" name="tgllahirj" placeholder="Masukkan Tanggal Lahir" class="form-control">
                <?= form_error('tgllahirj', '<p class="text-danger small ml-3">') ?>
            </div>
        </div>
    
        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Tambah</button>
        <a href="<?= base_url('admin/pengajar') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

</div>