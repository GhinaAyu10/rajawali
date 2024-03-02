<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

	public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('login');
    }

    public function proses_login()
    {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $username;
            $pass = $password;

            $cek = $this->login_model->cek_login($user, $pass);

            if ($cek->num_rows() > 0){
                foreach ($cek->result() as $ck) {
                    $sess_data['username'] = $ck->username;
                    $sess_data['level'] = $ck->level;

                    $this->session->set_userdata($sess_data);
                }
                if ($sess_data['level'] == 'Admin'){
                    redirect('admin/dashboard');
                } else if ($sess_data['level'] == 'Pegawai'){
                    redirect('pegawai/dashboard');
                } else if ($sess_data['level'] == 'Pengajar'){
                    redirect('pengajar/dashboard');
                } else if ($sess_data['level'] == 'Siswa'){
                    redirect('siswa/dashboard');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Maaf, password Anda salah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Maaf, password Anda salah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button></div>');
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }

}