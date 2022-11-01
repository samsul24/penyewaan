<?php

defined('BASEPATH') or exit('No direct script access allowed');

class register_model extends CI_Model
{

    function onInsertRegistration()
    {

        // ambil data dari view
        $username = $this->input->post('username');
        $fullname = $this->input->post('nama_lengkap');
        $email    = $this->input->post('email');
        $no_telp    = $this->input->post('no_telp');
        $password = $this->input->post('password');

        // masukkan 
        $data = array(

            'username'  => $username,
            'password'  => $password,
            'level'     => "customer",
            'no_telp'        => $no_telp,
            'email'        => $email,
            'nama_lengkap' => $fullname,
        );

        $this->db->insert('user', $data);
        $html = '<div class="alert alert-success">Pemberitahuan <br> <label>Selamat Anda telah mendaftar <br> Silahkan Login.</label></div>';
        $this->session->set_flashdata('msg', $html);
        // redirect
        redirect('Registrasi');
    }
}
