<?php

class Nilai extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        if(!isset($this->session->userdata['username'])) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Maaf, Anda belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $datab['nilai'] = $this->samsat_model->join3Data('nilai', 'siswa', 'angkatan',
        'siswa.id_siswa=nilai.siswa', 'angkatan.id_angkatan=siswa.angkatan')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebarpgj', $datau);
        $this->load->view('pengajar/nilai/index', $datab);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $datab['siswa'] = $this->samsat_model->getData('siswa')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebarpgj', $datau);
        $this->load->view('pengajar/nilai/add', $datab);
        $this->load->view('templates/footer');
    }

    public function add_nilai()
    {
            $data = [
                'siswa'         => $this->input->post('siswa', true),
                'lemdik'        => $this->input->post('lemdik', true),
                'polakur'       => $this->input->post('polakur', true),
                'perudal'       => $this->input->post('perudal', true),
                'interperson'   => $this->input->post('interperson', true),
                'etikapro'      => $this->input->post('etikapro', true),
                'tugaspok'      => $this->input->post('tugaspok', true),
                'kempolter'     => $this->input->post('kempolter', true),
                'beladiri'      => $this->input->post('beladiri', true),
                'phbbtembak'    => $this->input->post('phbbtembak', true),
                'narkoba'       => $this->input->post('narkoba', true),
                'gunatongkat'   => $this->input->post('gunatongkat', true),
                'barisbaris'    => $this->input->post('barisbaris', true),
                'binggris'      => $this->input->post('binggris', true),
                'safety'        => $this->input->post('safety', true),
                'radio'         => $this->input->post('radio', true),
                'instansi'      => $this->input->post('instansi', true),
                'patroli'       => $this->input->post('patroli', true),
                'tindakanawal'  => $this->input->post('tindakanawal', true),
                'pemblapor'     => $this->input->post('pemblapor', true),
                'pelprima'      => $this->input->post('pelprima', true),
                'psikomas'      => $this->input->post('psikomas', true),
                'tanggel'       => $this->input->post('tanggel', true),
                'kuhp'          => $this->input->post('kuhp', true),
                'ham'           => $this->input->post('ham', true),
                'kesehatan'     => $this->input->post('kesehatan', true),
                'kesamaptaan'   => $this->input->post('kesamaptaan', true),
                'teknis'        => $this->input->post('teknis', true),
                'ceramah'       => $this->input->post('ceramah', true),
                'upacara'       => $this->input->post('upacara', true),
            ];

            $this->samsat_model->addData('nilai', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Nilai berhasil ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('pengajar/nilai');
    }

    public function edit($id)
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $where = ['id_nilai' => $id];
        $datab['nilai'] = $this->samsat_model->edit($where, 'nilai')->result();
        $datac['siswa'] = $this->samsat_model->getData('siswa')->result();
        $data = array_merge($datab, $datac);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebarpgj', $datau);
        $this->load->view('pengajar/nilai/edit', $data);
        $this->load->view('templates/footer');
    }

    public function edit_nilai()
    {
        $data = [
            'siswa'         => $this->input->post('siswa', true),
            'lemdik'        => $this->input->post('lemdik', true),
            'polakur'       => $this->input->post('polakur', true),
            'perudal'       => $this->input->post('perudal', true),
            'interperson'   => $this->input->post('interperson', true),
            'etikapro'      => $this->input->post('etikapro', true),
            'tugaspok'      => $this->input->post('tugaspok', true),
            'kempolter'     => $this->input->post('kempolter', true),
            'beladiri'      => $this->input->post('beladiri', true),
            'phbbtembak'    => $this->input->post('phbbtembak', true),
            'narkoba'       => $this->input->post('narkoba', true),
            'gunatongkat'   => $this->input->post('gunatongkat', true),
            'barisbaris'    => $this->input->post('barisbaris', true),
            'binggris'      => $this->input->post('binggris', true),
            'safety'        => $this->input->post('safety', true),
            'radio'         => $this->input->post('radio', true),
            'instansi'      => $this->input->post('instansi', true),
            'patroli'       => $this->input->post('patroli', true),
            'tindakanawal'  => $this->input->post('tindakanawal', true),
            'pemblapor'     => $this->input->post('pemblapor', true),
            'pelprima'      => $this->input->post('pelprima', true),
            'psikomas'      => $this->input->post('psikomas', true),
            'tanggel'       => $this->input->post('tanggel', true),
            'kuhp'          => $this->input->post('kuhp', true),
            'ham'           => $this->input->post('ham', true),
            'kesehatan'     => $this->input->post('kesehatan', true),
            'kesamaptaan'   => $this->input->post('kesamaptaan', true),
            'teknis'        => $this->input->post('teknis', true),
            'ceramah'       => $this->input->post('ceramah', true),
            'upacara'       => $this->input->post('upacara', true),
        ];

        $where = [
            'id_nilai' => $this->input->post('id_nilai', true),
        ];

        $this->samsat_model->editData($where, $data, 'nilai');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Nilai berhasil diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('pengajar/nilai');
    }

    public function delete($id)
    {
        $where = ['id_nilai' => $id];
        $this->samsat_model->deleteData($where, 'nilai');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Nilai berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('pengajar/nilai');
    }

    public function print()
    {
        $angkatan = $this->input->post('akt');

        if($angkatan != null)
        {
            $data['nilai'] = $this->samsat_model->printNilai($angkatan);
            $data['nilai'] = $this->samsat_model->join3Data('nilai', 'siswa', 'angkatan',
            'siswa.id_siswa=nilai.siswa', 'angkatan.id_angkatan=siswa.angkatan')->result();
        } else {
            $data['nilai'] = $this->samsat_model->join3Data('nilai', 'siswa', 'angkatan',
            'siswa.id_siswa=nilai.siswa', 'angkatan.id_angkatan=siswa.angkatan')->result();
        }

        $this->load->library('mypdf');
        $this->mypdf->generate('pengajar/nilai/print', $data, 'a4', 'portrait', 'Laporan Daftar Nilai Siswa');
    }

    public function individu($id)
    {
        $where = ['id_nilai' => $id];
        $data['nilai'] = $this->samsat_model->joinWhere2('nilai', 'siswa', 'angkatan',
        'siswa.id_siswa=nilai.siswa', 'angkatan.id_angkatan=siswa.angkatan', $where, $id)->row();
        
        $this->load->library('mypdf');
        $this->mypdf->generate('pengajar/nilai/individu', $data, 'f4', 'portrait', 'Nilai Individu Siswa');
    }

}