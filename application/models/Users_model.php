<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{

	public function loginUser($username, $password)
	{
		$query = $this->db->get_where('users' , ['username' => $username, 'password' => $password]);
		if($query->num_rows() >= 1){
			return $query->row_array();
		} else {
			return false;
		}
	}
	
	public function authToken($token)
    {
        $query = $this->db->get_where('users', ['token' => $token, 'suspend' => 0]);
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
}
                        
/* End of file Users.php */
