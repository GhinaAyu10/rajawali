<?php

class Arsip extends CI_Controller{

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
        $data['arsip'] = $this->samsat_model->join5Data('arsip', 'lokasi', 'lemari', 'kategori', 'pengguna',
            'lokasi.id_lokasi=arsip.lokasi', 'lemari.id_lemari=arsip.lemari',
            'kategori.id_kategori=arsip.kategori', 'pengguna.id_users=arsip.users'
            )->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebara', $datau);
        $this->load->view('admin/arsip/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function add()
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $datab['lokasi'] = $this->samsat_model->getData('lokasi')->result();
        $datac['lemari'] = $this->samsat_model->getData('lemari')->result();
        $datad['kategori'] = $this->samsat_model->getData('kategori')->result();

        $data = array_merge($datab, $datac, $datad);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebara', $datau);
        $this->load->view('admin/arsip/add', $data);
        $this->load->view('templates/footer');
    }

    public function add_arsip()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->add();
        } else {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|pdf';
            $config['encrypt_name']			= TRUE;
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('filearsip'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('admin/arsip/add', $error);
                } else {
                $data = [
                    'lokasi'    => $this->input->post('lokasi', true),
                    'lemari'    => $this->input->post('lemari', true),
                    'kategori'  => $this->input->post('kategori', true),
                    'users'     => $this->input->post('users', true),
                    'namaarsip' => $this->input->post('namaarsip', true),
                    'tglarsip'  => $this->input->post('tglarsip', true),
                    'no_rak'    => $this->input->post('no_rak', true),
                    'no_box'    => $this->input->post('no_box', true),
                    'no_map'    => $this->input->post('no_map', true),
                    'filearsip' => $this->upload->data('file_name'),
                ];

                $this->samsat_model->addData('arsip', $data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Arsip Digital berhasil ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button></div>');
                redirect('admin/arsip');
            }
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('lokasi', 'lokasi', 'required');
        $this->form_validation->set_rules('lemari', 'lemari', 'required');
        $this->form_validation->set_rules('kategori', 'kategori', 'required');
        $this->form_validation->set_rules('users', 'users', 'required');
        $this->form_validation->set_rules('namaarsip', 'namaarsip', 'required');
        $this->form_validation->set_rules('tglarsip', 'tglarsip', 'required');
        $this->form_validation->set_rules('no_rak', 'no_rak', 'required');
        $this->form_validation->set_rules('no_box', 'no_box', 'required');
        $this->form_validation->set_rules('no_map', 'no_map', 'required');
    }

    public function edit($id)
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $where = ['id_arsip' => $id];
        $datab['arsip'] = $this->samsat_model->edit($where, 'arsip')->result();
        $datac['lokasi'] = $this->samsat_model->getData('lokasi')->result();
        $datad['lemari'] = $this->samsat_model->getData('lemari')->result();
        $datae['kategori'] = $this->samsat_model->getData('kategori')->result();
        
        $data = array_merge($datab, $datac, $datad, $datae);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebara', $datau);
        $this->load->view('admin/arsip/edit', $data);
        $this->load->view('templates/footer');
    }

    public function edit_arsip()
    {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|pdf';
            $config['encrypt_name']			= TRUE;
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('filearsip'))
            {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('admin/arsip/edit', $error);
            } else {
                $data = [
                    'lokasi'    => $this->input->post('lokasi', true),
                    'lemari'    => $this->input->post('lemari', true),
                    'kategori'  => $this->input->post('kategori', true),
                    'users'     => $this->input->post('users', true),
                    'namaarsip' => $this->input->post('namaarsip', true),
                    'tglarsip'  => $this->input->post('tglarsip', true),
                    'no_rak'    => $this->input->post('no_rak', true),
                    'no_box'    => $this->input->post('no_box', true),
                    'no_map'    => $this->input->post('no_map', true),
                    'filearsip' => $this->upload->data('file_name'),
                ];

                $where = [
                    'id_arsip' => $id
                ];

                $this->samsat_model->editData($where, $data, 'arsip');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            Arsip Digital berhasil diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button></div>');
                redirect('admin/arsip');
            }
        }

    public function delete($id)
    {
        $where = ['id_arsip' => $id];
        $this->samsat_model->deleteData($where, 'arsip');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Arsip Digital berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/arsip');
    }
    
    public function print()
    {
        $awal = $this->input->post('tgl_awal');
        $akhir = $this->input->post('tgl_akhir');

        if($awal != null && $akhir != null)
        {
            $data['arsip'] = $this->samsat_model->printDataS($awal, $akhir);
            $data['arsip'] = $this->samsat_model->join5Data('arsip', 'lokasi', 'lemari', 'kategori', 'pengguna',
                'lokasi.id_lokasi=arsip.lokasi', 'lemari.id_lemari=arsip.lemari',
                'kategori.id_kategori=arsip.kategori', 'pengguna.id_users=arsip.users'
                )->result();
        } else {
            $data['arsip'] = $this->samsat_model->join5Data('arsip', 'lokasi', 'lemari', 'kategori', 'pengguna',
                'lokasi.id_lokasi=arsip.lokasi', 'lemari.id_lemari=arsip.lemari',
                'kategori.id_kategori=arsip.kategori', 'pengguna.id_users=arsip.users'
                )->result();
        }
        
        $this->load->library('mypdf');
        $this->mypdf->generate('admin/arsip/print', $data, 'a4', 'portrait', 'Laporan Arsip Digital');
    }

}