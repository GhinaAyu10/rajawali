<div class="container-fluid">
    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-newspaper"></i> Form Edit Lokasi Arsip</h5>
    </div>

    <?php foreach($lokasi as $u) : ?>

    <form method="post" action="<?= base_url('pegawai/lokasi/edit_lokasi') ?>">
        <div class="form-group">
            <label>Nama Lokasi</label> 
            <input type="hidden" name="id_lokasi" value="<?= $u->id_lokasi ?>">
            <input type="text" name="namalok" class="form-control" value="<?= $u->namalok ?>">
        </div>
    
        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Ubah</button>
        <a href="<?= base_url('pegawai/lokasi') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

    <?php endforeach; ?>

</div>