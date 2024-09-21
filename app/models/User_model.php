
<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_model extends Model {
    // read data
	public function display_users() {
       return $this->db->table('aamj_users')->get_all();
    }
    // create data
    public function create($last_name, $first_name, $email, $gender,$address){      
        $data = array(
            'aamj_last_name' => $last_name,
            'aamj_first_name' => $first_name,
            'aamj_email' => $email,
            'aamj_gender' => $gender,
            'ammj_address' => $address,
            );

       return  $this->db->table('aamj_users')->insert($data);
     
    }
    // fetch data
    public function fetch_user($id){
        return $this->db->table('aamj_users')->where('id', $id)->get();
    }
    // update data
    public function update($id, $last_name, $first_name, $email, $gender, $address){
        $data = array(
            'aamj_last_name' => $last_name,
            'aamj_first_name' => $first_name,
            'aamj_email' => $email,
            'aamj_gender' => $gender,
            'ammj_address' => $address,
            );
        
     return  $this->db->table('aamj_users')->where('id', $id)->update($data);
    }
    // delete data
    public function delete($id){
     return  $this->db->table('aamj_users')->where("id", $id)->delete();
    }

}   
?>