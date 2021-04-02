<?php
Class Barang extends CI_Controller {

	public function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $data['title'] = "Barang - Kancil Mart";
            $this->load->view('Head',$data);
            $this->load->model('Barang_Model');
            $this->load->helper('form');
			$this->load->library('form_validation');
    }

    public function index()
	{
        $this->load->view('Barang');
        $this->load->view('Statistik');
    }

    public function daftar_barang()
    {
        $data['barang'] = $this->Barang_Model->getlistfull();
        $this->load->view('Barang');
        $this->load->view('Daftar_Barang',$data);       
    }

    public function delete_barang($id)
    {
        $this->Barang_Model->deletebarang($id);
        redirect(base_url('index.php/barang/daftar_barang'));
    }

    public function tambah_barang()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama_Barang', 'required');
        $this->form_validation->set_rules('harga_beli', 'Harga_Beli', 'required');
        $this->form_validation->set_rules('harga_jual', 'Harga_Jual', 'required');
        $data['Nama_Barang'] = $this->input->post('nama_barang');
        $data['Harga_Beli'] = $this->input->post('harga_beli');
        $data['Harga_Jual'] = $this->input->post('harga_jual');
        $data['stok'] = NULL;
        if( $data['stok'] == NULL)
        {
            $data['stok'] = 0;
        }
        if($this->form_validation->run() == FALSE)
        {
            $this->form_validation->set_message('rule', 'Semua Field Harus Diisi');
            redirect(base_url('index.php/barang/daftar_barang'));
        }
        else
        {
            $this->Barang_Model->add_barang($data);
            redirect(base_url('index.php/barang/daftar_barang'));
        }
    }

}
