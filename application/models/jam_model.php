<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class jam_model extends CI_Model
{

	function get()
	{
		$this->db->select('jam');
		$this->db->where('is_available', '1');
		$this->db->order_by('jam', 'asc');
		return $query = $this->db->get('jam')->result();
		// $sql = "
		// 			select
		// 				jam
		// 			from jam
		// 			where is_available = 1
		// 			order by jam
		// 		";
		// $query = $this->db->query($sql);
		//
		// return $query->result();
	}

	function get_jam_range($jam_mulai, $jam_selesai)
	{
		$this->db->select('jam');
		$this->db->where('jam >=', $jam_mulai);
		$this->db->where('jam <', $jam_selesai);
		$this->db->order_by('jam', 'asc');
		return $query = $this->db->get('jam')->result();
		// $sql = "
		// 	SELECT
		// 		jam
		// 	FROM futsal_jam
		// 	WHERE (jam >= ? AND jam < ?)
		// 		AND is_available = 1
		// 	ORDER BY jam
		// ";
		//
		// $query = $this->db->query($sql, array($jam_mulai, $jam_selesai));

	}
	function get_jam_mulai_terpakai($tanggal, $id_lapangan)
	{
		$this->db->select('jam_mulai, durasi, jam_selesai');
		$this->db->where('id_lapangan', $id_lapangan);
		$this->db->where('tanggal', $tanggal);
		return $query = $this->db->get('data_sewa')->result();
	}
}
