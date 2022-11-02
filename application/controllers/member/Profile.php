<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{


    function __construct()
    {

        parent::__construct();

        // memanggil model
        $this->load->model('lapangan_model');
        $this->load->model('sewa_model');
        $this->load->model('jam_model');
    }


    public function index()
    {



        $data = array(

            'title'         => "Member | Gor-Tombro",
        );

        $this->load->view('template/header', $data);
        $this->load->view('member/profile', $data);
        $this->load->view('template/footer', $data);
    }
}
