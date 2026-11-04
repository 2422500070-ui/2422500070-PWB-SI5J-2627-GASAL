<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ekspedisi2422500070_model extends CI_Model
{
  private $_table = "ekspedisi2422500070";

  public function get_all()
  {
    $query = $this->db->get($this->_table);
    return $query->result_array();
  }

  public function get_by_id($id)
  {
    $this->db->where('id_ekspedisi070', $id);
    $query = $this->db->get($this->_table);
    return $query->row_array();
  }

  public function tambah($data)
  {
    $this->db->insert($this->_table, $data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }

  public function ubah($data, $id)
  {
    $this->db->where('id_ekspedisi070', $id);
    $this->db->update($this->_table, $data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }

  public function hapus($id)
  {
    $this->db->delete($this->_table, array('id_ekspedisi070' => $id));
    return ($this->db->affected_rows() != 1) ? false : true;
  }
}