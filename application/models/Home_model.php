<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
    public function select()
    {
        $result = $this->db->query("SELECT
            (SELECT COUNT(*) FROM pelanggan, periode WHERE pelanggan.periodeid = periode.id AND periode.status = 1) AS jumlahpelanggan,
            (SELECT COUNT(*) FROM hasil, periode WHERE hasil.periodeid = periode.id AND periode.status = 1) AS hasil")->row_array();
        return $result;
    }
}

/* End of file Home_model.php */
