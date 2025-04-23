<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardModel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load necessary models, libraries, or helpers here
    }

    public function index() {
        // Default method for the controller
        $this->load->view('dashboard/index');
    }

    public function someMethod() {
        // Example method
    }
}