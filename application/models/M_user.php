<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    public function get_user()
    {

        $this->db->select('*');
        $this->db->from('user');
        $this->db->order_by('id', 'DESC');
        return $this->db->get();
    }
    public function save_user($data)
	{
	  //insert data
	  return $this->db->insert("user", $data);
	}

	public function edit_user($id)
		{
		    //edity data
		    $query = $this->db->where("id", $id)->get("user");
		    return $query->row();
		}

	public function update_user($data, $id)
	{
	  =
	   return $this->db->update("user", $data, $id);
	}

	function hapus_data($where,$table)
	{
	$this->db->where($where);
	$this->db->delete($table);
	}
}