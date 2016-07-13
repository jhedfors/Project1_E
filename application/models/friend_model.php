<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Friend_model extends CI_Model {
	public function __construct(){
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
			"SELECT DISTINCT friends.id as friend_id, friends.alias as alias from users AS friends
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
