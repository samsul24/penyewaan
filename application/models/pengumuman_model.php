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




    function deleteDataPengumuman($id_pengumuman)
    {


        // get data informasi pengumuman
        $sql = "SELECT * FROM data_pengumuman WHERE id_pengumuman = '$id_pengumuman'";
        $ambilDatapengumuman = $this->db->query($sql)->row_array();

        // hapus file lama
        if ($ambilDatapengumuman['gambar_pengumuman']) {

            $config['upload_path']  = './assets/img/img-pengumuman/';
            $direktori = $config['upload_path'] . $ambilDatapengumuman['gambar_pengumuman'];

            // hapus
            unlink($direktori);
        }


        $this->db->where('id_pengumuman', $id_pengumuman);
        $this->db->delete('data_pengumuman');


        // pemberitahuan
        $html = '<div class="alert alert-success">Pemberitahuan <br> <label>Data pengumuman berhasil dihapus</label></div>';
        $this->session->set_flashdata('msg', $html);


        // redirect
        redirect('admin/pengumuman');
    }


    function updateDataPengumuman($id_pengumuman)
    {


        // get data informasi pengumuman
        $sql = "SELECT * FROM data_pengumuman WHERE id_pengumuman = '$id_pengumuman'";
        $ambilDatapengumuman = $this->db->query($sql)->row_array();

        // inisialisasi variabel 
        $userfile = "";
        $config['upload_path']  = './assets/img/img-pengumuman/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']     = 3000; // max 3 mb
        $config['file_name']    = uniqid();

        $this->load->library('upload', $config);

        // cek apakah user melakukan upload foto
        if (!empty($_FILES['userfile']['name'])) {

            // cek
            if ($this->upload->do_upload('userfile')) {

                $userfile = $this->upload->data('file_name');

                // hapus file lama
                if ($ambilDatapengumuman['gambar_pengumuman']) {

                    $direktori = $config['upload_path'] . $ambilDatapengumuman['gambar_pengumuman'];

                    // hapus
                    unlink($direktori);
                }
            } else { // upload gagal


                // pemberitahuan
                $html = '<div class="alert alert-warning">Pemberitahuan <br><label>' . $this->upload->display_errors() . '</label></div>';
                $this->session->set_flashdata('msg', $html);

                redirect('admin/pengumuman');
            }
        } else {

            if ($ambilDatapengumuman['gambar_pengumuman']) {

                $userfile = $ambilDatapengumuman['gambar_pengumuman'];
            }
        }

        $nilaiTabelpengumuman = array(

            'nama_pengumuman'     => $this->input->post('nama_pengumuman'),
            'alamat_pengumuman'   => $this->input->post('lokasi'),
            'gambar_pengumuman'   => $userfile,
            'deskripsi_pengumuman' => $this->input->post('deskripsi'),
            'status_pengumuman'   => $this->input->post('status')
        );

        $this->db->where('id_pengumuman', $id_pengumuman);
        $this->db->update('data_pengumuman', $nilaiTabelpengumuman);


        // pemberitahuan
        $html = '<div class="alert alert-success">Pemberitahuan <br> <label>Data pengumuman berhasil diperbarui</label></div>';
        $this->session->set_flashdata('msg', $html);

        redirect('admin/pengumuman');
    }
}
    
    /* End of file M_pengumuman.php */
