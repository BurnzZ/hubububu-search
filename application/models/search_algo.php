<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_algo extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    function get_algo_1($input){
        
        $query = $this->db->query("SELECT coursedesc FROM course
                                    WHERE match(coursedesc) AGAINST ('{$input}');");

        if ($query->num_rows() > 0) {        
            return $query->result();   
        }
    }

}