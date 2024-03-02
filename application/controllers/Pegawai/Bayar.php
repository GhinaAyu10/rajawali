<?php

class Bayar extends CI_Controller{

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
        $data['bayar'] = $this->samsat_model->join3Data('bayar', 'siswa', 'biaya',
            'siswa.id_siswa=bayar.siswa', 'biaya.id_biaya=bayar.biaya')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebarpgw', $datau);
        $this->load->view('pegawai/bayar/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function add()
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $datab['biaya'] = $this->samsat_model->getData('biaya')->result();
        $datac['siswa'] = $this->samsat_model->getData('siswa')->result();

        $data = array_merge($datab, $datac);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebarpgw', $datau);
        $this->load->view('pegawai/bayar/add', $data);
        $this->load->view('templates/footer');
    }

    public function add_bayar()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->add();
        } else {
            $data = [
                'biaya'    => $this->input->post('biaya', true),
                'siswa'    => $this->input->post('siswa', true),
                'tglbayar' => $this->input->post('tglbayar', true),
            ];

            $this->samsat_model->addData('bayar', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    bayar Digital berhasil ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('pegawai/bayar');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('biaya', 'biaya', 'required');
        $this->form_validation->set_rules('siswa', 'siswa', 'required');
        $this->form_validation->set_rules('tglbayar', 'tglbayar', 'required');
    }

    public function edit($id)
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $where = ['id_bayar' => $id];
        $datab['bayar'] = $this->samsat_model->edit($where, 'bayar')->result();
        $datac['biaya'] = $this->samsat_model->getData('biaya')->result();
        $datad['siswa'] = $this->samsat_model->getData('siswa')->result();
        
        $data = array_merge($datab, $datac, $datad);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebarpgw', $datau);
        $this->load->view('pegawai/bayar/edit', $data);
        $this->load->view('templates/footer');
    }

    public function edit_bayar()
    {
        $data = [
            'biaya'    => $this->input->post('biaya', true),
            'siswa'    => $this->input->post('siswa', true),
            'tglbayar' => $this->input->post('tglbayar', true),
        ];

        $where = [
            'id_bayar' => $this->input->post('id_bayar')
        ];

        $this->samsat_model->editData($where, $data, 'bayar');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    bayar Digital berhasil diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('pegawai/bayar');
    }

    public function delete($id)
    {
        $where = ['id_bayar' => $id];
        $this->samsat_model->deleteData($where, 'bayar');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    bayar Digital berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('pegawai/bayar');
    }
    
    public function print()
    {
        $awal = $this->input->post('tgl_awal');
        $akhir = $this->input->post('tgl_akhir');

        if($awal != null && $akhir != null)
        {
            $data['bayar'] = $this->samsat_model->printBayar($awal, $akhir);
            $data['bayar'] = $this->samsat_model->join3Data('bayar', 'siswa', 'biaya',
                'siswa.id_siswa=bayar.siswa', 'biaya.id_biaya=bayar.biaya')->result();
        } else {
            $data['bayar'] = $this->samsat_model->join3Data('bayar', 'siswa', 'biaya',
                'siswa.id_siswa=bayar.siswa', 'biaya.id_biaya=bayar.biaya')->result();
        }
        
        $this->load->library('mypdf');
        $this->mypdf->generate('pegawai/bayar/print', $data, 'a4', 'portrait', 'Laporan Bayar Pendidikan');
    }

    public function individu($id)
    {
        $where = ['id_bayar' => $id];
        $data['bayar'] = $this->samsat_model->joinWhere2('bayar', 'siswa', 'biaya',
        'siswa.id_siswa=bayar.siswa', 'biaya.id_biaya=bayar.biaya', $where, $id)->row();
        
        $this->load->library('mypdf');
        $this->mypdf->generate('pegawai/bayar/individu', $data, 'f4', 'portrait', 'Pembayaran Individu Siswa');
    }

}