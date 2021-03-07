<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Directory_model extends CI_Model {

       	public function __construct()
	    {
	        parent::__construct();
	    }
    
        public function insert_entry($path)
        {
                $insert_array = $array();
                $insert_array['path'] = $path; 

                $this->db->insert('tbl_history_directory', $insert_array);
        }
        public function getHistoryfiles(){
        	$query = $this->db->table('tbl_history_directory')->get();
        	return $query->result();
        }
}
?>
