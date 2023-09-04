<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // validasinya success
            $this->_login();
        }
    }


    private function _login()
    {
        $email = $this->input->post('username');
        $password = $this->db->query("select md5('" . $this->input->post('password') . "') as pass")->row_array();

       

        $wr = array(

            'username' => $email
        );

        $user = $this->db->get_where('user', $wr)->row_array();

        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if ($password['pass'] == $user['password']) {
                    $data = [
                        'username' => $user['username'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else if ($user['role_id'] == 2) {
                        redirect('Walikelas');
                    } else if ($user['role_id'] == 3) {
                        redirect('GuruBk');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This username has not been activated!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This username not found!</div>');
            redirect('auth');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }


    // public function blocked()
    //{
    //  $this->load->view('auth/blocked');
    // }


    // public function forgotPassword()
    // {
    //     $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

    //     if ($this->form_validation->run() == false) {
    //         $data['title'] = 'Forgot Password';
    //         $this->load->view('templates/auth_header', $data);
    //         $this->load->view('auth/forgot-password');
    //         $this->load->view('templates/auth_footer');
    //     } else {
    //         $email = $this->input->post('email');
    //         $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

    //         if ($user) {
    //             $token = base64_encode(random_bytes(32));
    //             $user_token = [
    //                 'email' => $email,
    //                 'token' => $token,
    //                 'date_created' => time()
    //             ];

    //             $this->db->insert('user_token', $user_token);
    //             $this->_sendEmail($token, 'forgot');

    //             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please check your email to reset your password!</div>');
    //             redirect('auth/forgotpassword');
    //         } else {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered or activated!</div>');
    //             redirect('auth/forgotpassword');
    //         }
    //     }
    // }


    // public function resetPassword()
    // {
    //     $email = $this->input->get('email');
    //     $token = $this->input->get('token');

    //     $user = $this->db->get_where('user', ['email' => $email])->row_array();

    //     if ($user) {
    //         $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

    //         if ($user_token) {
    //             $this->session->set_userdata('reset_email', $email);
    //             $this->changePassword();
    //         } else {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
    //             redirect('auth');
    //         }
    //     } else {
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
    //         redirect('auth');
    //     }
    // }


    // public function changePassword()
    // {
    //     if (!$this->session->userdata('reset_email')) {
    //         redirect('auth');
    //     }

    //     $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
    //     $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

    //     if ($this->form_validation->run() == false) {
    //         $data['title'] = 'Change Password';
    //         $this->load->view('templates/auth_header', $data);
    //         $this->load->view('auth/change-password');
    //         $this->load->view('templates/auth_footer');
    //     } else {
    //         $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
    //         $email = $this->session->userdata('reset_email');

    //         $this->db->set('password', $password);
    //         $this->db->where('email', $email);
    //         $this->db->update('user');

    //         $this->session->unset_userdata('reset_email');

    //         $this->db->delete('user_token', ['email' => $email]);

    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed! Please login.</div>');
    //         redirect('auth');
    //     }
    // }
}