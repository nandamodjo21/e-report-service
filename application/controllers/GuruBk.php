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
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['user_role'] = $data['user']['role_id'];
        // $data['level'] = $data['user_role']['role'];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarbk',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('gurubk/index', $data);
        $this->load->view('templates/footer');
    }

    public function dataLaporan()
    {
        $data['title'] = 'DataLaporan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user_role'] = $data['user']['role_id'];
        $data['DataLaporan'] = $this->M_GuruBk->lihatdataLaporan()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarbk',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/datalaporan', $data);
        $this->load->view('templates/footer');

    }
}