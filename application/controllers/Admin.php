<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		// Load form validation library		
		$this->load->model('Crud');
		$this->load->library('session');
		$this->load->driver('session');
	}

	public function index()
	{
		// form moel loading
		$this->load->helper('form');
		$this->load->view('Admin/Login');
	}
	private function is_login()
	{
		$admin = $this->session->userdata('admin_id');
		if (!isset($admin)) {
			redirect('admin');
			exit();
		}
	}
	function login_process()
	{
		if (!isset($_POST['email']) && !isset($_POST['password'])) {
			redirect('admin');
			exit();
		}
		// get form input
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		// form validation
		$email = $this->Crud->test_input($email);
		$error = array();
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error[] = "Invalid email format!";
		}
		if (count($error) > 0) {
			$this->session->set_flashdata('invalid_email', $error);
			$this->session->set_flashdata('email', $email);
			$this->session->set_flashdata('password', $password);
			redirect('admin');
			exit;
		} else {
			$data = $this->Crud->get_data('pak_admin', 'id,name', array('email' => $email, 'password' => $password), '', 0, '1');
			if ($data) {
				$data = $data[0];
				// populate login history
				$login_data = array('member_id' => $data->id, 'date' => date('m/d/Y H:i:s'), 'day' => date('d'), 'month' => date('m'), 'year' => date('Y'), 'status' => 1, 'type' => 1);
				$this->Crud->insert_data('history', $login_data);
				$_SESSION['admin_id'] = $data->id;
				$_SESSION['admin_name'] = $data->name;
				redirect('admin/dashboard');
			} else {
				$error[] = "Invalid email or password!";
				$this->session->set_flashdata('invalid_email', $error);
				$this->session->set_flashdata('email', $email);
				$this->session->set_flashdata('password', $password);
				redirect('admin');
				exit();
			}
		}
	}

	function dashboard($ref = false)
	{               ##################### DASHBOARD FUNCTION #####################

		$this->is_login();

		$this->load->helper('date');
		// get admin info with login history
		$admin_info = $this->Crud->get_join_data('pak_admin', 'history', ',history.date as login_date, pak_admin.*', 'pak_admin.id= history.member_id', array('pak_admin.id' => $this->session->userdata('admin_id'), 'history.type' => 1), '', '', '');

		$this->session->set_userdata('admin_name', $admin_info[0]->name);
		$this->session->set_userdata('admin_pic', $admin_info[0]->profile_pic);

		$log_history = $this->Crud->get_join_data('user', 'history', ',history.type,history.date as login_date, user.name, user.email,user.status, user.is_email_verify', 'user.id= history.member_id', 'history.type IN(2,3)', 'history.id desc', '', '5');
		// top users
		$top_users = $this->Crud->get_join_data('user', 'property', 'COUNT(property.user_id) as user_total_P, user.name', 'property.user_id=user.id', '', 'user_total_P desc', 'property.user_id', '5');
		$property_years = $this->Crud->get_data('property', 'DISTINCT( `year`)', '', 'year desc', '', '', '');
		$data['data'] = array('top_users' => $top_users, 'admin_info' => $admin_info, 'log_history' => $log_history, 'year' => $property_years);
//		print_r($data);
##############################################################################################
		$this->load->view('Admin/inc/Header', $data);
		$this->load->view('Admin/Home');
		$this->load->view('Admin/inc/Footer');
	}

	function login_signup_history()
	{
		$this->is_login();

		$this->load->helper('date');

		$log_history = $this->Crud->get_join_data('user', 'history', ',history.type, history.id, history.date as login_date, user.name, user.email,user.status, user.is_email_verify', 'user.id= history.member_id', 'history.type IN(2,3)', 'history.id desc', '', '');
		// top users
		$data['data'] = array('log_history' => $log_history);

		$this->load->view('Admin/inc/Header', $data);
		$this->load->view('Admin/LoginSignup');
		$this->load->view('Admin/inc/Footer');
//		echo $this->router->class.'/'.$this->uri->segment(2);
	}

	function users()
	{
		$this->is_login();

		$this->load->helper('date');

		$user = $this->Crud->get_data('user', 'id, name, email, password, profile_pic, phone, status, reg_date, is_email_verify', 'status NOT IN(-1)');
		// top users
		$data['data'] = array('user' => $user);

		$this->load->view('Admin/inc/Header');
		$this->load->view('Admin/User', $data);
		$this->load->view('Admin/inc/Footer');
	}

	function inactive_users()
	{
		$this->is_login();

		$this->load->helper('date');

		$user = $this->Crud->get_data('user', 'id, name, email, password, profile_pic, phone, status, reg_date, is_email_verify', array('status' => -1));
		// top users
		$data['data'] = array('user' => $user);

		$this->load->view('Admin/inc/Header');
		$this->load->view('Admin/Inactive_users', $data);
		$this->load->view('Admin/inc/Footer');
	}

	function refresh()
	{
		$this->output->set_header("HTTP/1.0 200 OK");
		$this->output->set_header("HTTP/1.1 200 OK");
		$this->output->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
		$this->output->set_header('Last-Modified: ' . gmdate('D, d M Y H:i:s', time()) . ' GMT');
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
		$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		redirect('admin/dashboard', 'refresh');
	}

	function edit_user()
	{
		$this->is_login();
		$id = $this->uri->segment(3);
		if (isset($id) && is_numeric($id)) {

			$data['data'] = $this->Crud->get_data('user', '*', array('id' => $id));

			if (count($data['data']) > 0) {
				$this->load->view('Admin/inc/Header');
				$this->load->view('Admin/Edit_user', $data);
				$this->load->view('Admin/inc/Footer');
			} else {
				$this->session->set_flashdata('not_found', 'User not found!');
				redirect('admin/users');
			}
		} else {
			 redirect('admin/dashboard');
		}
	}

	function store_user()
	{
		$this->is_login();

		$name = $email = $password = $phone = $id = "";
		extract($_POST);

		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$password = $this->input->post('password');

		$error = array();
		if (empty($name))
			$error[] = 'Name is required!';
		if (empty($email)) {
			$error[] = 'Email is required!';
		} else {
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$error[] = "Invalid email format";
			}
		}
		if (empty($phone))
			$error[] = 'Phone is required!';
		if (empty($password))
			$error[] = 'Password is required!';
		if (strlen($password) < 6)
			$error[] = 'At least 6 characters required!';
		if (preg_match('/^0[0-9]{10}$/', $phone) == FALSE)
			$error[] = 'Invalid phone!';

		$email = $this->Crud->test_input($email);
		$result = $this->Crud->get_count('user', 'id', '`email`  = "' . $email . '" AND `id` != "' . $id . '"', '', '0', '1');

		if ($result > 0) {
			$error[] = "Email already exist!";
		}
		if (count($error) > 0) {

			$this->session->set_flashdata('error', $error);
			redirect('admin/edit_user/' . $id . '');
			exit;
		} else {
			$where = array('id' => $id);
			$data = array('name' => $name, 'email' => $email, 'phone' => $phone, 'password' => $password, 'md5_password' => md5($password));
			$result = $this->Crud->update_row('user', $data, $where);
			if ($result) {
				$this->session->set_flashdata('success', 'User updated successfully!.');
				redirect('admin/edit_user/' . $id . '');
			} else {
				$this->session->set_flashdata('alert', "You haven't made any change!.");
				redirect('admin/edit_user/' . $id . '');
			}
		}
	}

	function slider()
	{
		$this->is_login();

		$data['data'] = $this->Crud->get_data('home_slider', '*', '', 'id desc');
		$this->load->view('Admin/inc/Header');
		$this->load->view('Admin/Slider', $data);
		$this->load->view('Admin/inc/Footer');
	}

	function slider_action($id, $act, $table, $page)
	{
		$this->is_login();

		if ($act == 'de') { // Inactivate
			$result = $this->Crud->update_row($table, array('status' => 2), array('id' => $id));
			if ($result) {
				$this->session->set_flashdata('success', "Record Inactivated successfully!");
			} else {
				$this->session->set_flashdata('alert', "You haven't made any change.");
			}
			redirect('admin/' . $page . '');
		}
		if ($act == 'ac') { // act
			$result = $this->Crud->update_row($table, array('status' => 1), array('id' => $id));
			if ($result) {
				$this->session->set_flashdata('success', "Record activated successfully!");
			} else {
				$this->session->set_flashdata('alert', "You haven't made any change!");
			}
			redirect('admin/' . $page . '');
		}
	}
	function delete_slider(){

		echo 'hello';

	}

	function property()
	{
		$this->is_login();
		$data['data'] = $this->Crud->get_data('property', '*', 'status != -1 ');
		$this->load->view('Admin/inc/Header');
		$this->load->view('Admin/Property', $data);
		$this->load->view('Admin/inc/Footer');
	}
	function single_property($id)
	{
		$this->is_login();
		if(!empty($id) && !is_numeric($id) ){
			redirect('admin/property');
			exit();
		}

		$property = $this->Crud->get_data('property', '*', array('id' => $id));
		$property = $property[0];
// user
		$user = $this->Crud->get_data('user', 'name, phone, email,', array('id' => $property->user_id));
		$user = array_shift($user);
// country
		$country = $this->Crud->get_data('country', 'title', array('id' => $property->country_id));
		$country = array_shift($country);
// city
		$city = $this->Crud->get_data('city', 'title', array('id' => $property->city));
		$city = array_shift($city);
// province
		$province = $this->Crud->get_data('province', 'title', array('id' => $property->province));
		$province = array_shift($province);
// property type
		$property_type = $this->Crud->get_data('property_type', 'title', array('id' => $property->property_type));
		$property_type = array_shift($property_type);

		$data['data'] = array('property' => $property, 'user' => $user, 'country' => $country, 'province' => $province, 'city' => $city, 'property_type' => $property_type);


		$this->load->view('Admin/inc/Header');
		$this->load->view('Admin/Single_property', $data);
		$this->load->view('Admin/inc/Footer');
	}

	function delete_property($id)
	{
		if (is_numeric($id)) {
//      get images
			$where = array('id' => $id);
			$data = $this->Crud->get_data('property', 'image_1, image_2, image_3, image_4,image_5, image_6,image_7, image_8, ', $where, '', '', '', '');
			if ($data) {
				$set = array('status' => '-1', 'image_1' => '', 'image_2' => '', 'image_3' => '', 'image_4' => '', 'image_5' => '', 'image_6' => '', 'image_7' => '', 'image_8' => '');
				$result = $this->Crud->delete_property_update($where, $set);
				$data = $data[0];
				$data_img = array($data->image_1, $data->image_2, $data->image_3, $data->image_4, $data->image_5, $data->image_6, $data->image_7, $data->image_8);

				if ($result == 'y') {
					foreach ($data_img as $value) {
						if (!empty($value)) {
							if (file_exists(FCPATH . 'assets\images\uploads\property' . DIRECTORY_SEPARATOR . $value)) {
								unlink(FCPATH . 'assets\images\uploads\thumbnail' . DIRECTORY_SEPARATOR . $value);
								unlink(FCPATH . 'assets\images\uploads\property' . DIRECTORY_SEPARATOR . $value);
								clearstatcache();
							}
						}
					}
					$this->session->set_flashdata('success', "Record Inactivated successfully!");
				}
			} else {
				$this->session->set_flashdata('error', "Some error during process or invalid data inserted!");
			}
			redirect('admin/property');
		} else {
			redirect('error_404');
		}
	}

	function deleted_properties()
	{
		$this->is_login();
		$data['data'] = $this->Crud->get_data('property', '*', 'status = -1 ');
		$this->load->view('Admin/inc/Header');
		$this->load->view('Admin/Deleted_properties', $data);
		$this->load->view('Admin/inc/Footer');
	}

	function delete_property_permanently($id)
	{
		if (is_numeric($id)) {
			$data = $this->Crud->delete('property', array('id' => $id));
			if ($data) {
				$this->session->set_flashdata('success', "Record deleted successfully!");
				redirect('admin/deleted_properties');
			}
		} else {
			redirect('admin/deleted_properties');
		}
	}

//###############################################    Forms and store data ######################################

	function add_slider()
	{
		$this->is_login();
		$this->load->view('Admin/inc/Header');
		$this->load->view('Admin/Add_slider');
		$this->load->view('Admin/inc/Footer');
	}

	function store_slider()
	{

		$title = $desc = $photo = "";
		$title = $this->input->post('title');
		$desc = $this->input->post('desc');

		$error = array();
		if (empty($title))
			$error[] = 'Title is required!';

		if ( empty( $desc ) ) {
			$error[] = 'Description is required!';

		} else {
			if (strlen($desc) < 15) {
				$error[] = 'Description must not be less than 15 words!';
			}
		}

		if (empty($_FILES['photo']['name'])) {
			$error[] = 'Image is required!';
		} else {
			$imageInformation = getimagesize($_FILES['photo']['tmp_name']);
			if ($imageInformation[0] < 1000) {
				$error[] = 'Image less than 1000px width is not allowed!';
			}
			if ($imageInformation[1] > 700) {
				$error[] = 'Image height greater than 700 is not allowed!';
			}
		}

		if (count($error) > 0) {
			$this->session->set_flashdata('error', $error);
			$this->session->set_flashdata('title', $title);
			$this->session->set_flashdata('desc', $desc);
			redirect('admin/add_slider');
			exit;
		}
		$this->load->library('image_lib');

		if (!empty($_FILES['photo']['name'])) {
			$_FILES['photos']['name'] = $_FILES['photo']['name'];
			$_FILES['photos']['type'] = $_FILES['photo']['type'];
			$_FILES['photos']['tmp_name'] = $_FILES['photo']['tmp_name'];
			$_FILES['photos']['error'] = $_FILES['photo']['error'];
			$_FILES['photos']['size'] = $_FILES['photo']['size'];

			$uploadPath = "assets/images/uploads/slider/";
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('photos')) {
				$fileData = $this->upload->data();
				//    insert image
				$data = array('image' => $fileData['file_name'], 'title' => $title, 'desc' => $desc, 'status' => 1, 'date' => date('d/m/Y'));
				$result = $this->Crud->insert_data('home_slider', $data);
				$this->session->set_flashdata('success', 'Slider uploaded successfully!');
				redirect('admin/add_slider');
				exit;
			} else {
				$error[] = 'Some error accured please try again! <br> file type allowed ( gif, jpg, png ). ';
				$this->session->set_flashdata('error', $error);
				redirect('admin/add_slider');
				exit;
			}
		}
	}

	function add_province()
	{
		$this->is_login();

		$province = $this->Crud->get_data('province', '*', '', 'id desc');
		$country = $this->Crud->get_data('country', '*', '', 'title ASC');
		$data['data'] = array('country' => $country, 'province' => $province );
		$this->load->view('Admin/inc/Header');
		$this->load->view('Admin/Add_province', $data);
		$this->load->view('Admin/inc/Footer');
	}

	function store_province()
	{
		$title = $country = "";

		$title = $this->input->post('title');
		$country = $this->input->post('country');
		$error = array();
		if (empty($title)) {
			$error[] = 'Title is required!';
		}
		if (empty($country)) {
			$error[] = 'Country is required!';
		}else{
			if(!is_numeric($country)){
				$error[] = 'Security Error';
			}
		}

		if (count($error) > 0) {
			$this->session->set_flashdata('error', $error);
			redirect('admin/add_province');
			exit;
		} else {
			$data = array('title' => $title, 'country_id' => $country, 'status' => 1, 'date' => date('d/m/Y'));
//				print_r($data);
			$result = $this->Crud->insert_data('province', $data);
			if ($result) {
				$this->session->set_flashdata('success', 'Province added successfully!');
				redirect('admin/add_province');
			}
		}
	}

	function edit_province($id)
	{
		$this->is_login();
		$province = $this->Crud->get_data('province', '*', array('id' => $id));
		$country = $this->Crud->get_data('country', '*');
		$data['data'] = array('province' => array_shift($province), 'country' => $country);
		if ($data['data']) {
			$this->load->view('Admin/inc/Header');
			$this->load->view('Admin/Edit_province', $data);
			$this->load->view('Admin/inc/Footer');
		} else {
			redirect('admin/dashboard');
		}
	}

	function save_edit_province()
	{
		$this->is_login();

		$title = $id = $country = "";
		$title = $this->input->post('title');
		$id = $this->input->post('id');
		$country = $this->input->post('country');
		$err = array();

		if(empty($title)){
			$err[] = 'Province name required!';
		}
		if(empty($id) || !is_numeric($id)){
			$err[] = 'Security issue';
		}
		if(empty($country) || !is_numeric($country)){
			$err[] = 'Country is required';
		}

		if(count($err) > 0){
			$this->session->set_flashdata('error', $err);
			redirect('admin/Edit_province/1/'.$id.'');
		}else{
			$data = array('title' => $title, 'country_id' => $country);
			$where = array('id' => $id);
			$result = $this->Crud->update_row('province', $data, $where);
//			print_r($where);
			if($result){
				$this->session->set_flashdata('success', 'Province updated successfully!');
				redirect('admin/Edit_province/1/'.$id.'');
			}else{
				$this->session->set_flashdata('error', array("You haven't make any change!"));
				redirect('admin/Edit_province/1/'.$id.'');
			}
		}
	}
	function add_city(){
		$this->is_login();

		$city =  $this->Crud->get_join_data('city', 'province', 'city.*, province.title as p_title', 'province.id=city.province_id', '', 'city.id desc', '', '');
		$country = $this->Crud->get_data('country', 'id, title', array('status' => 1));
		$data['data'] = array('city' => $city, 'country' => $country);
			$this->load->view('Admin/inc/Header');
			$this->load->view('Admin/Add_city', $data);
			$this->load->view('Admin/inc/Footer');
	}
	function store_city(){

		$this->is_login();
		$city = $province = $country = "";
		$city = $this->input->post('city');
		$province = $this->input->post('province');
		$country = $this->input->post('country');

		$err = array();

		if(empty($country) || !is_numeric($country)){
			$err[] = 'Country required!';
		}
		if(empty($province) || !is_numeric($province)){
			$err[] = 'Province required!';
		}
		if(empty($city)){
			$err[] = 'City name required!';
		}

		if(count($err) > 0){
			$this->session->set_flashdata('error', $err);
			redirect('admin/Add_city');
		}else{
			$data = array('title' => $city, 'province_id' => $province, 'country_id' => $country, 'status' => 1, 'date' => date('d/m/Y'));
			$result = $this->Crud->insert_data('city', $data);
			if($result){
				$this->session->set_flashdata('success', 'City added successfully!');
				redirect('admin/Add_city');
			}else{
				$this->session->set_flashdata('error', 'Some uncertain error!');
				redirect('admin/Add_city');
			}
		}
	}

	function edit_city($id)
	{
		$this->is_login();
		$city =  $this->Crud->get_data('city', 'id,title, province_id', array('status' => 1, 'id' => $id));
		$country =  $this->Crud->get_data('country', 'id,title', array('status' => 1));
		$province = $this->Crud->get_data('province', 'id, title', array('status' => 1));
		$data['data'] = array('country' => $country, 'city' => $city, 'province' => $province);
		$this->load->view('Admin/inc/Header');
		$this->load->view('Admin/Edit_city', $data);
		$this->load->view('Admin/inc/Footer');
	}
	function save_edit_city()
	{
		$this->is_login();

		$city = $province = $id = $country = "";
		$city = $this->input->post('city');
		$country = $this->input->post('country');
		$province = $this->input->post('province');
		$id = $this->input->post('id');

		$err = array();

		if(empty($country) || !is_numeric($country)){
			$err[] = 'Country name required!';
		}

		if(empty($city)){
			$err[] = 'City name required!';
		}
		if(empty($id) || !is_numeric($id)){
			$err[] = 'Province Id security issue';
		}
		if(empty($province) || !is_numeric($province)){
			$err[] = 'Province Id Security  issue';
		}

		if(count($err) > 0){
			$this->session->set_flashdata('error', $err);
			redirect('admin/Edit_city/1/'.$id.'');
		}else{
			$data = array('country_id' => $country ,'title' => $city, 'province_id' => $province);
			$where = array('id' => $id);
			$result = $this->Crud->update_row('city', $data, $where);
//			print_r($where);
			if($result){
				$this->session->set_flashdata('success', 'City updated successfully!');
				redirect('admin/Edit_city/1/'.$id.'');
			}else{
				$this->session->set_flashdata('error', array("You haven't make any change!"));
				redirect('admin/Edit_city/1/'.$id.'');
			}
		}
	}
	function  add_country(){
		$this->is_login();

		$data['data'] = $this->Crud->get_data('country', '*');
		$this->load->view('Admin/inc/Header');
		$this->load->view('Admin/Add_country', $data);
		$this->load->view('Admin/inc/Footer');
	}
	function edit_country($id)
	{
		$this->is_login();

		$data['data'] = $this->Crud->get_data('country', '*', array('id' => $id));
		if ($data['data']) {
			$this->load->view('Admin/inc/Header');
			$this->load->view('Admin/Edit_country', $data);
			$this->load->view('Admin/inc/Footer');
		} else {
			redirect('admin/dashboard');
		}
	}

	function store_country()
	{
//		$title =  "";
		$title = $this->input->post('title');
		$error = array();
		if (empty($title)) {
			$error[] = 'Title is required!';
		}

		if (count($error) > 0) {
			$this->session->set_flashdata('error', $error);
			redirect('admin/add_province');
			exit;
		} else {
			$data = array('title' => trim($title), 'status' => 1, 'date' => date('d/m/Y'));
//				print_r($data);
			$result = $this->Crud->insert_data('country', $data);
			if ($result) {
				$this->session->set_flashdata('success', 'Country added successfully!');
				redirect('admin/add_country');
			}
		}
	}

	function save_edit_country()
	{
		$this->is_login();

		$title = $id = "";
		$title = $this->input->post('title');
		$id = $this->input->post('id');
		$err = array();
		if(empty($title)){
			$err[] = 'Province name required!';
		}
		if(empty($id) || !is_numeric($id)){
			$err[] = 'Security issue';
		}

		if(count($err) > 0){
			$this->session->set_flashdata('error', $err);
			redirect('admin/Edit_country/1/'.$id.'');
		}else{
			$data = array('title' => $title);
			$where = array('id' => $id);
			$result = $this->Crud->update_row('country', $data, $where);
//			print_r($where);
			if($result){
				$this->session->set_flashdata('success', 'Province updated successfully!');
				redirect('admin/Edit_country/1/'.$id.'');
			}else{
				$this->session->set_flashdata('error', array("You haven't make any change!"));
				redirect('admin/Edit_country/1/'.$id.'');
			}
		}
	}
	function profile(){
		$this->is_login();
		$admin_id = $this->session->userdata('admin_id');
		$row = $this->Crud->get_data('pak_admin', 'name, email, profile_pic',array('id' => $admin_id),false,'1');
		$data['data'] = array_shift($row);

		$this->load->view('Admin/inc/Header');
		$this->load->view('Admin/Profile', $data);
		$this->load->view('Admin/inc/Footer');
	}
	function store_profile(){
		$this->is_login();

		$admin_id = $this->session->userdata('admin_id');
		$img_data = array();
		$name = $email = '';
		extract($_POST);

		$error = array();
		if (empty($name)) {
			$error[] = 'Name field required!';
		}
		if (empty($email)) {
			$error[] = 'Email field required!';
		}else{
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$error[] = "Invalid email format!";
			}
		}

		if (count($error) > 0) {
			$this->session->set_flashdata('error', $error );
			redirect('admin/profile');
		}else {
			$name = $this->Crud->test_input($name);
			$email = $this->Crud->test_input($email);
			// delete old picture from folder
			if (!empty($_FILES['photo']['name'])) {
				$this->load->library('image_lib');  // loading library
				$folder_img = $this->Crud->get_data('pak_admin', 'profile_pic as pic', array('status' => 1, 'id' => $admin_id), '', '', '');
				if (!empty($folder_img[0]->pic)) {
					if (file_exists(FCPATH . $folder_img[0]->pic)) {
						unlink(FCPATH . $folder_img[0]->pic);
						clearstatcache();
					} //end if
				}
				$_FILES['photos']['name'] = $_FILES['photo']['name'];
				$_FILES['photos']['type'] = $_FILES['photo']['type'];
				$_FILES['photos']['tmp_name'] = $_FILES['photo']['tmp_name'];
				$_FILES['photos']['error'] = $_FILES['photo']['error'];
				$_FILES['photos']['size'] = $_FILES['photo']['size'];
				$uploadPath = "assets/images/admin/profile/";
				$config['upload_path'] = $uploadPath;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['encrypt_name'] = TRUE;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('photos')) {
					$fileData = $this->upload->data();
//  create thumbnail
					if (file_exists($uploadPath . $fileData['file_name'])) {
						// ###########  create thumbnail   ##################
						$config = array(
							'source_image' => $uploadPath . $fileData['file_name'],
							'new_image' => $uploadPath,
							'maintain_ratio' => false,
							'width' => 60,
							'height' => 60
						);
						//here is the second thumbnail, notice the call for the initialize() function again
						$this->image_lib->initialize($config);
						$this->image_lib->resize();
					}
					$img_data = array('profile_pic' => $uploadPath.$fileData['file_name']);
				}//end if
			}// is file check
			$data = array('name' => $name, 'email' => $email) + $img_data;
			$where = array('id' => $admin_id, 'status' => 1);
			$result = $this->Crud->update_row('pak_admin', $data, $where);
			if($result) {
				if(!empty(	$_FILES['photo']['name'])) {
					$this->session->set_userdata('admin_name', $name);
					$this->session->set_userdata('admin_pic', $uploadPath . $fileData['file_name']);
				}
				$this->session->set_flashdata('success', 'Profile updated Successfully');
				redirect('admin/profile');
			}else{
				$error[] = "you have't made any change!";
				$this->session->set_flashdata('error', $error);
				redirect('admin/profile');
			}
		}
	}
	function change_password(){
		$admin_id = $this->session->userdata('admin_id');
		$old_pass = $new_pass = "";
		extract($_POST);
		$error = array();
		if( $old_pass == "" ){
			$error[] = "Old password is required!";
		}
		if( $new_pass == "" ){
			$error[] = "New password is required!";
		}else if(strlen( $new_pass ) < 6 ){
			$error[] = "Password length must be 6 or more!";
		}
		if(count( $error ) > 0 ){
			$this->session->set_flashdata('pass_set_err', $error);
			$this->session->set_flashdata('new_pass', $new_pass);
			$this->session->set_flashdata('old_pass', $old_pass);

			redirect( base_url('admin/profile') );
		}else{
			$where = array('id' => $admin_id, 'status' => 1, 'md5_password' => md5($old_pass));
			$data =  $this->Crud->get_count('pak_admin', 'id', $where, '', '0', '1');
			if($data ==1 ){
				$data_pass = array('password' => $new_pass, 'md5_password' => md5($new_pass));
				$result = $this->Crud->update_row('pak_admin', $data_pass, $where);
				if($result) {
					$this->session->set_flashdata('success_alert', 'Password reset successfully');
					redirect(base_url('admin/profile'));
				}else{
					$error[] = 'System Error!';
					redirect(base_url('admin/profile'));
				}
			}else{
				$error[] = 'Invalid old password!';
				$this->session->set_flashdata('pass_set_err', $error);
				$this->session->set_flashdata('new_pass', $new_pass);
				$this->session->set_flashdata('old_pass', $old_pass);
				redirect( base_url('admin/profile') );
			}
		}
	}
	function settings(){
		$row = $this->Crud->get_data('settings', '*');
		$data['data'] = array_shift($row);
		$this->load->view('Admin/inc/Header');
		$this->load->view('Admin/Settings', $data);
		$this->load->view('Admin/inc/Footer');
	}
	function top_phone_update(){

		$phone = $this->input->post('phone');
		$error = array();
		if(empty($phone)){
			$error[] = 'Phone required';
		}
		if (count($error) > 0) {
			$this->session->set_flashdata('error', $error);
			redirect('admin/settings');
			exit;
		}else{

			$id = settings('id');
			$where = array('id' => $id);
			$data = array('top_phone' => $phone);
			$result = $this->Crud->update_row('settings', $data, $where);
			if($result){
				$this->session->set_flashdata('success', 'Top phone updated successfully');
				redirect('admin/settings');
			}else{
				$this->session->set_flashdata('alert', "You have't made any change!");
				redirect('admin/settings');
			}
		}
	}
	function top_email_update(){
		$email = $this->input->post('top_email');

		$error = array();
		if (empty($email)) {
			$error[] = 'Email field required!';
		}else{
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$error[] = "Invalid email format!";
			}
		}

		if (count($error) > 0) {
			$this->session->set_flashdata('error', $error);
			redirect('admin/settings');
			exit;
		}else{
			$settings =	$this->session->userdata('settings');
			$id = settings('id');
			$where = array('id' => $id);
			$data = array('top_email' => $email);
			$result = $this->Crud->update_row('settings', $data, $where);
			if($result){
				$this->session->set_flashdata('success', 'Top email updated successfully');
				redirect('admin/settings');
			}else{
				$this->session->set_flashdata('alert', "You have't made any change!");
				redirect('admin/settings');
			}
		}
	}
	function contact_email_update(){
		$email = $this->input->post('contact_email');

		$error = array();
		if (empty($email)) {
			$error[] = 'Email field required!';
		}else{
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$error[] = "Invalid email format!";
			}
		}

		if (count($error) > 0) {
			$this->session->set_flashdata('error', $error);
			redirect('admin/settings');
			exit;
		}else{
//			$settings =	$this->session->userdata('settings');
			$id = settings('id');
			$where = array('id' => $id);
			$data = array('contact_email' => $email);
			$result = $this->Crud->update_row('settings', $data, $where);
			if($result){
				$this->session->set_flashdata('success', 'Contact email updated successfully');
				redirect('admin/settings');
			}else{
				$this->session->set_flashdata('alert', "You have't made any change!");
				redirect('admin/settings');
			}
		}
	}
	function store_address(){
		$address = $this->input->post('address');

		$error = array();
		if (empty($address)) {
			$error[] = 'Address field required!';
		}

		if (count($error) > 0) {
			$this->session->set_flashdata('error_', $error);
			redirect('admin/settings');
			exit;
		}else{
//			$settings =	$this->session->userdata('settings');
			$id = settings('id');
			$where = array('id' => $id);
			$data = array('contact_address' => $address);
			$result = $this->Crud->update_row('settings', $data, $where);
			if($result){
				$this->session->set_flashdata('success_', 'Contact address updated successfully!');
				redirect('admin/settings');
			}else{
				$this->session->set_flashdata('alert', "You have't made any change!");
				redirect('admin/settings');
			}
		}
	}
} // end class