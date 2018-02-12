<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
class Template extends MX_Controller {

	function __construct() {
		parent::__construct();
	}

	function public_one_col($data) {

		if (!isset($data["title"])) {
			$data["page_title"] = "Trav Sample CMS Blog";
		}

		if (!isset($data["keywords"])) {
			$data["keywords"] = "CodeIgniter, jQuery, PHP, CMS, Blog, travterrell.com, Javascript, HTML, CSS";
		}

		if (!isset($data["description"])) {
			$data["description"] = "This is a sample blog using a custom built CMS system created by Travis Terrell";
		}

		$this->load->view("public_one_col", $data);
	}

	function dashboard($data) {

		if (!isset($data["title"])) {
			$data["page_title"] = "Trav Sample CMS Blog";
		}

		if (!isset($data["keywords"])) {
			$data["keywords"] = "CodeIgniter, jQuery, PHP, CMS, Blog, travterrell.com, Javascript, HTML, CSS";
		}

		if (!isset($data["description"])) {
			$data["description"] = "This is a sample blog using a custom built CMS system created by Travis Terrell";
		}
		
		$this->load->view("dashboard", $data);
	}

}