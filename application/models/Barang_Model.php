<?php
class Barang_Model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        public function getlistfull()
        {
          $query = $this->db->get('barang');
          return $query->result_array();
        }
        public function deletebarang($id)
        {
             $this->db->where('id_barang', $id);
             $this->db->delete('barang');
        }

        public function add_barang($data)
        {
                $this->db->insert('barang',$data);
        }
    }