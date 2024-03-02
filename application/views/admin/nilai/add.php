<div class="container-fluid">

    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-user"></i> Form Tambah Nilai Siswa</h5>
    </div>

    <form method="post" action="<?= base_url('admin/nilai/add_nilai') ?>">
        <div class="form-group">
            <label for="siswa">Nama Siswa</label>
            <select name="siswa" class="form-control">
                <option value="">-- Pilih Siswa --</option>
                <?php foreach($siswa as $n) : ?>
                    <option value="<?= $n->id_siswa ?>"><?= $n->namasis ?></option>
                <?php endforeach ?>
            </select>
            <?= form_error('siswa', '<div class="text-danger small ml-3">') ?>
        </div>

        <h3>PENGANTAR</h3>
        <div class="row form-group">
            <div class="col">
                <label>Pengenalan Lemdik</label>
                <input type="number" name="lemdik" class="form-control">
            </div>
            <div class="col">
                <label>Pola Kurikulum</label>
                <input type="number" name="polakur" class="form-control">
            </div>
            <div class="col">
                <label>Peraturan Urusan Dalam</label>
                <input type="number" name="perudal" class="form-control">
            </div>
            <div class="col">
                <label>Interpersonal Skill</label>
                <input type="number" name="interperson" class="form-control">
            </div>
        </div>
        
        <h3>PEMBINAAN KEPRIBADIAN</h3>
        <div class="row form-group">
            <div class="col">
                <label>Etika Profesi</label>
                <input type="number" name="etikapro" class="form-control">
            </div>
            <div class="col">
                <label>Tugas Pokok, Fungsi, dan Peranan Satpam</label>
                <input type="number" name="tugaspok" class="form-control">
            </div>
        </div>
        
        <h3>PENGETAHUAN DAN KETERAMPILAN</h3>
        <div class="row form-group">
            <div class="col">
                <label>Kemampuan Kepolisian Terbatas</label>
                <input type="number" name="kempolter" class="form-control">
            </div>
            <div class="col">
                <label>Beladiri</label>
                <input type="number" name="beladiri" class="form-control">
            </div>
            <div class="col">
                <label>Pengenalan Handak, Barang Berbahaya dan Latihan Menembak</label>
                <input type="number" name="phbbtembak" class="form-control">
            </div>
            <div class="col">
                <label>Pengetahuan Narkoba</label>
                <input type="number" name="narkoba" class="form-control">
            </div>
        </div>
        <div class="row form-group">
            <div class="col">
                <label>Penggunaan Tongkat Polri dan Borgol</label>
                <input type="number" name="gunatongkat" class="form-control">
            </div>
            <div class="col">
                <label>Pengetahuan Peraturan Baris Berbaris dan Penghormatan</label>
                <input type="number" name="barisbaris" class="form-control">
            </div>
            <div class="col">
                <label>Bahasa Inggris</label>
                <input type="number" name="binggris" class="form-control">
            </div>
            <div class="col">
                <label>Pengetahuan Keselamatan, Kesehatan Kerja dan Lingkungan</label>
                <input type="number" name="safety" class="form-control">
            </div>
        </div>
        <div class="row form-group">
            <div class="col">
                <label> Pengetahuan Dasar Komunikasi Radio dan Peralatan Security</label>
                <input type="number" name="radio" class="form-control">
            </div>
            <div class="col">
                <label>Pengetahuan Instansi Masing -masing</label>
                <input type="number" name="instansi" class="form-control">
            </div>
            <div class="col">
                <label>Pengaturan, Penjagaan, Pengawalan dan Patroli</label>
                <input type="number" name="patroli" class="form-control">
            </div>
            <div class="col">
                <label>Tindakan Pertama di Tempat Kejadian Perkara</label>
                <input type="number" name="tindakanawal" class="form-control">
            </div>
        </div>
        <div class="row form-group">
            <div class="col">
                <label>Pembuatan Laporan Informasi</label>
                <input type="number" name="pemblapor" class="form-control">
            </div>
            <div class="col">
                <label>Kemampuan Memberikan Pelayanan Prima</label>
                <input type="number" name="pelprima" class="form-control">
            </div>
            <div class="col">
                <label>Psikologi Massa</label>
                <input type="number" name="psikomas" class="form-control">
            </div>
            <div class="col">
                <label>Penangkapan dan Penggeledahan</label>
                <input type="number" name="tanggel" class="form-control">
            </div>
        </div>
        
        <h3>PERATURAN DAN PERUNDANG-UNDANGAN</h3>
        <div class="row form-group">
            <div class="col">
                <label>Kapita Selekta Hukum (KUHP, KUHP) dan Peraturan Lain</label>
                <input type="number" name="kuhp" class="form-control">
            </div>
            <div class="col">
                <label>Hak Asasi Manusia</label>
                <input type="number" name="ham" class="form-control">
            </div>
        </div>
        
        <h3>KESAMAPTAAN</h3>
        <div class="row form-group">
            <div class="col">
                <label>Pemeriksaan Kesehatan</label>
                <input type="number" name="kesehatan" class="form-control">
            </div>
            <div class="col">
                <label>Tes Kesamaptaan Jasmani</label>
                <input type="number" name="kesamaptaan" class="form-control">
            </div>
        </div>
        
        <h3>LAIN-LAIN</h3>
        <div class="row form-group">
            <div class="col">
                <label>Latihan Teknis</label>
                <input type="number" name="teknis" class="form-control">
            </div>
            <div class="col">
                <label>Pembekalan / Ceramah</label>
                <input type="number" name="ceramah" class="form-control">
            </div>
            <div class="col">
                <label>Upacara Buka / Tutup</label>
                <input type="number" name="upacara" class="form-control">
            </div>
        </div>
    
        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Tambah</button>
        <a href="<?= base_url('admin/nilai') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

</div>