<?php

class Pelajaran extends CI_Controller{

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
        $datab['pelajaran'] = $this->samsat_model->getData('pelajaran')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebara', $datau);
        $this->load->view('admin/pelajaran/index', $datab);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebara', $datau);
        $this->load->view('admin/pelajaran/add');
        $this->load->view('templates/footer');
    }

    public function add_pelajaran()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->add();
        } else {
            $data = [
                'namapel'     => $this->input->post('namapel', true),
            ];

            $this->samsat_model->addData('pelajaran', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    pelajaran berhasil ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/pelajaran');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('namapel', 'namapel', 'required');
    }

    public function edit($id)
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $where = ['id_pelajaran' => $id];
        $datab['pelajaran'] = $this->samsat_model->edit($where, 'pelajaran')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebara', $datau);
        $this->load->view('admin/pelajaran/edit', $datab);
        $this->load->view('templates/footer');
    }

    public function edit_pelajaran()
    {
        $data = [
            'namapel'     => $this->input->post('namapel', true),
        ];

        $where = [
            'id_pelajaran' => $this->input->post('id_pelajaran', true),
        ];

        $this->samsat_model->editData($where, $data, 'pelajaran');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    pelajaran berhasil diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/pelajaran');
    }

    public function delete($id)
    {
        $where = ['id_pelajaran' => $id];
        $this->samsat_model->deleteData($where, 'pelajaran');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    pelajaran berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/pelajaran');
    }

    public function print()
    {
        $data['pelajaran'] = $this->samsat_model->getData('pelajaran')->result();

        $this->load->library('mypdf');
        $this->mypdf->generate('admin/pelajaran/print', $data, 'a4', 'portrait', 'Laporan Daftar Pelajaran');
    }

}