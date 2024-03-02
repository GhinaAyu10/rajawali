<?php

class Lokasi extends CI_Controller{

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
        $datab['lokasi'] = $this->samsat_model->getData('lokasi')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebarpgw', $datau);
        $this->load->view('pegawai/lokasi/index', $datab);
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
        $this->load->view('pegawai/lokasi/add', $datab);
        $this->load->view('templates/footer');
    }

    public function add_lokasi()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->add();
        } else {
            $data = [
                'namalok'   => $this->input->post('namalok', true),
            ];

            $this->samsat_model->addData('lokasi', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Lokasi berhasil ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('pegawai/lokasi');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('namalok', 'namalok', 'required');
    }

    public function edit($id)
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $where = ['id_lokasi' => $id];
        $datab['lokasi'] = $this->samsat_model->edit($where, 'lokasi')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebarpgw', $datau);
        $this->load->view('pegawai/lokasi/edit', $datab);
        $this->load->view('templates/footer');
    }

    public function edit_lokasi()
    {
        $data = [
            'namalok'   => $this->input->post('namalok', true),
        ];

        $where = [
            'id_lokasi' => $this->input->post('id_lokasi', true),
        ];

        $this->samsat_model->editData($where, $data, 'lokasi');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Lokasi berhasil diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('pegawai/lokasi');
    }

    public function delete($id)
    {
        $where = ['id_lokasi' => $id];
        $this->samsat_model->deleteData($where, 'lokasi');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Lokasi berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('pegawai/lokasi');
    }

    public function print()
    {
        $data['lokasi'] = $this->samsat_model->getData('lokasi')->result();

        $this->load->library('mypdf');
        $this->mypdf->generate('pegawai/lokasi/print', $data, 'a4', 'portrait', 'Laporan Daftar Lokasi');
    }

}