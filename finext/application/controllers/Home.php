<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_details_model');
        $this->load->model('View_Refer_Model');
        $this->load->model('Tree_View_Model');
        $this->load->model('Contact_Model');
        $this->load->model('Sms_model');
        date_default_timezone_set('Asia/Kolkata'); 
    }
    
public function index(){
    $page_data['page_name'] = "home";
    $page_data['page_title'] = "Home";
    $this->load->view('layout/masterlayout/index',$page_data);
}
public function forgot(){
    $page_data['page_name'] = "forgot";
    $page_data['page_title'] = "forgot";
    $this->load->view('layout/masterlayout/index',$page_data);
}
public function login_page() {
    if($this->session->userdata('login_user_id')!=''){
      redirect($this->session->userdata('last_page'));
    }
    $page_data['page_name'] = 'login';
    $page_data['page_title'] = 'login';
    $this->load->view('layout/masterlayout/index', $page_data);
}
public function login_action() {
    
    //if(isset($_POST['login']) && empty($this->session->userdata('user_data'))){
        $username = $this->input->post('user_name');
        $password = $this->input->post('password');
        $res = $this->User_details_model->validate_user_credentials($username, $password);
        
        if (!empty($res)) {
          
          if($res['row_status']!=0){
            $role=$this->User_details_model->get_role($res['role_id']);
            $this->session->set_userdata('login_user_id', $res['id']);
            $this->session->set_userdata('refer_id', $res['refer_id']);
            $this->session->set_userdata('name', $res['name']);
            $this->session->set_userdata('row_status', $res['row_status']);
            $this->session->set_userdata('login_type', $role['role']);
            redirect(base_url().'dashboard');
          }else{
            $this->session->set_flashdata('error_msg', 'You are a Blocked User Please Contact Admin');
            redirect(base_url().'home/login_page');
          }
        }else{
            $this->session->set_flashdata('error_msg', 'Your Enter Invalid User Id/Password');
            redirect(base_url().'home/login_page');
        }
}

function get_username_availability() {
    
      $refer_id = $_POST['refer_id'];
   
       $user=$this->User_details_model->get_username_availability($refer_id);
   
      if ($user['refer_id'] !=$_POST['refer_id'] || $user['row_status']==2) {
        echo '<span style="color:red;">Introducer Id unavailable or Inactive</span>';
      } else {
        echo '<span style="color:green;">'.$user['name'].'</span>';
      }
}

function get_place_availability() {
      $place_id = $_POST['place_id'];
       $user=$this->User_details_model->get_place_availability($place_id);
      if ($user || $user['row_status']!=2) {
        /*$res=$this->db->get_where('users',array('place_id'=>$user['id']))->result_array();
        foreach ($res as $row) {
          if($row['position']!='L'){
            echo '<input name="position" id="L" class="position" value="L" type="radio" />Left';
          }
          if($row['position']=='M'){
            echo '<input name="position" id="L" class="position" value="L" type="radio" />Left
                <input name="position" id="R" class="position" value="R" type="radio" />Right';
          }
          if($row['position']=='R'){
            echo '<input name="position" id="M" class="position" value="M" type="radio" />Middle
                <input name="position" id="R" class="position" value="R" type="radio" />Right';
          }
        }*/
echo '<span style="color:green;">'.$user['name'].'</span>';
      } else {
        echo '<span style="color:red;">Place Id Unavailable</span>';
      }
  

}
function check_free_position() {
      $position = $_POST['position'];
    $place_id = $_POST['place_id'];
       $user=$this->User_details_model->check_free_position($place_id, $position);
      if ($user){
        echo '<span style="color:green;">this posistion is available</span>';
      } else {
        echo '<span style="color:red;">user already exits on this postion. Please select another position</span>';
    }

}


// public function forget_password(){
//   $page_data['page_title'] = 'forgot';
//         $page_data['page_name'] = 'forgot';
//         $this->load->view('layout/masterlayout/index', $page_data);
//}

public function aboutUs(){
        $page_data['page_title'] = 'aboutus';
        $page_data['page_name'] = 'aboutus';
      
        //$page_data['benifit']= $this->Benifit_Model->get_benifitial_user($this->session->userdata('user_data')['refer_id']);
//         print_r($page_data['benifit']);
        $this->load->view('layout/masterlayout/index', $page_data);
    }
    public function contact(){
        $page_data['page_title'] = 'contact';
        $page_data['page_name'] = 'contact';
      
        //$page_data['benifit']= $this->Benifit_Model->get_benifitial_user($this->session->userdata('user_data')['refer_id']);
//         print_r($page_data['benifit']);
        $this->load->view('layout/masterlayout/index', $page_data);
    }


  public function contact_form1(){
 $page_data['page_title'] = 'contact';
        $page_data['page_name'] = 'contact';
      
        //$page_data['benifit']= $this->Benifit_Model->get_benifitial_user($this->session->userdata('user_data')['refer_id']);
//         print_r($page_data['benifit']);
        $this->load->view('layout/masterlayout/index', $page_data);
       $input = $this->input->post();
        $inputData = array(
                "name" =>  $input['name'],
                "email" =>$input['email'],
                "mobile" => $input['mobile'],
                "subject" => $input['subject'],
                "message" =>$input['message'],
               
            );
              //print_r($inputData);
           $insert_id = $this->Contact_Model->insert_contact($inputData);
          if($insert_id){
              $this->session->set_flashdata('contact_status', 'Thanks for Contacting Us');
               redirect(base_url()."contact");
            
              }
               
            
           //$this->Mail_model->send_contact_info($id);
          
           
    }

public function registration(){
  if($this->input->post()){
    $this->form_validation->set_rules('introducer_id', 'Introducer Id', 'trim|required');
    $this->form_validation->set_rules('place_id', 'Place Id', 'trim|required');
    $this->form_validation->set_rules('position', 'Position', 'trim|required');
    $this->form_validation->set_rules('name', 'Name', 'trim|required');
    $this->form_validation->set_rules('gender', 'Gender',  'trim|required' );
    $this->form_validation->set_rules('pan_no', 'Pan No',  'trim|required|is_unique[users.pan_number]' );
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', array(
          'is_unique' => 'This %s already exists.'));
    $this->form_validation->set_rules('phone', 'Mobile Number', 'trim|required|min_length[10]|max_length[10]');  
    $this->form_validation->set_rules('username', 'User Name', 'trim|required|is_unique[users.refer_id]', array(
          'is_unique' => 'This %s already exists.'));
    $this->form_validation->set_rules('city', 'City',  'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirm]');
    $this->form_validation->set_rules('confirm', 'Password Confirmation', 'trim|required');

    if ($this->form_validation->run() == TRUE) {
          $input = $this->input->post();
       $password=hash ( "sha256",$input['password']);
           $refer_id = $input['username'];
           $inputData = array(
            "introducer_id" => $this->db->get_where('users',array('refer_id'=>$input['introducer_id']))->row()->id,
            "name" => $input['name'],
            "position" => $input['position'],
            "mobile" => $input['phone'],
            "email" => $input['email'],
            "city" => $input['city'],
            "password" => $password,
            "refer_id"=>$refer_id,
            "place_id"=>$this->db->get_where('users',array('refer_id'=>$input['place_id']))->row()->id,
            "created_at" => Date('Y/m/d H:i:s')
        );

$select_user=$this->db->get_where('users', array('refer_id'=>$input['introducer_id']))->row();

$position_availablity = $this->db->get_where('users', array('place_id'=>$inputData['place_id'], 'position'=> $input['position']))->num_rows();

$user_status = $select_user->row_status;
if($user_status==0){
  $this->session->set_flashdata('error_message','You are Blocked. You Can not refer any one');
}
else if ($user_status==2)
{
  $this->session->set_flashdata('error_message','You are Inactive. You Can not refer any one');
}
else if($position_availablity != 0){
  $this->session->set_flashdata('error_message',"User already exist on selected position");
}
else{
  $insert_id = $this->User_details_model->insert_user_details($inputData);
  if ($insert_id>0) {
     $message="Congratulation now you are the member of our company<br>User Id:'".$refer_id."', Password:'".$input['password']."' ";
     $mobile = $inputData['mobile'];
     $this->Sms_model->send_sms($mobile,$message);
     $this->mail_model->register_mail($inputData['email'],$inputData['name'],$refer_id,$input['password']);
     $user_refer=$insert_id;
     $a[0]=$this->db->where('id',$user_refer)->get('users')->row()->introducer_id;
     $user_refer=$a[0];

while(count($a)<10)
{
   $user_refer=$this->db->where('id',$user_refer)->get('users')->row()->introducer_id;
   $parent_status=$this->db->where('id',$user_refer)->get('users')->row()->row_status;
   if (is_null($user_refer)){break;}
   if ($parent_status==1)
   {
      $a[]=$user_refer;
   }
}

$ba_0=$a[0];
$data=array(
  'introducer_id'=>$ba_0,
  'refer_id'=>$insert_id,
  'amount'=>1000
  );
$getBenifit = $this->View_Refer_Model->get_benifit($data);
if($inputData['position']=='L'){
  $ba_1=$a[1];
$data=array(
  'introducer_id'=>$ba_1,
  'refer_id'=>$insert_id,
  'amount'=>500
  );
$getBenifit = $this->View_Refer_Model->get_benifit($data);
  $ba_2=$a[2];
$data=array(
  'introducer_id'=>$ba_2,
  'refer_id'=>$insert_id,
  'amount'=>500
  );
$getBenifit = $this->View_Refer_Model->get_benifit($data);
  $ba_3=$a[3];
$data=array(
  'introducer_id'=>$ba_3,
  'refer_id'=>$insert_id,
  'amount'=>500
  );
$getBenifit = $this->View_Refer_Model->get_benifit($data);
}
if($inputData['position']=='M'){
  $ba_4=$a[4];
$data=array(
  'introducer_id'=>$ba_4,
  'refer_id'=>$insert_id,
  'amount'=>500
  );
$getBenifit = $this->View_Refer_Model->get_benifit($data);
  $ba_5=$a[5];
$data=array(
  'introducer_id'=>$ba_5,
  'refer_id'=>$insert_id,
  'amount'=>500
  );
$getBenifit = $this->View_Refer_Model->get_benifit($data);
  $ba_6=$a[6];
$data=array(
  'introducer_id'=>$ba_6,
  'refer_id'=>$insert_id,
  'amount'=>500
  );
$getBenifit = $this->View_Refer_Model->get_benifit($data);
}
if($inputData['position']=='R'){
  $ba_7=$a[7];
$data=array(
  'introducer_id'=>$ba_7,
  'refer_id'=>$insert_id,
  'amount'=>500
  );
$getBenifit = $this->View_Refer_Model->get_benifit($data);
  $ba_8=$a[8];
$data=array(
  'introducer_id'=>$ba_8,
  'refer_id'=>$insert_id,
  'amount'=>500
  );
$getBenifit = $this->View_Refer_Model->get_benifit($data);
  $ba_9=$a[9];
$data=array(
  'introducer_id'=>$ba_9,
  'refer_id'=>$insert_id,
  'amount'=>500
  );
$getBenifit = $this->View_Refer_Model->get_benifit($data);
}

$this->session->set_flashdata('success_message','Registration Completed Successfully');
   }
 }
}
}
  $page_data['page_name'] = "registration";
    $page_data['page_title'] = "Registration";
    $this->load->view('layout/masterlayout/index', $page_data);
}
/*function send_mail(){
     $this->mail_model->register_mail('maheshbt.grepthor@gmail.com','mahesh','Fx192312313','123123');
       }*/
}
?>