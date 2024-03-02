<?php

class Samsat_model extends CI_Model{

    public function getData($table)
    {
        return $this->db->get($table);
    }

    public function addData($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function edit($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function editData($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function deleteData($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function join2Data($table1, $table2, $join)
    {
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $join);
        return $this->db->get();
    }

    public function join3Data($table1, $table2, $table3, $join1, $join2)
    {
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $join1);
        $this->db->join($table3, $join2);
        return $this->db->get();
    }

    public function join4Data($table1, $table2, $table3, $table4, $join1, $join2, $join3)
    {
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $join1);
        $this->db->join($table3, $join2);
        $this->db->join($table4, $join3);
        return $this->db->get();
    }

    public function join5Data($table1, $table2, $table3, $table4, $table5, $join1, $join2, $join3, $join4)
    {
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $join1);
        $this->db->join($table3, $join2);
        $this->db->join($table4, $join3);
        $this->db->join($table5, $join4);
        return $this->db->get();
    }

    public function joinWhere($table1, $table2, $join, $where, $id)
    {
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $join);
        $this->db->where($where, $id);
        return $this->db->get();
    }

    public function joinWhere2($table1, $table2, $table3, $join1, $join2, $where, $id)
    {
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $join1);
        $this->db->join($table3, $join2);
        $this->db->where($where, $id);
        return $this->db->get();
    }

    public function joinWhere3($table1, $table2, $table3, $table4, $join1, $join2, $join3, $where, $id)
    {
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $join1);
        $this->db->join($table3, $join2);
        $this->db->join($table4, $join3);
        $this->db->where($where, $id);
        return $this->db->get();
    }

    public function printJadwal($awal, $akhir)
    {
        $this->db->where('darijam BETWEEN "'. date('Y-m-d', strtotime($awal)). '" and "'. date('Y-m-d', strtotime($akhir)).'"');
    }

    public function printBayar($awal, $akhir)
    {
        $this->db->where('tglbayar BETWEEN "'. date('Y-m-d', strtotime($awal)). '" and "'. date('Y-m-d', strtotime($akhir)).'"');
    }

    public function printNilai($angkatan)
    {
        $this->db->where('namaakt', $angkatan);
    }

}