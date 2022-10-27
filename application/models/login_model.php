<?php

defined('BASEPATH') or exit('No direct script access allowed');

class login_model extends CI_Model
{


    // get query user
    function getDataUser($username)
    {

        $query = "SELECT * FROM user WHERE username = '$username'";

        // eksekusi
        return $this->db->query($query);
    }
}
