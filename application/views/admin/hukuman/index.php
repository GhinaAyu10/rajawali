<div class="container-fluid">
    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-user"></i> Daftar Hukuman Siswa di PT. Rajawali Buana Indah Wiratama</h5>
    </div>

    <?= $this->session->flashdata('pesan') ?>

    <div class="row mb-2">
        <div class="col">
            <?= anchor('admin/hukuman/add','<button class="btn btn-md btn-primary mb-3"><i class="fas fa-plus mr-1"></i> TAMBAH DATA</button>') ?>
        </div>
        <div class="row">
            <div class="col mr-3">
                <?= anchor('admin/hukuman/print','<button class="btn btn-md btn-success mb-3"><i class="fas fa-print mr-1"></i> CETAK DATA</button>') ?>
            </div>
        </div>
        <div class="row ml-4 mr-4">
            <form method='post' action="<?= base_url('admin/hukuman/view') ?>">
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
            <th>PELANGGARAN</th>
            <th>DESKRIPSI</th>
            <th>HUKUMAN</th>
            <th colspan="2">AKSI</th>
        </tr>

        <?php
        $no = 1;

        foreach($result as $u) : ?>

            <tr>
                <td width="20px"><?= $no++ ?></td>
                <td><?= $u['namasis'] ?></td>
                <td><?= $u['niksis'] ?></td>
                <td><?= $u['pelanggaran'] ?></td>
                <td><?= $u['deskripsi'] ?></td>
                <td><?= $u['hukumakhir'] ?></td>
                <td width="20px"><?= anchor('admin/hukuman/edit/'.$u['id_hukuman'],'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                <td width="20px"><?= anchor('admin/hukuman/delete/'.$u['id_hukuman'],'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
            </tr>

        <?php endforeach ?>
    </table>

</div>