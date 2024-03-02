<div class="container-fluid">

    <div class="alert alert-info mb-4" role="alert">
        <h5><i class="fas fa-fw fa-book"></i> Tambah Jadwal Kelas</h5>
    </div>

    <form method="post" action="<?= base_url('pegawai/jadwal/add_jadwal') ?>">
        <div class="row form-group mb-4">
            <div class="col">
                <label for="angkatan">Kelas / Angkatan</label>
                <select name="angkatan" class="form-control">
                    <option value="">-- Pilih Angkatan --</option>
                    <?php foreach($angkatan as $n) : ?>
                    <option value="<?= $n->id_angkatan ?>"><?= $n->namaakt ?></option>
                    <?php endforeach ?>
                </select>
                <?= form_error('angkatan', '<div class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label for="pelajaran">Mata Pelajaran</label>
                <select name="pelajaran" class="form-control">
                    <option value="">-- Pilih Pelajaran --</option>
                    <?php foreach($pelajaran as $n) : ?>
                    <option value="<?= $n->id_pelajaran ?>"><?= $n->namapel ?></option>
                    <?php endforeach ?>
                </select>
                <?= form_error('pelajaran', '<div class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label for="pengajar">Nama Pengajar</label>
                <select name="pengajar" class="form-control">
                    <option value="">-- Pilih Pengajar --</option>
                    <?php foreach($pengajar as $n) : ?>
                    <option value="<?= $n->id_pengajar ?>"><?= $n->namapgj ?></option>
                    <?php endforeach ?>
                </select>
                <?= form_error('pengajar', '<div class="text-danger small ml-3">') ?>
            </div>
        </div>
        <div class="row form-group mb-4">
            <div class="col">
                <label>Jadwal Dimulai Dari</label>
                <input type="datetime-local" name="darijam" placeholder="Masukkan Jadwal" class="form-control">
                <?= form_error('darijam', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Jadwal Berakhir Pada</label>
                <input type="datetime-local" name="sampaijam" placeholder="Masukkan Jadwal" class="form-control">
                <?= form_error('sampaijam', '<p class="text-danger small ml-3">') ?>
            </div>
        </div>

        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Tambah</button>
        <a href="<?= base_url('pegawai/jadwal') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

</div>