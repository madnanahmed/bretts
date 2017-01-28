<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: muhammad adnan
 * Date: 10/9/2016
 * Time: 9:33 PM
 */

class Signout extends CI_Controller {

    function index(){
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
//
        $this->session->sess_destroy();
        redirect(base_url());

    }
}