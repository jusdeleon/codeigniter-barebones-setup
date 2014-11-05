<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Enable the profiler in the development environment only
		$this->output->enable_profiler(ENVIRONMENT == 'development');
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */