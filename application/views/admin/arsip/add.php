<div class="container-fluid">

    <div class="alert alert-info mb-4" role="alert">
        <h5><i class="fas fa-fw fa-book"></i> Tambah Arsip Digital</h5>
    </div>

    <form method="post" enctype="multipart/form-data" action="<?= base_url('admin/arsip/add_arsip') ?>">
        <div class="form-group">
            <label>Nama Arsip</label>
            <input type="text" name="namaarsip" placeholder="Masukkan Nama Arsip" class="form-control">
            <?= form_error('namaarsip', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="row form-group mb-4">
            <div class="col">
                <label for="lokasi">Lokasi Arsip</label>
                <select name="lokasi" class="form-control">
                    <option value="">-- Pilih Lokasi --</option>
                    <?php foreach($lokasi as $n) : ?>
                    <option value="<?= $n->id_lokasi ?>"><?= $n->namalok ?></option>
                    <?php endforeach ?>
                </select>
                <?= form_error('lokasi', '<div class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label for="lemari">Lemari Arsip</label>
                <select name="lemari" class="form-control">
                    <option value="">-- Pilih Lemari --</option>
                    <?php foreach($lemari as $n) : ?>
                    <option value="<?= $n->id_lemari ?>"><?= $n->namalemari ?></option>
                    <?php endforeach ?>
                </select>
                <?= form_error('lemari', '<div class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label for="kategori">Kategori Arsip</label>
                <select name="kategori" class="form-control">
                    <option value="">-- Pilih Kategori --</option>
                    <?php foreach($kategori as $n) : ?>
                    <option value="<?= $n->id_kategori ?>"><?= $n->namakat ?></option>
                    <?php endforeach ?>
                </select>
                <?= form_error('kategori', '<div class="text-danger small ml-3">') ?>
            </div>
        </div>
        <div class="row form-group mb-4">
            <div class="col">
                <label>Nomor Rak</label>
                <input type="text" name="no_rak" placeholder="Masukkan Nomor Rak" class="form-control">
                <?= form_error('no_rak', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Nomor Box</label>
                <input type="text" name="no_box" placeholder="Masukkan Nomor Box" class="form-control">
                <?= form_error('no_box', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col">
                <label>Nomor Map</label>
                <input type="text" name="no_map" placeholder="Masukkan Nomor Map" class="form-control">
                <?= form_error('no_map', '<p class="text-danger small ml-3">') ?>
            </div>
        </div>
        <div class="form-group">
            <label>File Arsip</label>
            <input type="file" name="filearsip" placeholder="Masukkan File Arsip" class="form-control">
            <?= form_error('filearsip', '<p class="text-danger small ml-3">') ?>
        </div>
        <input type="hidden" name="tglarsip" value="<?php echo date("Y-m-d"); ?>">
        <!-- <input type="hidden" name="users" value="<?= $id_users ?>"> -->
        <input type="hidden" name="users" value="1">

        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Tambah</button>
        <a href="<?= base_url('admin/arsip') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

</div>