<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria_model extends CI_Model {

    public function get()
    {
        $kriteria =  $this->db->get('kriteria')->result_array();
        foreach ($kriteria as $key => $value) {
            $kriteria[$key]['subkriteria'] = $this->db->get_where('subkriteria', ['kriteriaid'=>$value['id']])->result_array();
        }
        return $kriteria;
    }

    public function save($data)
    {
        $result = $this->db->insert('kriteria', $data);
        if($result){
            $data['id'] = $this->db->insert_id();
            return $data;
        }else{
            return $result;
        }
    }

    public function saveSub($data)
    {
        $result = $this->db->insert('subkriteria', $data);
        if($result){
            $data['id'] = $this->db->insert_id();
            return $data;
        }else{
            return $result;
        }
    }

    public function update($data)
    {
        $item = [
            'kode'=>$data['kode'],
            'nama'=>$data['nama'],
            'type'=>$data['type'],
            'bobot'=>$data['bobot'],
        ];
        $result = $this->db->update('periode', $item, ['id'=>$data['id']]);
        return $result;
    }

    public function updateSub($data)
    {
        $item = [
            'nama'=>$data['nama'],
            'bobot'=>$data['bobot'],
            'inisial'=>$data['inisial'],
        ];
        $result = $this->db->update('periode', $item, ['id'=>$data['id']]);
        return $result;
    }

    public function delete($id)
    {
        return $this->db->delete('kriteria', ['id'=>$id]);
    }    

    public function deleteSub($id)
    {
        return $this->db->delete('subkriteria', ['id'=>$id]);
    }    

}

/* End of file Kriteria_model.php */
