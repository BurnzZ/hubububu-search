<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_algo extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    function get_algo_1($input){

    	$data = array();

        $query = $this->db->query("SELECT coursedesc FROM course WHERE match(coursedesc) AGAINST ('{$input}');");

        if ($query->num_rows() > 0) {

        	$results = array();
        	$scores = array();
			
			foreach ($query->result() as $row){
			   
			   $row_data = $row->coursedesc;
			   $score = base_score($row_data, $input) - (unmatched($row_data, $input) / total($row_data));

			   $results[] = $row_data;
			   $scores[] = $score;
			
			}

			$data[] = $results;
			$data[] = $scores;

			return $data;

		}

		return $data;

    }

    function get_algo_2($input){

    	$data = array();

        $query = $this->db->query("SELECT coursedesc FROM course WHERE match(coursedesc) AGAINST ('{$input}');");

        if ($query->num_rows() > 0) {

        	$results = array();
        	$scores = array();
			
			foreach ($query->result() as $row){
			   
			   $row_data = $row->coursedesc;

			   $trimmed_data = trim_data($row_data, $input);

			   $score = base_score($row_data, $input) - (unmatched($row_data, $input) / total($row_data)) - ((unmatched($trimmed_data, $input) / total($trimmed_data)) / 10);

			   $results[] = $row_data;
			   $scores[] = $score;
			
			}

			$data[] = $results;
			$data[] = $scores;

			return $data;

		}

		return $data;

    }

}

function base_score($data, $query){

	$query_words = explode(' ', $query);
	$data_words = explode(' ', $data);

	$score = 0;

	for ($i=0; $i < sizeof($query_words); $i++) { 
		
		for ($j=0; $j < sizeof($data_words); $j++) { 
			
			if(strcmp($query_words[$i], $data_words[$j]) == 0){

				$score += 1;

			}

		}

	}

	return $score;

}

function unmatched($data, $query){

	$query_words = explode(' ', $query);
	$data_words = explode(' ', $data);

	$score = 0;
	$match_flag = false;

	for ($i=0; $i < sizeof($data_words); $i++) { 
		
		for ($j=0; $j < sizeof($query_words); $j++) { 
			
			if(strcmp($query_words[$j], $data_words[$i]) == 0){

				$match_flag = true;
				break;

			}

		}

		if(!$match_flag) $score+=1;
		$match_flag = false;

	}

	return $score;

}

function total($data){

	$data_words = explode(' ', $data);
	$count = sizeof($data_words);

	return $count;

}

function trim_data($data, $query){

	$query_words = explode(' ', $query);
	$data_words = explode(' ', $data);

	$start = 0;
	$start_flag = false;
	$end = sizeof($data_words) - 1;
	$end_flag = false;

	for ($i=0; $i < sizeof($data_words); $i++) { 
		
		for ($j=0; $j < sizeof($query_words); $j++) { 
			
			if(strcmp($query_words[$j], $data_words[$i]) == 0){

				$start = $i;
				$start_flag = true;
				break;

			}

		}

		if($start_flag)	break;

	}

	for ($i=sizeof($data_words) - 1; $i >= 0; $i--) { 
		
		for ($j= 0; $j < sizeof($query_words); $j++) { 
			
			if(strcmp($query_words[$j], $data_words[$i]) == 0){

				$end = $i;
				$end_flag = true;
				break;

			}

		}

		if($end_flag)	break;

	}

	$trimmed_data = $data_words[$start];

	for ($i=$start + 1 ;$i <= $end ; $i++) { 
		
		$trimmed_data = $trimmed_data . " " . $data_words[$i];

	}

	return $trimmed_data;

}