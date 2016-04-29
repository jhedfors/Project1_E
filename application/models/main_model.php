<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {
	public function __construct(){
		$this->load->helper('security');
	}
	public function register($post){
		$password = do_hash($post['password']);
		$first_name = $this->get_first_name($post['name']);
		$query = "INSERT INTO users (name, alias, email, password, dob, created_at, modified_at) VALUES(?,?,?,?,?,NOW(),NOW());
";
		$values =
			 ["{$post['name']}","{$post['alias']}","{$post['email']}",$password,"{$post['dob']}"];
		$this->db->query($query, $values);
		return true;
	}

	public function get_first_name($name){
		$first_name ='';
		for ($i=0; $i < strlen($name); $i++) {
			if ($name[$i] == ' ') {
				break;
			}
			else {
				$first_name.=$name[$i];
			}
		};

		return $first_name;
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

	public function show_friends(){
		$active_id = $this->session->userdata('active_id');
		$query =
			"SELECT friends.id as friend_id, friends.alias as alias from users AS friends
			LEFT JOIN friendships ON friends.id = friendships.friend_id
			LEFT JOIN users ON users.id = friendships.user_id
			WHERE users.id = ?";
			$values = [$active_id];
			return $this->db->query($query,$values)->result_array();
		}
		public function show_non_friends(){
			$active_id = $this->session->userdata('active_id');
			$query =
				"SELECT friends.id as friend_id, friends.alias as alias from users AS friends
				LEFT JOIN friendships ON friends.id = friendships.friend_id
				LEFT JOIN users ON users.id = friendships.user_id
				WHERE NOT friends.id IN
				(SELECT friends.id as friend_id from users AS friends
				LEFT JOIN friendships ON friends.id = friendships.friend_id
				LEFT JOIN users ON users.id = friendships.user_id
				WHERE users.id = ? OR friends.id = ?)";
				$values = [$active_id,$active_id];
				return $this->db->query($query,$values)->result_array();
			}

	public function add_friend($friendship_id){
		$active_id = $this->session->userdata('active_id');
		$query =
			"INSERT into friendships (user_id,friend_id,created_at,modified_at) values (?,?,now(),now());";
		$values = [$active_id,$friendship_id];
		$values2 = [$friendship_id,$active_id];
		$this->db->query($query,$values);
		$this->db->query($query,$values2);
	}
	public function remove_friend($friendship_id){
		$active_id = $this->session->userdata('active_id');
		$query =
			"DELETE FROM friendships WHERE user_id= ? AND friend_id = ?;";
		$values = [$active_id,$friendship_id];
		$values2 = [$friendship_id,$active_id];
		$this->db->query($query,$values);
		$this->db->query($query,$values2);
	}




}
