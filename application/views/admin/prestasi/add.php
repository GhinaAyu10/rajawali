<div class="container-fluid">

    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-user"></i> Form Tambah Prestasi Siswa</h5>
    </div>

    <form method="post" enctype="multipart/form-data" action="<?= base_url('admin/prestasi/add_prestasi') ?>">
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
        <div class="form-group">
            <label>Nama Kompetisi</label>
            <input type="text" name="kompetisi" placeholder="Nama Kompetisi" class="form-control">
            <?= form_error('kompetisi', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="row form-group">
            <div class="col">
                <label>Juara</label>
                <input type="text" name="juara" placeholder="Masukkan Posisi Juara" class="form-control">
                <?= form_error('juara', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Tingkatan</label>
                <input type="text" name="tingkat" placeholder="Masukkan Tingkat Kompetisi" class="form-control">
                <?= form_error('tingkat', '<p class="text-danger small ml-3">') ?>
            </div>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="despres" placeholder="Masukkan Deskripsi" class="form-control">
            <?= form_error('despres', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="form-group">
            <label>Upload Sertifikat</label>
            <input type="file" name="filesertif" class="form-control">
            <?= form_error('filesertif', '<p class="text-danger small ml-3">') ?>
        </div>
    
        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Tambah</button>
        <a href="<?= base_url('admin/prestasi') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

</div>