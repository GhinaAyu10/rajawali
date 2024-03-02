<?php

class Kategori extends CI_Controller{

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
        $datab['kategori'] = $this->samsat_model->getData('kategori')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebarpgw', $datau);
        $this->load->view('pegawai/kategori/index', $datab);
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
        $this->load->view('templates/sidebarpgw', $datau);
        $this->load->view('pegawai/kategori/add', $datab);
        $this->load->view('templates/footer');
    }

    public function add_kategori()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->add();
        } else {
            $data = [
                'namakat'   => $this->input->post('namakat', true),
            ];

            $this->samsat_model->addData('kategori', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Kategori berhasil ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('pegawai/kategori');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('namakat', 'namakat', 'required');
    }

    public function edit($id)
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $where = ['id_kategori' => $id];
        $datab['kategori'] = $this->samsat_model->edit($where, 'kategori')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebarpgw', $datau);
        $this->load->view('pegawai/kategori/edit', $datab);
        $this->load->view('templates/footer');
    }

    public function edit_kategori()
    {
        $data = [
            'namakat'   => $this->input->post('namakat', true),
        ];

        $where = [
            'id_kategori' => $this->input->post('id_kategori', true),
        ];

        $this->samsat_model->editData($where, $data, 'kategori');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Kategori berhasil diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('pegawai/kategori');
    }

    public function delete($id)
    {
        $where = ['id_kategori' => $id];
        $this->samsat_model->deleteData($where, 'kategori');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Kategori berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('pegawai/kategori');
    }

    public function print()
    {
        $data['kategori'] = $this->samsat_model->getData('kategori')->result();

        $this->load->library('mypdf');
        $this->mypdf->generate('pegawai/kategori/print', $data, 'a4', 'portrait', 'Laporan Daftar Kategori');
    }

}