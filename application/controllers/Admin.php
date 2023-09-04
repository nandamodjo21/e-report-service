<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //is_logged_in();
        $this->load->model('M_admin');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['user_role'] = $data['user']['role_id'];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }


    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_role()
    {
        $role = $this->input->post('role');

        $data = array(
            'role' => $role
        );

        $this->db->insert('user_role', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role ditambahkan</div>');
        redirect('admin/role');
    }


    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access diubah!</div>');
    }

    public function DataSiswa()
    {
        $this->db->from('t_datasiswa');
        $data['title'] = 'DataSiswa';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['DataSiswa'] = $this->M_admin->lihatdataSiswa();
        $data['dataKelas'] =  $this->db->query('SELECT * FROM t_kelas')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebardata', $data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/datasiswa', $data);
        $this->load->view('templates/footer');
    }

    public function add_Siswa()
    {
        $nis             = $this->input->post('nis');
        $nama_siswa      = $this->input->post('nama_siswa');
        $tempat_lahir    = $this->input->post('tempat_lahir');
        $tanggal_lahir   = $this->input->post('tanggal_lahir');
        $jenis_kelamin   = $this->input->post('jenis_kelamin');
        $alamat          = $this->input->post('alamat');
        $kelas           = $this->input->post('kelas');
        $data = array(
            'nis'           => $nis,
            'nama_siswa'    => $nama_siswa,
            'tempat_lahir'  => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'alamat'        => $alamat,
            'id_kelas'      => $kelas
        );
        $this->M_admin->add_datasiswa($data, 't_datasiswa');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
        redirect('admin/datasiswa');
    }


    public function Update($nis)
    {
        $data['title'] = 'DataSiswa';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $where = array('nis' => $nis);
        $data['DataSiswa'] = $this->M_admin->edit_data($where, 't_datasiswa')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebardata');
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
        $this->M_admin->update_data('t_datasiswa', $data, $where);
        $this->session->set_userdata('pesan', 'e');
        redirect('admin/DataSiswa');
    }

    public function deletedataSiswa($nis)
    {
        $where = array('nis' => $nis);
        $this->M_admin->deletedata_Siswa($where, 't_datasiswa');
        redirect('admin/datasiswa');
    }


    public function DataGuru()
    {
        $this->db->from('t_dataguru');
        $data['title'] = 'DataGuru';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['DataGuru'] = $this->M_admin->lihatdataGuru();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebardata', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/dataguru', $data);
        $this->load->view('templates/footer');
    }

    public function add_Guru()
    {
        $nip            = $this->input->post('nip');
        $nama_guru      = $this->input->post('nama_guru');
        $jenis_kelamin  = $this->input->post('jenis_kelamin');
        $tempat_lahir   = $this->input->post('tempat_lahir');
        $tanggal_lahir  = $this->input->post('tanggal_lahir');
        $alamat         = $this->input->post('alamat');
        $jabatan        = $this->input->post('jabatan');

        $data = array(
            'nip'           => $nip,
            'nama_guru'     => $nama_guru,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir'  => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'alamat'        => $alamat,
            'jabatan'       => $jabatan
        );
        $this->M_admin->add_dataguru('t_dataguru', $data);
        redirect('admin/dataguru');
    }
    public function UpdateGuru($nip)
    {
        $data['title'] = 'DataGuru';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $where = array('nip' => $nip);
        $data['DataGuru'] = $this->M_admin->edit_dataGuru($where, 't_dataguru')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebardata');
        $this->load->view('admin/updateGuru', $data);
        $this->load->view('templates/footer');
    }
    public function update_aksiguru()
    {
        $id              = $this->input->post('id_guru');
        $nip             = $this->input->post('nip');
        $nama_guru      = $this->input->post('nama_guru');
        $jenis_kelamin   = $this->input->post('jenis_kelamin');
        $tempat_lahir    = $this->input->post('tempat_lahir');
        $tanggal_lahir   = $this->input->post('tanggal_lahir');
        $alamat          = $this->input->post('alamat');
        $jabatan          = $this->input->post('jabatan');

        $data = array(
            'nip'           => $nip,
            'nama_guru'     => $nama_guru,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir'  => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'alamat'        => $alamat,
            'jabatan'        => $jabatan

        );
        $where = array(
            'nip' => $nip
        );
        $this->M_admin->update_dataGuru('t_dataguru', $data, $where);
        $this->session->set_userdata('pesan', 'e');
        redirect('admin');
    }

    public function deletedataGuru($nip)
    {
        $where = array('nip' => $nip);
        $this->M_admin->deletedata_Guru($where, 't_dataGuru');
        redirect('admin/dataguru');
    }

    public function DataLaporan()
    {
        $data['title'] = 'DataLaporan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['DataLaporan'] = $this->M_admin->lihatdataLaporan()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebardata', $data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/datalaporan', $data);
        $this->load->view('templates/footer');
    }

    public function addLaporan()
    {
        $nis                    = $this->input->post('nis');
        $pelanggaran            = $this->input->post('pelanggaran');
        $jenis_pelanggaran      =  $this->input->post('jenis_pelanggaran');
        $tanggal_pelanggaran    = $this->input->post('tanggal_pelanggaran');
        $data = array(
            'nis'           => $nis,
            'pelanggaran'    => $pelanggaran,
            'jenis_pelanggaran'  => $jenis_pelanggaran,
            'tanggal_pelanggaran' => $tanggal_pelanggaran,
        );
        $this->M_admin->add_datalaporan('t_laporan', $data);
        redirect('admin/datalaporan');
    }
}