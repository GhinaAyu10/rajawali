<div class="container-fluid">
    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-newspaper"></i> Form Edit Lemari Arsip</h5>
    </div>

    <?php foreach($lemari as $u) : ?>

    <form method="post" action="<?= base_url('pegawai/lemari/edit_lemari') ?>">
        <div class="form-group">
            <label>Nama Lemari</label> 
            <input type="hidden" name="id_lemari" value="<?= $u->id_lemari ?>">
            <input type="text" name="namalemari" class="form-control" value="<?= $u->namalemari ?>">
        </div>
    
        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Ubah</button>
        <a href="<?= base_url('pegawai/lemari') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

    <?php endforeach; ?>

</div>