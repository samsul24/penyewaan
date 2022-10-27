<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Lapangan extends CI_Controller
{


    function __construct()
    {

        parent::__construct();

        // memanggil model
        $this->load->model('lapangan_model');
        $this->load->model('sewa_model');
    }



    /**
     * 
     *  @ view utama admin (tampilan)
     * 
     */
    public function index()
    {
        $lapangan = $this->lapangan_model->getData();
        $sewa = $this->sewa_model->getDataSewa1()->result_array();
        $sewa2 = $this->sewa_model->getDataSewa2()->result_array();
        $data = array(

            'title'         => "Data Lapangan | Gor-Tombro",
            'lapangan' => $lapangan,
            'sewa' => $sewa,
            'sewa2' => $sewa2

        );
        $this->load->view('admin/header', $data);
        $this->load->view('admin/lapangan/lapangan', $data);
        $this->load->view('admin/footer', $data);
    }
    public function post()
    {

        $data = array(

            'title'         => "Tambah Data Lapangan | Gor-Tombro",
        );
        $this->load->view('admin/header', $data);
        $this->load->view('admin/lapangan/post_lapangan', $data);
        $this->load->view('admin/footer', $data);
    }
    // proses tambah
    function tambah_process()
    {

        $this->lapangan_model->insertDataLapangan();
    }
    function ubah_process()
    {

        $this->sewa_model->updateDataSewa();
    }
}
