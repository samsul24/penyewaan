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
        $this->load->model('jam_model');
    }



    /**
     * 
     *  @ view utama admin (tampilan)
     * 
     */
    public function index()
    {


        $this->data['tanggal'] = array(
            'name'        => 'tanggal[]',
            'id'          => 'tanggal',
            'class'             => 'tanggal',
            'required'    => '',
            'autocomplete'    => 'off',
        );
        $this->data['jam_mulai'] = array(
            'name'        => 'jam_mulai[]',
            'id'          => 'jam_mulai',
            'class'       => 'jam_mulai',
            'required'    => '',
        );
        $lp = $this->lapangan_model->getData();
        $lapangan = $this->lapangan_model->getDataLapangan();
        $dataGrup = $lapangan->result_array();
        $dataGrup2 = $this->lapangan_model->getDataLapangan2()->result_array();
        $sewa = $this->sewa_model->getDataSewa1()->result_array();
        $sewa2 = $this->sewa_model->getDataSewa2()->result_array();
        // $data = $this->sewa_model->deleteData();
        $data = array(

            'title'         => "Member | Gor-Tombro",
            'lapangan' => $dataGrup,
            'lapangan2' => $dataGrup2,
            'pilih' => $lp,
            'sewa' => $sewa,
            'sewa2' => $sewa2,
        );

        $this->load->view('template/header', $data);
        $this->load->view('member/sewa', $this->data);
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
    public function getJamMulai()
    {
        $tanggal = $this->input->post('tanggal');
        $id_lapangan = $this->input->post('id_lapangan');

        if ($tanggal === FALSE || $id_lapangan === FALSE) {
            echo json_encode(array());
            die();
        }

        $list_jam_mulai_terpakai = $this->jam_model->get_jam_mulai_terpakai($tanggal, $id_lapangan);
        // var_dump($list_jam_mulai_terpakai);
        // exit;
        $list_jam_mulai_terpakai_arr = array();
        foreach ($list_jam_mulai_terpakai as $a_jam) {

            if (intval($a_jam->durasi) > 1) {
                $list_jam_range = $this->jam_model->get_jam_range($a_jam->jam_mulai, $a_jam->jam_selesai);
                foreach ($list_jam_range as $a_jam_from_range) {
                    if (!in_array($a_jam_from_range->jam, $list_jam_mulai_terpakai_arr))
                        array_push($list_jam_mulai_terpakai_arr, $a_jam_from_range->jam);
                }
            } else {
                if (!in_array($a_jam->jam_mulai, $list_jam_mulai_terpakai_arr))
                    array_push($list_jam_mulai_terpakai_arr, $a_jam->jam_mulai);
            }
        }

        $list_jam = $this->jam_model->get();

        $list_jam_arr = array();
        foreach ($list_jam as $a_jam) {
            array_push($list_jam_arr, $a_jam->jam);
        }

        $result = array();

        foreach ($list_jam_arr as $a_jam) {
            if (!in_array($a_jam, $list_jam_mulai_terpakai_arr)) {
                $a_jam_row = new stdClass();
                $a_jam_row->durasi = '1';
                $a_jam_row->jam_mulai = $a_jam;

                array_push($result, $a_jam_row);
            }
        }

        echo json_encode($result);
    }
}
