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
}
    
    /* End of file M_lapangan.php */
