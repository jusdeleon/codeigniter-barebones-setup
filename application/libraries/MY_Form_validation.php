<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class MY_Form_validation extends CI_Form_validation {

	public function __construct($rules = array())
	{
		parent::__construct($rules);
		$this->CI->lang->load('MY_Form_validation');
	}

	public function alpha_dash_space($str)
	{
		return ( ! preg_match("/^([-a-z0-9_ ])+$/i", $str)) ? FALSE : TRUE;
	}

	public function is_unique($str, $field)
	{
		list($table, $field)=explode('.', $field);
		$q = $this->CI->db->query("SHOW KEYS FROM $table WHERE Key_name = 'PRIMARY'")->row();
	  	$primary_key = $q->Column_name;
	  
	  	if($this->CI->input->post($primary_key) > 0):
	   		$query = $this->CI->db->limit(1)->get_where($table, array($field => $str,$primary_key.' !='=>$this->CI->input->post($primary_key)));
	  	else:
	   		$query = $this->CI->db->limit(1)->get_where($table, array($field => $str));
	  	endif;
	  
	 	return $query->num_rows() === 0;
   	}

}

/* End of file MY_Form_validation.php */
/* Location: ./application/libraries/MY_Form_validation.php */ 
