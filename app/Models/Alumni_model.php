<?php

namespace App\Models;

use CodeIgniter\Model;

class Alumni_model extends Model
{
  public function allData()
  {
    $builder = $this->db->table('tb_alumni');
    $builder->select('id_alumni,nama,jenis_kelamin,umur,jurusan,kualifikasi_pendidikan,ipk,pengalaman_kerja,tb_sub_kriteria_alumni.sub_kriteria');
    $builder->join('tb_sub_kriteria_alumni', 'tb_sub_kriteria_alumni.bobot = tb_alumni.jenis_kelamin and tb_sub_kriteria_alumni.bobot = tb_alumni.umur and tb_sub_kriteria_alumni.bobot = tb_alumni.jurusan and tb_sub_kriteria_alumni.bobot = tb_alumni.kualifikasi_pendidikan and tb_sub_kriteria_alumni.bobot = tb_alumni.ipk and tb_sub_kriteria_alumni.bobot = tb_alumni.pengalaman_kerja', 'left');
    $builder->groupBy('tb_sub_kriteria_alumni.kode');
    $builder->orderBy('tb_alumni.nama', 'DESC');
    $query = $builder->get()->getResultArray();
    return $query;
  }

  public function jmlData()
  {
    return $this->db->table('tb_lowongan')->countAll();
  }

  public function getNilai()
  {
    $builder = $this->db->table('tb_alumni');
    $builder->select('umur,kualifikasi_pendidikan,ipk,jenis_kelamin,pengalaman_kerja,jurusan');
    return $builder->get();
  }

  public function getNilaiByID($id_alumni)
  {
    $builder = $this->db->table('tb_alumni');
    $builder->select('umur,kualifikasi_pendidikan,ipk,jenis_kelamin,pengalaman_kerja,jurusan');
    $builder->where('id_alumni', $id_alumni);
    return $builder->get();
  }

  function get_alumni_by_id($id_alumni, $tbl)
  {
    $builder = $this->db->table($tbl);
    $builder->where('id_alumni', $id_alumni);
    $alumni = $builder->get()->getRowArray();
    return $alumni;
  }

  public function update_data($data, $id_alumni)
  {
    return $this->db->table('tb_alumni')
      ->update($data, array('id_alumni' => $id_alumni));
  }
  public function delete_data($id_alumni)
  {
    return $this->db->table('tb_alumni')
      ->delete(array('id_alumni' => $id_alumni));
  }
}
