<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Sewa extends CI_Controller
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
        $lapangan = $this->lapangan_model->getDataLapangan();
        $dataGrup = $lapangan->result_array();
        $dataGrup2 = $this->lapangan_model->getDataLapangan2()->result_array();
        $sewa = $this->sewa_model->getDataSewa1()->result_array();
        $sewa2 = $this->sewa_model->getDataSewa2()->result_array();
        $data = $this->sewa_model->deleteData();

        $data = array(

            'title'         => "Member | Gor-Tombro",
            'lapangan' => $dataGrup,
            'lapangan2' => $dataGrup2,
            'pilih' => $lapangan,
            'sewa' => $sewa,
            'sewa2' => $sewa2,
        );
        $this->load->view('template/header', $data);
        $this->load->view('member/sewa', $data);
        $this->load->view('template/footer', $data);
    }
    function pesan_process()
    {

        $this->sewa_model->insertDataSewa();
    }
    function detail($id_sewa)
    {

        $detail = $this->sewa_model->detailDataSewa($id_sewa);
        $lapangan = $this->lapangan_model->getDataLapangan()->result_array();
        $data = array(

            'title'         => "Detail | Gor-Tombro",
            'detail' => $detail,
            'lapangan' => $lapangan,
        );
        $this->load->view('template/header', $data);
        $this->load->view('member/detail', $data);
        $this->load->view('template/footer', $data);
    }
}
