<?php

class Lemari extends CI_Controller{

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
        $datab['lemari'] = $this->samsat_model->getData('lemari')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebara', $datau);
        $this->load->view('admin/lemari/index', $datab);
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
        $this->load->view('admin/lemari/add', $datab);
        $this->load->view('templates/footer');
    }

    public function add_lemari()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->add();
        } else {
            $data = [
                'namalemari'   => $this->input->post('namalemari', true),
            ];

            $this->samsat_model->addData('lemari', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Lemari berhasil ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/lemari');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('namalemari', 'namalemari', 'required');
    }

    public function edit($id)
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $where = ['id_lemari' => $id];
        $datab['lemari'] = $this->samsat_model->edit($where, 'lemari')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebara', $datau);
        $this->load->view('admin/lemari/edit', $datab);
        $this->load->view('templates/footer');
    }

    public function edit_lemari()
    {
        $data = [
            'namalemari'   => $this->input->post('namalemari', true),
        ];

        $where = [
            'id_lemari' => $this->input->post('id_lemari', true),
        ];

        $this->samsat_model->editData($where, $data, 'lemari');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Lemari berhasil diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/lemari');
    }

    public function delete($id)
    {
        $where = ['id_lemari' => $id];
        $this->samsat_model->deleteData($where, 'lemari');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Lemari berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/lemari');
    }

    public function print()
    {
        $data['lemari'] = $this->samsat_model->getData('lemari')->result();

        $this->load->library('mypdf');
        $this->mypdf->generate('admin/lemari/print', $data, 'a4', 'portrait', 'Laporan Daftar Lemari');
    }

}