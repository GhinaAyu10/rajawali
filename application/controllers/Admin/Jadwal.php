<?php

class Jadwal extends CI_Controller{

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
        $data['jadwal'] = $this->samsat_model->join4Data('jadwal', 'angkatan', 'pelajaran', 'pengajar',
            'angkatan.id_angkatan=jadwal.angkatan', 'pelajaran.id_pelajaran=jadwal.pelajaran',
            'pengajar.id_pengajar=jadwal.pengajar')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebara', $datau);
        $this->load->view('admin/jadwal/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function add()
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $datab['angkatan'] = $this->samsat_model->getData('angkatan')->result();
        $datac['pelajaran'] = $this->samsat_model->getData('pelajaran')->result();
        $datad['pengajar'] = $this->samsat_model->getData('pengajar')->result();
        $data = array_merge($datab, $datac, $datad);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebara', $datau);
        $this->load->view('admin/jadwal/add', $data);
        $this->load->view('templates/footer');
    }

    public function add_jadwal()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->add();
        } else {
            $data = [
                'angkatan'  => $this->input->post('angkatan', true),
                'pelajaran' => $this->input->post('pelajaran', true),
                'pengajar'  => $this->input->post('pengajar', true),
                'darijam'   => $this->input->post('darijam', true),
                'sampaijam' => $this->input->post('sampaijam', true),
            ];

            $this->samsat_model->addData('jadwal', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Jadwal Kelas berhasil ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/jadwal');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('angkatan', 'angkatan', 'required');
        $this->form_validation->set_rules('pelajaran', 'pelajaran', 'required');
        $this->form_validation->set_rules('pengajar', 'pengajar', 'required');
        $this->form_validation->set_rules('darijam', 'darijam', 'required');
        $this->form_validation->set_rules('sampaijam', 'sampaijam', 'required');
    }

    public function edit($id)
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $where = ['id_jadwal' => $id];
        $datab['jadwal'] = $this->samsat_model->edit($where, 'jadwal')->result();
        $datac['angkatan'] = $this->samsat_model->getData('angkatan')->result();
        $datad['pelajaran'] = $this->samsat_model->getData('pelajaran')->result();
        $datae['pengajar'] = $this->samsat_model->getData('pengajar')->result();
        
        $data = array_merge($datab, $datac, $datad, $datae);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebara', $datau);
        $this->load->view('admin/jadwal/edit', $data);
        $this->load->view('templates/footer');
    }

    public function edit_jadwal()
    {
        $data = [
            'angkatan'  => $this->input->post('angkatan', true),
            'pelajaran' => $this->input->post('pelajaran', true),
            'pengajar'  => $this->input->post('pengajar', true),
            'darijam'   => $this->input->post('darijam', true),
            'sampaijam' => $this->input->post('sampaijam', true),
        ];

        $where = [
            'id_jadwal' => $this->input->post('id_jadwal')
        ];

        $this->samsat_model->editData($where, $data, 'jadwal');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Jadwal Kelas berhasil diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/jadwal');
    }

    public function delete($id)
    {
        $where = ['id_jadwal' => $id];
        $this->samsat_model->deleteData($where, 'jadwal');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Jadwal Kelas berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/jadwal');
    }
    
    public function print()
    {
        $awal = $this->input->post('tgl_awal');
        $akhir = $this->input->post('tgl_akhir');

        if($awal != null && $akhir != null)
        {
            $data['jadwal'] = $this->samsat_model->printJadwal($awal, $akhir);
            $data['jadwal'] = $this->samsat_model->join4Data('jadwal', 'angkatan', 'pelajaran', 'pengajar',
                'angkatan.id_angkatan=jadwal.angkatan', 'pelajaran.id_pelajaran=jadwal.pelajaran',
                'pengajar.id_pengajar=jadwal.pengajar')->result();
        } else {
            $data['jadwal'] = $this->samsat_model->join4Data('jadwal', 'angkatan', 'pelajaran', 'pengajar',
                'angkatan.id_angkatan=jadwal.angkatan', 'pelajaran.id_pelajaran=jadwal.pelajaran',
                'pengajar.id_pengajar=jadwal.pengajar')->result();
        }
        
        $this->load->library('mypdf');
        $this->mypdf->generate('admin/jadwal/print', $data, 'a4', 'portrait', 'Laporan Jadwal Kelas');
    }

}