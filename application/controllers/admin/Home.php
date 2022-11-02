<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


    function __construct()
    {

        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('sewa_model');
        $this->load->model('filter_model');

        // memanggil model
    }



    /**
     * 
     *  @ view utama admin (tampilan)
     * 
     */
    public function index()
    {
        $data_bulan = $this->sewa_model->getMonth1();
        $data_bulan2 = $this->sewa_model->getMonth2();
        $charts = $this->filter_model->chart1();
        $charts2 = $this->filter_model->chart2();
        $data = array(

            'title'         => "Admin | Gor-Tombro",
            'data_bulan' => $data_bulan,
            'charts' => $charts,
            'charts2' => $charts2,
            'data_bulan2' => $data_bulan2,
        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/home/index', $data);
        $this->load->view('templates/footer');
    }
    public function profile()
    {
        $user = $this->login_model->getUser($this->session->userdata('email'));
        $data = array(

            'title'         => "Admin | Gor-Tombro",
            'user' => $user,

        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/profile/index', $data);
        $this->load->view('templates/footer');
    }
    function ubah_process($id_user)
    {

        $this->login_model->updateDataUser($id_user);
    }
    function ubah_process_user($id_user)
    {

        $this->login_model->updateDataUserAll($id_user);
    }
    public function user()
    {
        $user = $this->db->get('user');
        $data = array(

            'title'         => "Admin | Gor-Tombro",

            'user' => $user,
        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/home/user', $data);
        $this->load->view('templates/footer');
    }
    function hapus_process($id_user)
    {

        $this->login_model->deleteDataUser($id_user);
    }
}
