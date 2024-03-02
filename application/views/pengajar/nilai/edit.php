<div class="container-fluid">
    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-newspaper"></i> Form Edit Siswa</h5>
    </div>

    <?php foreach($nilai as $u) : ?>

    <form method="post" action="<?= base_url('pengajar/nilai/edit_nilai') ?>">
        <input type="hidden" name="id_nilai" value="<?= $u->id_nilai ?>">
        <div class="row form-group mr-1 ml-1">
            <label for="siswa">Nama Siswa</label>
            <select name="siswa" class="form-control">
                <option value="">-- Pilih Siswa --</option>
                <?php foreach($siswa as $n) : ?>
                    <option value="<?= $n->id_siswa ?>" <?= $u->siswa === $n->id_siswa ? 'selected' : '' ?>><?= $n->namasis ?></option>
                <?php endforeach ?>
            </select>
            <?= form_error('siswa', '<div class="text-danger small ml-3">') ?>
        </div><br>

        <h3>PENGANTAR</h3>
        <div class="row form-group">
            <div class="col">
                <label>Pengenalan Lemdik</label>
                <input type="number" name="lemdik" value="<?= $u->lemdik ?>" class="form-control">
                <?= form_error('lemdik', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Pola Kurikulum</label>
                <input type="number" name="polakur" value="<?= $u->polakur ?>" class="form-control">
                <?= form_error('polakur', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Peraturan Urusan Dalam</label>
                <input type="number" name="perudal" value="<?= $u->perudal ?>" class="form-control">
                <?= form_error('perudal', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Interpersonal Skill</label>
                <input type="number" name="interperson" value="<?= $u->interperson ?>" class="form-control">
                <?= form_error('interperson', '<p class="text-danger small ml-3">') ?>
            </div>
        </div><br>

        <h3>PEMBINAAN KEPRIBADIAN</h3>
        <div class="row form-group">
            <div class="col">
                <label>Etika Profesi</label>
                <input type="number" name="etikapro" value="<?= $u->etikapro ?>" class="form-control">
                <?= form_error('etikapro', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Tugas Pokok, Fungsi, dan Peranan Satpam</label>
                <input type="number" name="tugaspok" value="<?= $u->tugaspok ?>" class="form-control">
                <?= form_error('tugaspok', '<p class="text-danger small ml-3">') ?>
            </div>
        </div><br>

        <h3>PENGETAHUAN DAN KETERAMPILAN</h3>
        <div class="row form-group">
            <div class="col">
                <label>Kemampuan Kepolisian Terbatas</label>
                <input type="number" name="kempolter" value="<?= $u->kempolter ?>" class="form-control">
                <?= form_error('kempolter', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Beladiri</label>
                <input type="number" name="beladiri" value="<?= $u->beladiri ?>" class="form-control">
                <?= form_error('beladiri', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Pengenalan Handak, Barang Berbahaya dan Latihan Menembak</label>
                <input type="number" name="phbbtembak" value="<?= $u->phbbtembak ?>" class="form-control">
                <?= form_error('phbbtembak', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Pengetahuan Narkoba</label>
                <input type="number" name="narkoba" value="<?= $u->narkoba ?>" class="form-control">
                <?= form_error('narkoba', '<p class="text-danger small ml-3">') ?>
            </div>
        </div>
        <div class="row form-group">
            <div class="col">
                <label>Penggunaan Tongkat Polri dan Borgol</label>
                <input type="number" name="gunatongkat" value="<?= $u->gunatongkat ?>" class="form-control">
                <?= form_error('gunatongkat', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Pengetahuan Peraturan Baris Berbaris dan Penghormatan</label>
                <input type="number" name="barisbaris" value="<?= $u->barisbaris ?>" class="form-control">
                <?= form_error('barisbaris', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Bahasa Inggris</label>
                <input type="number" name="binggris" value="<?= $u->binggris ?>" class="form-control">
                <?= form_error('binggris', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Pengetahuan Keselamatan, Kesehatan Kerja dan Lingkungan</label>
                <input type="number" name="safety" value="<?= $u->safety ?>" class="form-control">
                <?= form_error('safety', '<p class="text-danger small ml-3">') ?>
            </div>
        </div>
        <div class="row form-group">
            <div class="col">
                <label> Pengetahuan Dasar Komunikasi Radio dan Peralatan Security</label>
                <input type="number" name="radio" value="<?= $u->radio ?>" class="form-control">
                <?= form_error('radio', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Pengetahuan Instansi Masing -masing</label>
                <input type="number" name="instansi" value="<?= $u->instansi ?>" class="form-control">
                <?= form_error('instansi', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Pengaturan, Penjagaan, Pengawalan dan Patroli</label>
                <input type="number" name="patroli" value="<?= $u->patroli ?>" class="form-control">
                <?= form_error('patroli', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Tindakan Pertama di Tempat Kejadian Perkara</label>
                <input type="number" name="tindakanawal" value="<?= $u->tindakanawal ?>" class="form-control">
                <?= form_error('tindakanawal', '<p class="text-danger small ml-3">') ?>
            </div>
        </div>
        <div class="row form-group">
            <div class="col">
                <label>Pembuatan Laporan Informasi</label>
                <input type="number" name="pemblapor" value="<?= $u->pemblapor ?>" class="form-control">
                <?= form_error('pemblapor', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Kemampuan Memberikan Pelayanan Prima</label>
                <input type="number" name="pelprima" value="<?= $u->pelprima ?>" class="form-control">
                <?= form_error('pelprima', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Psikologi Massa</label>
                <input type="number" name="psikomas" value="<?= $u->psikomas ?>" class="form-control">
                <?= form_error('psikomas', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Penangkapan dan Penggeledahan</label>
                <input type="number" name="tanggel" value="<?= $u->tanggel ?>" class="form-control">
                <?= form_error('tanggel', '<p class="text-danger small ml-3">') ?>
            </div>
        </div><br>

        <h3>PERATURAN DAN PERUNDANG-UNDANGAN</h3>
        <div class="row form-group">
            <div class="col">
                <label>Kapita Selekta Hukum (KUHP, KUHP) dan Peraturan Lain</label>
                <input type="number" name="kuhp" value="<?= $u->kuhp ?>" class="form-control">
                <?= form_error('kuhp', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Hak Asasi Manusia</label>
                <input type="number" name="ham" value="<?= $u->ham ?>" class="form-control">
                <?= form_error('ham', '<p class="text-danger small ml-3">') ?>
            </div>
        </div><br>

        <h3>KESAMAPTAAN</h3>
        <div class="row form-group">
            <div class="col">
                <label>Pemeriksaan Kesehatan</label>
                <input type="number" name="kesehatan" value="<?= $u->kesehatan ?>" class="form-control">
                <?= form_error('kesehatan', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Tes Kesamaptaan Jasmani</label>
                <input type="number" name="kesamaptaan" value="<?= $u->kesamaptaan ?>" class="form-control">
                <?= form_error('kesamaptaan', '<p class="text-danger small ml-3">') ?>
            </div>
        </div><br>

        <h3>LAIN-LAIN</h3>
        <div class="row form-group mb-4">
            <div class="col">
                <label>Latihan Teknis</label>
                <input type="number" name="teknis" value="<?= $u->teknis ?>" class="form-control">
                <?= form_error('teknis', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Pembekalan / Ceramah</label>
                <input type="number" name="ceramah" value="<?= $u->ceramah ?>" class="form-control">
                <?= form_error('ceramah', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Upacara Buka / Tutup</label>
                <input type="number" name="upacara" value="<?= $u->upacara ?>" class="form-control">
                <?= form_error('upacara', '<p class="text-danger small ml-3">') ?>
            </div>
        </div><br>
    
        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Ubah</button>
        <a href="<?= base_url('pengajar/nilai') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center><br>
    </form>

    <?php endforeach; ?>

</div>