<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Property_view extends CI_Controller
{
	public function property($id = false)
	{
		$this->load->model('Crud');
//		get property by id
		$property = $this->Crud->view_property($id);
		if($property)
		$property = $property[0];

		$recent_posts = $this->Crud->get_data('property', 'title,date,id', array('status' => 1), 'id desc', 6);
		$property_type = $this->Crud->get_property_type();

		if (!empty($property)) {
			$related_posts = $this->Crud->get_data('property', 'id, title, colony, beds, area, baths, price, property_category, image_1', array('city' => $property->city, 'status' => 1, 'id !=' => $property->id), 'id desc', 4);
			$user_data = $this->Crud->get_data('user', 'name, phone, profile_pic, about, status, is_email_verify', array('id' => $property->user_id), '', '0');
			$city = $this->Crud->get_data('city', 'title', array('id' => $property->city), '', '0');

			// if images already not resized
			if ($property->is_resized == 0){
				$this->load->library('image_lib');
				$images = array(
					$property->image_1,
					$property->image_2,
					$property->image_3,
					$property->image_4,
					$property->image_5,
					$property->image_6,
					$property->image_7,
					$property->image_8
				);

				foreach ($images as $value) {
					if (!empty($value)) {
						if (file_exists('assets/images/uploads/property/' . $value)) {
							// ###########  create thumbnail   ##################
							$config = array(
								'source_image' => 'assets/images/uploads/property/' . $value,
								'new_image' => 'assets/images/uploads/property/',
								'maintain_ratio' => false,
								'width' => 900,
								'height' => 670
							);
							//here is the second thumbnail, notice the call for the initialize() function again
							$this->image_lib->initialize($config);
							$this->image_lib->resize();
						}//end if
					}
				}
				$this->Crud->update_row('property', array('is_resized' => 1), array('id' => $id, 'status' => 1));
			}
		}
		$data['data'] = array( "property_view" => $property, 'recent_posts' => $recent_posts, 'property_type' => $property_type );
		if(!empty($property)) {

//		captcha code
			if($user_data[0]->is_email_verify == 1){
//	if file already exist delete
				$captcha_file = $this->session->userdata('captcha_file');
				if(isset($captcha_file)):
					if (file_exists(FCPATH . 'captcha_img' . DIRECTORY_SEPARATOR . $captcha_file)) {
						unlink(FCPATH . 'captcha_img' . DIRECTORY_SEPARATOR . $captcha_file);
						clearstatcache();
					}
				endif;
				$this->load->library('image_lib');
				$this->load->helper(array('captcha'));
				$captcha_config = array(
					'pool'          => '0123456789abcdefghijklmnopqrstuvwxyz',
					'img_path' => './captcha_img/',
					'img_url' => base_url('captcha_img/'),
					'word_length'   => 4,
					'img_width' => '150',
					'img_height' => '30',
//					'colors'        => array(
//						'background' => array(255, 255, 255),
//						'border' => array(255, 255, 255),
//						'text' => array(0, 0, 0),
//						'grid' => array(255, 40, 40)
//					)
				);
				$captcha = create_captcha($captcha_config);
				$this->session->set_userdata('captcha_file', $captcha['filename']);
				$this->session->set_userdata('captcha_word', $captcha['word']);
			}else{
				$captcha = "";
			}
			$data['data'] = $data['data']+ array("related_posts" => $related_posts, 'user_data' => $user_data, 'captcha' => $captcha);
		}
//		print_r($data);
		if(empty($data['data']['property_view'])){
			$err['data'] = array('error' => 'Record not found!', 'recent_posts' => $recent_posts );
			$this->load->view('Header');
			$this->load->view('Property_view', $err);
			$this->load->view('Footer');
		}else{
			$this->load->view('Header');
			$this->load->view('Property_view', $data);
			$this->load->view('Footer');
		}
	}
// function get  property by property type
	public function property_by_type(){
		$this->load->model('Crud');
		$uri3 = $this->uri->segment(3);
		$uri4 = $this->uri->segment(4);
		if(empty($uri3) || empty($uri4) ){
			$this->session->set_flashdata('error_msg', $error = array('Security error!'));
			redirect(base_url());
		}
		$where = "";
		$p_cat_id = $p_type_id = $num = 0;
		$p_type_id = $this->uri->segment(3);
		$p_cat_id = $this->uri->segment(4);
		$num = $this->uri->segment(5);
	//		load pagination library
		$this->load->library('pagination');
		if($p_cat_id != 0) {
			$where = array('status' => 1, 'property_type' => $p_type_id, 'property_category' => $p_cat_id);
		}elseif($p_type_id != 0){
			$where = array('status' => 1, 'property_type' => $p_type_id );
		}
		if($p_type_id == 'all'){
			if(isset($where['property_type'])){
			unset($where['property_type']);
			}
		}
//	Build view data
		$property_list = $this->Crud->get_data('property', '*',$where, '', 12,$num);
		$property_type = $this->Crud->get_property_type();
		$data['data'] = array("property_type" => $property_type, 'property_list' => $property_list);
//	check property_list data available or not.
		if(!empty($data['data']['property_list'])){
	//base url creation
			$config['base_url'] = base_url('property_view/property_by_type/'.$p_type_id.'/'.$p_cat_id);
			$config['total_rows'] = $this->Crud->get_count('property', '*',$where, '', '','');
			$config['per_page'] = 12;
			$config['uri_segment'] = 5;
			$this->pagination->initialize($config);
			$data['pages'] = $this->pagination->create_links();
			$this->load->view('Header');
			$this->load->view('Property_by_type', $data);
			$this->load->view('Footer');
		}else{
			unset($data['data']['property_type'], $data['data']['property_list']);
			$data['data'] = array("error" => 'Data not found!', "property_type" => $property_type);
			$this->load->view('Header');
			$this->load->view('Property_by_type', $data);
			$this->load->view('Footer');
		}
	}


}	// end class
