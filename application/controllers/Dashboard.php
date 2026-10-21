<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index() {
        // Panggil header, sidebar, dashboard, dan footer dari folder administrator
        $this->load->view('administrator/templates/header');
        $this->load->view('administrator/templates/sidebar');
        $this->load->view('administrator/dashboard');
        $this->load->view('administrator/templates/footer');
    }
}