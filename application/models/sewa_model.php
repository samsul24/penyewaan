<?php


defined('BASEPATH') or exit('No direct script access allowed');

class sewa_model extends CI_Model
{



    // ambil data sewa
    function getDataSewa1()
    {

        $this->db->select('*');
        $this->db->from('data_sewa');
        $this->db->join('lapangan', 'lapangan.id_lapangan = data_sewa.id_lapangan', 'left');
        $this->db->where('lapangan.id_lapangan', 1);
        // $this->db->where('data_sewa.status', 'disetujui');
        $query = $this->db->get();

        return $query;
    }
    function getDataSewa2()
    {

        $this->db->select('*');
        $this->db->from('data_sewa');
        $this->db->join('lapangan', 'lapangan.id_lapangan = data_sewa.id_lapangan', 'left');
        $this->db->where('lapangan.id_lapangan', 2);
        // $this->db->where('data_sewa.status', 'disetujui');
        $query = $this->db->get();

        return $query;
    }

    // proses tambah lapangan
    function insertDataSewa()
    {


        // inisialisasi variabel 
        $data = array(

            'id_user'     => $this->input->post('id_user'),
            'nama' => $this->input->post('nama'),
            'status' => $this->input->post('status'),
            'id_lapangan'   => $this->input->post('id_lapangan'),
            'tanggal'   => $this->input->post('tanggal'),
            'start_time'   => $this->input->post('start_time'),
            'end_time'   => $this->input->post('end_time'),
        );
        // var_dump($data);
        // exit;
        // execute query insert
        $this->db->insert('data_sewa', $data);

        // pemberitahuan
        $html = '<div class="alert alert-success">Pemberitahuan <br> <label>Data sewa berhasil ditambahkan</label></div>';
        $this->session->set_flashdata('msg', $html);

        // redirect 
        redirect('member/Sewa');
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


    function deleteData()
    {
        $sql = "DELETE FROM `data_sewa` WHERE `id_sewa` IN (
            SELECT * FROM (
              SELECT `id_sewa` FROM `data_sewa` WHERE DATEDIFF(CURRENT_DATE,`tanggal`) >= 2 
            ) AS t2
          )";
        return $this->db->query($sql);
    }
    function deleteDataSewa($id_sewa)
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
        redirect('admin/lapangan/sewa1');
    }


    function updateDataSewa($id_sewa)
    {
        $data = array(

            'id_user'     => $this->input->post('id_user'),
            'id_lapangan'     => $this->input->post('id_lapangan'),
            'nama'     => $this->input->post('nama'),
            'tanggal'     => $this->input->post('tanggal'),
            'start_time'     => $this->input->post('start_time'),
            'end_time'     => $this->input->post('end_time'),
            'status'     => $this->input->post('status'),
        );
        // var_dump($data);
        // exit;
        $this->db->where('id_sewa', $id_sewa);
        $this->db->update('data_sewa', $data);


        // pemberitahuan
        $html = '<div class="alert alert-success">Pemberitahuan <br> <label>Data lapangan berhasil diperbarui</label></div>';
        $this->session->set_flashdata('msg', $html);

        redirect('admin/lapangan/sewa1');
    }
}
    
    /* End of file M_lapangan.php */
