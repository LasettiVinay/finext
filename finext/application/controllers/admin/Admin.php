<?php
class Admin extends CI_Controller
{
public function __construct()
{ 
    parent::__construct();
    if(empty($this->session->userdata('login_user_id'))){
        redirect(base_url());
        }
    $this->load->model('User_details_model');
    $this->load->model('Tree_View_Model');
    $this->load->model('Admin_Model');
   $this->load->model('Autopull_Model');
    $this->load->model('Benifit_Model');
     $this->load->model('Compose_model');
     $this->load->model('View_Refer_Model');
     $this->load->model('Sms_model');
     date_default_timezone_set('Asia/Kolkata'); 
     
     $this->go_autopool();
     //$this->load->model('report');
}
public function dashboard(){
    //$message=$this->load->view('mail_tmp/common_mail');
    /*$message='hi mahesh this is admin.:@1';
    $this->mail_model->common_mail('maheshbt8@gmail.com','testing',$message);*/
    $page_data['page_title'] = 'Dashboard';
    $page_data['page_name'] = 'dashboard';
    $this->load->view('layout/adminlayout/index', $page_data);
   
}
public function inactive_user(){
  $page_data['page_title'] ='inactive_users';
  $page_data['page_name'] ='inactive_users';
   $page_data['member_lists']=$this->User_details_model->get_user_by_status();
   
 $this->load->view('layout/adminlayout/index', $page_data);


}
public function all_members(){
    if($this->session->userdata('login_type')=='admin'){
    $page_data['member_lists']=$this->User_details_model->get_members();
    }else{
     $page_data['member_lists']=$this->User_details_model->get_parent_by_child($this->session->userdata('login_user_id'));
    }
    //  foreach($member_lists as $members){ 
    // $query=$this->db->query("SELECT * FROM `users` where `introducer_id`='".$members['id']."' ");
    // $res=$this->db->where('user_id',$members['refer_id'])->get('autopool_details');
    // $check_auto=$res->num_rows();
    //  $auto_count=$query->num_rows();
    //   $result=$query->row_array();
    //  if($auto_count>=3  && $check_auto==0){}
    $page_data['page_title'] = 'All Members';
    $page_data['page_name'] = 'member_list';
    $this->load->view('layout/adminlayout/index', $page_data);

}
public function not_completed_members(){
    $page_data['member_lists']=$this->User_details_model->not_completed_members();
    $page_data['page_title'] = '45days completed Members';
    $page_data['page_name'] = 'member_list';
    $this->load->view('layout/adminlayout/index', $page_data);
}
public function get_detail(){
    $row=$this->db->get_where('users', array('refer_id'=>$_POST['refer_id']))->row();
    $res=$this->db->where('id',$row->introducer_id)->get('users')->row();
    $row->introducer_id=$res->refer_id;
    $row->introducer_name=$res->name;
  echo json_encode($row);
}
public function child(){
    $page_data['page_title'] = 'Child';
    $page_data['page_name'] = 'child';
    $id=$_GET['id'];
    /*$id=$this->uri->segment('4');*/
    $page_data['child_lists']=$this->User_details_model->get_parent_by_child($id);
    $this->load->view('layout/adminlayout/index', $page_data);
}
public function total_donation(){
    $page_data['page_title'] = 'Total Get Donation';
     $page_data['page_name'] = 'total_get_donation';
     $page_data['benifit']= $this->Benifit_Model->get_benifitial_user($this->session->userdata('login_user_id'));

      $this->load->view('layout/adminlayout/index', $page_data);
}
 public function total_get_donation(){
     $page_data['page_title'] = 'Total Get Donation';
     $page_data['page_name'] = 'total_get_donation';
     $page_data['benifit']= $this->Benifit_Model->get_benifitial_user($this->session->userdata('login_user_id'));
     $page_data['total_amount']=$this->Benifit_Model->get_total_amount($this->session->userdata('login_user_id'));
     $this->load->view('layout/adminlayout/index', $page_data);
     
 }
 public function autopull_total_get_donation(){
     $page_data['page_title'] = 'Autopool Total Get Donation';
     $page_data['page_name'] = 'autopull_total_get_donation';
     $page_data['benifit']= $this->Autopull_Model->get_benifitial_user($this->session->userdata('refer_id'));
     $page_data['total_amount']=$this->Autopull_Model->get_total_amount($this->session->userdata('login_user_id'));
     $this->load->view('layout/adminlayout/index', $page_data);
     
 }
  public function give_help(){
    if($this->input->post()){
        if(move_uploaded_file($_FILES['slip']['tmp_name'], 'uploads/give_help/'. $this->input->post('slip_id').  '.jpg')){
            $slip_id=$this->input->post('slip_id');
            $name=$this->input->post('name');
            $email=$this->input->post('email');
            $pay_name=$this->input->post('pay_name');
            $pay_id=$this->input->post('pay_id');
    $message='Hi '.ucwords($name).', Payment from '.$pay_name .'('.$pay_id.')'.' has completed check below and confirm activate his account.:@'.'give_help:@'.$slip_id;
    $this->mail_model->payment_mail($email,'Payment Completed',$message);
         $this->session->flashdata('success_message','File Uploaded Successfully');
    }else{
        $this->session->flashdata('error_message','File Not Uploaded');
    }
        }
     $page_data['page_title'] = 'Give Help';
     $page_data['page_name'] = 'give_help';
     $page_data['benifit_data']=$this->Benifit_Model->give_donation_user($this->session->userdata('login_user_id'));
     $this->load->view('layout/adminlayout/index', $page_data);
 }
public function get_help(){

        $page_data['page_title'] = 'Get Help';
        $page_data['page_name'] = 'get_help';
        if($this->session->userdata('login_type')=='admin'){
        $page_data['benifit']= $this->Benifit_Model->get_benifitial_user();
    }else{
        $page_data['benifit']= $this->Benifit_Model->get_benifitial_user($this->session->userdata('login_user_id'));
    }
        $this->load->view('layout/adminlayout/index', $page_data);
    }
public function treeView(){
    $page_data['page_title'] = 'Tree View';
    $page_data['page_name'] = 'tree_view';
    $this->load->view('layout/adminlayout/index', $page_data);
}
public function level_summary(){
     $page_data['page_title'] = 'Level Summary';
     $page_data['page_name'] = 'level_summary';
     $this->load->view('layout/adminlayout/index', $page_data);
 }

public function direct_referals(){
    $page_data['page_title'] = 'Direct Referrals';
    $page_data['page_name'] = 'direct_referals';
    $page_data['direct_refer']=$this->Tree_View_Model->get_refer_by_id($this->session->userdata('login_user_id'));
    $this->load->view('layout/adminlayout/index', $page_data);
}
 public function profile(){
     $page_data['page_title'] = 'Edit Employee Detail';
     $page_data['page_name'] = 'edit_profile';
     $id=$this->uri->segment(4); 
  
     $this->session->set_flashdata('id',$id);
     $this->session->set_userdata('id',$id);
   
     $page_data['data']= $this->User_details_model->get_user_by_id($id);
     $this->load->view('layout/adminlayout/index', $page_data);
 }
 public function profile_edit(){
     $page_data['data'] = $this->User_details_model->get_user_by_id($this->session->flashdata('id'));
     print_r( $this->session->userdata('id'));
     
         if(isset($_POST['submit'])){             
             $updateData=array(
                 'name'=> $_POST['name'],
                 'email' => $_POST['email'],
                 'mobile' => $_POST['mobile'],
                 'pan_no'=> $_POST['pan_no'],
                 'address' => $_POST['address'],
                 'city' => $_POST['city'],
                 'state'=>$_POST['state'],
                 'country'=>$_POST['country'],
             );
             $update= $this->User_details_model->edit_profile($this->session->flashdata('id'), $updateData);
             if($update){
             echo "<script>alert('your Profile Updated successfully')
                window.location.href='".base_url()."admin/admin/all_members'</script>";
             }
         
     $this->load->view('layout/adminlayout/index', $page_data);
  
 }
 }
function officia_ajax_upload()
{
 $page_data['page_title'] = 'Profile';
 $page_data['page_name'] = 'profile';
 $user_id=$_POST['id'];
  if($_FILES){
        //unlink('uploads/official_user/'. $user_id.  '.jpg');
    if(move_uploaded_file($_FILES['image_file']['tmp_name'], 'uploads/official_user/'.$_FILES["image_file"]["name"])){
         $updateData=array(
         'profile_image'=>$_FILES['image_file']['name'],
          );
        $update= $this->Admin_Model->update_oficial_user($user_id, $updateData);
        $this->session->flashdata('success_message','Profile Pic Updated Successfully');
    }
    else{
        $this->session->flashdata('error_message','Profile Pic Not Updated');
    }
     //echo '<img src="'.base_url().'uploads/official_users/'.$user_id.'.jpg" width="300" height="225" class="img-thumbnail" />';
    }
}  


 function admin_ajax_upload()
{$page_data['page_title'] = 'Profile';
$page_data['page_name'] = 'profile';
if(isset($_FILES["image_file"]["name"]))
{
  $config['upload_path'] = './uploads/official_user';
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
     echo '<img src="'.base_url().'uploads/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';
 }  
 public function ajax_upload() 
 {$page_data['page_title'] = 'Edit User Profile';
 $page_data['page_name'] = 'edit_profile';
 //$id=$this->uri->segment(4);
 $this->session->flashdata('id');
 $user_data = $this->User_details_model->get_user_by_id($this->session->flashdata('id'));

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
         {$data = $this->upload->data();
             $updateData=array(
                 'profile_image'=>$_FILES['image_file']['name'],
             );
             $update= $this->User_details_model->edit_profile($this->session->flashdata('id'), $updateData);
             if($update){
                 echo "<script>alert('uploded')</script>";
             }
         }
     }
     echo '<img src="'.base_url().'upload/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';
 }
 
 /*treee */


 
/* public function autopull(){
     $parent_id=$this->uri->segment('4');
     $query=$this->db->query("SELECT * FROM `registration_detail` where `introducer_id`='".$parent_id."' ");
     $count=$query->num_rows();
     $result=$query->result_array();
   
     if($count>=3){
         $autopool=$this->db->query("SELECT * FROM `autopool_user`");
         $data['user_id']=$parent_id;
         $this->db->insert('autopool_user',$data);
         $res=$this->db->get('autopool_tree');
         if($res->num_rows()>0){
             if($res->num_rows()>1){
                 echo "string";die;
             }else{
                 $row=$res->row_array();
                 $level=$row['level'];
                 if($level<4){
                     $level_count=$level+1;
                     $d2['autochildp'.$level_count]=$parent_id;
                     
                     $d2['level']=$level_count;
                     $this->db->update('autopool_tree',$d2);
                 }else{
                     $c1=$row['autochildp1'];
                     $d1['parent_id']=$c1;
                     $this->db->insert('autopool_tree',$d1);
                 }
             }
         }else{
             $d1['parent_id']=$parent_id;
             $this->db->insert('autopool_tree',$d1);
         }
      } else{
        echo "<script>alert('sorry U are not able to go in next step');
        window.location.href='".base_url()."down_lines'</script>";
      }
       
 }*/
  public function autopull(){
     $id=$this->uri->segment('4');
      $query=$this->db->query("SELECT * FROM `users` where `introducer_id`='".$id."' ");
     $count=$query->num_rows();
     $result=$query->result_array();
   
     if($count>=3){
       $res=$this->db->get('autopool_details');
    if($res->num_rows()>0){
    $result=$res->result_array();
    foreach ($result as $row) {
    if($row['level']<4){
     $parent_id=$row['user_id'];
     $level=$row['level']+1;
     $d1['position']=$level;
     $d1['parent_id']=$parent_id;
     $d1['user_id']=$this->db->where('id',$id)->get('users')->row()->refer_id;
     $position=$d1['position'];
     $p=$this->db->insert('autopool_details',$d1);
     $last_insert_id=$this->db->insert_id();
     if($p){
        $message="Congratulation now you are the member of Autopool";
        $mobile = $result['mobile'];
        $this->Sms_model->send_sms($mobile,$message);
        $autopull_status=array('autpull_status'=>1);
        $updates=$this->db->where('id',$id)->update('users', $autopull_status);
        $d2['level']=$level;
        $pool=$this->db->where('user_id',$parent_id)->update('autopool_details',$d2);
        $insert_id=$this->db->where('id',$last_insert_id)->get('autopool_details')->row()->user_id;
$user_refer=$insert_id;
$a[0]=$user_refer;

while(count($a)<8)
{
   $user_refer=$this->db->where('user_id',$user_refer)->get('autopool_details')->row()->parent_id;
   $parent_status=$this->db->where('user_id',$user_refer)->get('autopool_details')->row()->row_status;
   if (is_null($user_refer)){break;}
   if ($parent_status==1)
   {
      $a[]=$user_refer;
   }
}

$ba_0=$a[0];
$data=array(
  'parent_id'=>$ba_0,
  'child_id'=>$insert_id,
  'amount'=>1000
  );
$getBenifit = $this->View_Refer_Model->autopull_benifit_user($data);
if($position==1){
  $ba_1=$a[1];
$data['parent_id']=$ba_1;
$getBenifit = $this->View_Refer_Model->autopull_benifit_user($data);
  $ba_2=$a[2];
$data['parent_id']=$ba_2;
$getBenifit = $this->View_Refer_Model->autopull_benifit_user($data);
}
if($position==2){
  $ba_3=$a[3];
$data['parent_id']=$ba_3;
$getBenifit = $this->View_Refer_Model->autopull_benifit_user($data);
  $ba_4=$a[4];
$data['parent_id']=$ba_4;
$getBenifit = $this->View_Refer_Model->autopull_benifit_user($data);
}
if($position==3){
  $ba_5=$a[5];
$data['parent_id']=$ba_5;
$getBenifit = $this->View_Refer_Model->autopull_benifit_user($data);
  $ba_6=$a[6];
$data['parent_id']=$ba_6;
$getBenifit = $this->View_Refer_Model->autopull_benifit_user($data);
}
if($position==4){
$ba_7=$a[7];
$data['parent_id']=$ba_7;
$getBenifit = $this->View_Refer_Model->autopull_benifit_user($data);
  $ba_8=$a[8];
$data['parent_id']=$ba_8;
$getBenifit = $this->View_Refer_Model->autopull_benifit_user($data);
}
  if($pool){
           $this->session->set_flashdata('success_message','User Successfully Added in Autopool ');
        redirect($this->session->userdata('last_page'));
            }
        }   
    }
    }
    }else{
        $d1['parent_id']=$this->db->where('id','14')->get('official_users')->row()->refer_id;
        $d1['user_id']=$id;
        $position=0;
        $id=$this->db->insert('autopool_details',$d1);        
    }
// $user_refer=$id;
// for($i=0;$i<9;$i++){
// $user_refer=$this->db->where('id',$user_refer)->get('autopool_details')->row()->parent_id;
// $a[]=$user_refer;
// print_r($a);
// }
// $ba_0=$a[0];
// $data=array(
//   'parent_id'=>$ba_0,
//   'child_id'=>$id,
//   'amount'=>1000
//   );
// $getBenifit = $this->View_Refer_Model->autopull_benifit_user($data);

// if($position==1){
//   $ba_1=$a[1];
// $data=array('parent_id'=>$ba_1);
// $getBenifit = $this->View_Refer_Model->autopull_benifit_user($data);
//   $ba_2=$a[2];
// $data=array('parent_id'=>$ba_2);
// $getBenifit = $this->View_Refer_Model->autopull_benifit_user($data);
// }
// if($position==2){
//   $ba_3=$a[3];
// $data=array('parent_id'=>$ba_3);
// $getBenifit = $this->View_Refer_Model->autopull_benifit_user($data);
//   $ba_4=$a[4];
// $data=array('parent_id'=>$ba_4);
// $getBenifit = $this->View_Refer_Model->autopull_benifit_user($data);
// }
// if($position==3){
//   $ba_5=$a[5];
// $data=array('parent_id'=>$ba_5);
// $getBenifit = $this->View_Refer_Model->autopull_benifit_user($data);
//   $ba_6=$a[6];
// $data=array('parent_id'=>$ba_6);
// $getBenifit = $this->View_Refer_Model->autopull_benifit_user($data);
// }
// if($position==4){
// $ba_7=$a[7];
// $data=array('parent_id'=>$ba_7);
// $getBenifit = $this->View_Refer_Model->autopull_benifit_user($data);
//   $ba_8=$a[8];
// $data=array('parent_id '=>$ba_8);
// $getBenifit = $this->View_Refer_Model->autopull_benifit_user($data);
// }
    //redirect(base_url('autopool_tree'));
}else{
        echo "<script>alert('sorry U are not able to go in next step');
        window.location.href='".base_url()."down_lines'</script>";
      }
       
   // redirect($this->session->userdata('last_page'));
 }
 public function report(){
     $page_data['page_title'] = 'Report';
     $page_data['page_name'] = 'report';
     $date=date('Y-m-d');
     print_r($date);
     $page_data['daily_report']=$this->report->daily_report($date);
     print_r($page_data['daily_report']);
     $this->load->view('layout/adminlayout/index', $page_data);
 }


public function autopull_user(){
     if($this->session->userdata('login_type')=='admin'){
    $page_data['member_lists']=$this->User_details_model->get_members();
    }else{
     $page_data['member_lists']=$this->User_details_model->get_parent_by_child($this->session->userdata('login_user_id'));
    }
    $page_data['page_title'] = 'Autopool User';
     $page_data['page_name'] = 'autopull_user';
      $this->load->view('layout/adminlayout/index', $page_data);
}


  public function autopool_tree(){
     $page_data['page_title'] = 'Autopool Tree';
     $page_data['page_name'] = 'autopull_tree';
     $page_data['official_user']=$this->Admin_Model->get_officeal_user();


      $this->load->view('layout/adminlayout/index', $page_data);    
 }
 public function go_autopool(){
           /*if($this->session->userdata('login_type')=='admin'){*/
        $member_lists=$this->User_details_model->get_members();
         foreach($member_lists as $members){ 
    $query=$this->db->query("SELECT * FROM `users` where `introducer_id`='".$members['id']."' && `row_status`=1 ");
    $res=$this->db->where('user_id',$members['refer_id'])->get('autopool_details');
    $check_auto=$res->num_rows();
     $auto_count=$query->num_rows(); 
      $result=$query->row_array();
     if($auto_count>=3  && $check_auto==0){
 echo $id=$members['id'];
 $res=$this->db->get('autopool_details');
    if($res->num_rows()>0){
    $result=$res->result_array();
    foreach ($result as $row) {
    if($row['level']<4){
     $parent_id=$row['user_id'];
     $level=$row['level']+1;
     $d1['position']=$level;
     $d1['parent_id']=$parent_id;
     $d1['user_id']=$this->db->where('id',$id)->get('users')->row()->refer_id;
     $position=$d1['position'];
     $p=$this->db->insert('autopool_details',$d1);
     $last_insert_id=$this->db->insert_id();
     if($p){
        $message="Congratulation now you are the member of Autopool";
        $mobile = $result['mobile'];
        $this->Sms_model->send_sms($mobile,$message);
        $autopull_status=array('autpull_status'=>1);
        $updates=$this->db->where('id',$id)->update('users', $autopull_status);
        $d2['level']=$level;
        $pool=$this->db->where('user_id',$parent_id)->update('autopool_details',$d2);
        $insert_id=$this->db->where('id',$last_insert_id)->get('autopool_details')->row()->user_id;
$user_refer=$insert_id;
for($i=0;$i<9;$i++){
$user_refer=$this->db->where('user_id',$user_refer)->get('autopool_details')->row()->parent_id;
$a[]=$user_refer;
}
$ba_0=$a[0];
$data=array(
  'parent_id'=>$ba_0,
  'child_id'=>$insert_id,
  'amount'=>1000
  );
$getBenifit = $this->View_Refer_Model->autopull_benifit_user($data);
if($position==1){
  $ba_1=$a[1];
$data['parent_id']=$ba_1;
$getBenifit = $this->View_Refer_Model->autopull_benifit_user($data);
  $ba_2=$a[2];
$data['parent_id']=$ba_2;
$getBenifit = $this->View_Refer_Model->autopull_benifit_user($data);
}
if($position==2){
  $ba_3=$a[3];
$data['parent_id']=$ba_3;
$getBenifit = $this->View_Refer_Model->autopull_benifit_user($data);
  $ba_4=$a[4];
$data['parent_id']=$ba_4;
$getBenifit = $this->View_Refer_Model->autopull_benifit_user($data);
}
if($position==3){
  $ba_5=$a[5];
$data['parent_id']=$ba_5;
$getBenifit = $this->View_Refer_Model->autopull_benifit_user($data);
  $ba_6=$a[6];
$data['parent_id']=$ba_6;
$getBenifit = $this->View_Refer_Model->autopull_benifit_user($data);
}
if($position==4){
$ba_7=$a[7];
$data['parent_id']=$ba_7;
$getBenifit = $this->View_Refer_Model->autopull_benifit_user($data);
  $ba_8=$a[8];
$data['parent_id']=$ba_8;
$getBenifit = $this->View_Refer_Model->autopull_benifit_user($data);
}
  if($pool){
           //$this->session->set_flashdata('success_message','User Successfully Added in Autopull ');
        redirect($this->session->userdata('last_page'));
            }
        }   
    }
    }
    }else{
        $d1['parent_id']=$this->db->where('id','14')->get('official_users')->row()->refer_id;
        $d1['user_id']=$id;
        $position=0;
        $id=$this->db->insert('autopool_details',$d1);        
    }



     }


    }
/*}*/
 }
 public function confirm_payment(){
    $page_data['page_title'] = 'Get Help';
        $page_data['page_name'] = 'get_help';
    $id=$_GET['id'];
    //print_r($this->session->userdata('login_type'));
    if($this->session->userdata('login_type')=='admin')
    {
        
$benifit=$this->db->get_where('refer_benifit', array('id'=>$_GET['id']))->row_array();
$user_id=$benifit['introducer_id'];

    }
    elseif($this->session->userdata('login_type')=='member'){
    $user_id=$this->session->userdata('login_user_id');
    $benifit=$this->db->get_where('refer_benifit', array('id'=>$_GET['id']))->row_array();
   // $benifit=$this->db->query("select * from refer_benifit where introducer_id='".$user_id."'");
  }

   // $result=$benifit->row();

      $data=array(
    "row_status"=>1,
  );
      
$update=$this->User_details_model->update_conferPayment($id, $data);
 if($update){
    $user_rec=$this->db->get_where('users',array('id'=>$benifit['refer_id']))->row_array();

    $c_rec=$this->db->get_where('users',array('id'=>$benifit['introducer_id']))->row_array();
    $email=$this->db->get_where('users',array('id'=>$benifit['refer_id']))->row()->email;
    $c_name=$c_rec['name'].' ('.$c_rec['refer_id'].')';
    $message='Hi, Your payment is confirmed by '.$c_name;
    $this->mail_model->pay_confirm_mail($email,'Payment Confirmed',$message);

    $pos['payment_conferm']=$user_rec['payment_conferm']+1;
    $walet_amout['walet']=$user_rec['walet']+$benifit['amount'];
    $this->db->where('id',$user_id)->update('users',$walet_amout);
    $this->db->where('id',$benifit['refer_id'])->update('users',$pos);
    $user_rec=$this->db->get_where('users',array('id'=>$benifit['refer_id']))->row_array();
    //print($user_rec);exit;
    $num_of_users_confirmed=$this->db
        ->get_where('refer_benifit', array('refer_id'=>$benifit['refer_id'], 'row_status'=>1))
        ->num_rows();

    log_message('debug', '---- Logged in User Finext ID           : '.$benifit['introducer_id']);
    log_message('debug', '---- Child User Finext ID               : '.$user_rec['refer_id']);
    log_message('debug', '---- Number of users confirmed          : '.$num_of_users_confirmed);
    log_message('debug', '---- Count of payment_conferm in users  : '.$user_rec['payment_conferm']);
    log_message('debug', '---- User Current status                : '.$user_rec['row_status']);

    if($user_rec['payment_conferm']>=4 && $num_of_users_confirmed==4)
    {
        $status=array('row_status'=>1,'activedate'=>date('Y-m-d H:i:s'));
        print_r($status);

        $this->db->where('id',$benifit['refer_id'])->update('users',$status);
        $user_rec=$this->db->get_where('users',array('id'=>$benifit['refer_id']))->row_array();
        log_message('debug', '---- User Updated status: '.$user_rec['row_status']);
        redirect(base_url().'admin_get_helps');
    }
    
  /* $c_status=1
    $payment_data=array(
        'payment_conferm'=>$c_status,

    );
    $update_payment_conferm=$this->User_details_model->edit_profile($result->refer_id, $payment_data);
    if($update_payment_conferm){
    
        redirect(base_url().'admin_get_helps');
    }
    else{echo "dsfdsf";}*/
    redirect(base_url().'admin_get_helps');
    
    }
   $this->load->view('layout/adminlayout/index', $page_data);
 }

public function autopull_confirm_payment(){
    $page_data['page_title'] = 'Get Help';
        $page_data['page_name'] = 'autopull_get_help';
    $id=$_GET['id'];
    $refer=$this->db->get_where('autopull_benifit_user', array('id'=>$id))->row();

/*  if($this->session->userdata('login_type')=='admin')
    {
        
$benifit=$this->db->get_where('autopull_benifit_user', array('parent_id'=>$refer->parent_id))->row_array();
$user_id=$benifit['introducer_id'];

    }
    elseif($this->session->userdata('login_type')=='member'){
    $user_id=$this->session->userdata('login_user_id');
    $benifit=$this->db->get_where('autopull_benifit_user', array('parent_id'=>$refer->parent_id))->row_array();
   // $benifit=$this->db->query("select * from refer_benifit where introducer_id='".$user_id."'");
}*/


      $data=array(
    "row_status"=>1,
  );
   $update=$this->User_details_model->autopull_update_conferPayment($id, $data);
 if($update){
     $benifit=$this->db->get_where('autopull_benifit_user', array('id'=>$id))->row_array();

     $user_id=$benifit['parent_id'];
     $parent=substr($user_rec_auto['parent_id'], 0,4);
    if($parent=='FX18')
    {
        $result=$this->db->get_where('official_users', array('refer_id'=>$benifit['parent_id']))->row();
        $email=$this->db->get_where('official_users',array('refer_id'=>$benifit['child_id']))->row()->email;
        $walet_amout['walet']=$user_rec['walet']+$result->amount;
        $this->db->where('refer_id',$user_id)->update('official_users',$walet_amout);
    }
    else
    {
        $result=$this->db->get_where('users', array('refer_id'=>$benifit['parent_id']))->row();
        $email=$this->db->get_where('users',array('refer_id'=>$benifit['child_id']))->row()->email;
        $walet_amout['walet']=$user_rec['walet']+$result->amount;
        $this->db->where('refer_id',$user_id)->update('users',$walet_amout);
    }
    
    $c_name=$result->name.' ('.$result->refer_id.')';
    $message='Hi, Your payment is confirmed by '.$c_name;
    $this->mail_model->pay_confirm_mail($email,'Payment Confirmed',$message);

    $user_rec_auto=$this->db->get_where('autopool_details',array('user_id'=>$benifit['child_id']))->row_array();
    $user_rec=$this->db->get_where('users',array('id'=>$result->refer_id))->row_array();
    // $walet_amout['walet']=$user_rec['walet']+$result->amount;
    // $this->db->where('refer_id',$user_id)->update('users',$walet_amout);
    
    $pos['payment_conferm']=$user_rec_auto['payment_conferm']+1;
    $this->db->where('user_id',$benifit['child_id'])->update('autopool_details',$pos);
    $user_rec_auto=$this->db->get_where('autopool_details',array('user_id'=>$benifit['child_id']))->row_array();
    
    $num_of_users_confirmed=$this->db
        ->get_where('autopull_benifit_user', array('child_id'=>$benifit['child_id'], 'row_status'=>1))
        ->num_rows();

    log_message('debug', '---- Logged in User Finext ID           : '.$benifit['parent_id']);
    log_message('debug', '---- Child User Finext ID               : '.$benifit['child_id']);
    log_message('debug', '---- Number of users confirmed          : '.$num_of_users_confirmed);
    log_message('debug', '---- Count of payment_conferm in users  : '.$user_rec_auto['payment_conferm']);
    log_message('debug', '---- User Current status                : '.$user_rec_auto['row_status']);

    if($user_rec_auto['payment_conferm']>=3 && $num_of_users_confirmed==3)
    {
        $status=array('row_status'=>1,'activedate'=>date('Y-m-d H:i:s'));
        $this->db->where('user_id',$benifit['child_id'])->update('autopool_details',$status); 

        $this->db->where('refer_id',$benifit['child_id'])->update('users',$status);
        $user_rec_auto=$this->db->get_where('autopool_details',array('user_id'=>$benifit['child_id']))->row_array();
        $user_rec_mem=$this->db->get_where('users',array('refer_id'=>$benifit['child_id']))->row_array();
        log_message('debug', '---- Child User Updated autopool status : '.$user_rec_auto['row_status']);
        log_message('debug', '---- Child User Updated member status   : '.$user_rec_mem['row_status']);
        #redirect(base_url().'autopull_get_help');
    }

    /* $c_status=1
    $payment_data=array(
        'payment_conferm'=>$c_status,

    );
    $update_payment_conferm=$this->User_details_model->edit_profile($result->refer_id, $payment_data);
    if($update_payment_conferm){
    
        redirect(base_url().'admin_get_helps');
    }
    else{echo "dsfdsf";}*/
    redirect(base_url().'autopull_get_help'); 
  }
  $this->load->view('layout/adminlayout/index', $page_data);
 }

public function compose(){
         $page_data['page_title'] = 'Compose';
         $page_data['page_name'] = 'compose';

        // $this->form_validation->set_rules('to_email', 'to_email', 'trim|required|xss_clean');
          // if ($this->form_validation->run() == FALSE) {
             $this->load->view('layout/adminlayout/index', $page_data);
        /// } else {
//echo "dfdsg";
               
              if(isset($_POST['submit'])){
              
        $input = $this->input->post();
            if($input['to-mail-id']==1){
                $to_mail_id=$input['to-mail-id'];
            }elseif($input['to-mail-id']!=1){
                $to_mail=explode('/',$input['to-mail-id']);
                $to_mail_id=$this->db->get_where('users',array('refer_id'=>$to_mail[0]))->row()->id;
            }
             $inputData = array(
                 "to_email" => $to_mail_id,
                 "subject" => $input['subject'],
                 "text" => $input['text'],
                "from_email"=>$this->session->userdata('login_user_id')
             );
             $insert_id = $this->Compose_model->insert_user_details($inputData);
              //$this->Mail_model->send_adminto_reg($insert_id);
         if ($insert_id > 0) {
        $this->session->set_flashdata('success_message','Your message send successfully');
            
           redirect(base_url().'admin_compose');
           }
        else {
                redirect(base_url('admin_compose'));
            }

         }
        
        
     }



    public function inbox(){
        $page_data['page_title'] = 'Inbox';
        $page_data['page_name'] = 'inbox';
        $page_data['mail_details'] = $this->Compose_model->get_emial_by_tomail($this->session->userdata('login_user_id'));
        $this->load->view('layout/adminlayout/index', $page_data);
    }

    public function inbox_mail(){
        $page_data['page_title'] = 'Inbox Mail';
        $page_data['page_name'] = 'inbox_mail';
        $id=$_GET['id'];
      // $page_data['mail_details'] = $this->Compose_model->get_user_by_email($email,$id);
      $page_data['mail_details'] = $this->Compose_model->get_email_by_id($id);
     // print_r($page_data['mail_details']);
        $this->load->view('layout/adminlayout/index', $page_data);
    }

public function sentbox(){
        $page_data['page_title'] = 'Sentbox';
        $page_data['page_name'] = 'sentbox';
        //$page_data['mail_details'] = $this->Compose_model->get_email_by_email($this->session->userdata('login_user_id'));

      // print_r($page_data['mail_details']);exit();
        $this->load->view('layout/adminlayout/index', $page_data);
    }


public function sentbox_mail(){
        $page_data['page_title'] = 'Sentbox Mail';
        $page_data['page_name'] = 'sentbox_mail';
        $id=$_GET['id'];

      // $page_data['mail_details'] = $this->Compose_model->get_user_by_email($email,$id);
      $page_data['mail_details'] = $this->Compose_model->get_email_by_id($id);
     // print_r($page_data['mail_details']);
        $this->load->view('layout/adminlayout/index', $page_data);
    }
    /* admin profile */
    public function admin_profile(){
        $id=$_GET['user_id'];
    $user_id=$this->crud_model->generate_decryption_key($id);
    if($this->input->post()){
            $updateData=array(
                'name'=> $_POST['name'],
                'email' => $_POST['email'],
                'mobile' => $_POST['mobile'],
                'pan_number'=> $_POST['pan_no'],
                'address' => $_POST['address'],
                'city' => $_POST['city'],
                'state'=>$_POST['state'],
                'country'=>$_POST['country'],
                        );
            $update= $this->User_details_model->edit_profile($user_id, $updateData);
            if($update){
            $this->session->set_flashdata('success_message','User Details Updated Successfully');
            }else{
            $this->session->set_flashdata('error_message','User Details Not Updated');
            } 
        }
        $user_data = $this->User_details_model->get_user_by_id($this->session->userdata('login_user_id'));
        $page_data['data'] = $user_data;
        $page_data['user_id']=$user_id;
        $page_data['page_title'] = 'Profile';
        $page_data['page_name'] = 'profile';
        $this->load->view('layout/adminlayout/index', $page_data);
    }
public function profile_update(){
        $id=$_GET['user_id'];
    $user_id=$this->crud_model->generate_decryption_key($id);
    if($_FILES){
        unlink('uploads/users/'. $user_id.  '.jpg');
    if(move_uploaded_file($_FILES['image_file']['tmp_name'], 'uploads/users/'. $user_id.  '.jpg')){
     $this->session->flashdata('success_message','Profile Pic Updated Successfully');
    }else{
        $this->session->flashdata('error_message','Profile Pic Not Updated');
    }
    }
    redirect($this->session->userdata('last_page').'?user_id='.$id);
}
    public function change_password(){
        if($this->input->post()){
            $oldpassword=$this->input->post('oldpassword');
            $newpassword=$this->input->post('newpassword');
            $cpswd=$this->input->post('cpswd');
            if($newpassword == $cpswd){
                $oldpassword=hash ( "sha256",$oldpassword);
                $o_pass=$this->db->where('id',$this->session->userdata('login_user_id'))->get('users')->row()->password;
                if($oldpassword==$o_pass){
                    $newpassword=hash ( "sha256",$newpassword);
                    $res=$this->User_details_model->update_password($this->session->userdata('login_user_id'),$newpassword);
                    if($res){
                        $this->session->set_flashdata('success_message','Password Updated Successfully');
                    }else{
                        $this->session->set_flashdata('error_message','Password Not Updated');
                    }
                }else{
                    $this->session->set_flashdata('error_message','Old Password Not Matched');    
                }
            }else{
                $this->session->set_flashdata('error_message','New Password and Confirm Password Not Matched');
            }
    }
    $page_data['page_title'] = 'Change Password';
    $page_data['page_name'] = 'change_password';
    $this->load->view('layout/adminlayout/index', $page_data);
    $user= $this->User_details_model->get_user_by_id($this->session->userdata('login_user_id'));
    
    
}
    public function set_password(){
        $id=$_GET['id'];

        if($this->input->post()){
           //$oldpassword=$this->input->post('oldpassword');
            

            $newpassword=$this->input->post('newpassword');
            $cpswd=$this->input->post('cpswd');
            if($newpassword == $cpswd){
                //$oldpassword=hash ( "sha256",$oldpassword);
                //$o_pass=$this->db->where('id',$_GET['id'])->get('users')->row()->password;
              
                    $newpassword=hash ( "sha256",$newpassword);
                  
                    $res=$this->User_details_model->update_password($id,$newpassword);
                    if($res){
                        $this->session->set_flashdata('success_message','Password Updated Successfully');
                    }else{
                        $this->session->set_flashdata('error_message','Password Not Updated');
                    }
                // }else{
                //     $this->session->set_flashdata('error_message','Old Password Not Matched');    
                // }
            }else{
                $this->session->set_flashdata('error_message','New Password and Confirm Password Not Matched');
            }
    
}
    $page_data['page_title'] = 'Set Password';
    $page_data['page_name'] = 'set_password';
    $this->load->view('layout/adminlayout/index', $page_data);
    //$user= $this->User_details_model->get_user_by_id($this->session->userdata('login_user_id'));
    
}
public function bank_detail(){
    $page_data['page_title'] = 'Bank Detail';
    $page_data['page_name'] = 'bank_detail';

   $page_data['bank_list']=$this->User_details_model->bank_detail_by_userid($this->session->userdata('login_user_id'));
   $user_id=$this->session->userdata('login_user_id');
  
  
   
     $bank_deltail   =$this->db->query("SELECT * FROM `account_detail` where user_id='".$user_id."'");
        $page_data['bank_data']=$bank_deltail->row_array();
        
       
    $this->form_validation->set_rules('bank_name', 'Bank Name', 'trim|required');
    $this->form_validation->set_rules('account_holder_name', 'Account Holder Name', 'trim|required');
    $this->form_validation->set_rules('account_no', 'Account Number',  'trim|required' );
    $this->form_validation->set_rules('ifsc', 'IFSC',  'trim|required' );
    if ($this->form_validation->run() == FALSE) {
        
        $this->load->view('layout/adminlayout/index', $page_data);
    }
    else{
        $input = $this->input->post();
        $inputData = array(
            "user_id" => $this->session->userdata('login_user_id'),
            "bank_name" => $input['bank_name'],
            //"role_id" => $input['user_type'],
            "account_no" => $input['account_no'],
            "account_holder" => $input['account_holder_name'],
            "ifsc" => $input['ifsc'],
            "pay_phone_no" =>$input['payno'],
            "paytm"=>$input['paytm'],
            "tez" => $input['tez'],
            "btc" => $input['btc'],
            "creation_date" => Date('Y/m/d')
        );

        if($page_data['bank_data']<=0){
            $insert_id = $this->User_details_model->insert_bankDetail($inputData);
        if ($insert_id > 0) {
              $this->session->set_flashdata('success_message','Your Bank Detail Updated Successfully');
              redirect(base_url('admin_bank_detail'));
            // echo "<script>alert('Bank detail added successfully');
            //         window.location.href='".base_url()."admin_bank_detail'</script>
            //         ";
        }
         } 
         else{
            $update_id=$this->User_details_model->update_bankDetail($user_id, $inputData);
             if ($update_id) {
                $this->session->set_flashdata('success_message','Your Bank Detail Updated Successfully');
              redirect(base_url('admin_bank_detail'));
            // echo "<script>alert('Bank detail updated successfully');
            //         window.location.href='".base_url()."admin_bank_detail'</script>
            //         ";
        }
         }
        
    }
 
}

public function block_users(){
$page_data['page_title'] = 'Block User';
$page_data['page_name'] = 'block_user';
$page_data['blocak_user']=$this->db->get_where('users', array('row_status'=>0))->result_array();
$this->load->view('layout/adminlayout/index', $page_data); 
}
public function activate_User(){
$page_data['page_title'] = 'block_user';
$page_data['page_name'] = 'block_user';
$id=$_GET['id'];
$block_user=$this->db->get_where('users', array('row_status'=>0,'id'=>$_GET['id']))->row_array();
if($block_user['payment_conferm']>=4){
   $data=array(
    'row_status'=>1,
);
}
else{
    $data=array(
    'row_status'=>2,
); }
$update=$this->db->where('id',$id)->update('users',$data);
if($update){
     $this->session->set_flashdata('success_message','User is activated');
    redirect(base_url('block_user'));
} 
$this->load->view('layout/adminlayout/index', $page_data); 
}
public function kyc_upload()
{
$user_id=$this->session->userdata('login_user_id');
if($_FILES){

}
$page_data['page_title'] = 'kyc_upload';
$page_data['page_name'] = 'kyc_upload';
$this->load->view('layout/adminlayout/index', $page_data);     
}
/*public function kyc_upload()
{
$page_data['page_title'] = 'kyc_upload';
$page_data['page_name'] = 'kyc_upload';
$this->load->view('layout/adminlayout/index', $page_data);
$user_id=$this->session->userdata('login_user_id');
 $kyc_deltail   =$this->db->query("SELECT * FROM `kyc` where user_id='".$user_id."'");
 Print_r($kyc_deltail);
        $page_data['kyc_deltail']=$kyc_deltail->row_array();

 $user_data = $this->User_details_model->get_user_by_id($this->session->userdata('login_user_id'));
 $id=$this->session->userdata('login_user_id');
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
             'user_id'=>$this->session->userdata('login_user_id'),
             'kyc_image'=>$_FILES['image_file']['name']
            );
          
             $insert= $this->User_details_model->Upload_Kyc($updateData);
             if($insert){
                 echo "<script>alert('Uploaded Successfully');
                    window.location.href='".base_url()."/member/member/kyc_upload'</script>";
                
           }
           echo '<img src="'.base_url().'upload/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';
         }
    }
     

 }*/
 public function delete_user(){
   $page_data['page_title'] = 'member_list';
 $page_data['page_name'] = 'member_list';
$id=$_GET['user_id'];
$data=array(
    'row_status'=>0,
);

$update=$this->db->where('id',$id)->update('users',$data);

if($update){

     $this->session->set_flashdata('success_message','User is deleted');
    redirect(base_url('down_lines'));
} 
$this->load->view('layout/adminlayout/index', $page_data); 

 }

public function autopull_give_help(){
    if($this->input->post()){
        if(move_uploaded_file($_FILES['slip']['tmp_name'], 'uploads/autopull_give_help/'. $this->input->post('slip_id').  '.jpg')){

            $slip_id=$this->input->post('slip_id');
            $name=$this->input->post('name');
            $email=$this->input->post('email');
            $pay_name=$this->input->post('pay_name');
            $pay_id=$this->input->post('pay_id');
    $message='Hi '.ucwords($name).', Payment from '.$pay_name .'('.$pay_id.')'.' has completed check below and confirm activate his account.:@'.'autopull_give_help:@'.$slip_id;

    $this->mail_model->payment_mail($email,'Payment Completed',$message);

         $this->session->flashdata('success_message','File Uploaded Successfully');
    }else{
        $this->session->flashdata('error_message','File Not Uploaded');
    }
        }
     $page_data['page_title'] = 'Autopool Give Help';
        $page_data['page_name'] = 'autopull_give_help';
        $page_data['autopull_benificial']=$this->db->get_where('autopull_benifit_user', array('child_id'=>$this->session->userdata('refer_id')))->result_array();
            
        $this->load->view('layout/adminlayout/index', $page_data);
}
public function autopull_get_help(){
     $page_data['page_title'] = 'Autopool Get Help';
        $page_data['page_name'] = 'autopull_get_help';

if($this->session->userdata('login_type')=='admin'){
    $page_data['get_autopull_benificial']=$this->db->order_by('id','DESC')->get('autopull_benifit_user')->result_array();
}
else{
         $page_data['get_autopull_benificial']=$this->db->order_by('id','DESC')->get_where('autopull_benifit_user', array('parent_id'=>$this->session->userdata('refer_id')))->result_array();
     }
        $this->load->view('layout/adminlayout/index', $page_data);
}
public function official_user(){
     $page_data['page_title'] = 'Official User';
        $page_data['page_name'] = 'official_user';
        $page_data['User']= $this->Autopull_Model->official_user();

        $this->load->view('layout/adminlayout/index', $page_data);
}
public function official_profile(){
     $page_data['page_title'] = 'Official User';
        $page_data['page_name'] = 'official_profile';
        $page_data['official_profile']= $this->Autopull_Model->official_user_by_id($_GET['id']);
$this->session->set_userdata('officialUser_id', $_GET['id']);


        $this->load->view('layout/adminlayout/index', $page_data);
}
public function edit_official_profile(){
     $page_data['page_title'] = 'Official User';
        $page_data['page_name'] = 'official_profile';
       print_r($this->session->userdata('officialUser_id'));
         $page_data['official_profile']= $this->Autopull_Model->official_user_by_id($this->session->userdata('officialUser_id'));
         if(isset($_POST['submit'])){
             
             $updateData=array(
                 'name'=> $_POST['name'],
                 'display_id' => $_POST['display_id'],
                 'email' => $_POST['email'],
                 'mobile' => $_POST['mobile'],
                 'pan_no'=> $_POST['pan_no'],
                 'address' => $_POST['address'],
                 'city' => $_POST['city'],
                 'state'=>$_POST['state'],
                 'country'=>$_POST['country'],
                 'tez'=>$_POST['tez'],
                 'paytm'=>$_POST['paytm'],
                 'pay_phone_no'=>$_POST['pay_phone_no'],
                 'bank_name'=>$_POST['bank_name'],
                 'account_holder_name'=>$_POST['account_holder_name'],
                 'account_no'=>$_POST['account_no'],
                 'ifsc' => $_POST['ifsc'],
                 'btc' => $_POST['btc']
             );
             
             $update= $this->Autopull_Model->edit_official_user_detail($this->session->userdata('officialUser_id'), $updateData);
             if($update){
                redirect('official_user');
//                  echo "<script>alert('your Profile Updated successfully')
// window.location.href='".base_url()."official_user'</script>";
             }
         
     $this->load->view('layout/adminlayout/index', $page_data);
  
 }
        $this->load->view('layout/adminlayout/index', $page_data);
}

public function term_and_condition(){
     $page_data['page_title'] = 'Term And Condition';
    $page_data['page_name'] = 'term_and_condition';             
        $this->load->view('layout/adminlayout/index', $page_data);
}
public function update_user_status(){
 $status['row_status']=0;
$this->db->where('id',$this->session->userdata('login_user_id'))->update('users',$status);

$autopool_users=$this->db->get_where('autopool_details', array('user_id'=>$this->session->userdata['refer_id']))->row_array();

if ($autopool_users!='')
{
    $this->db->where('user_id',$this->session->userdata('refer_id'))->update('autopool_details',$status);
}

}
 public function logout(){
    session_destroy();
    redirect("home/login_page");
}

public function autopull_users(){
     $page_data['page_title'] = 'Autopool Users';
    $page_data['page_name'] = 'autopull_users';  
    $page_data['autopull_users']=$this->db->order_by('id','DESC')->get_where('autopool_details', array())->result_array();
   $this->load->view('layout/adminlayout/index', $page_data);
}

public function autopull_pay_users(){
     $page_data['page_title'] = 'Autopool Pay Users';
    $page_data['page_name'] = 'autopull_users';  
    $page_data['autopull_users']=$this->db->order_by('id','DESC')->get_where('autopool_details', array('payment_status'=>1))->result_array(); 
   $this->load->view('layout/adminlayout/index', $page_data);
}
public function autopull_unpay_users(){
     $page_data['page_title'] = 'Autopool Unpay Users';
    $page_data['page_name'] = 'autopull_users';  
    $page_data['autopull_users']=$this->db->order_by('id','DESC')->get_where('autopool_details', array('payment_status'=>0))->result_array(); 
   $this->load->view('layout/adminlayout/index', $page_data);
}

public function contact(){
    $page_data['page_title']='Contact';
    $page_data['page_name']='contact';
    $page_data['contact_user']=$this->db->get('contact_us')->result_array();
     $this->load->view('layout/adminlayout/index', $page_data);
}
public function auto_confirm_payment(){
    $data=array('payment_status'=>1);
    $user_id=$_GET['id'];
    //$updates=$this->db->where('id', $_GET['id'])->updat('autopool_details',$data);
    $updates=$this->db->where('id',$user_id)->update('autopool_details', $data);
    if($updates){
        $this->session->flashdata('message', "getting amount");
        redirect(base_url('autopull_users'));
    }
}
public function message_update(){
    $id=$_GET['user_id'];
    if($this->input->post()){
$data['description'] = $this->input->post('message');
        $this->db->where('setting_type', 'message');
        $this->db->update('settings', $data);
    }

    redirect($this->session->userdata('last_page').'?user_id='.$id);
}
function db_backup(){
$this->load->dbutil();
$prefs = array(     
    'format'      => 'sql',             
    'filename'    => 'my_db_backup.sql'
    );
$backup =& $this->dbutil->backup($prefs); 
$db_name = 'Finext-DB'.date('Ymd').'.'.'sql';
$save = 'pathtobkfolder/'.$db_name;
$this->load->helper('file');
write_file($save, $backup); 
$this->load->helper('download');
force_download($db_name, $backup);
}

}  
 


?>