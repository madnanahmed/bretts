<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Crud');
	}

	public function index($start = 0)
	{
//		load pagination library
		$this->load->library('pagination');

		extract($_POST);
//		set session for pagination
		if ($_POST):
			$this->session->set_userdata('property_type', $this->Crud->test_input($property_type) );
			$this->session->set_userdata('province', $this->Crud->test_input($province) );
			$this->session->set_userdata('city', $this->Crud->test_input($city) );
			$this->session->set_userdata('price_min', $this->Crud->test_input($price_min) );
			$this->session->set_userdata('price_max', $this->Crud->test_input($price_max) );
			$this->session->set_userdata('beds', $this->Crud->test_input($beds) );
			$this->session->set_userdata('baths', $this->Crud->test_input($baths) );
			$this->session->set_userdata('area', $this->Crud->test_input($area) );
			$this->session->set_userdata('furnish', $this->Crud->test_input($furnish) );
			$this->session->set_userdata('search_post', $_POST);
		endif;

		$property_type =  $this->session->userdata('property_type');
		$province =  $this->session->userdata('province');
		$city =  $this->session->userdata('city');
		$price_min =  $this->session->userdata('price_min');
		$price_max =  $this->session->userdata('price_max');
		$beds =  $this->session->userdata('beds');
		$baths =  $this->session->userdata('baths');
		$area =  $this->session->userdata('area');
		$furnish =  $this->session->userdata('furnish');

		$error = array();

		//	creating property category
		$property_category = "";
		if( $this->uri->segment(2) == "all" ){
			$property_category = false;
			$b_url = base_url() . 'search/';
		}elseif( $this->uri->segment(2) == 'sale' ){
			$property_category = array('property_category' => 1 );
			$b_url = base_url() . 'search/sale/';
		}elseif( $this->uri->segment(2) == 'rent' ){
			$property_category = array('property_category' => 2 );
			$b_url = base_url() . 'search/rent/';
		}else{
			$b_url = base_url() . 'search/';
		}

#### VALIDATION ####

	//validate property type
		if (empty($property_type)) {
			$error[] = 'Property type required!';
		} elseif (!is_numeric($property_type)) {
			$error[] = 'Invalid property type!';
		}
	//validate province
		if (empty($province)) {
			$error[] = 'Province required!';
		} elseif (!is_numeric($province)) {
			$error[] = 'Invalid province!';
		}
	//validate city
		if (!is_numeric($city)) {
			$error[] = 'Invalid city!';
		}
	//validate beds
		if (!is_numeric($beds)) {
			$error[] = 'Invalid beds!';
		}
	//validate baths
		if (!is_numeric($baths)) {
			$error[] = 'Invalid bath!';
		}
	//validate furnish
		if (!is_numeric($furnish)) {
			$error[] = 'Invalid furnish!';
		}
	//validate area
		if (!is_numeric($area)) {
			$error[] = 'Invalid area!';
		}
		if (count($error) > 0) {
			$this->session->set_flashdata('error_msg', $error);
			redirect(base_url('home'));

		} else {
			/*sent data to model */
			/*print_r($_POST);*/
			$max_price = str_replace('R.s', '', str_replace(',', '', $price_max));
			$min_price = str_replace('R.s', '', str_replace(',', '', $price_min));
			if ($area == 0)
				$area_param = ' `area` !=0';
			if ($area == 1)
				$area_param = ' `area` IN( 1 , 5 )';
			if ($area == 2)
				$area_param = ' `area` IN( 5 , 10 )';
			if ($area == 3)
				$area_param = ' `area` IN( 10 , 15 )';
			if ($area == 4)
				$area_param = ' `area` IN( 20 , 25 )';
			if ($area == 5)
				$area_param = ' `area` IN( 25 , 30)';

			$where = array(
				"property_type" => $property_type,
				"province" => $province,
				"city" => $city,
				"furnish" => $furnish
			);

			if (!empty($beds))
				$where = $where + array("beds" => $beds);
			if (!empty($baths))
				$where = $where + array("baths" => $baths);
			if($property_category != false)
				$where = $where + $property_category;

// pagination base url

	//pagination
			$row = $this->Crud->search_property($where, $min_price, $max_price, $area_param, $num = 5, $start);
//			exit;
			$config['base_url'] = $b_url;
			$config['total_rows'] = $this->Crud->get_count_search($where, $min_price, $max_price, $area_param);
			$config['per_page'] = 5;
			$this->pagination->initialize($config);
			$data['pages'] = $this->pagination->create_links();
	// end pagination
			$property_types = $this->Crud->get_property_type();
			$country = $this->Crud->get_data('country', 'id, title');
			$city = $this->Crud->get_city();
			$province = $this->Crud->get_province();
	// create data to send to view
			$data['data'] = array(
				'search_data' => $row,
				'property_type' => $property_types,
				'country' => $country,
				'city' => $city,
				'province' => $province,
				'search' => $row,
				'post' => $this->session->userdata('search_post'),
			);

			$this->load->view('Header');
			$this->load->view('Search_listing', $data);
			$this->load->view('Footer');
		}

	}
}	// end class
