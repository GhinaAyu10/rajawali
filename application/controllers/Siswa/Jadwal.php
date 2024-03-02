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
        $this->load->view('templates/sidebarsis', $datau);
        $this->load->view('siswa/jadwal/index', $data);
        $this->load->view('templates/footer');
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
        $this->mypdf->generate('siswa/jadwal/print', $data, 'a4', 'portrait', 'Laporan Jadwal Kelas');
    }

}