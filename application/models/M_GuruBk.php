<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_GuruBk extends CI_Model
{
    public function lihatdataLaporan()
    {
        return $this->db->query("SELECT l.id_laporan, l.keterangan,l.tanggal_pelanggaran,
        CASE
        WHEN l.status = 0 THEN 'belum diverifikasi'
        WHEN l.status = 1 THEN 'sudah diverifikasi wali kelas'
        WHEN l.status = 2 THEN 'sudah diverifikasi guru BK'
        END AS sts, s.*,g.*,p.*,u.* FROM `t_laporan` l, t_datasiswa s,t_jenis_pelanggaran p, user u,t_dataguru g WHERE l.id_guru=u.id_user AND u.nama_pelapor=g.id_guru AND l.nis=s.nis AND l.id_jenis_pelanggaran=p.id_jenis_pelanggaran AND l.status=1");
    }
}