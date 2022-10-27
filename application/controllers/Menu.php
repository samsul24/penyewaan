<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    function __construct()
    {

        parent::__construct();

        // memanggil model
        $this->load->model('lapangan_model');
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function jadwal()
    {
        $lapangan = $this->lapangan_model->getDataLapangan();

        $data = array(

            'title'         => "Halaman Utama | Gor-Tombro",
            'lapangan' => $lapangan

        );
        $this->load->view('template/header', $data);
        $this->load->view('menu/jadwal', $data);
        $this->load->view('template/footer', $data);
    }
}
