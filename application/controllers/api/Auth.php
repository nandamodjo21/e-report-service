<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Auth extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth');
    }
    public function index_post() {
        $email = $this->post('username');
        $password = $this->db->query("select md5('" . $this->post('password') . "') as pass")->row_array();

        // $wr = array(
        //     'username' => $email
        // );

        $user = $this->M_auth->getData($email,$password);

        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if ($password['pass'] == $user['password']) {
                    $data = [
                        'iduser' => $user['id_user'],
                        'nip' => $user['nip'],
                        'guru' => $user['nama_guru'],
                        'username' => $user['username'],
                        'role' => $user['role_id']
                    ];
                    // return response dengan data user
                    $this->response([
                        'status' => 200,
                        'message' => 'berhasil login',
                        'data' => $data
                    ], REST_Controller::HTTP_OK);
                } else {
                    // return response dengan pesan error
                    $this->response([
                        'status' => 400,
                        'message' => 'Wrong password!'
                    ], REST_Controller::HTTP_NOT_FOUND);
                }
            } else {
                // return response dengan pesan error
                $this->response([
                    'status' => 404,
                    'message' => 'This email has not been activated!'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            // return response dengan pesan error
            $this->response([
                'status' => 500,
                'message' => 'hahahaha'
   
            ] , REST_Controller::HTTP_BAD_REQUEST);
        };
    }

    public function siswa_get()
    {
        $list = $this->M_auth->getSiswa();
        $this->response([
            'status'=>true,
            'data'=> $list
        ],REST_Controller::HTTP_OK);
    }

    public function jenis_get()
    {
        $list = $this->db->get('t_jenis_pelanggaran')->result();
        $this->response([
            'status'=>true,
            'data'=> $list
        ],REST_Controller::HTTP_OK);
    }
    

    public function lapor_post(){
      
        $nis = $this->post('nis');
        $user = $this->post('iduser');
        $jenis = $this->post('jenis');
        $tanggal = $this->post('tanggal');
        $keterangan = $this->post('keterangan');

        $data = array(
            'nis' => $nis,
            'id_guru' => $user,
            'id_jenis_pelanggaran' => $jenis,
            'tanggal_pelanggaran' => $tanggal,
            'keterangan' => $keterangan
        );

        try {
            $this->db->set('id_laporan','UUID()',false);
            $this->M_auth->addLaporan($data,'t_laporan');
        
            $this->response([
                'status' => TRUE,
                'message' => 'berhasil dilaporkan'
            ], REST_Controller::HTTP_OK);
        } catch (Exception $e) {
            $this->response([
                'status' => FALSE,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
        


    }

}