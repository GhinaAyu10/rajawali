<div class="container-fluid">
    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-newspaper"></i> Form Edit Biaya</h5>
    </div>

    <?php foreach($biaya as $u) : ?>

    <form method="post" action="<?= base_url('admin/biaya/edit_biaya') ?>">
        <div class="form-group">
            <label>Nama Biaya</label> 
            <input type="hidden" name="id_biaya" value="<?= $u->id_biaya ?>">
            <input type="text" name="namabi" class="form-control" value="<?= $u->namabi ?>">
        </div>
        <div class="form-group">
            <label>Jumlah Biaya</label> 
            <input type="number" name="jumlahbi" class="form-control" value="<?= $u->jumlahbi ?>">
        </div>
    
        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Ubah</button>
        <a href="<?= base_url('admin/biaya') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

    <?php endforeach; ?>

</div>