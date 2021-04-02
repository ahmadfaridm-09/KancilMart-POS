<?php
Class Kasir extends CI_Controller {

    public function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $data['title'] = "Sistem Kasir - Kancil Mart";
            $this->load->view('Head',$data);
            $this->load->model('Barang_Model');
            $this->load->model('Transaksi_Model');
            $this->load->helper('form');
			$this->load->library('form_validation');
    }

    public function index()
	{
        $data['barang'] = $this->Barang_Model->getlistfull();
        $this->load->view('Kasir', $data);
    }

    public function process_json()
    {
        $data['tanggal_transaksi'] = date("y-m-d");
        $data['nama_barang'] = $this->input->post('barang', TRUE);
        $data['total_harga'] = $this->input->post('total_harga', TRUE);
        $data['bayar'] = $this->input->post('bayar', TRUE);
        $this->Transaksi_Model->add_transaksi($data);
    }
}
