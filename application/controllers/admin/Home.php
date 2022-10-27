<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


    function __construct()
    {

        parent::__construct();

        // memanggil model
    }



    /**
     * 
     *  @ view utama admin (tampilan)
     * 
     */
    public function index()
    {

        $data = array(

            'title'         => "Admin | Gor-Tombro",
        );
        $this->load->view('admin/header', $data);
        $this->load->view('admin/home', $data);
        $this->load->view('admin/footer', $data);
    }
}
