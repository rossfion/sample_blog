<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_users extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function _login_user($data) {
		$this->db->where("username", $data['username']);
		$query = $this->db->get("users");
		foreach($query->result() as $row) {
			$user_id = $row->id;
			$first_name = $row->first_name;
			$user_level = $row->user_level;
		}
		$this->session->set_userdata("user_id", $user_id);
		$this->session->set_userdata("first_name", $first_name);
		$this->session->set_userdata("user_level", $user_level);
		
		redirect((base_url()."webpages/manage");
	}

	function password_check($username, $password) {
		$user_salt = "";
		$user_password = "";
		$this->db->where("username", $username);
		$query = $this->db->get("users");
		foreach($query->result() as $row) {
				$user_password = $row->password;
				$user_salt = $row->salt;
			}
		if ($user_password == md5($password.''.$user_salt)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function _register_user($data) {
		$salt = bin2hex(openssl_random_pseudo_bytes(22));
		$encrypted_password = md5($data['password'].''.$salt);
		
		$data = array(
        	'first_name' => $data['first_name'],
        	'last_name'  => $data['last_name'],
            'email'      => $data['email'],
            'username'   => $data['username'],
            'password'   => $encrypted_password,
            'salt'       => $salt,
            'user_level' => 'user',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
		);

		$this->db->insert('users', $data);
	}

	function unique_email_check($email) {
		$this->db->where("email", $email);
		$query = $this->db->get("users");
		return $query;
	}

	function unique_username_check($username) {
		$this->db->where("username", $username);
		$query = $this->db->get("users");
		return $query;
	}

}