<?php

defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email extends CI_Controller
{

    public function index()
    {
        $data['data'] = ['nama'=>'Candra Putra Wicaksana', 'idpelanggan'=>'17952323131', 'alamat'=>'Tanah Hitam', 'hp'=>'081121321354'];
        $data['info'] = ['hari'=>'Senin, 24 Agustus 2021', 'tempat'=>'Gedung Telkom Jayapura'];
        // $content['content'] = $this->load->view('email/index', '', true);
        // $content['content'] = $this->load->view();
        $this->load->view('email/index', $data);
    }

    public function sendemail()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        foreach ($data['data'] as $key => $value) {
            $item = [
                'data'=>$value,
                'info'=>$data['info']
            ];
            $pesan = $this->load->view('email/index', $item, true);
            $this->email($value, $pesan);

        }
    }
    public function email($data, $pesan)
    {
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'emailfortesting1011@gmail.com';                     //SMTP username
            $mail->Password   = '26031988@Aj';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->setFrom('noreply@telkom.com', 'Indihome Telkom Jayapura');
            $mail->addAddress($data['email'], $data['nama']);     //Add a recipient
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Undangan';
            // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->msgHTML($pesan);
            $mail->send();
            return true;
        } catch (Exception $e) {
            $mail->ErrorInfo;
        }
    }
}

/* End of file Controllername.php */
