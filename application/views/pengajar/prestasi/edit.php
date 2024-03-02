<div class="container-fluid">
    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-newspaper"></i> Form Edit Prestasi Siswa</h5>
    </div>

    <?php foreach($prestasi as $u) : ?>

    <form method="post" enctype="multipart/form-data" action="<?= base_url('pengajar/prestasi/edit_prestasi') ?>">
        <div class="row form-group mr-1 ml-1">
            <label for="siswa">Nama Siswa</label>
            <select name="siswa" class="form-control">
                <option value="">-- Pilih Siswa --</option>
                <?php foreach($siswa as $n) : ?>
                    <option value="<?= $n->id_siswa ?>" <?= $u->siswa === $n->id_siswa ? 'selected' : '' ?>><?= $n->namasis ?></option>
                <?php endforeach ?>
            </select>
            <?= form_error('siswa', '<div class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Nama Kompetisi</label>
            <input type="text" name="kompetisi" value="<?= $u->kompetisi ?>" class="form-control">
            <?= form_error('kompetisi', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="row form-group">
            <div class="col">
                <label>Juara</label>
                <input type="text" name="juara" value="<?= $u->juara ?>" class="form-control">
                <?= form_error('juara', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Tingkatan</label>
                <input type="text" name="tingkat" value="<?= $u->tingkat ?>" class="form-control">
                <?= form_error('tingkat', '<p class="text-danger small ml-3">') ?>
            </div>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="despres" value="<?= $u->despres ?>" class="form-control">
            <?= form_error('despres', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Upload Sertifikat</label>
            <input type="file" name="filesertif" value="<?= $u->filesertif ?>" class="form-control">
            <?= form_error('filesertif', '<p class="text-danger small ml-3">') ?>
        </div>
        <input type="hidden" name="id_prestasi" value="<?= $u->id_prestasi ?>">
    
        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Ubah</button>
        <a href="<?= base_url('pengajar/prestasi') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

    <?php endforeach; ?>

</div>