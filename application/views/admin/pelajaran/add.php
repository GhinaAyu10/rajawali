<div class="container-fluid">

    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-user"></i> Form Tambah Pelajaran</h5>
    </div>

    <form method="post" action="<?= base_url('admin/pelajaran/add_pelajaran') ?>">
        <div class="form-group">
            <label>Nama Pelajaran</label>
            <input type="text" name="namapel" placeholder="Masukkan Nama Pelajaran" class="form-control">
            <?= form_error('namapel', '<p class="text-danger small ml-3">') ?>
        </div>
    
        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Tambah</button>
        <a href="<?= base_url('admin/pelajaran') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

</div>