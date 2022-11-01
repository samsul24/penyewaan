<?php


defined('BASEPATH') or exit('No direct script access allowed');

class pengumuman_model extends CI_Model
{



    // ambil data pengumuman
    function getDatapengumuman()
    {

        return $this->db->get('pengumuman');
    }

    // proses tambah pengumuman
    function insertDataPengumuman()
    {


        $data = array(

            'objek'     => $this->input->post('objek'),
            'deskripsi' => $this->input->post('deskripsi'),
            'status' => $this->input->post('status'),
        );

        // execute query insert
        $this->db->insert('pengumuman', $data);
        // pemberitahuan
        $html = '<div class="alert alert-success">Pemberitahuan <br> <label>Data pengumuman berhasil ditambahkan</label></div>';
        $this->session->set_flashdata('msg', $html);

        // redirect 
        redirect('admin/pengumuman');
    }




    function deleteDataPengumuman($id)
    {


        // get data informasi pengumuman
        $sql = "SELECT * FROM pengumuman WHERE id = '$id'";
        $this->db->query($sql);
        $this->db->where('id', $id);
        $this->db->delete('pengumuman');


        // pemberitahuan
        $html = '<div class="alert alert-success">Pemberitahuan <br> <label>Data pengumuman berhasil dihapus</label></div>';
        $this->session->set_flashdata('msg', $html);


        // redirect
        redirect('admin/pengumuman');
    }


    function updateDataPengumuman($id)
    {


        $data = array(

            'objek'     => $this->input->post('objek'),
            'deskripsi'     => $this->input->post('deskripsi'),
            'status'     => $this->input->post('status'),
        );

        $this->db->where('id', $id);
        $this->db->update('pengumuman', $data);


        // pemberitahuan
        $html = '<div class="alert alert-success">Pemberitahuan <br> <label>Data pengumuman berhasil diperbarui</label></div>';
        $this->session->set_flashdata('msg', $html);

        redirect('admin/pengumuman');
    }
}
    
    /* End of file M_pengumuman.php */
