<?php

class Login_model extends CI_Model{

    public function cek_login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('pengguna');
    }

    public function getLoginData($user, $pass)
    {
        $qCekLogin = $this->db->get_where('pengguna', ['username'=>$user, 'password'=>$pass]);

        if (count($qCekLogin->result()) > 0) {
            foreach ($qCekLogin->result() as $qck){
                foreach ($qCekLogin->result() as $ck){
                    $sess_data ['logged_in'] = true;
                    $sess_data ['username'] = $ck->username;
                    $sess_data ['password'] = $ck->password;
                    $sess_data ['level'] = $ck->level;

                    $this->session->set_userdata($sess_data);
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Maaf, data login Anda salah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('auth');
        }
    }

}