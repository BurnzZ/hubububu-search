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

        /*

        // COMPUTATION HERE

        $algo_1 = array()

        $algo_1['string'] = ["justin beiber", "cat mouse bieber"];
        $algo_1['score'] = [2.0, 1.6666]

        $data['algo_1'] = $algo_1

        // COMPUTATION HERE

        $algo_2 = array()

        $algo_2['string'] = ["justin beiber", "cat mouse bieber"];
        $algo_2['score'] = [2.0, 1.6666]

        $data['algo_2'] = $algo_2

        */

        // returns back AJAX results
		echo json_encode($data);
	}
}
