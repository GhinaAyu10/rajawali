<div class="container-fluid">

    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-user"></i> Form Tambah Siswa</h5>
    </div>

    <form method="post" action="<?= base_url('pegawai/siswa/add_siswa') ?>">
        <div class="form-group">
            <label>Nama Siswa</label>
            <input type="text" name="namasis" placeholder="Masukkan Nama Siswa" class="form-control">
            <?= form_error('namasis', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamatsis" placeholder="Masukkan Alamat" class="form-control">
            <?= form_error('alamatsis', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Telepon</label>
            <input type="number" name="telpsis" placeholder="Masukkan Telepon" class="form-control">
            <?= form_error('alamatsis', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="row form-group">
            <div class="col">
                <label for="angkatan">Tahun Angkatan</label>
                <select name="angkatan" class="form-control">
                    <option value="">-- Pilih Angkatan --</option>
                    <?php foreach($angkatan as $n) : ?>
                        <option value="<?= $n->id_angkatan ?>"><?= $n->namaakt ?></option>
                    <?php endforeach ?>
                </select>
                <?= form_error('angkatan', '<div class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>NIK</label>
                <input type="number" name="niksis" placeholder="Masukkan NIK" class="form-control">
                <?= form_error('niksis', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label for="jenissis">Jenis Siswa</label>
                <select name="jenissis" class="form-control">
                    <option value="">-- Pilih Jenis --</option>
                    <option value="KTA">KTA</option>
                    <option value="Ijazah">Ijazah</option>
                </select>
                <?= form_error('jenissis', '<p class="text-danger small ml-3">') ?>
            </div>
        </div>
        <div class="row form-group">
            <div class="col">
                <label>Tempat Lahir</label>
                <input type="text" name="tptlahirs" placeholder="Masukkan Tempat Lahir" class="form-control">
                <?= form_error('tptlahirs', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Tanggal Lahir</label>
                <input type="date" name="tgllahirs" placeholder="Masukkan Tanggal Lahir" class="form-control">
                <?= form_error('tgllahirs', '<p class="text-danger small ml-3">') ?>
            </div>
        </div>
        <div class="row form-group mb-5">
            <div class="col">
                <label>Jabatan</label>
                <input type="text" name="jabatansis" placeholder="Masukkan Jabatan" class="form-control">
                <?= form_error('jabatansis', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Perusahaan</label>
                <input type="text" name="perusahaansis" placeholder="Masukkan Perusahaan" class="form-control">
                <?= form_error('perusahaansis', '<p class="text-danger small ml-3">') ?>
            </div>
        </div>
    
        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Tambah</button>
        <a href="<?= base_url('pegawai/siswa') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

</div>