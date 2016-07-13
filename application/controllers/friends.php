<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Friends extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('friend_model');
    $this->load->model('user_model');
		$this->load->library('session');
	}
	public function friends_view(){
		$active_id = $this->session->userdata('active_id');
		$data['friends'] = $this->friend_model->show_friends();
		$data['not_friends'] = $this->friend_model->show_non_friends($active_id);
		$this->load->view('friends_view',['data'=>$data]);
	}
	public function user_view($id){
		$data = $this->user_model->show_by_id($id);
		$this->load->view('user_view',['data'=>$data]);
	}
	public function add_friend($id){
		$this->friend_model->add_friend($id);
		redirect('friends');
	}
	public function remove_friend($friendship_id){
		$this->friend_model->remove_friend($friendship_id);
		redirect('friends');
	}
}
