<?php

class Angkatan extends CI_Controller{

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
        $datab['angkatan'] = $this->samsat_model->getData('angkatan')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebarpgw', $datau);
        $this->load->view('pegawai/angkatan/index', $datab);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebarpgw', $datau);
        $this->load->view('pegawai/angkatan/add');
        $this->load->view('templates/footer');
    }

    public function add_angkatan()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->add();
        } else {
            $data = [
                'namaakt'     => $this->input->post('namaakt', true),
                'tahun'       => $this->input->post('tahun', true),
            ];

            $this->samsat_model->addData('angkatan', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    angkatan berhasil ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('pegawai/angkatan');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('namaakt', 'namaakt', 'required');
        $this->form_validation->set_rules('tahun', 'tahun', 'required');
    }

    public function edit($id)
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $where = ['id_angkatan' => $id];
        $datab['angkatan'] = $this->samsat_model->edit($where, 'angkatan')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebarpgw', $datau);
        $this->load->view('pegawai/angkatan/edit', $datab);
        $this->load->view('templates/footer');
    }

    public function edit_angkatan()
    {
        $data = [
            'namaakt'     => $this->input->post('namaakt', true),
            'tahun'       => $this->input->post('tahun', true),
        ];

        $where = [
            'id_angkatan' => $this->input->post('id_angkatan', true),
        ];

        $this->samsat_model->editData($where, $data, 'angkatan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    angkatan berhasil diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('pegawai/angkatan');
    }

    public function delete($id)
    {
        $where = ['id_angkatan' => $id];
        $this->samsat_model->deleteData($where, 'angkatan');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    angkatan berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('pegawai/angkatan');
    }

    public function print()
    {
        $data['angkatan'] = $this->samsat_model->getData('angkatan')->result();

        $this->load->library('mypdf');
        $this->mypdf->generate('pegawai/angkatan/print', $data, 'a4', 'portrait', 'Laporan Daftar Angkatan');
    }

}