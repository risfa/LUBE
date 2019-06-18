<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_users extends CI_Model {
	
function update_user($user_id, $username, $email, $password, $telp) 
{  
        $data = array (
            'username'   => $username,
            'email'      => $email,
            'password'   => $password,
            'no_telp'    => $telp
        );
        $this->db->where('userId', $user_id);
        return $this->db->update('tb_user', $data); 
    }
}

 ?>