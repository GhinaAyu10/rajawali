<div class="container-fluid">
    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-newspaper"></i> Form Edit Kategori Arsip</h5>
    </div>

    <?php foreach($kategori as $u) : ?>

    <form method="post" action="<?= base_url('pegawai/kategori/edit_kategori') ?>">
        <div class="form-group">
            <label>Nama Kategori</label> 
            <input type="hidden" name="id_kategori" value="<?= $u->id_kategori ?>">
            <input type="text" name="namakat" class="form-control" value="<?= $u->namakat ?>">
        </div>
    
        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Ubah</button>
        <a href="<?= base_url('pegawai/kategori') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

    <?php endforeach; ?>

</div>