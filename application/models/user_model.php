<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
	public function __construct(){
		$this->load->helper('security');
	}
	public function register($post){
		$password = do_hash($post['password']);
		$query = 
      "INSERT INTO users (name, alias, email, password, dob, created_at, modified_at) VALUES(?,?,?,?,?,NOW(),NOW())";
		$values =
			 ["{$post['name']}","{$post['alias']}","{$post['email_pk']}",$password,"{$post['dob']}"];
		$this->db->query($query, $values);
		return true;
	}
	public function show_by_id($id){
		$query =
			"SELECT alias, name, email FROM users WHERE id = ?";
		$values = [$id];
		return $this->db->query($query,$values)->row_array();
	}
	public function show_by_email($email){
		$query =
			"SELECT * FROM users WHERE email = ?";
		$values = [$email];
		return $this->db->query($query,$values)->row_array();
	}
}
