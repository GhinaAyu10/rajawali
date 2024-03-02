<?php

class Siswa extends CI_Controller{

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
        $datab['siswa'] = $this->samsat_model->join2Data('siswa', 'angkatan',
            'angkatan.id_angkatan=siswa.angkatan')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebarpgj', $datau);
        $this->load->view('pengajar/siswa/index', $datab);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $data['angkatan'] = $this->samsat_model->getData('angkatan')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebarpgj', $datau);
        $this->load->view('pengajar/siswa/add', $data);
        $this->load->view('templates/footer');
    }

    public function add_siswa()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->add();
        } else {
            $data = [
                'namasis'       => $this->input->post('namasis', true),
                'angkatan'      => $this->input->post('angkatan', true),
                'niksis'        => $this->input->post('niksis', true),
                'jenissis'      => $this->input->post('jenissis', true),
                'perusahaansis' => $this->input->post('perusahaansis', true),
                'jabatansis'    => $this->input->post('jabatansis', true),
                'alamatsis'     => $this->input->post('alamatsis', true),
                'tptlahirs'     => $this->input->post('tptlahirs', true),
                'tgllahirs'     => $this->input->post('tgllahirs', true),
                'telpsis'       => $this->input->post('telpsis', true),
            ];

            $this->samsat_model->addData('siswa', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Siswa berhasil ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('pengajar/siswa');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('namasis', 'namasis', 'required');
        $this->form_validation->set_rules('angkatan', 'angkatan', 'required');
        $this->form_validation->set_rules('niksis', 'niksis', 'required');
        $this->form_validation->set_rules('jenissis', 'jenissis', 'required');
        $this->form_validation->set_rules('perusahaansis', 'perusahaansis', 'required');
        $this->form_validation->set_rules('jabatansis', 'jabatansis', 'required');
        $this->form_validation->set_rules('alamatsis', 'alamatsis', 'required');
        $this->form_validation->set_rules('tptlahirs', 'tptlahirs', 'required');
        $this->form_validation->set_rules('tgllahirs', 'tgllahirs', 'required');
        $this->form_validation->set_rules('telpsis', 'telpsis', 'required');
    }

    public function edit($id)
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $where = ['id_siswa' => $id];
        $datab['siswa'] = $this->samsat_model->edit($where, 'siswa')->result();
        $datac['angkatan'] = $this->samsat_model->getData('angkatan')->result();
        $data = array_merge($datab, $datac);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebarpgj', $datau);
        $this->load->view('pengajar/siswa/edit', $data);
        $this->load->view('templates/footer');
    }

    public function edit_siswa()
    {
        $data = [
            'namasis'       => $this->input->post('namasis', true),
            'angkatan'      => $this->input->post('angkatan', true),
            'niksis'        => $this->input->post('niksis', true),
            'jenissis'      => $this->input->post('jenissis', true),
            'perusahaansis' => $this->input->post('perusahaansis', true),
            'jabatansis'    => $this->input->post('jabatansis', true),
            'alamatsis'     => $this->input->post('alamatsis', true),
            'tptlahirs'     => $this->input->post('tptlahirs', true),
            'tgllahirs'     => $this->input->post('tgllahirs', true),
            'telpsis'       => $this->input->post('telpsis', true),
        ];

        $where = [
            'id_siswa' => $this->input->post('id_siswa', true),
        ];

        $this->samsat_model->editData($where, $data, 'siswa');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Siswa berhasil diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('pengajar/siswa');
    }

    public function delete($id)
    {
        $where = ['id_siswa' => $id];
        $this->samsat_model->deleteData($where, 'siswa');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Siswa berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('pengajar/siswa');
    }

    public function print()
    {
        $data['siswa'] = $this->samsat_model->join2Data('siswa', 'angkatan',
            'angkatan.id_angkatan=siswa.angkatan')->result();

        $this->load->library('mypdf');
        $this->mypdf->generate('pengajar/siswa/print', $data, 'a4', 'portrait', 'Laporan Daftar Siswa');
    }

}