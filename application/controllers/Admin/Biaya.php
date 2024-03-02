<?php

class Biaya extends CI_Controller{

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
        $datab['biaya'] = $this->samsat_model->getData('biaya')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebara', $datau);
        $this->load->view('admin/biaya/index', $datab);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebara', $datau);
        $this->load->view('admin/biaya/add');
        $this->load->view('templates/footer');
    }

    public function add_biaya()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->add();
        } else {
            $data = [
                'namabi'     => $this->input->post('namabi', true),
                'jumlahbi'   => $this->input->post('jumlahbi', true),
            ];

            $this->samsat_model->addData('biaya', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Biaya berhasil ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/biaya');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('namabi', 'namabi', 'required');
        $this->form_validation->set_rules('jumlahbi', 'jumlahbi', 'required');
    }

    public function edit($id)
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $where = ['id_biaya' => $id];
        $datab['biaya'] = $this->samsat_model->edit($where, 'biaya')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebara', $datau);
        $this->load->view('admin/biaya/edit', $datab);
        $this->load->view('templates/footer');
    }

    public function edit_biaya()
    {
        $data = [
            'namabi'   => $this->input->post('namabi', true),
            'jumlahbi' => $this->input->post('jumlahbi', true),
        ];

        $where = [
            'id_biaya' => $this->input->post('id_biaya', true),
        ];

        $this->samsat_model->editData($where, $data, 'biaya');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Biaya berhasil diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/biaya');
    }

    public function delete($id)
    {
        $where = ['id_biaya' => $id];
        $this->samsat_model->deleteData($where, 'biaya');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Biaya berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/biaya');
    }

    public function print()
    {
        $data['biaya'] = $this->samsat_model->getData('biaya')->result();

        $this->load->library('mypdf');
        $this->mypdf->generate('admin/biaya/print', $data, 'a4', 'portrait', 'Laporan Daftar Biaya');
    }

}