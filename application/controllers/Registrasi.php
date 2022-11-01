<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{


    function __construct()
    {

        parent::__construct();

        // memanggil model
        $this->load->model('register_model');
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
        $this->load->view('login/registrasi', $data);
        $this->load->view('template/footer', $data);
    }
    function reg_process()
    {

        $this->register_model->onInsertRegistration();
    }
}
