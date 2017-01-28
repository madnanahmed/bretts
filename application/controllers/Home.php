<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Crud');
	}

	public function index()
	{
		$slider = $this->Crud->get_slider();
		$property_type = $this->Crud->get_property_type();
		$punjab_city = $this->Crud->get_city_by_province_id(1);
		$country = $this->Crud->get_data('country', 'id,title');
		$province = $this->Crud->get_province();
		$new_property = $this->Crud->get_data( 'property', 'title, id, property_type, price, image_1, property_category, beds, baths, area, colony', array('status' => 1) ,'id desc', '15' );

		$data['data'] = array('country' => $country, 'slider' => $slider, 'property_type' => $property_type, 'city' => $punjab_city, 'province' => $province, 'new_property' => $new_property);
		$this->load->view('Header');
		$this->load->view('Home_view',$data);
		$this->load->view('Footer');
		
	}

}
