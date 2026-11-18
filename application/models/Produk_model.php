<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_Model
{
    private $_table = "produk";

    public function get_all()
    {
        $this->db->select('produk.id_produk, produk.nama_produk as pd_nama, produk.stok, produk.spesifikasi as deskripsi, produk.harga, produk.berat_kg, kategori.nama_kategori as kt_nama');
        $this->db->from($this->_table);
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tambah($data)
    {
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }

    public function get_by_id($id)
    {
        $this->db->where('id_produk', $id);
        $query = $this->db->get($this->_table);
        return $query->row_array();
    }

    public function ubah($data, $id)
    {
        $this->db->where('id_produk', $id);
        $this->db->update($this->_table, $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function hapus($id)
    {
        $this->db->delete($this->_table, array('id_produk' => $id));
    }
}