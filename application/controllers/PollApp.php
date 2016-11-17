<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PollApp extends CI_Controller {

	/**
	 * Index view for the polling app.
	 */
	public function index() {
        $this->load->helper('url');

        $this->load->view('polls');
	}
}
