<?php


defined('BASEPATH') or exit('No direct script access allowed');

class lapangan_model extends CI_Model
{



    // ambil data lapangan
    function getData()
    {
        $this->db->select('*');
        $this->db->from('lapangan');

        // $this->db->join('data_sewa', 'data_sewa.id_lapangan = lapangan.id_lapangan', 'left');
        $query = $this->db->get();

        return $query;
    }
    function getDataLapangan()
    {
        $this->db->select('*');
        $this->db->from('lapangan');
        $this->db->where('id_lapangan', 1);
        $this->db->where('status_lapangan', 'tersedia');
        $query = $this->db->get();

        return $query;
    }
    function getDataLapangan2()
    {
        $this->db->select('*');
        $this->db->from('lapangan');
        $this->db->where('id_lapangan', 2);
        $this->db->where('status_lapangan', 'tersedia');

        $query = $this->db->get();

        return $query;
    }

    // proses tambah lapangan
    function insertDataLapangan()
    {


        // inisialisasi variabel 
        $gambar = "";
        $config['upload_path']          = './assets/images/lapangan/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 3000; // max 3 mb
        $config['file_name']    = uniqid();

        $this->load->library('upload', $config);

        // cek apakah user melakukan upload foto
        if (!empty($_FILES['userfile']['name'])) {

            // cek
            if ($this->upload->do_upload('userfile')) {

                $gambar = $this->upload->data('file_name');
            } else { // upload gagal


                // pemberitahuan
                $html = '<div class="alert alert-warning">Pemberitahuan <br><label>' . $this->upload->display_errors() . '</label></div>';
                $this->session->set_flashdata('msg', $html);

                redirect('admin/lapangan');
            }
        }


        $data = array(

            'nama_lapangan'     => $this->input->post('nama_lapangan'),
            'deskripsi_lapangan' => $this->input->post('deskripsi_lapangan'),
            'status_lapangan'   => $this->input->post('status_lapangan'),
            'gambar_lapangan'   =>  $gambar,
            'date'   =>  time(),
        );

        // execute query insert
        $this->db->insert('lapangan', $data);

        // pemberitahuan
        $html = '<div class="alert alert-success">Pemberitahuan <br> <label>Data lapangan berhasil ditambahkan</label></div>';
        $this->session->set_flashdata('msg', $html);

        // redirect 
        redirect('admin/lapangan');
    }




    function deleteDataLapangan($id_lapangan)
    {


        // get data informasi lapangan
        $sql = "SELECT * FROM lapangan WHERE id_lapangan = '$id_lapangan'";
        $ambilDataLapangan = $this->db->query($sql)->row_array();

        // hapus file lama
        if ($ambilDataLapangan['gambar_lapangan']) {

            $config['upload_path']  = './assets/img/img-lapangan/';
            $direktori = $config['upload_path'] . $ambilDataLapangan['gambar_lapangan'];

            // hapus
            unlink($direktori);
        }


        $this->db->where('id_lapangan', $id_lapangan);
        $this->db->delete('lapangan');


        // pemberitahuan
        $html = '<div class="alert alert-success">Pemberitahuan <br> <label>Data lapangan berhasil dihapus</label></div>';
        $this->session->set_flashdata('msg', $html);


        // redirect
        redirect('admin/lapangan');
    }


    function updateDataLapangan($id_lapangan)
    {


        // get data informasi lapangan
        $sql = "SELECT * FROM lapangan WHERE id_lapangan = '$id_lapangan'";
        $ambilDataLapangan = $this->db->query($sql)->row_array();

        // inisialisasi variabel 
        $userfile = "";
        $config['upload_path']  = './assets/img/img-lapangan/';
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
                if ($ambilDataLapangan['gambar_lapangan']) {

                    $direktori = $config['upload_path'] . $ambilDataLapangan['gambar_lapangan'];

                    // hapus
                    unlink($direktori);
                }
            } else { // upload gagal


                // pemberitahuan
                $html = '<div class="alert alert-warning">Pemberitahuan <br><label>' . $this->upload->display_errors() . '</label></div>';
                $this->session->set_flashdata('msg', $html);

                redirect('admin/lapangan');
            }
        } else {

            if ($ambilDataLapangan['gambar_lapangan']) {

                $userfile = $ambilDataLapangan['gambar_lapangan'];
            }
        }

        $nilaiTabelLapangan = array(

            'nama_lapangan'     => $this->input->post('nama_lapangan'),
            'deskripsi_lapangan' => $this->input->post('deskripsi_lapangan'),
            'status_lapangan'   => $this->input->post('status_lapangan'),
            'gambar_lapangan'   =>  $userfile,
            'date'   =>  time(),
        );

        $this->db->where('id_lapangan', $id_lapangan);
        $this->db->update('lapangan', $nilaiTabelLapangan);


        // pemberitahuan
        $html = '<div class="alert alert-success">Pemberitahuan <br> <label>Data lapangan berhasil diperbarui</label></div>';
        $this->session->set_flashdata('msg', $html);

        redirect('admin/lapangan');
    }
}
    
    /* End of file M_lapangan.php */
