<?php

class Hukuman extends CI_Controller{

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
		redirect('admin/hukuman/view');
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
      	
      	$allcount = $this->search_model->getRecordHukuman($search_text);
      	$record = $this->search_model->getDataHukuman($rowno,$rowperpage,$search_text);
      	
      	$config['base_url'] = base_url().'admin/hukuman/view';
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
        $this->load->view('admin/hukuman/index', $data);
        $this->load->view('templates/footer');
	}

    public function add()
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $datab['siswa'] = $this->samsat_model->getData('siswa')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebara', $datau);
        $this->load->view('admin/hukuman/add', $datab);
        $this->load->view('templates/footer');
    }

    public function add_hukuman()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->add();
        } else {
            $data = [
                'siswa'        => $this->input->post('siswa', true),
                'pelanggaran'  => $this->input->post('pelanggaran', true),
                'deskripsi'    => $this->input->post('deskripsi', true),
                'hukumakhir'   => $this->input->post('hukumakhir', true),
            ];

            $this->samsat_model->addData('hukuman', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Hukuman berhasil ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/hukuman');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('siswa', 'siswa', 'required');
        $this->form_validation->set_rules('pelanggaran', 'pelanggaran', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
        $this->form_validation->set_rules('hukumakhir', 'hukumakhir', 'required');
    }

    public function edit($id)
    {
        $datau = $this->user_model->getDataUser($this->session->userdata['username']);
        $where = ['id_hukuman' => $id];
        $datab['hukuman'] = $this->samsat_model->edit($where, 'hukuman')->result();
        $datac['siswa'] = $this->samsat_model->getData('siswa')->result();
        $data = array_merge($datab, $datac);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebara', $datau);
        $this->load->view('admin/hukuman/edit', $data);
        $this->load->view('templates/footer');
    }

    public function edit_hukuman()
    {
        $data = [
            'siswa'        => $this->input->post('siswa', true),
            'pelanggaran'  => $this->input->post('pelanggaran', true),
            'deskripsi'    => $this->input->post('deskripsi', true),
            'hukumakhir'   => $this->input->post('hukumakhir', true),
        ];

        $where = [
            'id_hukuman' => $this->input->post('id_hukuman', true),
        ];

        $this->samsat_model->editData($where, $data, 'hukuman');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Hukuman berhasil diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/hukuman');
    }

    public function delete($id)
    {
        $where = ['id_hukuman' => $id];
        $this->samsat_model->deleteData($where, 'hukuman');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Hukuman berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/hukuman');
    }

    public function print()
    {
        $data['hukuman'] = $this->samsat_model->join2Data('hukuman', 'siswa', 'siswa.id_siswa=hukuman.siswa')->result();

        $this->load->library('mypdf');
        $this->mypdf->generate('admin/hukuman/print', $data, 'a4', 'portrait', 'Laporan Daftar Hukuman Siswa');
    }

}