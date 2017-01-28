<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: muhammad adnan
 * Date: 10/9/2016
 * Time: 9:33 PM
 */

class Verify extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Crud');
    }


    function registration($url){

       $url_array =  explode('_',$url);

        $email =  base64_decode($url_array[0]);
        $username =  base64_decode($url_array[1]);
        $phone =  base64_decode($url_array[2]);
        $where = array('email' => $email, 'name' => $username, 'phone' => $phone, 'url' => $url, 'status' => '0');
       $data =  $this->Crud->get_count('user', 'id', $where, '','1','0');
        if($data == 1){
//  update row
            $terms = array( 'status' => 1 );
            $this->Crud->update_row('user', $terms, $where);
            $this->session->set_flashdata('verified_reg', 'Your Email verified! sign in for continue.');
            redirect(base_url());
        }else{
            $this->session->set_flashdata('unverified_reg', 'Your Email is not verified OR already registered.');
            redirect(base_url());
        }
    }
}