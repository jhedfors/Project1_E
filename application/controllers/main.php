<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('main_model');
		$this->load->library('session');
	}
	public function index()
	{
		$this->load->view('login_reg_view');
	}
	public function validation(){
		$routing = [
			'name'=>function($post_data){$this->form_validation->set_rules("name", "Name", "trim|required|min_length[1]");},
			'email'=>function($post_data){$this->form_validation->set_rules("email", "Email", "trim|required|min_length[3]");},
			'email_pk'=>function($post_data){$this->form_validation->set_rules("email_pk", "Email", "trim|required|min_length[3]|callback_check_preexisting_email");},
			'alias'=>function($post_data){$this->form_validation->set_rules("alias", "Alias", "trim|required|min_length[3]");},
			'password'=>function($post_data){$this->form_validation->set_rules("password", "Password", "trim|required|min_length[8]");},
			'password_chk'=>function($post_data){$this->form_validation->set_rules("password_chk", "Password", "trim|required||callback_check_credentials");},
			'confirm_pw'=>function($post_data){$this->form_validation->set_rules("confirm_pw", "Confirmed Password", "trim|required|matches[password]");},
			'dob'=>function($post_data){$this->form_validation->set_rules("dob", "Date of Birth", "trim|required");},
			];

		foreach (array_keys($this->input->post()) as $key) {
			$routing[$key]($this->input->post($key));
		}
}
	public function login(){
		$this->validation();
		if($this->form_validation->run() === FALSE)		{
			$this->session->set_userdata('errors_login',[validation_errors()]);
			$this->load->view('login_reg_view');
		}
		else{
			redirect('friends');
		}
	}
	public function register(){
		$this->validation();
		if($this->form_validation->run() === FALSE)		{
			$this->session->set_userdata('errors_reg',[validation_errors()]);
			$this->load->view('login_reg_view');
		}
		else{
			$post = $this->input->post();
			if($this->main_model->register($post) ){
				$record = $this->main_model->show_by_email($post['email_pk']);
				$this->session->set_userdata('active_id' ,$record['id']);
				$this->session->set_userdata('alias' ,$record['alias']);
				redirect('friends');
			}
			redirect('unanticipated_error');
		}
	}
	public function check_preexisting_email($post_email){
		$record = $this->main_model->show_by_email($post_email);
		if($record){
			$this->form_validation->set_message('check_preexisting_email', '%s is already in use');
			return FALSE;
		}
		else {
			return TRUE;
		}
	}
	public function check_credentials(){
		$post = $this->input->post();
		$record;
		if ($this->main_model->show_by_email($post['email']) == null) {
			$this->form_validation->set_message('check_credentials', 'Email/Password incorrect');
			return FALSE;
		}
		$record = $this->main_model->show_by_email($post['email']);
		if($record['password'] != do_hash($post['password_chk'])) {
			$this->form_validation->set_message('check_credentials', 'Email/Password incorrect');
			return FALSE;
		}
		$this->session->set_userdata('active_id' ,$record['id']);

		$this->session->set_userdata('alias' ,$record['alias']);
		return TRUE;
	}

	public function friends_view(){
		$active_id = $this->session->userdata('active_id');
		$data['friends'] = $this->main_model->show_friends();
		$data['not_friends'] = $this->main_model->show_non_friends($active_id);

		$this->load->view('friends_view',['data'=>$data]);

	}
	public function user_view($id){
		$data = $this->main_model->show_by_id($id);
		$this->load->view('user_view',['data'=>$data]);

	}

	public function add_friend($id){
		$this->main_model->add_friend($id);
		redirect('friends');
	}

	public function remove_friend($friendship_id){
		$this->main_model->remove_friend($friendship_id);
		redirect('friends');
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}
}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
