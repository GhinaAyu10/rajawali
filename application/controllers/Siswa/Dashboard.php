<?php

class Dashboard extends CI_Controller{

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
        $data = $this->user_model->getDataUser($this->session->userdata['username']);
        $data = [
            'id_users'   => $data->id_users,
            'username'  =>  $data->username,
            'level'  =>  $data->level,
        ];

        $this->load->view('templates/header');
        $this->load->view('templates/sidebarsis', $data);
        $this->load->view('siswa/dashboard', $data);
        $this->load->view('templates/footer');
    }

}