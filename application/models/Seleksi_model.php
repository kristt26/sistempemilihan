<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Seleksi_model extends CI_Model {

    public function post($data, $periode)
    {
        $this->db->delete('hasil', ['periodeid'=>$periode['id']]);
        return $this->db->insert_batch('hasil', $data);
    }
    public function hasil()
    {
        return $this->db->query("SELECT
        `pelanggan`.`idpelanggan`,
        `pelanggan`.`nama`,
        `pelanggan`.`alamat`,
        `pelanggan`.`hp`,
        `pelanggan`.`email`,
        `hasil`.`nilai`,
        `hasil`.`periodeid`
      FROM
        `hasil`
        LEFT JOIN `pelanggan` ON `pelanggan`.`idpelanggan` = `hasil`.`pelangganid` AND
          `pelanggan`.`periodeid` = `hasil`.`periodeid`")->result_array();
    }
}

/* End of file Seleksi_model.php */
