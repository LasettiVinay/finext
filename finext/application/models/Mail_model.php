<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mail_model extends CI_Model{
    private $send_mail='info@finext.co.in';
    private $send_password='Finext@123';
    private $send_username='FINEXT';
    public function __construct(){
        parent::__construct();

    }
    
    public function config_mail(){
        $config['protocol'] = 'smtp';
       $config['smtp_host'] = 'smtp.hostinger.in';
       $config['smtp_port'] = 587; // 465 or 587
       $config['smtp_user'] = $this->send_mail;
       $config['smtp_pass'] = $this->send_password;
       $config['mailtype'] = 'html';
       $config['charset'] = 'UTF-8';
       $config['wordwrap'] = 'TRUE';
       $config['newline'] = "\r\n";
        return $config;
    }
    public function send_contact_info($id){
        $data = $this->Data->get_contact_by_id($id);
        //echo "<pre>";print_r($data->email);exit();
        $email=$data->email;
        $userdata['user_data'] = array(
            'name' => $data->name,
            'phone_number' => $data->phone_number,
            'email' => $data->email,
            'message' => $data->message
        );
        
        $config = $this->config_mail();
        $message = "test mail";
        $subject = 'Contact mail';
         //$message = $this->load->view('mail_tmp/contact_mail', $user_data, TRUE);
        
        
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from($this->send_mail,$this->send_username);
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);
        
        if($this->email->send()){
            return true;
        }else{
            //echo $this->email->print_debugger();
            
            return false;
        }
    }
          public function send_password_link($reciever, $id,$role=''){
                    $userdata['user_data'] = array(
                    'email' => $reciever,
                    'id' => $id,
                    'role'=>$role
                );
                $config = $this->config_mail();
                $subject = 'first mail';
                $message = $this->load->view('mail_tmp/forget_mail', $userdata, TRUE);
                $this->load->library('email', $config);
                $this->email->initialize($config);
                $this->email->set_newline("\r\n");
                $this->email->from($this->send_mail,$this->send_username);
                $this->email->to($reciever);
                $this->email->subject($subject);
                $this->email->message($message);
                
                if($this->email->send()){
                    return true;
                }else{
                    echo $this->email->print_debugger();
                    return false;
                      }
            }
    public function send_forget_link($reciever,$role){
                    $userdata['user_data'] = array(
                    'email' => $reciever,
                    'role'=>$role
                );
                $config = $this->config_mail();
                $subject = 'Reset Password';
                $message = $this->load->view('mail_tmp/forget_mail', $userdata, TRUE);
                $this->load->library('email', $config);
                $this->email->initialize($config);
                $this->email->set_newline("\r\n");
                $this->email->from($this->send_mail,$this->send_username);
                $this->email->to($reciever);
                $this->email->subject($subject);
                $this->email->message($message);
               // $this->email->send();
                if($this->email->send()){
                    return true;
                }else{
                    echo $this->email->print_debugger();
                    return false;
                      }
            }
            public function register_mail($email,$name,$refer_id,$password){
                    $userdata=array(
                      'name'=>$name,
                      'refer_id'=>$refer_id,
                      'password'=>$password
                    );
                $config = $this->config_mail();
                $subject = 'Registeration Mail';
                $message = $this->load->view('mail_tmp/contact_mail', $userdata, TRUE);
                $this->load->library('email', $config);
                $this->email->initialize($config);
                $this->email->set_newline("\r\n");
                $this->email->from($this->send_mail,$this->send_username);
                $this->email->to($email);
                $this->email->subject($subject);
                $this->email->message($message);
                // $this->email->send();
                if($this->email->send()){
                    return true;
                }else{
                    echo $this->email->print_debugger();
                    return false;
                      }
            }
            public function payment_mail($email,$subject,$message){
                $config = $this->config_mail();
                $userdata['message']=$message;
                $userdata['subject']=$subject;
                $message = $this->load->view('mail_tmp/common_mail', $userdata, TRUE);
                //echo $message;die;
                $this->load->library('email', $config);
                $this->email->initialize($config);
                $this->email->set_newline("\r\n");
                $this->email->from($this->send_mail,$this->send_username);
                $this->email->to($email);
                $this->email->subject($subject);
                $this->email->message($message);
                // $this->email->send();
                if($this->email->send()){
                    return true;
                }else{
                    echo $this->email->print_debugger();
                    return false;
                      }
            }
            public function pay_confirm_mail($email,$subject,$message){
                $config = $this->config_mail();
                /*$userdata['message']=$message;
                $userdata['subject']=$subject;
                $message = $this->load->view('mail_tmp/common_mail', $userdata, TRUE);
                //echo $message;die;*/
                $this->load->library('email', $config);
                $this->email->initialize($config);
                $this->email->set_newline("\r\n");
                $this->email->from($this->send_mail,$this->send_username);
                $this->email->to($email);
                $this->email->subject($subject);
                $this->email->message($message);
                // $this->email->send();
                if($this->email->send()){
                    return true;
                }else{
                    echo $this->email->print_debugger();
                    return false;
                      }
            }
}
?>