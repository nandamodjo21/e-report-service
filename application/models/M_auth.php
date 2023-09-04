<?php

class M_auth extends CI_Model
{
    public function getData($email, $password)
    {
        // Eksekusi query untuk mendapatkan data user
        $query = $this->db->query("SELECT u.*, g.*, r.* FROM `user` u, t_dataguru g, user_role r WHERE g.id_guru=u.nama_pelapor AND r.role_id=u.role_id AND u.username='$email'");

        // Periksa apakah query berhasil dijalankan
        if ($query) {
            // Ambil data hasil query
            return $query->row_array();
        } else {
            // Jika query gagal, kembalikan nilai null atau sesuaikan dengan kebutuhan Anda
            return null;
        }
    }

    public function addLaporan($data,$table){
        $this->db->insert($table,$data);
    }

    public function getSiswa(){
        return $this->db->query("select nis, nama_siswa from t_datasiswa")->result();
    }
}