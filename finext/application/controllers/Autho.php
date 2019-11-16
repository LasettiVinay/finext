<?php
class Autho extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_details_model');   
    }
    public function index(){
     //  $this->load->view("login");
      
           
//            $page_data['page_name'] = 'register';
//            $page_data['page_title'] = 'Registration';
           
//            $this->form_validation->set_rules('introducer_id', 'Introducer Id', 'trim|required|xss_clean');
//            $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
//            $this->form_validation->set_rules('gender', 'Gender',  'trim|required|xss_clean' );
//            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|is_unique[user_details.email]', array(
//                'is_unique' => 'This %s already exists.'
//            ));
//            $this->form_validation->set_rules('phone', 'Mobile Number', 'trim|required|min_length[10]|max_length[10]|xss_clean');
//            $this->form_validation->set_rules('paymentMode', 'Payment Mode', 'trim|required|min_length[10]|max_length[10]|xss_clean');
//            $this->form_validation->set_rules('Username', 'User Name', 'trim|required|min_length[10]|max_length[10]|xss_clean');
//            $this->form_validation->set_rules('pswd', 'Password', 'trim|required|xss_clean|matches[cpswd]');
//            $this->form_validation->set_rules('cpswd', 'Password Confirmation', 'trim|required|xss_clean');
           
//            if ($this->form_validation->run() == FALSE) {
//                //$this->load->view("login");
//              $this->load->view('layout/master_layout/index', $page_data);
//            } else {
               
//                $input = $this->input->post();
//                $pass = $this->input->post('password');
//                $salt = rand(15456465, 56464646);
//                $password = md5($pass . $salt);
               
//                $inputData = array(
//                    "introducer_id" => $input['introducer_id'],
//                    "name" => $input['name'],
//                    //"role_id" => $input['user_type'],
//                    "gender" => $input['gender'],
//                    "email" => $input['email'],
//                    "payment_mode" => $input['payment_mode'],
//                    "user_name" => $input['user_name'],
                 
//                    "password" => $password,
//                    "salt" => $salt,
//                    //"created_at" => time()
//                );
//                $insert_id = $this->User_details_model->insert_user_details($inputData);
               
//                if ($insert_id > 0) {
                   
//                    $amount= 2500*40/100;
                   
//                    $data=array(
//                        'benifitial_id'=>$input['introducer_id'],
//                        'refer_id'=>$insert_id->id,
//                        'amount' => $amount,
                       
//                    );
//                    print_r($data);
//                    $getBenifit=$this->View_Refer_Model->get_benifit($data);
//                    print_r($getBenifit);exit;
                   
// //                    $this->Mail_model->sendEmail($_POST['email'], $insert_id);
// //                    $this->Mail_model->send_adminto_reg($insert_id);
// //                    $this->session->set_flashdata('reg_status', 'Successfully registered');
// //                    redirect(base_url().'login');
                   
//                }
               
               
//                else {
//                    redirect('none.html');
//                }
//            }
           
           
       }
       
    }

?>