<?php

class Pengguna extends CI_Controller{

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
        $datab['pengguna'] = $this->samsat_model->getData('pengguna')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebara', $datau);
        $this->load->view('admin/pengguna/index', $datab);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $datab = [
            'username'  => set_value('username'),
            'password'  => set_value('password'),
            'level'     => set_value('level'),
        ];

        $this->load->view('templates/header');
        $this->load->view('templates/sidebara', $datau);
        $this->load->view('admin/pengguna/add', $datab);
        $this->load->view('templates/footer');
    }

    public function add_users()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->add();
        } else {
            $data = [
                'username'      => $this->input->post('username', true),
                'password'      => $this->input->post('password', true),
                'level'         => $this->input->post('level', true),
            ];

            $this->samsat_model->addData('pengguna', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Akun berhasil ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/pengguna');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('level', 'level', 'required');
    }

    public function edit($id)
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $where = ['id_users' => $id];
        $datab['pengguna'] = $this->samsat_model->edit($where, 'pengguna')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebara', $datau);
        $this->load->view('admin/pengguna/edit', $datab);
        $this->load->view('templates/footer');
    }

    public function edit_users()
    {
        $data = [
            'username'      => $this->input->post('username', true),
            'password'      => $this->input->post('password', true),
            'level'         => $this->input->post('level', true),
        ];

        $where = [
            'id_users' => $this->input->post('id_users', true),
        ];

        $this->samsat_model->editData($where, $data, 'pengguna');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Akun berhasil diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/pengguna');
    }

    public function delete($id)
    {
        $where = ['id_users' => $id];
        $this->samsat_model->deleteData($where, 'pengguna');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Akun berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/pengguna');
    }

    public function print()
    {
        $data['pengguna'] = $this->samsat_model->getData('pengguna')->result();

        $this->load->library('mypdf');
        $this->mypdf->generate('admin/pengguna/print', $data, 'a4', 'portrait', 'Laporan Daftar Pengguna');
    }

}