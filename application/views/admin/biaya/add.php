<div class="container-fluid">

    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-user"></i> Form Tambah Biaya</h5>
    </div>

    <form method="post" action="<?= base_url('admin/biaya/add_biaya') ?>">
        <div class="form-group">
            <label>Nama Biaya</label>
            <input type="text" name="namabi" placeholder="Masukkan Nama Biaya" class="form-control">
            <?= form_error('namabi', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Jumlah Biaya</label>
            <input type="number" name="jumlahbi" placeholder="Masukkan Jumlah Biaya" class="form-control">
            <?= form_error('jumlahbi', '<p class="text-danger small ml-3">') ?>
        </div>
    
        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Tambah</button>
        <a href="<?= base_url('admin/biaya') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

</div>