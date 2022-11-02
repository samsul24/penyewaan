<?php


defined('BASEPATH') or exit('No direct script access allowed');

class sewa_model extends CI_Model
{



    // ambil data sewa
    function getDataSewa1()
    {
        $tgl    = date("Y-m-d");

        $this->db->select('*');
        $this->db->from('data_sewa');
        $this->db->join('lapangan', 'lapangan.id_lapangan = data_sewa.id_lapangan', 'left');
        $this->db->where('lapangan.id_lapangan', 1);
        $this->db->where('data_sewa.tanggal', $tgl);
        $query = $this->db->get();

        return $query;
    }
    function getDataSewa2()
    {
        $tgl    = date("Y-m-d");
        $this->db->select('*');
        $this->db->from('data_sewa');
        $this->db->join('lapangan', 'lapangan.id_lapangan = data_sewa.id_lapangan', 'left');
        $this->db->where('lapangan.id_lapangan', 2);
        $this->db->where('data_sewa.tanggal', $tgl);
        $query = $this->db->get();

        return $query;
    }

    // proses tambah lapangan
    function insertDataSewa()
    {
        $count = count($this->input->post('id_lapangan'));
        for ($i = 0; $i < $count; $i++) {
            $data = array(

                'id_user'     => $this->input->post('id_user[' . $i . ']'),
                'nama' => $this->input->post('nama[' . $i . ']'),
                'status' => $this->input->post('status[' . $i . ']'),
                'id_lapangan'   => $this->input->post('id_lapangan[' . $i . ']'),
                'tanggal'   => $this->input->post('tanggal[' . $i . ']'),
                'jam_mulai'   => $this->input->post('jam_mulai[' . $i . ']'),
                'jam_selesai'   => $this->input->post('jam_mulai[' . $i . ']') + $this->input->post('durasi[' . $i . ']') . ":00:00",
                'durasi'   => $this->input->post('durasi[' . $i . ']'),
            );
        }
        // var_dump($data);
        // exit;
        $this->db->insert('data_sewa', $data);

        // execute query insert

        // pemberitahuan
        $html = '<div class="alert alert-success">Pemberitahuan <br> <label>Data sewa berhasil ditambahkan <br> Silahkan Selesaikan Administrasi</label></div>';
        $this->session->set_flashdata('msg', $html);

        // redirect 
        redirect(site_url('member/Sewa'));
    }

    function detailDataSewa($id_sewa)
    {

        // $sess_id = $this->session->userdata('');

        $sql = "SELECT data_sewa.*,lapangan.* 

                FROM data_sewa 
                JOIN lapangan ON lapangan.id_lapangan = data_sewa.id_lapangan
                
                WHERE data_sewa.id_sewa = '$id_sewa'";

        return $this->db->query($sql);
    }


    function deleteDataSewa1($id_sewa)
    {


        // get data informasi lapangan
        $sql = "SELECT * FROM data_sewa WHERE id_sewa = '$id_sewa'";
        $this->db->query($sql);
        $this->db->where('id_sewa', $id_sewa);
        $this->db->delete('data_sewa');


        // pemberitahuan
        $html = '<div class="alert alert-success">Pemberitahuan <br> <label>Data Sewa berhasil dihapus</label></div>';
        $this->session->set_flashdata('msg', $html);


        // redirect
        redirect('admin/sewa/sewa1');
    }
    function deleteDataSewa2($id_sewa)
    {


        // get data informasi lapangan
        $sql = "SELECT * FROM data_sewa WHERE id_sewa = '$id_sewa'";
        $this->db->query($sql);
        $this->db->where('id_sewa', $id_sewa);
        $this->db->delete('data_sewa');


        // pemberitahuan
        $html = '<div class="alert alert-success">Pemberitahuan <br> <label>Data Sewa berhasil dihapus</label></div>';
        $this->session->set_flashdata('msg', $html);


        // redirect
        redirect('admin/sewa/sewa2');
    }


    function updateDataSewa1($id_sewa)
    {
        $data = array(

            'id_user'     => $this->input->post('id_user'),
            'id_lapangan'     => $this->input->post('id_lapangan'),
            'nama'     => $this->input->post('nama'),
            'tanggal'     => $this->input->post('tanggal'),
            'jam_mulai'     => $this->input->post('jam_mulai'),
            'jam_selesai'     => $this->input->post('jam_selesai'),
            'status'     => $this->input->post('status'),
        );
        // var_dump($data);
        // exit;
        $this->db->where('id_sewa', $id_sewa);
        $this->db->update('data_sewa', $data);


        // pemberitahuan
        $html = '<div class="alert alert-success">Pemberitahuan <br> <label>Data lapangan berhasil diperbarui</label></div>';
        $this->session->set_flashdata('msg', $html);

        redirect('admin/sewa/sewa1');
    }
    function updateDataSewa2($id_sewa)
    {
        $data = array(

            'id_user'     => $this->input->post('id_user'),
            'id_lapangan'     => $this->input->post('id_lapangan'),
            'nama'     => $this->input->post('nama'),
            'tanggal'     => $this->input->post('tanggal'),
            'jam_mulai'     => $this->input->post('jam_mulai'),
            'jam_selesai'     => $this->input->post('jam_selesai'),
            'status'     => $this->input->post('status'),
        );
        // var_dump($data);
        // exit;
        $this->db->where('id_sewa', $id_sewa);
        $this->db->update('data_sewa', $data);


        // pemberitahuan
        $html = '<div class="alert alert-success">Pemberitahuan <br> <label>Data lapangan berhasil diperbarui</label></div>';
        $this->session->set_flashdata('msg', $html);

        redirect('admin/sewa/sewa2');
    }

    //FUNGSI SEWA LAPANGAN SATU


    public function countHari()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM data_sewa where  DAY(tanggal) = DAY(NOW())    AND status = 'disetujui' AND id_lapangan = 1 
         ");
        return $query->row();
    }

    public function countBulan()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM data_sewa where  
                MONTH(tanggal) = MONTH(NOW())   AND status = 'disetujui' AND id_lapangan = '1'");
        return $query->row();
    }

    public function countTahun()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM data_sewa where  
                YEAR(tanggal) = YEAR(NOW())   AND status = 'disetujui' AND id_lapangan = '1'");

        return $query->row();
    }
    public function filter1()
    {
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        if ($this->session->userdata('startSession') == null && $this->session->userdata('endSession') == null) {
            $this->session->set_userdata('startSession', $start);
            $this->session->set_userdata('endSession', $end);
        } else if ($this->session->userdata('startSession') != null && $this->session->userdata('endSession') != null && $start != null && $end != null) {
            $this->session->set_userdata('startSession', $start);
            $this->session->set_userdata('endSession', $end);
        }
        $stSession = $this->session->userdata('startSession');
        $enSession =  $this->session->userdata('endSession');


        $this->db->select('*');
        $this->db->from('data_sewa');
        $this->db->join('lapangan', 'lapangan.id_lapangan = data_sewa.id_lapangan', 'left');
        $this->db->where('lapangan.id_lapangan', 1);
        $this->db->order_by('tanggal', "asc");
        if ($this->session->userdata('startSession') != null && $this->session->userdata('endSession') != null) {
            $this->db->where("DATE(data_sewa.tanggal) BETWEEN ' $stSession 'AND' $enSession'");
        } else {
            $this->db->where("data_sewa.tanggal BETWEEN '$start 'AND' $end'");
        }
        // $q = $this->db->get()->result();

        // var_dump($q);
        // exit;
        return $this->db->get()->result_array();
    }
    public function gettahun()
    {
        $query = $this->db->query("SELECT YEAR(tanggal) AS tahun FROM 
            data_sewa where id_lapangan = '1' GROUP BY YEAR(tanggal) ORDER BY YEAR(tanggal)  
            ASC");
        return $query->result_array();
    }
    public function getMonth1()
    {
        $this->db->select('MONTHNAME(tanggal) as month');
        $this->db->from('data_sewa');
        $this->db->group_by('tanggal');
        $this->db->order_by('id_sewa', 'ASC');
        $this->db->where('status', 'disetujui');
        $this->db->where('id_lapangan', 1);
        return $this->db->get()->result_array();
    }






    //FUNGSI SEWA LAPANGAN DUA

    public function countHari2()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM data_sewa where  DAY(tanggal) = DAY(NOW())    AND status = 'disetujui' AND id_lapangan = '2' 
             ");
        return $query->row();
    }

    public function countBulan2()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM data_sewa where  
                    MONTH(tanggal) = MONTH(NOW())   AND status = 'disetujui' AND id_lapangan = '2'");
        return $query->row();
    }
    public function gettahun2()
    {
        $query = $this->db->query("SELECT YEAR(tanggal) AS tahun FROM 
                data_sewa where id_lapangan = '2' GROUP BY YEAR(tanggal) ORDER BY YEAR(tanggal)  
                ASC");
        return $query->result_array();
    }
    public function countTahun2()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM data_sewa where  
                    YEAR(tanggal) = YEAR(NOW())   AND status = 'disetujui' AND id_lapangan = '2'");
        return $query->row();
    }
    public function filter2()
    {
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        if ($this->session->userdata('startSession') == null && $this->session->userdata('endSession') == null) {
            $this->session->set_userdata('startSession', $start);
            $this->session->set_userdata('endSession', $end);
        } else if ($this->session->userdata('startSession') != null && $this->session->userdata('endSession') != null && $start != null && $end != null) {
            $this->session->set_userdata('startSession', $start);
            $this->session->set_userdata('endSession', $end);
        }
        $stSession = $this->session->userdata('startSession');
        $enSession =  $this->session->userdata('endSession');


        $this->db->select('*');
        $this->db->from('data_sewa');
        $this->db->join('lapangan', 'lapangan.id_lapangan = data_sewa.id_lapangan', 'left');
        $this->db->where('lapangan.id_lapangan', 2);
        $this->db->order_by('tanggal', "asc");
        if ($this->session->userdata('startSession') != null && $this->session->userdata('endSession') != null) {
            $this->db->where("DATE(data_sewa.tanggal) BETWEEN ' $stSession 'AND' $enSession'");
        } else {
            $this->db->where("data_sewa.tanggal BETWEEN '$start 'AND' $end'");
        }
        return $this->db->get()->result_array();
    }
    public function getMonth2()
    {
        $this->db->select('MONTHNAME(tanggal) as month');
        $this->db->from('data_sewa');
        $this->db->group_by('tanggal');
        $this->db->order_by('id_sewa', 'ASC');
        $this->db->where('status', 'disetujui');
        $this->db->where('id_lapangan', 2);
        return $this->db->get()->result_array();
    }
}
