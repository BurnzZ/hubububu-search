<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function index() {
		$this->load->view('homepage_view');
	}

	public function form_submit() {
		$data = array (
				'query' => $this->input->post('query')
			);

		echo json_encode($data);
	}
}
