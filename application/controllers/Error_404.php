<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: muhammad adnan
 * Date: 10/9/2016
 * Time: 9:33 PM
 */

class Error_404 extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->view('Header');
        $this->load->view('404');
        $this->load->view('Footer');
    }
}