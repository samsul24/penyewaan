<?php

defined('BASEPATH') or exit('No direct script access allowed');

class login_model extends CI_Model
{


    // get query user
    public function getUser($email)
    {
        $this->db->select('user.*');
        return $this->db->get_where('user', ['email' => $email])->result();
    }
    function getDataUser($username)
    {

        $query = "SELECT * FROM user WHERE username = '$username'";

        // eksekusi
        return $this->db->query($query);
    }
    function updateDataUser($id_user)
    {

        $data = array(

            'id_user'     => $this->input->post('id_user'),
            'nama_lengkap'     => $this->input->post('nama_lengkap'),
            'level' => $this->input->post('level'),
            'email'   => $this->input->post('email'),
            'no_telp'   => $this->input->post('no_telp'),
            'username'   => $this->input->post('username'),
            'password'   => $this->input->post('password'),
        );

        $this->db->where('id_user', $id_user);
        $this->db->update('user', $data);


        // pemberitahuan
        $html = '<div class="alert alert-success">Pemberitahuan <br> <label>Data berhasil diperbarui</label></div>';
        $this->session->set_flashdata('msg', $html);

        redirect('admin/home/profile');
    }
    function updateDataUserAll($id_user)
    {

        $data = array(

            'id_user'     => $this->input->post('id_user'),
            'nama_lengkap'     => $this->input->post('nama_lengkap'),
            'level' => $this->input->post('level'),
            'email'   => $this->input->post('email'),
            'no_telp'   => $this->input->post('no_telp'),
            'username'   => $this->input->post('username'),
            'password'   => $this->input->post('password'),
        );

        $this->db->where('id_user', $id_user);
        $this->db->update('user', $data);


        // pemberitahuan
        $html = '<div class="alert alert-success">Pemberitahuan <br> <label>Data berhasil diperbarui</label></div>';
        $this->session->set_flashdata('msg', $html);

        redirect('admin/home/user');
    }
    function deleteDataSewa2($id_user)
    {


        // get data informasi lapangan
        $sql = "SELECT * FROM user WHERE id_user = '$id_user'";
        $this->db->query($sql);
        $this->db->where('id_user', $id_user);
        $this->db->delete('user');


        // pemberitahuan
        $html = '<div class="alert alert-success">Pemberitahuan <br> <label>Data User berhasil dihapus</label></div>';
        $this->session->set_flashdata('msg', $html);


        // redirect
        redirect('admin/home/user');
    }
}
