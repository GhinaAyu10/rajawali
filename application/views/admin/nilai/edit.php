<div class="container-fluid">
    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-newspaper"></i> Form Edit Siswa</h5>
    </div>

    <?php foreach($nilai as $u) : ?>

    <form method="post" action="<?= base_url('admin/nilai/edit_nilai') ?>">
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
        <div class="row form-group">
            <div class="col">
                <label>Pengantar</label>
                <input type="text" name="pengantar" value="<?= $u->pengantar ?>" class="form-control">
                <?= form_error('pengantar', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Pribadi</label>
                <input type="text" name="pembpribadi" value="<?= $u->pembpribadi ?>" class="form-control">
                <?= form_error('pembpribadi', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Pengetahuan</label>
                <input type="text" name="pengetahuan" value="<?= $u->pengetahuan ?>" class="form-control">
                <?= form_error('pengetahuan', '<p class="text-danger small ml-3">') ?>
            </div>
        </div>
        <div class="row form-group">
            <div class="col">
                <label>Perundangan</label>
                <input type="text" name="perundangan" value="<?= $u->perundangan ?>" class="form-control">
                <?= form_error('perundangan', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Kesamaptaan</label>
                <input type="text" name="kesamaptaan" value="<?= $u->kesamaptaan ?>" class="form-control">
                <?= form_error('kesamaptaan', '<p class="text-danger small ml-3">') ?>
            </div>
        </div>
    
        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Ubah</button>
        <a href="<?= base_url('admin/nilai') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

    <?php endforeach; ?>

</div>