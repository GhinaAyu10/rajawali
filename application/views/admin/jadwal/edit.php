<div class="container-fluid">
    <div class="alert alert-info mb-4" role="alert">
        <h5><i class="fas fa-fw fa-newspaper"></i> Edit Jadwal Kelas</h5>
    </div>

    <?php foreach($jadwal as $d) : ?>

    <form method="post" action="<?= base_url('admin/jadwal/edit_jadwal') ?>">
        <div class="row form-group mb-4">
            <div class="col">
                <label for="angkatan">Kelas / Angkatan</label>
                <select name="angkatan" class="form-control">
                    <option value="">-- Pilih Angkatan --</option>
                    <?php foreach($angkatan as $n) : ?>
                        <option value="<?= $n->id_angkatan ?>" <?= $d->angkatan === $n->id_angkatan ? 'selected' : '' ?>><?= $n->namaakt ?></option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('angkatan', '<div class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label for="pelajaran">Mata Pelajaran</label>
                <select name="pelajaran" class="form-control">
                    <option value="">-- Pilih Lemari --</option>
                    <?php foreach($pelajaran as $n) : ?>
                        <option value="<?= $n->id_pelajaran ?>" <?= $d->pelajaran === $n->id_pelajaran ? 'selected' : '' ?>><?= $n->namapel ?></option>
                    <?php endforeach ?>
                </select>
                <?= form_error('pelajaran', '<div class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label for="pengajar">Nama Pengajar</label>
                <select name="pengajar" class="form-control">
                    <option value="">-- Pilih Pengajar --</option>
                    <?php foreach($pengajar as $n) : ?>
                        <option value="<?= $n->id_pengajar ?>" <?= $d->pengajar === $n->id_pengajar ? 'selected' : '' ?>><?= $n->namapgj ?></option>
                    <?php endforeach ?>
                </select>
                <?= form_error('pengajar', '<div class="text-danger small ml-3">') ?>
            </div>
        </div>
        <div class="row form-group mb-4">
            <div class="col">
                <label>Jadwal Dimulai Dari</label>
                <input type="datetime-local" name="darijam" value="<?= $d->darijam ?>" class="form-control">
                <?= form_error('darijam', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Jadwal Berakhir Pada</label>
                <input type="datetime-local" name="sampaijam" value="<?= $d->sampaijam ?>" class="form-control">
                <?= form_error('sampaijam', '<p class="text-danger small ml-3">') ?>
            </div>
        </div>
        <input type="hidden" name="id_jadwal" value="<?= $d->id_jadwal ?>">
    
        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Ubah</button>
        <a href="<?= base_url('admin/jadwal') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

    <?php endforeach; ?>

</div>