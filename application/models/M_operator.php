<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_operator extends CI_Model
{
    public  function lihat_dataSiswa()
    {
        return $this->db->query("SELECT a.*,b.kelas FROM t_datasiswa a
        ,t_kelas b 
        WHERE a.id_kelas=b.id_kelas
        ORDER BY a.id_kelas,b.id_kelas")->result();
    }
    public function add_datasiswa($table, $data)
    {
       $this->db->select('*');
       $this->db->from('t_datasiswa');
       $this->db->join('t_kelas','t_datasiswa.id_kelas=t_kelas.id_kelas');
       $query = $this->db->get();
       return $query->result();
    }
    public function deletedata_Siswa($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
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
        END AS sts, s.*,g.*,p.*,u.* FROM `t_laporan` l, t_datasiswa s,t_jenis_pelanggaran p, user u,t_dataguru g WHERE l.id_guru=u.id_user AND u.nama_pelapor=g.id_guru AND l.nis=s.nis AND l.id_jenis_pelanggaran=p.id_jenis_pelanggaran AND l.status=0");
    }
}