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
        $this->load->view('templates/sidebarsis', $datau);
        $this->load->view('siswa/nilai/index', $datab);
        $this->load->view('templates/footer');
    }

    public function individu($id)
    {
        $where = ['id_nilai' => $id];
        $data['nilai'] = $this->samsat_model->joinWhere2('nilai', 'siswa', 'angkatan',
        'siswa.id_siswa=nilai.siswa', 'angkatan.id_angkatan=siswa.angkatan', $where, $id)->row();
        
        $this->load->library('mypdf');
        $this->mypdf->generate('siswa/nilai/individu', $data, 'f4', 'portrait', 'Nilai Individu Siswa');
    }

}