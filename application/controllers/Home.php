<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function index()
    {
        $this->load->view('home/index');
    }

    function testing()
    {

        // ini_set('display_errors', 'off');
        $this->load->view('test/test');
    }
}
