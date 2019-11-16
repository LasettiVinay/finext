<?php
class Member extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        if(empty($this->session->userdata('user_data'))){
        redirect(base_url());
        }
        $this->load->model('User_details_model');
        $this->load->model('Tree_View_Model');
      $this->load->model('Compose_model');
        $this->load->model('Benifit_Model');

    }
    // public function index(){
    //     echo "member_list";
    // }

    public function dasboard(){
        $page_data['page_title'] = 'Dashboard';
        $page_data['page_name'] = 'dashboard';
        $page_data['user_data'] = $this->User_details_model->get_user_by_id($this->session->userdata('user_data')['user_id']);
        
        $this->load->view('layout/member_layout/index', $page_data);
    }
    public function profile(){
    $page_data['page_title'] = 'profile';
    $page_data['page_name'] = 'profile';
 
    $user_data = $this->User_details_model->get_user_by_id($this->session->userdata('user_data')['user_id']);
   
    if(empty($this->session->userdata('user_data'))){
       $page_data['data'] = "";
    }else{
        $user_id = $this->session->userdata('user_data')['user_id'];
       $page_data['data'] = $user_data;
    }
    
    if(!empty($this->session->userdata('user_data'))){
        $this->load->view('layout/member_layout/index', $page_data);
    }else{
        redirect(base_url());
    }
    
    }
    public function child_profile(){
      $page_data['page_title'] = 'child_profile';
    $page_data['page_name'] = 'child_profile';
    $page_data['userdata'] = $this->User_details_model->get_user_by_id($_GET['id']);
    $this->load->view('layout/member_layout/index', $page_data);
    }
    public function edit_profile(){
    $page_data['page_title'] = 'profile';
    $page_data['page_name'] = 'profile';
    
    $user_data = $this->User_details_model->get_user_by_id($this->session->userdata('user_data')['user_id']);
    
    if(empty($this->session->userdata('user_data'))){
        $page_data['data'] = "";
    }else{
        $page_data['data'] = $user_data;
          }
    if(!empty($this->session->userdata('user_data'))){
     
        $id=$this->session->userdata('user_data')['user_id'];
        if(isset($_POST['submit'])){
            
            $updateData=array(
              'name'=> $_POST['name'],
              'email' => $_POST['email'],
               'mobile' => $_POST['mobile'],
                'pan_no'=> $_POST['pan_no'],
                'nomini'=> $_POST['nomini'],
                'address' => $_POST['address'],
                'relation' => $_POST['relation'],
                'city' => $_POST['city'],
                'state'=>$_POST['state'],
                'country'=>$_POST['country'],
                        );
         
            
            $update= $this->User_details_model->edit_profile($id, $updateData);
            if($update){
                echo "<script>alert('your Profile Updated successfully')
window.location.href='http://localhost/MLM/member/member/profile'</script>";
            }
           
        }
        
    }
    else{
        echo "invalid Session";exit();
    }
    $this->load->view('layout/member_layout/index', $page_data);
    
    
}
function ajax_upload()
{$page_data['page_title'] = 'profile';
$page_data['page_name'] = 'profile';

$user_data = $this->User_details_model->get_user_by_id($this->session->userdata('user_data')['user_id']);

if(empty($this->session->userdata('user_data'))){
    $page_data['data'] = "";
}else{
    $page_data['data'] = $user_data;
}
if(!empty($this->session->userdata('user_data'))){
    
    $id=$this->session->userdata('user_data')['user_id'];
    if(isset($_FILES["image_file"]["name"]))
    {
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('image_file'))
        {
            echo $this->upload->display_errors();
        }
        else
        {
            $data = $this->upload->data();
            $updateData=array(
                 'profile_image'=>$_FILES['image_file']['name'],
                 );
            $update= $this->User_details_model->edit_profile($id, $updateData);
            if($update){
                
                
            }
           
        }
        }
        echo '<img src="'.base_url().'upload/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';
    }
}  
public function view_refer(){
    $page_data['page_title'] = 'view_refer';
    $page_data['page_name'] = 'view_refer';
    $page_data['user_Name']=$this->session->userdata('user_data');
    $this->load->view('layout/member_layout/index', $page_data);
}
public function direct_referals(){
    $page_data['page_title'] = 'Direct Referals';
    $page_data['page_name'] = 'direct_referals';
    $page_data['direct_refer']=$this->Tree_View_Model->get_refer_by_id($this->session->userdata('user_data')['refer_id']);
    $this->load->view('layout/member_layout/index', $page_data);
}
public function tree_view(){
    $page_data['page_title'] = 'Tree View';
    $page_data['page_name'] = 'tree_view';
    $page_data['tree_lists']=$this->Tree_View_Model->get_parent_node();
    foreach($page_data['tree_lists'] as $parent){
        
        $page_data['tree_child']=$this->Tree_View_Model->get_child_node($parent['introducer_id']);
        $tree['parent_id']=$parent['introducer_id'];
        $tree['parent_name']=$parent['name'];
        $tree['childs']=$page_data['tree_child'];
        foreach($page_data['tree_child'] as $child){
            
            $child_node_1 = $this->Tree_View_Model->get_child_node($child['introducer_id']);
           
        }
        array_push($foramted_arry, $tree);
    }
    $page_data['tree'] = $foramted_arry;
    
    $this->load->view('layout/member_layout/index', $page_data);
}


public function change_password(){
    
    $page_data['page_title'] = 'Change Password';
    $page_data['page_name'] = 'change_password';
    $this->load->view('layout/member_layout/index', $page_data);
    $user= $this->User_details_model->get_user_by_id($this->session->userdata('user_data')['user_id']);
   // print_r($user);exit();
    if(!empty($user)){
       
        $user->salt;
        $this->form_validation->set_rules('oldpassword','oldpassword', 'callback_password_check');
        $this->form_validation->set_rules('newpassword', 'newpassword', 'trim|required|xss_clean|matches[cpswd]');
        $this->form_validation->set_rules('cpswd', 'Password Confirmation', 'trim|required|xss_clean');
        $npass=$this->input->post('newpassword');
        $salt = rand(15456465, 56464646);
        $password = md5($npass . $salt);
       
        $pass=$this->input->post('oldpassword');
        $oldpassword=md5($pass.$user->salt);
      print_r($user->password);
       echo "<br>";
     print_r(md5($pass.$user->salt));
           if($user->password != $oldpassword){
               
        $this->form_validation->set_message('password_check', 'The {field} does not match' );
        return false;
        
    }
    else{
        $data= array('password' =>  $password,
            'salt' =>  $salt);
      
        $update_id = $this->User_details_model->edit_profile($this->session->userdata('user_data')['user_id'], $data);
     
        if($update_id){
            echo "<script>alert('successfully change passsword')</script>";
            //redirect(base_url(). 'change_password');
        }
        else{
           echo "<script>alert('Sorry')</script>";
            $this->session->set_flashdata('error_msg', 'Your Enter Invalid Email/Password');
            redirect(base_url(). 'change_password');
        }
    }
    }
    
}
public function promotion(){
    $page_data['page_title'] = 'Promotion';
    $page_data['page_name'] = 'promotion';
    $page_data['user_Name']=$this->session->userdata('user_data');
  
   $page_data['user_status']=$this->session->userdata('user_data')['active_status'];
    $this->load->view('layout/member_layout/index', $page_data);
}
// public function bank_detail_list(){
//     $page_data['page_title'] = 'bank_detail';
//     $page_data['page_name'] = 'bank_detail';
    
//    $page_data['bank_list']=$this->User_details_model->bank_detail_by_userid($this->session->userdata('user_data')['refer_id']);
   
//  $this->load->view('layout/member_layout/index', $page_data);
// }
public function bank_detail(){
    $page_data['page_title'] = 'bank_detail';
    $page_data['page_name'] = 'bank_detail';

   $user_id=$this->session->userdata('user_data')['refer_id'];
  
   $page_data['bank_list']=$this->User_details_model->bank_detail_by_userid($this->session->userdata('user_data')['refer_id']);
     $bank_deltail   =$this->db->query("SELECT * FROM `account_detail` where user_id='".$user_id."'");
        $page_data['bank_data']=$bank_deltail->row_array();
        
       
    $this->form_validation->set_rules('bank_name', 'Bank Name', 'trim|required');
    $this->form_validation->set_rules('account_holder_name', 'Account Holder Name', 'trim|required');
    $this->form_validation->set_rules('account_no', 'Account Number',  'trim|required' );
    $this->form_validation->set_rules('ifsc', 'IFSC',  'trim|required' );
    if ($this->form_validation->run() == FALSE) {
        
        $this->load->view('layout/member_layout/index', $page_data);
    }
    else{
        $input = $this->input->post();
        $inputData = array(
            "user_id" => $this->session->userdata('user_data')['refer_id'],
            "bank_name" => $input['bank_name'],
            //"role_id" => $input['user_type'],
            "account_no" => $input['account_no'],
            "account_holder" => $input['account_holder_name'],
            "ifsc" => $input['ifsc'],
            "creation_date" => Date('Y/m/d')
        );
        if($page_data['bank_data']<=0){
            $insert_id = $this->User_details_model->insert_bankDetail($inputData);
        if ($insert_id > 0) {
            echo "<script>alert('Bank detail added successfully');
                    window.location.href='".base_url()."/member/member/bank_detail'</script>
                    ";
        }
         } 
         else{
            $update_id=$this->User_details_model->update_bankDetail($user_id, $inputData);
             if ($update_id) {
            echo "<script>alert('Bank detail updated successfully');
                    window.location.href='http://localhost/finext/member/member/bank_detail_list'</script>
                    ";
        }
         }
        
    }
 
}

    public function get_help(){
        $page_data['page_title'] = 'get_help';
        $page_data['page_name'] = 'get_help';
      
        $page_data['benifit']= $this->Benifit_Model->get_benifitial_user($this->session->userdata('user_data')['refer_id']);
//         print_r($page_data['benifit']);
        $this->load->view('layout/member_layout/index', $page_data);
    }
public function logout(){
    $this->session->unset_userdata("user_data");
    redirect(base_url());
}
public function kyc_upload()
{
    $page_data['page_title'] = 'kyc_upload';
$page_data['page_name'] = 'kyc_upload';
$this->load->view('layout/member_layout/index', $page_data);

 $user_data = $this->User_details_model->get_user_by_id($this->session->userdata('user_data')['user_id']);

if(empty($this->session->userdata('user_data'))){
    $page_data['data'] = "";
 }else{
    $page_data['data'] = $user_data;
 }
 if(!empty($this->session->userdata('user_data'))){
    
    $id=$this->session->userdata('user_data')['user_id'];
   if(isset($_FILES["image_file"]["name"]))
    {
       $config['upload_path'] = './upload/';
       $config['allowed_types'] = 'jpg|jpeg|png|gif';
       $this->load->library('upload', $config);
         if(!$this->upload->do_upload('image_file'))
        {
     }   else
        {
           $data = $this->upload->data();
             $updateData=array(
                 'user_id'=>$this->session->userdata('user_data')['user_id'],
                 'kyc_image'=>$_FILES['image_file']['name']
            );
          
             $insert= $this->User_details_model->Upload_Kyc($updateData);
             if($insert){
                 echo "<script>alert('Uploaded Successfully');
                    window.location.href='http://localhost/MLM/member/member/kyc_upload'</script>";
                
           }
           echo '<img src="'.base_url().'upload/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';
         }
    }
     
 }
 }  
 public function level_summary(){
     $page_data['page_title'] = 'level_summary';
     $page_data['page_name'] = 'level_summary';
     $page_data['level_summery']=$this->Tree_View_Model->level_summery($this->session->userdata('user_data')['refer_id']);

     $this->load->view('layout/member_layout/index', $page_data);
     
 }
 public function total_get_donation(){
     $page_data['page_title'] = 'total_get_donation';
     $page_data['page_name'] = 'total_get_donation';
     $page_data['benifit']= $this->Benifit_Model->get_benifitial_user($this->session->userdata('user_data')['refer_id']);
     $page_data['total_amount']=$this->Benifit_Model->get_total_amount($this->session->userdata('user_data')['refer_id']);
    
     $this->load->view('layout/member_layout/index', $page_data);
     
 } 
 public function give_help(){
     $page_data['page_title'] = 'give_help';
     $page_data['page_name'] = 'give_help';
     $page_data['benifit_data']=$this->Benifit_Model->give_donation_user($this->session->userdata('user_data')['refer_id']);
      $this->load->view('layout/member_layout/index', $page_data);
 }
 public function autopool_tree(){
     $page_data['page_title'] = 'autopull_tree';
     $page_data['page_name'] = 'autopull_tree';
     $page_data['user_detail']=$this->autopool_Model->get_autopull_user();
     $autopooltree=$this->db->query("SELECT * FROM `autopool_tree`");
        $page_data['resulttree']=$autopooltree->result_array();
      
//$page_data['user_details']=$this->User_details_model->get_user_by_id();
     $this->load->view('layout/member_layout/index', $page_data);
 
     
 }
 public function down_link(){
    $page_data['page_title'] = 'down Link';
    $page_data['page_name'] = 'down_link';
    $page_data['member_lists']=$this->User_details_model->get_parent_by_child($this->session->userdata('user_data')['refer_id']);
    
    $this->load->view('layout/member_layout/index', $page_data);
}
public function child(){
    $page_data['page_title'] = 'Child';
    $page_data['page_name'] = 'child';
    $id=$this->uri->segment('2');
    $page_data['child_lists']=$this->User_details_model->get_parent_by_child($id);
    $this->load->view('layout/member_layout/index', $page_data);
}
  public function compose(){
        $page_data['page_title'] = 'compose';
        $page_data['page_name'] = 'compose';

        $this->form_validation->set_rules('to_email', 'to_email', 'trim|required|valid_email|xss_clean|is_unique[compose.to_email]', array(
            'is_unique' => 'This %s already exists.'
        ));
          if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/member_layout/index', $page_data);
        } else {

               $input = $this->input->post();
              
       
            $inputData = array(
                
                "to_email" => $input['to_email'],
                "subject" => $input['subject'],
                "text" => $input['text'],
           "from_email"=>$this->session->userdata('user_data')['user_email'],
              // "created_at" => time()
            );
            $insert_id = $this->Compose_model->insert_user_details($inputData);
             $this->Mail_model->send_adminto_reg($insert_id);
        if ($insert_id > 0) {
        
          redirect(base_url().'member/member/compose');
          }
       else {
               redirect('none.html');
           }

        }
        
        
    }



    public function inbox(){
        $page_data['page_title'] = 'inbox';
        $page_data['page_name'] = 'inbox';
        $page_data['mail_details'] = $this->Compose_model->get_emial_by_tomail($this->session->userdata('user_data')['user_email']);
        $this->load->view('layout/member_layout/index', $page_data);
    }

   public function inbox_mail($id){
        $page_data['page_title'] = 'inbox_mail';
        $page_data['page_name'] = 'inbox_mail';
        $id=$this->uri->segment('4');
      // $page_data['mail_details'] = $this->Compose_model->get_user_by_email($email,$id);
      $page_data['mail_details'] = $this->Compose_model->get_email_by_id($id);
     // print_r($page_data['mail_details']);
        $this->load->view('layout/member_layout/index', $page_data);
    }

public function sentbox(){
        $page_data['page_title'] = 'sentbox';
        $page_data['page_name'] = 'sentbox';
        $page_data['mail_details'] = $this->Compose_model->get_email_by_email($this->session->userdata('user_data')['user_email']);

        //print_r($page_data['mail_details']);exit();
        $this->load->view('layout/member_layout/index', $page_data);
    }


public function sentbox_mail($id){
        $page_data['page_title'] = 'sentbox_mail';
        $page_data['page_name'] = 'sentbox_mail';
        $id=$this->uri->segment('4');
      // $page_data['mail_details'] = $this->Compose_model->get_user_by_email($email,$id);
      $page_data['mail_details'] = $this->Compose_model->get_email_by_id($id);
     // print_r($page_data['mail_details']);
        $this->load->view('layout/member_layout/index', $page_data);
    }

public function autopull_give_help(){
     $page_data['page_title'] = 'Autopull Give Help';
        $page_data['page_name'] = 'autopull_give_help';
        $this->load->view('layout/member_layout/index', $page_data);
}
public function autopull_get_help(){
     $page_data['page_title'] = 'Autopull Get Help';
        $page_data['page_name'] = 'autopull_get_help';
        $this->load->view('layout/member_layout/index', $page_data);
}
public function conferm_payment(){
  $id=$this->uri->segment('4');
  $query=$this->db->query("select * from registration_detail  where id='".$id."'");
  $result=$query->row_array();
  $status=1;
  if($status<=4){
    echo "dsfdsf";
  $status=$status+1;
  $data=array(
    "payment_conferm"=>$status,
  );
 $update=$this->User_details_model->update_conferPayment($id, $data);
 if($result['payment_conferm']==4){
  $data=array(
    "active_status"=>1
  );
$update_status=$this->User_details_model->update_conferPayment($id, $data);
 }
}
}

}
?>