<div class="container-fluid">

    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-user"></i> Form Tambah Angkatan</h5>
    </div>

    <form method="post" action="<?= base_url('pegawai/angkatan/add_angkatan') ?>">
        <div class="form-group">
            <label>Nama Angkatan</label>
            <input type="text" name="namaakt" placeholder="Masukkan Nama Angkatan" class="form-control">
            <?= form_error('namaakt', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Tahun</label>
            <input type="number" name="tahun" placeholder="Masukkan Tahun" class="form-control">
            <?= form_error('tahun', '<p class="text-danger small ml-3">') ?>
        </div>
    
        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Tambah</button>
        <a href="<?= base_url('pegawai/angkatan') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

</div>