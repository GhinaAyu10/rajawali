<div class="container-fluid">

    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-user"></i> Form Tambah Pegawai</h5>
    </div>

    <form method="post" action="<?= base_url('admin/pegawai/add_pegawai') ?>">
        <div class="form-group">
            <label>Nama Pegawai</label>
            <input type="text" name="namapgw" placeholder="Masukkan Nama Pegawai" class="form-control">
            <?= form_error('namapgw', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>NIP</label>
            <input type="number" name="nippgw" placeholder="Masukkan NIP" class="form-control">
            <?= form_error('nippgw', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamatpgw" placeholder="Masukkan Alamat" class="form-control">
            <?= form_error('alamatpgw', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Telepon</label>
            <input type="number" name="telppgw" placeholder="Masukkan Telepon" class="form-control">
            <?= form_error('alamatpgw', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="row form-group mb-5">
            <div class="col">
                <label>Tempat Lahir</label>
                <input type="text" name="tptlahirp" placeholder="Masukkan Tempat Lahir" class="form-control">
                <?= form_error('tptlahirp', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Tanggal Lahir</label>
                <input type="date" name="tgllahirp" placeholder="Masukkan Tanggal Lahir" class="form-control">
                <?= form_error('tgllahirp', '<p class="text-danger small ml-3">') ?>
            </div>
        </div>
    
        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Tambah</button>
        <a href="<?= base_url('admin/pegawai') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

</div>