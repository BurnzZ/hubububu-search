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
		$algo_1_result = $this->search_algo->get_algo_1($data['query']);

		if($algo_1_result){
			// COMPUTATION HERE

			$algo_1 = array();

			$algo_1['string'] = $algo_1_result[0];
			$algo_1['score'] = $algo_1_result[1];

			$data['algo_1'] = $this->isort($algo_1);
		}

		// COMPUTATION HERE

		$algo_2_result = $this->search_algo->get_algo_2($data['query']);

		if($algo_2_result){
			$algo_2 = array();

			$algo_2['string'] = $algo_2_result[0];
			$algo_2['score'] = $algo_2_result[1];

			$data['algo_2'] = $this->isort($algo_2);
		}
		// returns back AJAX results
		echo json_encode($data);
	}

	function isort($data){
		for($i = 1; $i < count($data['score']); $i++)
			for($j = $i; $j > 0; $j--){
				if($data['score'][$j-1] < $data['score'][$j]){

					$scoretemp=$data['score'][$j-1];
					$data['score'][$j-1]=$data['score'][$j];
					$data['score'][$j]=$scoretemp;

					$stringtemp=$data['string'][$j-1];
					$data['string'][$j-1]=$data['string'][$j];
					$data['string'][$j]=$stringtemp;
				}
				else break;
			}
		return $data;
	}
}
