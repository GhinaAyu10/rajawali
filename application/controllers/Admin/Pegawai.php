<?php

class Pegawai extends CI_Controller{

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
        $datab['pegawai'] = $this->samsat_model->getData('pegawai')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebara', $datau);
        $this->load->view('admin/pegawai/index', $datab);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebara', $datau);
        $this->load->view('admin/pegawai/add');
        $this->load->view('templates/footer');
    }

    public function add_pegawai()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->add();
        } else {
            $data = [
                'namapgw'       => $this->input->post('namapgw', true),
                'nippgw'        => $this->input->post('nippgw', true),
                'alamatpgw'     => $this->input->post('alamatpgw', true),
                'tptlahirp'     => $this->input->post('tptlahirp', true),
                'tgllahirp'     => $this->input->post('tgllahirp', true),
                'telppgw'       => $this->input->post('telppgw', true),
            ];

            $this->samsat_model->addData('pegawai', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Pegawai berhasil ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/pegawai');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('namapgw', 'namapgw', 'required');
        $this->form_validation->set_rules('nippgw', 'nippgw', 'required');
        $this->form_validation->set_rules('alamatpgw', 'alamatpgw', 'required');
        $this->form_validation->set_rules('tptlahirp', 'tptlahirp', 'required');
        $this->form_validation->set_rules('tgllahirp', 'tgllahirp', 'required');
        $this->form_validation->set_rules('telppgw', 'telppgw', 'required');
    }

    public function edit($id)
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $where = ['id_pegawai' => $id];
        $datab['pegawai'] = $this->samsat_model->edit($where, 'pegawai')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebara', $datau);
        $this->load->view('admin/pegawai/edit', $datab);
        $this->load->view('templates/footer');
    }

    public function edit_pegawai()
    {
        $data = [
            'namapgw'       => $this->input->post('namapgw', true),
            'nippgw'        => $this->input->post('nippgw', true),
            'alamatpgw'     => $this->input->post('alamatpgw', true),
            'tptlahirp'     => $this->input->post('tptlahirp', true),
            'tgllahirp'     => $this->input->post('tgllahirp', true),
            'telppgw'       => $this->input->post('telppgw', true),
        ];

        $where = [
            'id_pegawai' => $this->input->post('id_pegawai', true),
        ];

        $this->samsat_model->editData($where, $data, 'pegawai');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Pegawai berhasil diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/pegawai');
    }

    public function delete($id)
    {
        $where = ['id_pegawai' => $id];
        $this->samsat_model->deleteData($where, 'pegawai');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Pegawai berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/pegawai');
    }

    public function print()
    {
        $data['pegawai'] = $this->samsat_model->getData('pegawai')->result();

        $this->load->library('mypdf');
        $this->mypdf->generate('admin/pegawai/print', $data, 'a4', 'portrait', 'Laporan Daftar Pegawai');
    }

}