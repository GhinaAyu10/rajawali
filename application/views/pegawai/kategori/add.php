<div class="container-fluid">

    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-user"></i> Form Tambah Kategori Arsip</h5>
    </div>

    <form method="post" action="<?= base_url('pegawai/kategori/add_kategori') ?>">
        <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" name="namakat" placeholder="Masukkan Nama Kategori" class="form-control">
            <?= form_error('namakat', '<p class="text-danger small ml-3">') ?>
        </div>
    
        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Tambah</button>
        <a href="<?= base_url('pegawai/kategori') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

</div>