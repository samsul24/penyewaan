<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{


    function __construct()
    {

        parent::__construct();

        // memanggil model
        $this->load->model('pengumuman_model');
    }



    /**
     * 
     *  @ view utama admin (tampilan)
     * 
     */
    public function index()
    {
        $pengumuman = $this->pengumuman_model->getDataPengumuman();

        $data = array(

            'title'         => "Pengumuman | Gor-Tombro",
            'pengumuman' => $pengumuman

        );
        $this->load->view('admin/header', $data);
        $this->load->view('admin/pengumuman/pengumuman', $data);
        $this->load->view('admin/footer', $data);
    }
    public function post()
    {

        $data = array(

            'title'         => "Tambah Data Pengumuman | Gor-Tombro",
        );
        $this->load->view('admin/header', $data);
        $this->load->view('admin/pengumuman/post_pengumuman', $data);
        $this->load->view('admin/footer', $data);
    }
    // proses tambah
    function tambah_process()
    {

        $this->pengumuman_model->insertDataPengumuman();
    }
}
