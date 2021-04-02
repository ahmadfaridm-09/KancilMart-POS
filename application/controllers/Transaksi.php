<?php
Class Transaksi extends CI_Controller {

	public function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $data['title'] = "Transaksi - Kancil Mart";
            $this->load->view('Head',$data);
            $this->load->model('Transaksi_Model');
            $this->load->model('Barang_Model');
            $this->load->helper('form');
			$this->load->library('form_validation');
    }

    public function index()
	{
        $this->load->view('transaksi');
    }

    public function daftar_transaksi()
    {
        $data['transaksi'] = $this->Transaksi_Model->getlistfull();
        $data['perhari'] = $this->Transaksi_Model->get_statistikperhari();
        $data['barang'] = $this->Barang_Model->getlistfull();
        $this->load->view('transaksi');
        $this->load->view('Daftar_Transaksi',$data);       
    }

    public function delete_transaksi($id)
    {
        $this->Transaksi_Model->deletetransaksi($id);
        redirect(base_url('index.php/transaksi/daftar_transaksi'));
    }

    public function tambah_transaksi()
    {
        $this->form_validation->set_rules('tanggal_transaksi', 'Tanggal_transaksi', 'required');
        $this->form_validation->set_rules('id_barang', 'Id_Barang', 'required');
        $this->form_validation->set_rules('jumlah_barang', 'Jumlah_Barang', 'required');
        $data['Id_Barang'] = $this->input->post('id_barang');
        $data['Tanggal_Transaksi'] = $this->input->post('tanggal_transaksi');
        $data['Jumlah_Barang'] = $this->input->post('jumlah_barang');
        if($this->form_validation->run() == FALSE)
        {
            $this->form_validation->set_message('rule', 'Semua Field Harus Diisi');
            redirect(base_url('index.php/transaksi/daftar_transaksi'));
        }
        else
        {
            $this->Transaksi_Model->add_transaksi($data);
            redirect(base_url('index.php/transaksi/daftar_transaksi'));
        }
    }

}