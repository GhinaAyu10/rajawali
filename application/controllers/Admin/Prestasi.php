<?php

class Prestasi extends CI_Controller{

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

    public function index(){
		redirect('admin/prestasi/view');
	}

    public function view($rowno=0){
		$search_text = "";
		if($this->input->post('submit') != NULL ){
			$search_text = $this->input->post('search');
			$this->session->set_userdata(array("search"=>$search_text));
		}else{
			if($this->session->userdata('search') != NULL){
				$search_text = $this->session->userdata('search');
			}
		}

		$rowperpage = 30;
		if($rowno != 0){
			$rowno = ($rowno-1) * $rowperpage;
		}
      	
      	$allcount = $this->search_model->getRecordPrestasi($search_text);
      	$record = $this->search_model->getDataPrestasi($rowno,$rowperpage,$search_text);
      	
      	$config['base_url'] = base_url().'admin/prestasi/view';
      	$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $allcount;
		$config['per_page'] = $rowperpage;

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();
		$data['result'] = $record;
		$data['row'] = $rowno;
		$data['search'] = $search_text;
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebara', $datau);
        $this->load->view('admin/prestasi/index', $data);
        $this->load->view('templates/footer');
	}

    public function add()
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $datab['siswa'] = $this->samsat_model->getData('siswa')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebara', $datau);
        $this->load->view('admin/prestasi/add', $datab);
        $this->load->view('templates/footer');
    }

    public function add_prestasi()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->add();
        } else {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|pdf';
            $config['encrypt_name']			= TRUE;
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('filesertif'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('admin/prestasi/add', $error);
                } else {
                $data = [
                    'siswa'       => $this->input->post('siswa', true),
                    'kompetisi'   => $this->input->post('kompetisi', true),
                    'juara'       => $this->input->post('juara', true),
                    'tingkat'     => $this->input->post('tingkat', true),
                    'despres'     => $this->input->post('despres', true),
                    'filesertif'   => $this->upload->data('file_name'),
                ];

                $this->samsat_model->addData('prestasi', $data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Prestasi berhasil ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button></div>');
                redirect('admin/prestasi');
            }
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('siswa', 'siswa', 'required');
        $this->form_validation->set_rules('kompetisi', 'kompetisi', 'required');
        $this->form_validation->set_rules('juara', 'juara', 'required');
        $this->form_validation->set_rules('tingkat', 'tingkat', 'required');
        $this->form_validation->set_rules('despres', 'despres', 'required');
    }

    public function edit($id)
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $where = ['id_prestasi' => $id];
        $datab['prestasi'] = $this->samsat_model->edit($where, 'prestasi')->result();
        $datac['siswa'] = $this->samsat_model->getData('siswa')->result();
        $data = array_merge($datab, $datac);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebara', $datau);
        $this->load->view('admin/prestasi/edit', $data);
        $this->load->view('templates/footer');
    }

    public function edit_prestasi()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|pdf';
        $config['encrypt_name']			= TRUE;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('filesertif'))
            {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('admin/prestasi/edit', $error);
            } else {
            $data = [
                'siswa'       => $this->input->post('siswa', true),
                'kompetisi'   => $this->input->post('kompetisi', true),
                'juara'       => $this->input->post('juara', true),
                'tingkat'     => $this->input->post('tingkat', true),
                'despres'     => $this->input->post('despres', true),
                'filesertif'   => $this->upload->data('file_name'),
            ];

            $where = [
                'id_prestasi' => $this->input->post('id_prestasi', true),
            ];

            $this->samsat_model->editData($where, $data, 'prestasi');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Prestasi berhasil diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/prestasi');
        }
    }

    public function delete($id)
    {
        $where = ['id_prestasi' => $id];
        $this->samsat_model->deleteData($where, 'prestasi');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Prestasi berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/prestasi');
    }

    public function print()
    {
        $data['prestasi'] = $this->samsat_model->join2Data('prestasi', 'siswa', 'siswa.id_siswa=prestasi.siswa')->result();

        $this->load->library('mypdf');
        $this->mypdf->generate('admin/prestasi/print', $data, 'a4', 'portrait', 'Laporan Daftar Prestasi Siswa');
    }

}