<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use ocs\wplib\Wplib;
class Seleksi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Seleksi_model');
        $this->load->model('Kriteria_model');
        $this->load->model('Pelanggan_model');
        $this->load->model('Periode_model');
    }

    public function index()
    {
        $content['content'] = $this->load->view('seleksi/index', '', true);
        $this->load->view('_shared/layout', $content);
    }

    public function get($periodeid = null)
    {
        $pelanggan = $this->Pelanggan_model->select($periodeid);
        $kriteria = $this->Kriteria_model->get();

        foreach ($pelanggan as $keypel => $pel) {
            $pelanggan[$keypel]['nilai'] = [];
            foreach ($kriteria as $keykri => $kri) {
                $bobot = 0;
                if($kri['kode']=="C1"){
                    foreach ($kri['subkriteria'] as $key => $value) {
                        if($pel['paket']==$value['inisial']){
                            $bobot = $value['bobot'];
                        }
                    }
                    $item = [
                        "kode" => $kri['kode'],
                        "bobot" => $bobot==0 ? 1 : (int)$bobot
                    ];
                    array_push($pelanggan[$keypel]['nilai'], $item);
                }else if($kri['kode']=="C2"){
                    foreach ($kri['subkriteria'] as $key => $value) {
                        if($pel['tanggalbayar']==$value['inisial']){
                            $bobot = $value['bobot'];
                        }
                    }
                    $item = [
                        "kode" => $kri['kode'],
                        "bobot" => $bobot==0 ? 1 : (int)$bobot
                    ];
                    array_push($pelanggan[$keypel]['nilai'], $item);
                }else{
                    $tgl = date("Y");
                    $selisih = $tgl - $pel['aktif'];
                    $item = [
                        "kode" => $kri['kode'],
                        "bobot" => $selisih == 1 ? 1 : ($selisih == 2 ? 2 : (($selisih<=4 && $selisih>=3) ? 3 :  (($selisih<=6 && $selisih>=5) ? 4 : (5))))
                    ];
                    array_push($pelanggan[$keypel]['nilai'], $item);
                }
            }
        }
        $data = [
            "matriks"=>$pelanggan,
            "wp"=>new Wplib($kriteria, $pelanggan, 10)
        ];
        echo json_encode($data);
    }

    public function post()
    {
        $periode = $this->Periode_model->getAktif();
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $set = [];
        foreach ($data as $key => $value) {
            $item = [
                'pelangganid'=>$value['idpelanggan'],
                'periodeid'=>$periode['id'],
                'nilai'=>$value['preferensi']
            ];
            array_push($set, $item);
        }
        $result =$this->Seleksi_model->post($set, $periode);
        echo json_encode($data);
    }

    public function hasil()
    {
        echo json_encode($this->Seleksi_model->hasil());
    }


}

/* End of file Seleksi.php */
