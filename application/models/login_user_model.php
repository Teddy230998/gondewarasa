<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login_admin_model
 *
 * @author USER
 */
class login_user_model extends CI_Model{
    //put your code here
    	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}
}
