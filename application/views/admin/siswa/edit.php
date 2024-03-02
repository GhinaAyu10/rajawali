<div class="container-fluid">
    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-newspaper"></i> Form Edit Siswa</h5>
    </div>

    <?php foreach($siswa as $u) : ?>

    <form method="post" action="<?= base_url('admin/siswa/edit_siswa') ?>">
        <div class="form-group">
            <label>Nama Siswa</label>
            <input type="hidden" name="id_siswa" value="<?= $u->id_siswa ?>">
            <input type="text" name="namasis" value="<?= $u->namasis ?>" class="form-control">
            <?= form_error('namasis', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamatsis" value="<?= $u->alamatsis ?>" class="form-control">
            <?= form_error('alamatsis', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Telepon</label>
            <input type="number" name="telpsis" value="<?= $u->telpsis ?>" class="form-control">
            <?= form_error('alamatsis', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="row form-group">
            <div class="col">
                <label for="angkatan">Tahun Angkatan</label>
                <select name="angkatan" class="form-control">
                    <option value="">-- Pilih Siswa --</option>
                    <?php foreach($angkatan as $n) : ?>
                        <option value="<?= $n->id_angkatan ?>" <?= $u->angkatan === $n->id_angkatan ? 'selected' : '' ?>><?= $n->namaakt ?></option>
                    <?php endforeach ?>
                </select>
                <?= form_error('angkatan', '<div class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>NIK</label>
                <input type="number" name="niksis" value="<?= $u->niksis ?>" class="form-control">
                <?= form_error('niksis', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label for="jenissis">Jenis Siswa</label>
                <select name="jenissis" class="form-control">
                    <option value="">-- Pilih Jenis --</option>
                    <option value="KTA" <?= 'KTA' === $u->jenissis ? 'selected' : '' ?>>KTA</option>
                    <option value="Ijazah" <?= 'Ijazah' === $u->jenissis ? 'selected' : '' ?>>Ijazah</option>
                </select>
                <?= form_error('jenissis', '<p class="text-danger small ml-3">') ?>
            </div>
        </div>
        <div class="row form-group">
            <div class="col">
                <label>Tempat Lahir</label>
                <input type="text" name="tptlahirs" value="<?= $u->tptlahirs ?>" class="form-control">
                <?= form_error('tptlahirs', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Tanggal Lahir</label>
                <input type="date" name="tgllahirs" value="<?= $u->tgllahirs ?>" class="form-control">
                <?= form_error('tgllahirs', '<p class="text-danger small ml-3">') ?>
            </div>
        </div>
        <div class="row form-group mb-5">
            <div class="col">
                <label>Jabatan</label>
                <input type="text" name="jabatansis" value="<?= $u->jabatansis ?>" class="form-control">
                <?= form_error('jabatansis', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Perusahaan</label>
                <input type="text" name="perusahaansis" value="<?= $u->perusahaansis ?>" class="form-control">
                <?= form_error('perusahaansis', '<p class="text-danger small ml-3">') ?>
            </div>
        </div>
    
        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Ubah</button>
        <a href="<?= base_url('admin/siswa') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

    <?php endforeach; ?>

</div>