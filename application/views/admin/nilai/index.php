<div class="container-fluid">
    <div class="alert alert-success mb-4" role="alert">
        <h5><i class="fas fa-fw fa-user"></i> Daftar Nilai Siswa di PT. Rajawali Buana Indah Wiratama</h5>
    </div>

    <?= $this->session->flashdata('pesan') ?>

    <div class="row mb-2">
        <div class="col">
            <?= anchor('admin/nilai/add','<button class="btn btn-md btn-primary mb-3"><i class="fas fa-plus mr-1"></i> TAMBAH DATA</button>') ?>
        </div>
        <div class="row">
            <div class="col"><form action="<?= base_url('admin/nilai/print') ?>" method="post">
                <input style="width: 150px;" placeholder="Angkatan" class="form-control" type="text" onblur="(this.type='text')" name="akt">
            </div>
            <div class="col mr-3">
                <button type="submit" class="btn btn-success btn-normal"><i class="fas fa-print mr-2"></i>CETAK DATA</button>
                </form>
            </div>
        </div>
    </div>
    
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>PENGANTAR</th>
            <th>PRIBADI</th>
            <th>PENGETAHUAN</th>
            <th>PERUNDANGAN</th>
            <th>KESAMAPTAAN</th>
            <th>LAINNNYA</th>
            <th colspan="3">AKSI</th>
        </tr>

        <?php
        $no = 1;

        foreach($nilai as $u) : ?>

            <tr>
                <td width="20px"><?= $no++ ?></td>
                <td><?= $u->namasis ?></td>
                <td><?php
                    $a = $u->lemdik;
                    $b = $u->polakur; 
                    $c = $u->perudal; 
                    $d = $u->interperson; 
                    $z = ($a+$b+$c+$d)/4;
                    echo number_format(($z), 2); ?></td>
                <td><?php
                    $a = $u->etikapro;
                    $b = $u->tugaspok; 
                    $z = ($a+$b)/2;
                    echo number_format(($z), 2); ?></td>
                <td><?php
                    $a = $u->kempolter;
                    $b = $u->beladiri; 
                    $c = $u->phbbtembak;
                    $d = $u->narkoba; 
                    $e = $u->etikapro;
                    $f = $u->gunatongkat; 
                    $g = $u->barisbaris;
                    $h = $u->binggris; 
                    $i = $u->safety;
                    $j = $u->radio; 
                    $k = $u->instansi;
                    $l = $u->patroli; 
                    $m = $u->tindakanawal;
                    $n = $u->pemblapor; 
                    $o = $u->pelprima;
                    $p = $u->psikomas; 
                    $q = $u->tanggel; 
                    $z = ($a+$b+$c+$d+$e+$f+$g+$h+$i+$j+$k+$l+$m+$n+$o+$p+$q)/17;
                    echo number_format(($z), 2); ?></td>
                <td><?php
                    $a = $u->kuhp;
                    $b = $u->ham; 
                    $z = ($a+$b)/2; 
                    echo number_format(($z), 2); ?></td>
                <td><?php
                    $a = $u->kesehatan;
                    $b = $u->kesamaptaan; 
                    $z = ($a+$b)/2; 
                    echo number_format(($z), 2); ?></td>
                <td><?php
                    $a = $u->teknis;
                    $b = $u->ceramah; 
                    $c = $u->upacara; 
                    $z = ($a+$b+$c)/3; 
                    echo number_format(($z), 2); ?></td>
                <td width="20px"><?= anchor('admin/nilai/individu/'.$u->id_nilai,'<div class="btn btn-sm btn-success"><i class="fa fa-print"></i></div>') ?></td>
                <td width="20px"><?= anchor('admin/nilai/edit/'.$u->id_nilai,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                <td width="20px"><?= anchor('admin/nilai/delete/'.$u->id_nilai,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
            </tr>

        <?php endforeach ?>
    </table>

</div>