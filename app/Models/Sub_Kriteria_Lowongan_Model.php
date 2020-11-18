<?php

namespace App\Models;

use CodeIgniter\Model;

class Sub_Kriteria_Lowongan_model extends Model
{
  public function allData()
  {
    $builder = $this->db->table('tb_sub_kriteria_lowongan');
    $builder->select('id_sub_kriteria_lowongan,kriteria,sub_kriteria,bobot,tb_kriteria_lowongan.cost_benefit');
    $builder->join('tb_kriteria_lowongan', 'tb_kriteria_lowongan.kode = tb_sub_kriteria_lowongan.kode and tb_kriteria_lowongan.cost_benefit = tb_sub_kriteria_lowongan.cost_benefit');
    $builder->orderBy('tb_sub_kriteria_lowongan.kode',);
    $builder->orderBy('tb_sub_kriteria_lowongan.bobot', 'DESC');
    $query = $builder->get()->getResultArray();
    return $query;
  }

  public function getUmur()
  {
    $builder = $this->db->table('tb_sub_kriteria_lowongan');
    $builder->select('kode,sub_kriteria,bobot');
    $builder->where('kode', 'C1');
    $builder->orderBy('bobot', 'DESC');
    $query = $builder->get()->getResultArray();
    return $query;
  }

  public function getKualifikasiPendidikan()
  {
    $builder = $this->db->table('tb_sub_kriteria_lowongan');
    $builder->select('kode,sub_kriteria,bobot');
    $builder->where('kode', 'C2');
    $builder->orderBy('bobot', 'DESC');
    $query = $builder->get()->getResultArray();
    return $query;
  }

  public function getIpk()
  {
    $builder = $this->db->table('tb_sub_kriteria_lowongan');
    $builder->select('kode,sub_kriteria,bobot');
    $builder->where('kode', 'C3');
    $builder->orderBy('bobot', 'DESC');
    $query = $builder->get()->getResultArray();
    return $query;
  }

  public function getJenisKelamin()
  {
    $builder = $this->db->table('tb_sub_kriteria_lowongan');
    $builder->select('kode,sub_kriteria,bobot');
    $builder->where('kode', 'C4');
    $builder->orderBy('bobot', 'DESC');
    $query = $builder->get()->getResultArray();
    return $query;
  }

  public function getPengalamanKerja()
  {
    $builder = $this->db->table('tb_sub_kriteria_lowongan');
    $builder->select('kode,sub_kriteria,bobot');
    $builder->where('kode', 'C5');
    $builder->orderBy('bobot', 'DESC');
    $query = $builder->get()->getResultArray();
    return $query;
  }

  public function getJurusan()
  {
    $builder = $this->db->table('tb_sub_kriteria_lowongan');
    $builder->select('kode,sub_kriteria,bobot');
    $builder->where('kode', 'C6');
    $builder->orderBy('bobot', 'DESC');
    $query = $builder->get()->getResultArray();
    return $query;
  }

  public function add($data)
  {
    $this->db->table('tb_sub_kriteria_lowongan')->insert($data);
  }

  public function edit($id_sub_kriteria_lowongan)
  {
    return $kriteria = $this->db->table('tb_sub_kriteria_lowongan')
      ->where('id_sub_kriteria_lowongan', $id_sub_kriteria_lowongan)->get()->getRowArray();
  }

  public function update_data($data, $id_sub_kriteria_lowongan)
  {
    return $this->db->table('tb_sub_kriteria_lowongan')
      ->update($data, array('id_sub_kriteria_lowongan' => $id_sub_kriteria_lowongan));
  }

  public function delete_data($id_sub_kriteria_lowongan)
  {
    return $this->db->table('tb_sub_kriteria_lowongan')
      ->delete(array('id_sub_kriteria_lowongan' => $id_sub_kriteria_lowongan));
  }
}
