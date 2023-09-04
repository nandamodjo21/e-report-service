<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_GuruBk extends CI_Model
{
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
