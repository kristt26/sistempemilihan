<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_model extends CI_Model
{
    public function select($periodeid = null)
    {
        if(is_null($periodeid)){
            return $this->db->get('pelanggan')->result_array();
        }else{
            return $this->db->get_where('pelanggan', ['periodeid'=>$periodeid])->result_array();
        }
    }
    public function insert($data)
    {
        $result = $this->db->insert_batch('pelanggan', $data);
        if ($result) {
            return $this->db->get('pelanggan')->result_array();
        } else {
            return false;
        }

    }
    public function update($data)
    {
        $item = [
            'kodepelanggan' => $data['kodepelanggan'],
            'nama' => $data['nama'],
            'kontak' => $data['kontak'],
            'alamat' => $data['alamat'],
            'email' => $data['email'],
        ];
        $this->db->where('id', $data['id']);
        $this->db->update('pelanggan', $item);
        return $item;
    }
    public function delete($id)
    {
        $this->db->where('periodeid', $id);
        return $this->db->delete('pelanggan');
    }

}

/* End of file pelanggan_model.php */
