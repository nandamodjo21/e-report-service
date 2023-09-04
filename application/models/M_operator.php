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
        return $this->db->query('SELECT a.*, b.nis, c.jenis_pelanggaran
        FROM `t_laporan` a
        JOIN `t_datasiswa` b
        ON (a.nis=b.nis) 
        JOIN `t_jenis_pelanggaran` c 
        ON (a.id_jenis_pelanggaran=c.id_jenis_pelanggaran)');
    }
}
