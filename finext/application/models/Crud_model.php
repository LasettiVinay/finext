<?php 
class Crud_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){

    }
    function get_image_url($id = '') {

         if (file_exists('uploads/users/'. $id . '.jpg')){
            $image_url ='uploads/users/'. $id . '.jpg';
        }else{
            $image_url ='uploads/user.jpg';
        }
        return $image_url;
    }
    function generate_encryption_key($string){
    $ret=$this->encryption->encrypt($string);
if ( !empty($string) )
    {
        $ret = strtr(
                $ret,
                array(
                    '+' => '.',
                    '=' => '-',
                    '/' => '~'
                )
            );
    }
    return $ret;
    }
     function generate_decryption_key($string){
         $string = strtr(
            $string,
            array(
                '.' => '+',
                '-' => '=',
                '~' => '/'
            )
    );
    $ret=$this->encryption->decrypt($string);
    return $ret;
    }
}
