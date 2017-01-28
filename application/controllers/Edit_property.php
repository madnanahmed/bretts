<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_property extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Crud');
	}

	public function index()
	{
//	check user login
		if(!$this->session->userdata('user_id')):
			redirect('Home', 'refresh');
			exit;
		endif;
//	url validation
		 $title = $this->uri->segment(2);
			if(preg_match('/[^a-z-0-9.:]/i',$title)){
				redirect('error_404');
				exit;
			}
// getting id and title
		$exp_seg2 = explode(':', $title);
	    $title = str_replace('-'," ", $exp_seg2[0]);
		$id =  strrev($exp_seg2[1]);

		$country = $this->Crud->get_data('country', 'id, title', array('status' => 1));
		$property_type = $this->Crud->get_property_type();
		$province = $this->Crud->get_province();
// function get data
		$new_property = $this->Crud->get_data(
			'property',
			'*',
			array('status' => 1, 'id' => $id, 'title' => $title, 'user_id' => $this->session->userdata('user_id') ) ,
			'id desc', '15'
		);
		$user_data = $this->Crud->get_data(
			'user',
			'*',
			array('id' => $this->session->userdata('user_id') ) ,
			'id desc', '0'
		);
		if(empty($new_property)){
			redirect('user_panel/dashboard');
			exit;
		}
		$city = $this->Crud->get_city_by_province_id($new_property[0]->province);
		$data['data'] = array(
			'property_type' => $property_type,
			'country' => $country,
			'city' => $city,
			'province' => $province,
			'property' => $new_property,
			'user_data' => $user_data
		);
		$this->load->view('Header');
		$this->load->view('Edit_property',$data);
		$this->load->view('Footer');
		
	}

}
