<?php


defined('BASEPATH') or exit('No direct script access allowed');

class filter_model extends CI_Model
{


    public function filterbytanggal1($tanggalawal, $tanggalakhir)
    {
        $query = $this->db->query("SELECT * FROM data_sewa INNER JOIN lapangan ON data_sewa.id_lapangan = lapangan.id_lapangan
         WHERE data_sewa.id_lapangan = 1 And DATE(tanggal) 
            BETWEEN '$tanggalawal' AND '$tanggalakhir'  AND status = 'disetujui'  ORDER BY tanggal ASC");
        return $query->result();
    }

    public function filterbybulan1($tahun1, $bulanawal, $bulanakhir)
    {
        $query = $this->db->query("SELECT * FROM data_sewa INNER JOIN lapangan ON data_sewa.id_lapangan = lapangan.id_lapangan WHERE data_sewa.id_lapangan = 1 And  YEAR(tanggal) = 
            '$tahun1' AND MONTH(tanggal) BETWEEN '$bulanawal' AND '$bulanakhir' AND status = 'disetujui' 
            ORDER BY tanggal ASC");
        return $query->result();
    }

    public function filterbytahun1($tahun2)
    {
        $query = $this->db->query("SELECT * FROM data_sewa  INNER JOIN lapangan ON data_sewa.id_lapangan = lapangan.id_lapangan WHERE data_sewa.id_lapangan = 1 And   YEAR(tanggal) = 
            '$tahun2'  AND status = 'disetujui'  ORDER BY tanggal ASC ");
        return $query->result();
    }

    public function filterbytanggal2($tanggalawal, $tanggalakhir)
    {
        $query = $this->db->query("SELECT * FROM data_sewa INNER JOIN lapangan ON data_sewa.id_lapangan = lapangan.id_lapangan
         WHERE data_sewa.id_lapangan = 2 And  DATE(tanggal) 
            BETWEEN '$tanggalawal' AND '$tanggalakhir'  AND status = 'disetujui' ORDER BY tanggal ASC");
        return $query->result();
    }

    public function filterbybulan2($tahun1, $bulanawal, $bulanakhir)
    {
        $query = $this->db->query("SELECT * FROM data_sewa INNER JOIN lapangan ON data_sewa.id_lapangan = lapangan.id_lapangan WHERE data_sewa.id_lapangan = 2 And  YEAR(tanggal) = 
            '$tahun1' AND MONTH(tanggal) BETWEEN '$bulanawal' AND '$bulanakhir' AND status = 'disetujui' 
            ORDER BY tanggal ASC");
        return $query->result();
    }

    public function filterbytahun2($tahun2)
    {
        $query = $this->db->query("SELECT * FROM data_sewa  INNER JOIN lapangan ON data_sewa.id_lapangan = lapangan.id_lapangan WHERE data_sewa.id_lapangan = 2 And   YEAR(tanggal) = 
            '$tahun2'  AND status = 'disetujui'  ORDER BY tanggal ASC ");
        return $query->result();
    }

    function chart1()
    {

        $dataChart = array();

        $tahun = date('Y');

        $startMonth = strtotime($tahun . '-' . (01)); // 2021-04
        $endMonth   = strtotime($tahun . '-' . (12)); // ...

        while ($startMonth <= $endMonth) {

            $bulan = date('F', $startMonth); // nama bulan

            $sql = "SELECT * FROM data_sewa WHERE id_lapangan = '1' AND MONTHNAME(tanggal) = '$bulan' AND status = 'disetujui'";
            $query = $this->db->query($sql);

            array_push($dataChart, $query->num_rows());


            // increment 
            $startMonth = strtotime(date('Y-m', strtotime("+1 month", $startMonth)));
        }


        return $dataChart;
    }
    function chart2()
    {

        $dataChart = array();

        $tahun = date('Y');

        $startMonth = strtotime($tahun . '-' . (01)); // 2021-04
        $endMonth   = strtotime($tahun . '-' . (12)); // ...

        while ($startMonth <= $endMonth) {

            $bulan = date('F', $startMonth); // nama bulan

            $sql = "SELECT * FROM data_sewa WHERE id_lapangan = '2' AND MONTHNAME(tanggal) = '$bulan' AND status = 'disetujui'";
            $query = $this->db->query($sql);

            array_push($dataChart, $query->num_rows());


            // increment 
            $startMonth = strtotime(date('Y-m', strtotime("+1 month", $startMonth)));
        }


        return $dataChart;
    }
}
    
    /* End of file M_lapangan.php */
