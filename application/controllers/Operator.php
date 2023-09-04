<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_operator');
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarope', $data);
        $this->load->view('operator/index', $data);
        $this->load->view('templates/footer');
    }

    public function dataSiswa()
    {
        $this->db->from('t_datasiswa');
        $data['title'] = 'DataSiswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['DataSiswa'] = $this->M_operator->lihat_dataSiswa();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarope', $data);
        $this->load->view('operator/dataSiswa', $data);
        $this->load->view('templates/footer');
    }
    public function add_Siswa()
    {
        $nis             = $this->input->post('nis');
        $nama_siswa      = $this->input->post('nama_siswa');
        $tempat_lahir    = $this->input->post('tempat_lahir');
        $tanggal_lahir   = $this->input->post('tanggal_lahir');
        $jenis_kelamin  =  $this->input->post('jenis_kelamin');
        $alamat         = $this->input->post('alamat');
        $kelas        = $this->input->post('kelas');
        $data = array(
            'nis'           => $nis,
            'nama_siswa'    => $nama_siswa,
            'tempat_lahir'  => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'alamat'        => $alamat,
            'kelas'         => $kelas

        );
        $this->M_operator->add_datasiswa('t_datasiswa', $data);
        redirect('operator/dataSiswa');
    }
    public function UpdateSiswa($nis)
    {
        $data['title'] = 'DataSiswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('nis' => $nis);
        $data['DataSiswa'] = $this->M_operator->edit_data($where, 't_datasiswa')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarope');
        $this->load->view('admin/updatesiswa', $data);
        $this->load->view('templates/footer');
    }
    public function update_aksi()
    {
        $id              = $this->input->post('id_siswa');
        $nis             = $this->input->post('nis');
        $nama_siswa      = $this->input->post('nama_siswa');
        $tempat_lahir    = $this->input->post('tempat_lahir');
        $tanggal_lahir   = $this->input->post('tanggal_lahir');
        $jenis_kelamin   = $this->input->post('jenis_kelamin');
        $alamat          = $this->input->post('alamat');

        $data = array(
            'nis'           => $nis,
            'nama_siswa'    => $nama_siswa,
            'tempat_lahir'  => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'alamat'        => $alamat
        );
        $where = array(
            'nis' => $nis
        );
        $this->M_operator->update_data('t_datasiswa', $data, $where);
        $this->session->set_userdata('pesan', 'e');
        redirect('admin');
    }
    public function deletedataSiswa($nis)
    {
        $where = array('nis' => $nis);
        $this->M_operator->deletedata_Siswa($where, 't_datasiswa');
        redirect('operator/datasiswa');
    }

    public function dataGuru()
    {
        $this->db->from('t_dataguru');
        $data['title'] = 'DataGuru';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['DataGuru'] = $this->M_operator->lihatdataGuru();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarope', $data);
        $this->load->view('operator/dataguru', $data);
        $this->load->view('templates/footer');
    }

    public function DataLaporan()
    {
        $data['title'] = 'DataLaporan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['DataLaporan'] = $this->M_operator->lihatdataLaporan()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarope', $data);
        $this->load->view('operator/datalaporan', $data);
        $this->load->view('templates/footer');
    }
}
