<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	class Mdl_webpages extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function get_user_posts() {
		$user_id = $this->session->userdata("user_id");
		$user_level = $this->session->userdata("user_level");
		if ($user_level == "admin") {
			$query = $this->db->query('SELECT * FROM webpages
									   ORDER by webpages.created_at DESC');
		} else {
			$this->db->where('user_id', $user_id);
			$this->db->order_by('created_at', 'DESC');
			$query = $this->db->get('webpages');
		}
		return $query;
	}

	function get_blog_posts() {
		$query = $this->db->query('SELECT * FROM webpages 
								   RIGHT JOIN users ON webpages.user_id = users.id
                                   ORDER by webpages.created_at DESC');
		return $query;
	}

	function get_individual_post($page_url) {
		$query = $this->db->query("SELECT * FROM webpages 
								   RIGHT JOIN users ON webpages.user_id = users.id
								   WHERE page_url = '".$page_url."'");
		return $query;
	}

	function get_data_from_db($update_id) {
		$this->db->where('post_id', $update_id);
		$query = $this->db->get('webpages');
		foreach($query->result() as $row) {
			$data["page_headline"] = $row->page_headline;
			$data["page_title"] = $row->page_title;
			$data["keywords"] = $row->keywords;
			$data["description"] = $row->description;
			$data["page_content"] = $row->page_content;
			$data["user_id"] = $row->user_id;
		}
		return $data;
	}

	function _insert($data) {
		$this->db->insert("webpages", $data);
	}

	function _update($id, $data) {
		$this->db->where('post_id', $id);
		$this->db->update('webpages', $data);
	}

	function _delete($id) {
		$this->db->where('post_id', $id);
		$this->db->delete('webpages');
	}

}