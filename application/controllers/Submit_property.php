<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: muhammad adnan
 * Date: 10/9/2016
 * Time: 9:33 PM
 */

class Submit_property extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Crud');
    }

    function index(){
        if(!$this->session->userdata('user_id')):
            redirect('home', 'refresh');
            exit;
        endif;

        $punjab_city = $this->Crud->get_city_by_province_id(1);
        $province = $this->Crud->get_province();
        $country = $this->Crud->get_data('country', 'id,title', array('status' => 1));
//        print_r($country);
//        exit;
        $property_type = $this->Crud->get_property_type();
        $data['data'] = array( 'city' => $punjab_city, 'province' => $province, 'country' => $country , 'property_type' => $property_type);
        $this->session->unset_userdata('sub_success');
        $this->load->view('Header');
        $this->load->view('Submit_property', $data);
        $this->load->view('Footer');

    }
}