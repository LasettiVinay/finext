<?php 
class View_Refer_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getReferUser($id){
        return $this->db->get_where('registration_detail', array('introducer_id'=>$id))->result_array();
        
    }
    public function getreference_detail($refer){
        return  $this->db->insert('register_user', $refer);
      }
    public function get_benifit($addAmount){
        $this->db->insert('refer_benifit', $addAmount);
        $getBenifit = $this->db->insert_id();
        if($getBenifit){
            $wal=$this->db->where('id',$addAmount['introducer_id'])->get('users')->row()->walet;
            $total=$wal+$addAmount['amount'];
            $data['walet']=$total;
            $this->db->where('id',$addAmount['introducer_id'])->update('users',$data);
            return $getBenifit;
        }
    }
  public function autopull_benifit_user($addAmount){
     $this->db->insert('autopull_benifit_user', $addAmount);
        $getBenifit = $this->db->insert_id();
        if($getBenifit){
            $wal=$this->db->where('refer_id',$addAmount['parent_id'])->get('users')->row()->walet;
            $total=$wal+$addAmount['amount'];
            $data['walet']=$total;
            $this->db->where('refer_id',$addAmount['parent_id'])->update('users',$data);
            return $getBenifit;
        }
  }
}
?>