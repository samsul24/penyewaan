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
        $this->load->model('filter_model');
        $this->load->library('pdf');
    }



    /**
     * 
     *  @ view utama admin (tampilan)
     * 
     */

    public function sewa1()
    {
        $this->session->unset_userdata('startSession');
        $this->session->unset_userdata('endSession');
        $data_sewa_hari = $this->sewa_model->countHari();
        $data_sewa_bulan = $this->sewa_model->countBulan();
        $tahun = $this->sewa_model->gettahun();
        $data_sewa_tahun = $this->sewa_model->countTahun();
        $lapangan = $this->lapangan_model->getData();

        $sewa = $this->sewa_model->getDataSewa1()->result_array();
        $data = array(

            'title'         => "Data Lapangan | Gor-Tombro",
            'sewa' => $sewa,
            'data_sewa_hari' => $data_sewa_hari,
            'data_sewa_bulan' => $data_sewa_bulan,
            'data_sewa_tahun' => $data_sewa_tahun,
            'tahun' => $tahun,
            'lapangan' => $lapangan,
        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/lapangan/sewa1', $data);
        $this->load->view('templates/footer', $data);
    }
    public function filter1()
    {
        $this->session->unset_userdata('startdate');
        $this->session->unset_userdata('enddate');
        $sewa = $this->sewa_model->filter1();
        $data_sewa_hari = $this->sewa_model->countHari();
        $data_sewa_bulan = $this->sewa_model->countBulan();
        $data_sewa_tahun = $this->sewa_model->countTahun();
        $tahun = $this->sewa_model->gettahun();

        $lapangan = $this->lapangan_model->getData();

        // $sewa = $this->sewa_model->getDataSewa1()->result_array();
        $data = array(

            'title'         => "Data Lapangan | Gor-Tombro",
            'sewa' => $sewa,
            'tahun' => $tahun,
            'data_sewa_hari' => $data_sewa_hari,
            'data_sewa_bulan' => $data_sewa_bulan,
            'data_sewa_tahun' => $data_sewa_tahun,
            'lapangan' => $lapangan,


        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/lapangan/sewa1', $data);
        $this->load->view('templates/footer', $data);
    }
    public function sewa2()
    {

        $this->session->unset_userdata('startSession');
        $this->session->unset_userdata('endSession');
        $data_sewa_hari = $this->sewa_model->countHari2();
        $data_sewa_bulan = $this->sewa_model->countBulan2();
        $tahun = $this->sewa_model->gettahun2();
        $data_sewa_tahun = $this->sewa_model->countTahun2();

        $lapangan = $this->lapangan_model->getData();

        $sewa = $this->sewa_model->getDataSewa2()->result_array();
        $data = array(

            'title'         => "Data Lapangan | Gor-Tombro",
            'data_sewa_hari' => $data_sewa_hari,
            'data_sewa_bulan' => $data_sewa_bulan,
            'data_sewa_tahun' => $data_sewa_tahun,
            'tahun' => $tahun,
            'sewa' => $sewa,
            'lapangan' => $lapangan,


        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/lapangan/sewa2', $data);
        $this->load->view('templates/footer', $data);
    }

    public function filter2()
    {
        $this->session->unset_userdata('startdate');
        $this->session->unset_userdata('enddate');
        $sewa = $this->sewa_model->filter2();
        $data_sewa_hari = $this->sewa_model->countHari2();
        $data_sewa_bulan = $this->sewa_model->countBulan2();
        $data_sewa_tahun = $this->sewa_model->countTahun2();
        $tahun = $this->sewa_model->gettahun();

        $lapangan = $this->lapangan_model->getData();
        $data = array(

            'title'         => "Data Lapangan | Gor-Tombro",
            'sewa' => $sewa,
            'tahun' => $tahun,
            'data_sewa_hari' => $data_sewa_hari,
            'data_sewa_bulan' => $data_sewa_bulan,
            'data_sewa_tahun' => $data_sewa_tahun,
            'lapangan' => $lapangan,


        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/lapangan/sewa2', $data);
        $this->load->view('templates/footer', $data);
    }

    function ubah_process1($id_sewa)
    {

        $this->sewa_model->updateDataSewa1($id_sewa);
    }
    function ubah_process2($id_sewa)
    {

        $this->sewa_model->updateDataSewa2($id_sewa);
    }
    function hapus_process1($id_sewa)
    {

        $this->sewa_model->deleteDataSewa1($id_sewa);
    }
    function hapus_process2($id_sewa)
    {

        $this->sewa_model->deleteDataSewa2($id_sewa);
    }

    public function filterLaporanLapangan1()
    {
        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalakhir = $this->input->post('tanggalakhir');
        $tahun1 = $this->input->post('tahun1');
        $bulanawal = $this->input->post('bulanawal');
        $bulanakhir = $this->input->post('bulanakhir');
        $tahun2 = $this->input->post('tahun2');
        $nilaifilter = $this->input->post('nilaifilter');


        if ($nilaifilter == 1) {
            $data['title'] = "Laporan Sewa Lapangan 1 Berdasarkan Tanggal";
            $data['subtitle'] = "Dari tanggal : " . $tanggalawal . ' Sampai tanggal : ' . $tanggalakhir;
            $data['sewa'] = $this->filter_model->filterbytanggal1($tanggalawal, $tanggalakhir);
            $data['lapangan'] = $this->filter_model->filterbytanggal1($tanggalawal, $tanggalakhir);
            $this->pdf->set_option('isRemoteEnabled', true);
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "Laporan Sewa.pdf";
            $this->pdf->load_view('admin/laporan/laporan_pdf', $data);
        } elseif ($nilaifilter == 2) {

            $data['title'] = "Laporan Sewa Lapangan 1 Berdasarkan Bulan";
            $data['subtitle'] = "Dari bulan : " . $bulanawal . ' Sampai bulan : ' . $bulanakhir . ' Tahun : ' . $tahun1;
            $data['sewa'] = $this->filter_model->filterbybulan1($tahun1, $bulanawal, $bulanakhir);
            $data['lapangan'] = $this->filter_model->filterbybulan1($tahun1, $bulanawal, $bulanakhir);
            $this->load->library('pdf');
            $this->pdf->set_option('isRemoteEnabled', true);
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "Laporan Sewa.pdf";
            $this->pdf->load_view('admin/laporan/laporan_pdf', $data);
        } elseif ($nilaifilter == 3) {

            $data['title'] = "Laporan Sewa Lapangan 1 Berdasarkan Tahun";
            $data['subtitle'] = ' Tahun : ' . $tahun2;
            $data['sewa'] = $this->filter_model->filterbytahun1($tahun2);
            $data['lapangan'] = $this->filter_model->filterbytahun1($tahun2);
            $this->load->library('pdf');
            $this->pdf->set_option('isRemoteEnabled', true);
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "Laporan Sewa.pdf";
            $this->pdf->load_view('admin/laporan/laporan_pdf', $data);
        }
    }
    public function filterLaporanLapangan2()
    {
        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalakhir = $this->input->post('tanggalakhir');
        $tahun1 = $this->input->post('tahun1');
        $bulanawal = $this->input->post('bulanawal');
        $bulanakhir = $this->input->post('bulanakhir');
        $tahun2 = $this->input->post('tahun2');
        $nilaifilter = $this->input->post('nilaifilter');


        if ($nilaifilter == 1) {
            $data['title'] = "Laporan Sewa Lapangan 1 Berdasarkan Tanggal";
            $data['subtitle'] = "Dari tanggal : " . $tanggalawal . ' Sampai tanggal : ' . $tanggalakhir;
            $data['sewa'] = $this->filter_model->filterbytanggal2($tanggalawal, $tanggalakhir);
            $data['lapangan'] = $this->filter_model->filterbytanggal2($tanggalawal, $tanggalakhir);
            $this->pdf->set_option('isRemoteEnabled', true);
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "Laporan Sewa.pdf";
            $this->pdf->load_view('admin/laporan/laporan_pdf', $data);
        } elseif ($nilaifilter == 2) {

            $data['title'] = "Laporan Sewa Lapangan 1 Berdasarkan Bulan";
            $data['subtitle'] = "Dari bulan : " . $bulanawal . ' Sampai bulan : ' . $bulanakhir . ' Tahun : ' . $tahun1;
            $data['sewa'] = $this->filter_model->filterbybulan2($tahun1, $bulanawal, $bulanakhir);
            $data['lapangan'] = $this->filter_model->filterbybulan2($tahun1, $bulanawal, $bulanakhir);
            $this->load->library('pdf');
            $this->pdf->set_option('isRemoteEnabled', true);
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "Laporan Sewa.pdf";
            $this->pdf->load_view('admin/laporan/laporan_pdf', $data);
        } elseif ($nilaifilter == 3) {

            $data['title'] = "Laporan Sewa Lapangan 1 Berdasarkan Tahun";
            $data['subtitle'] = ' Tahun : ' . $tahun2;
            $data['sewa'] = $this->filter_model->filterbytahun2($tahun2);
            $data['lapangan'] = $this->filter_model->filterbytahun2($tahun2);
            $this->load->library('pdf');
            $this->pdf->set_option('isRemoteEnabled', true);
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "Laporan Sewa.pdf";
            $this->pdf->load_view('admin/laporan/laporan_pdf', $data);
        }
    }
}
