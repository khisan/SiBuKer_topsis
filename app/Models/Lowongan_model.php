<?php

namespace App\Models;

use CodeIgniter\Model;

class Lowongan_model extends Model
{
  protected $table = 'tb_lowongan';

  public function allData()
  {
    return $this->db->table('tb_lowongan')
      ->get()->getResultArray();
  }

  public function cari($keyword)
  {
    $builder = $this->db->table('tb_lowongan');
    $builder->like('nama_perusahaan', $keyword);
    $builder->orlike('nama_lowongan', $keyword);
    $builder->orlike('deskripsi_lowongan', $keyword);
    return $builder->get()->getResultArray();
  }

  public function getLowonganByJurusan($jurusan)
  {
    $builder = $this->db->table('tb_lowongan');
    $builder->like('deskripsi_lowongan', $jurusan, 'both');
    return $builder->get()->getResultArray();
  }

  public function countLowonganByJurusan($jurusan)
  {
    $builder = $this->db->table('tb_lowongan');
    $builder->like('deskripsi_lowongan', $jurusan);
    return $builder->countAll();
  }

  public function getNilai($jurusan)
  {
    $builder = $this->db->table('tb_lowongan');
    $builder->select('nama_lowongan,umur,kualifikasi_pendidikan,ipk,pengalaman_kerja,deskripsi_lowongan');
    $builder->like('deskripsi_lowongan', $jurusan);
    return $builder->get();
  }

  public function getNilaiCoba($jurusan)
  {
    $builder = $this->db->table('tb_lowongan');
    $builder->select('nama_lowongan,umur,kualifikasi_pendidikan,ipk,pengalaman_kerja,deskripsi_lowongan');
    $builder->where('deskripsi_lowongan', $jurusan);
    return $builder->get();
  }

  public function getNilaiLimit()
  {
    $builder = $this->db->table('tb_lowongan');
    $builder->select('*');
    $builder->limit(5);
    return $builder->get();
  }

  public function jmlData()
  {
    return $this->db->table('tb_lowongan')->countAll();
  }

  function detail_data($id_lowongan)
  {
    return $this->db->table('tb_lowongan')
      ->where('id_lowongan', $id_lowongan)
      ->get()->getRowArray();
  }

  public function add($data)
  {
    $this->db->table('tb_lowongan')->insert($data);
  }

  public function edit($id_lowongan)
  {
    return $kriteria = $this->db->table('tb_lowongan')
      ->where('id_lowongan', $id_lowongan)->get()->getRowArray();
  }

  public function update_data($data, $id_lowongan)
  {
    return $this->db->table('tb_lowongan')
      ->update($data, array('id_lowongan' => $id_lowongan));
  }

  public function delete_data($id_lowongan)
  {
    return $this->db->table('tb_lowongan')
      ->delete(array('id_lowongan' => $id_lowongan));
  }
}
