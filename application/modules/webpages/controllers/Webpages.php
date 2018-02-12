<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Webpages extends MX_Controller {

	function __construct() {
		parent::__construct();
	}

	// function get($order_by) {
	// 	$this->load->model('mdl_webpages');
	// 	$query = $this->mdl_webpages->get($order_by);
	// 	return $query;
	// }

	function manage() {
		if (!$this->session->userdata("user_id")) {
			redirect(base_url());
		}
		$this->load->model('mdl_webpages');
		$data["query"] = $this->mdl_webpages->get_user_posts();
		$data["view_file"] = "manage";
		$this->load->module("template");
		$this->template->dashboard($data);
	}

	function blog() {
		$this->load->model('mdl_webpages');
		$data["query"] = $this->mdl_webpages->get_blog_posts();
		$data["view_file"] = "blog";
		$this->load->module("template");
		$this->template->public_one_col($data);
	}

	function blank_data() {
		$data["page_headline"] = "";
		$data["page_title"] = "";
		$data["keywords"] = "";
		$data["description"] = "";
		$data["page_content"] = "";
		$data["user_id"] = $this->session->userdata("user_id");
		return $data;
	}

	function get_data_from_post() {
		$data["page_headline"] = $this->input->post('page_headline', TRUE);
		$data["page_title"] = $this->input->post('page_title', TRUE);
		$data["keywords"] = $this->input->post('keywords', TRUE);
		$data["description"] = $this->input->post('description', TRUE);
		$data["page_content"] = $this->input->post('page_content', TRUE);
		$data["user_id"] = $this->input->post('page_content', TRUE);
		return $data;
	}

	function create() {
		if (!$this->session->userdata("user_id")) {
			redirect(base_url());
		}
		$data = $this->blank_data();
		$data["update_id"] = $this->uri->segment(3);
		$data["view_file"] = "create_edit";
		$data["create_or_edit"] = "Create";
		$this->load->module("template");
		$this->template->dashboard($data);
	}

	function update() {
		if (!$this->session->userdata("user_id")) {
			redirect(base_url());
		}
		$update_id = $this->uri->segment(3);
		$this->load->model('mdl_webpages');
		$data = $this->mdl_webpages->get_data_from_db($update_id);
		$data["update_id"] = $this->uri->segment(3);
		$data["view_file"] = "create_edit";
		$data["create_or_edit"] = "Edit";
		// $this->session->set_userdata("webpage_user_id", $data["user_id"]);
		$this->load->module("template");
		$this->template->dashboard($data);
	}

	function submit() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('page_headline', 'Page Headline', 'required|xss_clean');
        $this->form_validation->set_rules('page_content', 'Page Content', 'required|xss_clean');

        if ($this->form_validation->run($this) == FALSE) {
                $this->create();
        }
        else {

        		$data = $this->get_data_from_post();
        		$data["page_url"] = url_title($data["page_headline"]);
                $update_id = $this->uri->segment(3);
                $data["updated_at"] = date('Y-m-d H:i:s');
                if (is_numeric($update_id)) {
                	$data["user_id"] = $this->session->userdata("webpage_user_id");
                	$this->load->model('mdl_webpages');
                	$this->mdl_webpages->_update($update_id, $data);
                	$this->session->unset_userdata("webpage_user_id");
                } else {
                	$data["user_id"] = (int)$this->session->userdata("user_id");
                	$data["created_at"] = date('Y-m-d H:i:s');
                	$this->load->model('mdl_webpages');
                	$this->mdl_webpages->_insert($data);
                }

                redirect(base_url()."webpages/manage");
        }
    }

    function delete() {
    	$delete_id = $this->uri->segment(3);
		$this->load->model('mdl_webpages');
		$this->mdl_webpages->_delete($delete_id);
		redirect(base_url()."webpages/manage");
    }

}