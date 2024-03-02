<div class="container-fluid">

    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-user"></i> Form Tambah Lokasi Arsip</h5>
    </div>

    <form method="post" action="<?= base_url('admin/lokasi/add_lokasi') ?>">
        <div class="form-group">
            <label>Nama Lokasi</label>
            <input type="text" name="namalok" placeholder="Masukkan Nama Lokasi" class="form-control">
            <?= form_error('namalok', '<p class="text-danger small ml-3">') ?>
        </div>
    
        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Tambah</button>
        <a href="<?= base_url('admin/lokasi') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

</div>