<?php

namespace App\Models;

use CodeIgniter\Model;

class Sub_Kriteria_Alumni_model extends Model
{
  public function allData()
  {
    $builder = $this->db->table('tb_sub_kriteria_alumni');
    $builder->select('id_sub_kriteria_alumni,kriteria,sub_kriteria,bobot,tb_kriteria.cost_benefit');
    $builder->join('tb_kriteria', 'tb_kriteria.kode = tb_sub_kriteria_alumni.kode and tb_kriteria.cost_benefit = tb_sub_kriteria_alumni.cost_benefit');
    $builder->orderBy('tb_sub_kriteria_alumni.kode');
    $builder->orderBy('tb_sub_kriteria_alumni.bobot', 'DESC');
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
    $this->db->table('tb_sub_kriteria_alumni')->insert($data);
  }

  public function edit($id_sub_kriteria_alumni)
  {
    return $kriteria = $this->db->table('tb_sub_kriteria_alumni')
      ->where('id_sub_kriteria_alumni', $id_sub_kriteria_alumni)->get()->getRowArray();
  }

  public function update_data($data, $id_sub_kriteria_alumni)
  {
    return $this->db->table('tb_sub_kriteria_alumni')
      ->update($data, array('id_sub_kriteria_alumni' => $id_sub_kriteria_alumni));
  }

  public function delete_data($id_sub_kriteria_alumni)
  {
    return $this->db->table('tb_sub_kriteria_alumni')
      ->delete(array('id_sub_kriteria_alumni' => $id_sub_kriteria_alumni));
  }
}
