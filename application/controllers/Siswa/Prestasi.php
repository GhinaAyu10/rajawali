<?php

class Prestasi extends CI_Controller{

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
        $datab['prestasi'] = $this->samsat_model->join2Data('prestasi', 'siswa', 'siswa.id_siswa=prestasi.siswa')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebarsis', $datau);
        $this->load->view('siswa/prestasi/index', $datab);
        $this->load->view('templates/footer');
    }

}