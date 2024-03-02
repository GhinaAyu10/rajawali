<div class="container-fluid">
    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-newspaper"></i> Form Edit Angkatan</h5>
    </div>

    <?php foreach($angkatan as $u) : ?>

    <form method="post" action="<?= base_url('admin/angkatan/edit_angkatan') ?>">
        <div class="form-group">
            <label>Nama Angkatan</label> 
            <input type="hidden" name="id_angkatan" value="<?= $u->id_angkatan ?>">
            <input type="text" name="namaakt" class="form-control" value="<?= $u->namaakt ?>">
        </div>
        <div class="form-group">
            <label>Tahun</label> 
            <input type="number" name="tahun" class="form-control" value="<?= $u->tahun ?>">
        </div>
    
        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Ubah</button>
        <a href="<?= base_url('admin/angkatan') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

    <?php endforeach; ?>

</div>