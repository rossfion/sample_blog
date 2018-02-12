<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Cms extends MX_Controller {

	function __construct() {
		parent::__construct();

	}

	function index() {
		$page_url = $this->uri->segment(1);
		if ($page_url == "") {
			$data["view_file"] = "index";
		} else {
			$this->load->module("webpages");
			$this->load->model('mdl_webpages');
			$query = $this->mdl_webpages->get_individual_post($page_url);
			$data["query"] = $query;
			$data["view_file"] = "post";
		}
		$this->load->module("template");
		$this->template->public_one_col($data);
	}

}