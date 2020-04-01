<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller
{
    public $user_id;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Reports_model', 'crud');
    }

    public function index()
    {
        $data[] = '';
        $this->layout->view('reports/index', $data);
    }

    public function  person_bypass_last7day()
    {
        $data['report']= $this->crud->person_bypass_last7day();
        $this->layout->view('reports/person_bypass_last7day', $data);
    }


}