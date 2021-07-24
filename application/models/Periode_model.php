<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Periode_model extends CI_Model {
    public function get()
    {
        return $this->db->get('periode')->result_array();
    }
    public function getAktif()
    {
        return $this->db->get('periode', ['status'=>1])->row_array();
    }
    public function save($data)
    {
        $data['status'] = "1";
        $this->db->update('periode', ['status'=>0], ['status'=>1]);
        $result = $this->db->insert('periode', $data);
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
            'periode'=>$data['periode'],
            'status'=>$data['status']
        ];
        if($data['status'] == 'Aktif'){
            $this->db->update('periode', ['status'=>0], ['status'=>1]);
            $this->db->update('periode', $item, ['id'=>$data['id']]);
            return $data;
        }else{
            $this->db->update('periode', $item, ['id'=>$data['id']]);
            return $data;
        }
    }
    public function delete($id)
    {
        return $this->db->delete('periode', ['id'=>$id]);
    }
    

}