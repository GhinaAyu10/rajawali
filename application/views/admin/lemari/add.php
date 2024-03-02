<div class="container-fluid">

    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-user"></i> Form Tambah Lemari Arsip</h5>
    </div>

    <form method="post" action="<?= base_url('admin/lemari/add_lemari') ?>">
        <div class="form-group">
            <label>Nama Lemari</label>
            <input type="text" name="namalemari" placeholder="Masukkan Nama Lemari" class="form-control">
            <?= form_error('namalemari', '<p class="text-danger small ml-3">') ?>
        </div>
    
        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Tambah</button>
        <a href="<?= base_url('admin/lemari') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

</div>