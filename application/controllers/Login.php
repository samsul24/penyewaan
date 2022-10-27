<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{


    function __construct()
    {

        parent::__construct();

        // memanggil model
        $this->load->model('login_model');
    }



    /**
     * 
     *  @ view utama login (tampilan)
     * 
     */
    public function index()
    {

        $data = array(

            'title'         => "Login | Gor-Tombro",
        );
        $this->load->view('template/header', $data);
        $this->load->view('login/index', $data);
        $this->load->view('template/footer', $data);
    }
    function log_process()
    {
        // @TODO 1 : Input username dan password
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // @TODO 2 : Pengecekan user dan password
        $getDataUser = $this->login_model->getDataUser($username);

        // cek akun terdaftar ?
        if ($getDataUser->num_rows() == 1) {

            $kolom = $getDataUser->row_array();

            // cek password
            $passwordDB = $kolom['password'];


            // pencocokan password DB dengan password dari view
            if ($passwordDB == $password) {


                $foto = $kolom['foto'];
                if ($foto) {

                    // set new session foto     
                    $link = base_url('assets/images/profile-photos/' . $foto);
                } else {

                    $link = base_url('assets/images/5.png');
                }

                /** Tambah session */
                $dataSession = array(

                    'sess_id_user' => $kolom['id_user'],
                    'sess_level'    => $kolom['level'],
                    'sess_username' => $kolom['username'],
                    'sess_name'     => $kolom['nama_lengkap'],
                    'sess_foto'     => $link
                );

                // pasang session 
                $this->session->set_userdata($dataSession);

                if ($kolom['level'] == "admin") {
                    redirect('admin/home');
                } else {

                    redirect(base_url());
                }
            } else {

                $this->session->set_flashdata('msg', '<span style="color: #ef5350">Kata sandi salah !</span>');
                redirect(base_url() . '?page=starter&username=' . $username);
            }
        } else {

            $this->session->set_flashdata('msg', '<span style="color: #ef5350">Username tidak ditemukan !</span>');
            redirect(base_url() . '?page=starter');
        }
    }
    function out_process()
    {

        $this->session->sess_destroy();
        redirect(base_url());
    }
}
