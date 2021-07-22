<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function select($data)
    {
        $data['password'] = md5($data['password']);
        return $this->db->get_where('user', $data);
    }
    public function insert($data)
    {
        $result = $this->db->insert('kategori', $data);
        $data['id'] = $this->db->insert_id();
        if ($result) {
            return $data;
        } else {
            return false;
        }
    }
    public function update($data)
    {
        $item = [
            'kategori' => $data['kategori'],
        ];
        $this->db->where('id', $data['id']);
        $this->db->update('kategori', $item);
        return $item;
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('kategori');
    }

    public function login($data)
    {
        $username = $data['username'];
        $password = $data['password'];
        $item = $this->db->get_where("users", ['username'=>$username])->row_array();
        if (is_null($item)) {
            return false;
        } else {
            if (password_verify($password, $item['password'])) {
                return $item;
            } else {
                return false;
            }
        }
    }

    public function check()
    {
        $result = $this->db->query("SELECT COUNT(*) AS num FROM users")->row_object();
        if ((int) $result->num == 0) {
            $this->db->trans_begin();
            $this->db->insert('users', ['nama' => 'Administrator', 'username' => 'Administrator', 'password' => password_hash('Admin123', PASSWORD_DEFAULT), 'status' => 1]);
            if ($this->db->trans_status()) {
                $this->db->trans_commit();
            } else {
                $this->db->trans_rollback();
            }
        }
    }
}

/* End of file Kategori_model.php */
