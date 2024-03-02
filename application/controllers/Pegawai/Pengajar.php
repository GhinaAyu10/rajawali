<?php

class Pengajar extends CI_Controller{

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
        $datab['pengajar'] = $this->samsat_model->getData('pengajar')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebarpgw', $datau);
        $this->load->view('pegawai/pengajar/index', $datab);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebarpgw', $datau);
        $this->load->view('pegawai/pengajar/add');
        $this->load->view('templates/footer');
    }

    public function add_pengajar()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->add();
        } else {
            $data = [
                'namapgj'       => $this->input->post('namapgj', true),
                'nippgj'        => $this->input->post('nippgj', true),
                'alamatpgj'     => $this->input->post('alamatpgj', true),
                'tptlahirj'     => $this->input->post('tptlahirj', true),
                'tgllahirj'     => $this->input->post('tgllahirj', true),
                'telppgj'       => $this->input->post('telppgj', true),
            ];

            $this->samsat_model->addData('pengajar', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Pengajar berhasil ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('pegawai/pengajar');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('namapgj', 'namapgj', 'required');
        $this->form_validation->set_rules('nippgj', 'nippgj', 'required');
        $this->form_validation->set_rules('alamatpgj', 'alamatpgj', 'required');
        $this->form_validation->set_rules('tptlahirj', 'tptlahirj', 'required');
        $this->form_validation->set_rules('tgllahirj', 'tgllahirj', 'required');
        $this->form_validation->set_rules('telppgj', 'telppgj', 'required');
    }

    public function edit($id)
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $where = ['id_pengajar' => $id];
        $datab['pengajar'] = $this->samsat_model->edit($where, 'pengajar')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebarpgw', $datau);
        $this->load->view('pegawai/pengajar/edit', $datab);
        $this->load->view('templates/footer');
    }

    public function edit_pengajar()
    {
        $data = [
            'namapgj'       => $this->input->post('namapgj', true),
            'nippgj'        => $this->input->post('nippgj', true),
            'alamatpgj'     => $this->input->post('alamatpgj', true),
            'tptlahirj'     => $this->input->post('tptlahirj', true),
            'tgllahirj'     => $this->input->post('tgllahirj', true),
            'telppgj'       => $this->input->post('telppgj', true),
        ];

        $where = [
            'id_pengajar' => $this->input->post('id_pengajar', true),
        ];

        $this->samsat_model->editData($where, $data, 'pengajar');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Pengajar berhasil diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('pegawai/pengajar');
    }

    public function delete($id)
    {
        $where = ['id_pengajar' => $id];
        $this->samsat_model->deleteData($where, 'pengajar');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Pengajar berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('pegawai/pengajar');
    }

    public function print()
    {
        $data['pengajar'] = $this->samsat_model->getData('pengajar')->result();

        $this->load->library('mypdf');
        $this->mypdf->generate('pegawai/pengajar/print', $data, 'a4', 'portrait', 'Laporan Daftar Pengajar');
    }

}