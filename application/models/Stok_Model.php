<?php
class Stok_Model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        public function getall_stok_masuk()
        {
          $query = $this->db->query('SELECT * from stok_masuk');
          return $query->result_array();
        }

        public function delete_stok_masuk($id)
        {
             $this->db->where('id_stkmsk', $id);
             $this->db->delete('stok_masuk');
        }

        public function add_stok_masuk($data)
        {
                $this->db->insert('stok_masuk',$data);
        }
    }