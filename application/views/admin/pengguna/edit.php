<div class="container-fluid">
    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-newspaper"></i> Form Edit User</h5>
    </div>

    <?php foreach($pengguna as $u) : ?>

    <form method="post" action="<?= base_url('admin/pengguna/edit_users') ?>">
        <div class="form-group">
            <label>Username</label> 
            <input type="hidden" name="id_users" value="<?= $u->id_users ?>">
            <input type="text" name="username" class="form-control" value="<?= $u->username ?>">
        </div>
        <div class="row form-group mb-5">
            <div class="col">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?= $u->password ?>">
            </div>
            <div class="col">
                <label for="level">Level</label>
                <select name="level" class="form-control">
                    <option value="Admin" <?= 'Admin' === $u->level ? 'selected' : '' ?>>Admin</option>
                    <option value="Pegawai" <?= 'Pegawai' === $u->level ? 'selected' : '' ?>>Pegawai</option>
                    <option value="Pengajar" <?= 'Pengajar' === $u->level ? 'selected' : '' ?>>Pengajar</option>
                    <option value="Siswa" <?= 'Siswa' === $u->level ? 'selected' : '' ?>>Siswa</option>
                </select>
            </div>
        </div>
    
        <center><button type="submit" style="width: 180px;" class="btn btn-primary mr-4">Ubah</button>
        <a href="<?= base_url('admin/pengguna') ?>" style="width: 180px;" class="btn btn-danger">Kembali</a></center>
    </form>

    <?php endforeach; ?>

</div>