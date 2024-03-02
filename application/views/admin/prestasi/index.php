<div class="container-fluid">
    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-user"></i> Daftar Prestasi Siswa di PT. Rajawali Buana Indah Wiratama</h5>
    </div>

    <?= $this->session->flashdata('pesan') ?>

    <div class="row mb-2">
        <div class="col">
            <?= anchor('admin/prestasi/add','<button class="btn btn-md btn-primary mb-3"><i class="fas fa-plus mr-1"></i> TAMBAH DATA</button>') ?>
        </div>
        <div class="row">
            <div class="col mr-3">
                <?= anchor('admin/prestasi/print','<button class="btn btn-md btn-success mb-3"><i class="fas fa-print mr-1"></i> CETAK DATA</button>') ?>
            </div>
        </div>
        <div class="row ml-4 mr-4">
            <form method='post' action="<?= base_url('admin/prestasi/view') ?>">
              <div class="input-group no-border">
                <input type="text" name="search" value="" class="form-control" placeholder="Search...">
                <input type='hidden' name="submit" value="Submit">
              </div>
            </form>
        </div>
    </div>
    
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>NIK</th>
            <th>KOMPETISI</th>
            <th>JUARA</th>
            <th>TINGKAT</th>
            <th>DESKRIPSI</th>
            <th colspan="3">AKSI</th>
        </tr>

        <?php
        $no = 1;

        foreach($result as $u) : ?>

            <tr>
                <td width="20px"><?= $no++ ?></td>
                <td><?= $u['namasis'] ?></td>
                <td><?= $u['niksis'] ?></td>
                <td><?= $u['kompetisi'] ?></td>
                <td><?= $u['juara'] ?></td>
                <td><?= $u['tingkat'] ?></td>
                <td><?= $u['despres'] ?></td>
                <td width="15px"><a href="<?= base_url(); ?>uploads/<?= $u['filesertif'] ?>"><div class="btn btn-sm btn-success"><i class="fa fa-download"></i></div></a></td>
                <td width="15px"><?= anchor('admin/prestasi/edit/'.$u['id_prestasi'],'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                <td width="15px"><?= anchor('admin/prestasi/delete/'.$u['id_prestasi'],'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
            </tr>

        <?php endforeach ?>
    </table>

</div>