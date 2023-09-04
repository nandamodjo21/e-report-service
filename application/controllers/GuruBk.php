<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GuruBk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_GuruBk');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('gurubk/index', $data);
        $this->load->view('templates/footer');
    }

    public function DataLaporan()
    {
        $data['title'] = 'DataLaporan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['DataLaporan'] = $this->M_GuruBk->lihatdataLaporan()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('gurubk/laporan', $data);
        $this->load->view('templates/footer');

    }
}