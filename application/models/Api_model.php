<?php

class Api_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }


    public function login_model($user_id, $password)
    {
        $query = $this->db->get_where('tbl_users', array('user_id'=>$user_id,'password'=>$password));
        return $query->row_array();

        // $response =  $query->row_array();
        // var_dump($response); die;
    }

    public function register_model($user)
    {
        $query = $this->db->insert('tbl_users', $user);

        if ($query) {
            return true; 
        } else {
            log_message('error', 'Database insert failed: ' . $this->db->last_query());
            return false; // Or throw a new exception
        }



        // $response =  $query->row_array();
        // var_dump($response); die;
    }
}
?>