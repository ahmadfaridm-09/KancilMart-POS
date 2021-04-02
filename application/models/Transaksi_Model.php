<?php
class Transaksi_Model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        public function getlistfull()
        {
          $query = $this->db->query('SELECT * from transaksi');
          return $query->result_array();
        }

        public function get_statistikperhari()
        {
                $query = $this->db->query('SELECT COUNT(`id_transaksi`) as `total_transaksi`, SUM(`total_harga`) as `total_harga`,`tanggal_transaksi` FROM transaksi GROUP BY tanggal_transaksi');
                return $query->result_array();
        }

        public function deletetransaksi($id)
        {
             $this->db->where('id_transaksi', $id);
             $this->db->delete('transaksi');
        }

        public function add_transaksi($data)
        {
                $this->db->insert('transaksi',$data);
        }
    }