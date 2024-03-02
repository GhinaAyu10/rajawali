<div class="container-fluid">

    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-user"></i> Form Tambah User</h5>
    </div>

    <form method="post" action="<?= base_url('admin/pengguna/add_users') ?>">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan Username" class="form-control">
            <?= form_error('username', '<p class="text-danger small ml-3">') ?>
        </div>
        <div class="row form-group">
            <div class="col">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan Password" class="form-control">
                <?= form_error('password', '<p class="text-danger small ml-3">') ?>
            </div>
            <div class="col mb-5">
                <label for="level">Level</label>
                <select name="level" class="form-control">
                    <option value="">-- Pilih Level User --</option>
                    <option value="Admin">Admin</option>
                    <option value="Pegawai">Pegawai</option>
                    <option value="Pengajar">Pengajar</option>
                    <option value="Siswa">Siswa</option>
                </select>
                <?= form_error('level', '<p class="text-danger small ml-3">') ?>
            </div>
        </div>
    
        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Tambah</button>
        <a href="<?= base_url('admin/pengguna') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

</div>