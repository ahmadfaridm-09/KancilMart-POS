<?php
Class Home extends CI_Controller {

    public function index()
	{
        $this->load->helper('url');
        $data['title'] = "Beranda - Kancil Mart";
        $this->load->view('Head',$data);
        $this->load->view('Home');
    }
}