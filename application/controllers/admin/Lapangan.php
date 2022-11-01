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
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/lapangan/lapangan', $data);
        $this->load->view('templates/footer');
    }
    function ubah_process($id_lapangan)
    {

        $this->lapangan_model->updateDataLapangan($id_lapangan);
    }
    function hapus_process($id_lapangan)
    {

        $this->lapangan_model->deleteDataLapangan($id_lapangan);
    }
}
