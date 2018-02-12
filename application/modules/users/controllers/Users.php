<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Users extends MX_Controller {

	function __construct() {
		parent::__construct();
	}

	function login() {
        if ($this->session->userdata("user_id")) {
            redirect(base_url()."webpages/manage");
        }
		$data['view_file'] = "loginform";
		$this->load->module('template');
		$this->template->public_one_col($data);
	}

	function submit_login() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[30]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[30]|xss_clean|callback_password_check');

        if ($this->form_validation->run($this) == FALSE) {
                $this->login();
        }
        else {
                $data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				);
                $this->load->model('mdl_users');
                $this->mdl_users->_login_user($data);
        }
    }

    function password_check($password) {

    	$username = $this->input->post('username', TRUE);
    	$this->load->model('mdl_users');
    	$result = $this->mdl_users->password_check($username, $password);

        if ($result == FALSE) {
                $this->form_validation->set_message("password_check", "You didn't enter a correct username/password");
                return FALSE;
        }
        else {
                return TRUE;
        }
    }

	function register() {
		$data['view_file'] = "register";
		$this->load->module('template');
		$this->template->public_one_col($data);
	}

    function submit_register() {

        $this->load->library('form_validation');
        $this->load->model('mdl_users');

        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim|max_length[30]|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|max_length[30]|xss_clean');
        $this->form_validation->set_rules('email', 'E-Mail', 'required|trim|max_length[30]|valid_email|xss_clean|callback_unique_email_check');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|max_length[30]|xss_clean|callback_unique_username_check');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'required|trim|min_length[5]|max_length[30]|matches[password]|xss_clean');

        if ($this->form_validation->run($this) == FALSE) {
                $this->register();
        }
        else {
        		$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				);
                $this->load->model('mdl_users');
                $this->mdl_users->_register_user($data);
	            $this->session->set_flashdata("success_message", "You have successfully registered ".$data["first_name"]."! Log in!");
	            redirect(base_url()."users/login");
	            
   		}
	}

    function unique_email_check($email) {
        $this->load->model('mdl_users');
        $query = $this->mdl_users->unique_email_check($email);
        if ($query->num_rows() > 0) {
                $this->form_validation->set_message('unique_email_check', 'E-mail already taken');
                return FALSE;
        }
        else {
                return TRUE;
        }
    }

    function unique_username_check($username) {
        $this->load->model('mdl_users');
        $query = $this->mdl_users->unique_username_check($username);
        if ($query->num_rows() > 0) {
                $this->form_validation->set_message('unique_username_check', 'Username already taken');
                return FALSE;
        }
        else {
                return TRUE;
        }
    }

    function logoff() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('first_name');
        $this->session->unset_userdata('user_level');
        $this->session->set_flashdata("success_message", "You have successfully logged off.");
        redirect(base_url()."login");
    }
}