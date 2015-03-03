<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends CI_Controller {

	function __construct(){
        parent::__construct();
    }

	public function index() {
		$this->load->view('homepage_view');
	}

	public function form_submit() {
		$data = array ();
        $data['query'] = $this->input->post('query');

		$this->load->model('search_algo');
        $data['algo_1'] = $this->search_algo->get_algo_1($data['query']);

        // returns back AJAX results
		echo json_encode($data);
	}
}
