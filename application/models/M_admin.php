<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin  extends CI_Model
{
    public  function lihatdataSiswa()
    {
        $queryData = "SELECT a.*,b.kelas
        FROM t_datasiswa a
        JOIN t_kelas b 
        WHERE a.id_kelas=b.id_kelas
        ORDER BY a.id_kelas,b.id_kelas";

        return $this->db->query($queryData)->result();
    }
    public function lihatdataGuru()
    {
        $query = $this->db->get('t_dataguru');
        return $query->result();
    }
    public function lihatdataLaporan()
    {
        return $this->db->query("SELECT l.id_laporan, l.keterangan,l.tanggal_pelanggaran,
        CASE
        WHEN l.status = 0 THEN 'belum diverifikasi'
        WHEN l.status = 1 THEN 'sudah diverifikasi wali kelas'
        WHEN l.status = 2 THEN 'sudah diverifikasi guru BK'
        END AS sts, s.*,g.*,p.*,u.* FROM `t_laporan` l, t_datasiswa s,t_jenis_pelanggaran p, user u,t_dataguru g WHERE l.id_guru=u.id_user AND u.nama_pelapor=g.id_guru AND l.nis=s.nis AND l.id_jenis_pelanggaran=p.id_jenis_pelanggaran");
    }

    public function add_datasiswa($data, $table)
    {
        $this->db->insert($table, $data);
    }


        // Fungsi untuk menambahkan data siswa baru ke dalam tabel t_datasiswa
    public function add_Siswa($data)
    {
        $this->db->insert('t_datasiswa', $data);
        return $this->db->affected_rows();
    }

    // Fungsi untuk mengambil data siswa dari tabel t_datasiswa dan tabel terkait
    public function get_Siswa()
    {
        $query = $this->db->query('SELECT a.*, b.kelas FROM t_datasiswa a JOIN t_kelas b ON a.id_kelas = b.id_kelas ORDER BY a.id_kelas, b.id_kelas');
        return $query->result();
    }

    public function add_dataguru($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function add_datalaporan()
    {
        return $this->db->query('SELECT a.*, b.nis, c.jenis_pelanggaran
        FROM `t_laporan` a
        JOIN `t_datasiswa` b
        ON (a.nis=b.nis) 
        JOIN `t_jenis_pelanggaran` c 
        ON (a.id_jenis_pelanggaran=c.id_jenis_pelanggaran)');
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($table, $data, $where)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function getdatabyId($id)
    {
        $query = $this->db->get_where('t_datasiswa', array('id_siswa' => $id));
        return $query->row_array();
    }

    public function deletedata_Siswa($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function edit_dataGuru($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_dataGuru($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function deletedata_Guru($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}