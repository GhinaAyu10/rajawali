<div class="container-fluid">
    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-newspaper"></i> Form Edit Pelajaran</h5>
    </div>

    <?php foreach($pelajaran as $u) : ?>

    <form method="post" action="<?= base_url('admin/pelajaran/edit_pelajaran') ?>">
        <div class="form-group">
            <label>Nama Pelajaran</label> 
            <input type="hidden" name="id_pelajaran" value="<?= $u->id_pelajaran ?>">
            <input type="text" name="namapel" class="form-control" value="<?= $u->namapel ?>">
        </div>
    
        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Ubah</button>
        <a href="<?= base_url('admin/pelajaran') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

    <?php endforeach; ?>

</div>