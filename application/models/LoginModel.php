<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

    public function check_login($email, $password) {
        $query = $this->db->where('email',$email)->where('password',$password)->get('user');
        return $query->result();
    }
}