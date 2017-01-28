<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: muhammad adnan
 * Date: 10/9/2016
 * Time: 9:33 PM
 */
class User_panel extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Crud');
    }

    function dashboard($start = 0){
        if(!$this->session->userdata('user_id')):
            redirect('home', 'refresh');
            exit;
        endif;

            $this->load->library('pagination');
            $user_id =  $this->session->userdata('user_id');
            $result = $this->Crud->get_my_property( $user_id, 'id DESC', $num = 15, $start, $status = 1);
            $config['base_url'] = base_url('user_panel/dashboard');
            $config['total_rows'] = $this->Crud->get_count('property', '*', array('user_id' => $user_id, 'status' => 1) ,'', '', '');
            $config['per_page'] = 15;
            $this->pagination->initialize($config);
            $pages = $this->pagination->create_links();

            // count active records
            $active_property = $this->Crud->get_count( 'property', 'id', $where = array('user_id' => $user_id, 'status' => 1), '', '', '');
            $inactive_property = $this->Crud->get_count( 'property', 'id', $where = array('user_id' => $user_id, 'status' => 2), '', '', '');
            $pending_property = $this->Crud->get_count( 'property', 'id', $where = array('user_id' => $user_id, 'status' => 0), '', '', '');
            $data['data'] = array('my_property' => $result, 'pages' => $pages, 'active_property' => $active_property, 'inactive_property' => $inactive_property, 'pending_property' => $pending_property );
            $this->load->view('Header');
            $this->load->view('My_properties', $data);
            $this->load->view('Footer');

    }
    function inactive($start = 0){
    if($this->session->userdata('user_id')):
        $this->load->library('pagination');
        $user_id =  $this->session->userdata('user_id');
        $result = $this->Crud->get_my_property( $user_id, 'id DESC', $num = 15, $start, $status = 2);
        $config['base_url'] = base_url('user_panel/inactive');
        $config['total_rows'] = $this->Crud->get_count('property', '*', array('user_id' => $user_id, 'status' => 2) ,'', '', '');
        $config['per_page'] = 15;
        $this->pagination->initialize($config);
        $pages = $this->pagination->create_links();
        // count active records
        $active_property = $this->Crud->get_count( 'property', 'id', $where = array('user_id' => $user_id, 'status' => 1), '', '', '');
        $inactive_property = $this->Crud->get_count( 'property', 'id', $where = array('user_id' => $user_id, 'status' => 2), '', '', '');
        $pending_property = $this->Crud->get_count( 'property', 'id', $where = array('user_id' => $user_id, 'status' => 0), '', '', '');
        $data['data'] = array('my_property' => $result, 'pages' => $pages, 'active_property' => $active_property, 'inactive_property' => $inactive_property, 'pending_property' => $pending_property );
        $this->load->view('Header');
        $this->load->view('My_inactive_properties', $data);
        $this->load->view('Footer');
    else:
        redirect('home', 'refresh');
    endif;
}
    function pending($start = 0){
        if($this->session->userdata('user_id')):
            $this->load->library('pagination');
            $user_id =  $this->session->userdata('user_id');
            $result = $this->Crud->get_my_property( $user_id, 'id DESC', $num = 15, $start, $status = 0);
            $config['base_url'] = base_url('user_panel/inactive');
            $config['total_rows'] = $this->Crud->get_count('property', '*', array('user_id' => $user_id, 'status' => 2) ,'', '', '');
            $config['per_page'] = 15;
            $this->pagination->initialize($config);
            $pages = $this->pagination->create_links();
            // count active records
            $active_property = $this->Crud->get_count( 'property', 'id', $where = array('user_id' => $user_id, 'status' => 1), '', '', '');
            $inactive_property = $this->Crud->get_count( 'property', 'id', $where = array('user_id' => $user_id, 'status' => 2), '', '', '');
            $pending_property = $this->Crud->get_count( 'property', 'id', $where = array('user_id' => $user_id, 'status' => 0), '', '', '');
            $data['data'] = array('my_property' => $result, 'pages' => $pages, 'active_property' => $active_property, 'inactive_property' => $inactive_property, 'pending_property' => $pending_property );
            $this->load->view('Header');
            $this->load->view('Pending_properties', $data);
            $this->load->view('Footer');
        else:
            redirect('home', 'refresh');
        endif;
    }
    function  profile($start = 0){
        if($this->session->userdata('user_id')):
            $user_id =  $this->session->userdata('user_id');
            $user_data = $this->Crud->get_data('user', 'name, email, phone, profile_pic, about', array('id' => $user_id, 'status' => 1), '', '', '');
            $active_property = $this->Crud->get_count( 'property', 'id', $where = array('user_id' => $user_id, 'status' => 1), '', '', '');
            $inactive_property = $this->Crud->get_count( 'property', 'id', $where = array('user_id' => $user_id, 'status' => 2), '', '', '');
            $pending_property = $this->Crud->get_count( 'property', 'id', $where = array('user_id' => $user_id, 'status' => 0), '', '', '');
            $data['data'] = array('user_info' => $user_data, 'active_property' => $active_property, 'inactive_property' => $inactive_property, 'pending_property' => $pending_property );
            $this->load->view('Header');
            $this->load->view('Profile', $data);
            $this->load->view('Footer');
        else:
            redirect('home', 'refresh');
        endif;
    }

    function edit_profile(){

        $user_id = $this->session->userdata('user_id');
        $img_data = array();
        $name = $phone = $about = '';
        extract($_POST);
        $error = array();
        if (empty($name)) {
            $error[] = 'Name field required!';
        }
        if (empty($phone)) {
            $error[] = 'Phone field required!';
        } else {
            if (!preg_match('/^0[0-9]{10}$/', $phone) == true) {
                $error[] = 'Invalid mobile number! <small> Example: 0345 1234567 </small>)';
            }
        }

        if (count($error) > 0) {

            $this->session->set_flashdata('error', $error );
//          redirect(base_url('user_panel/edit_profile'));
            redirect('user_panel/profile');
        }else {
            $name = $this->Crud->test_input($name);
            $phone = $this->Crud->test_input($phone);
            $about = $this->Crud->test_input($about);
            // delete old picture from folder
            if (!empty($_FILES['photo']['name'])) {
                $this->load->library('image_lib');  // loading library
                $folder_img = $this->Crud->get_data('user', 'profile_pic as pic', array('status' => 1, 'id' => $user_id), '', '', '');
                if (!empty($folder_img[0]->pic)) {
                    if (file_exists(FCPATH . 'assets\images\uploads\agents' . DIRECTORY_SEPARATOR . $folder_img[0]->pic)) {
                        unlink(FCPATH . 'assets\images\uploads\agents' . DIRECTORY_SEPARATOR . $folder_img[0]->pic);
                        clearstatcache();
                    } //end if
                }
                $_FILES['photos']['name'] = $_FILES['photo']['name'];
                $_FILES['photos']['type'] = $_FILES['photo']['type'];
                $_FILES['photos']['tmp_name'] = $_FILES['photo']['tmp_name'];
                $_FILES['photos']['error'] = $_FILES['photo']['error'];
                $_FILES['photos']['size'] = $_FILES['photo']['size'];
                $uploadPath = "assets/images/uploads/agents/";
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
                            'width' => 244,
                            'height' => 240
                        );
                        //here is the second thumbnail, notice the call for the initialize() function again
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                    }
                    $img_data = array('profile_pic' => $fileData['file_name']);
                }//end if
            }// is file check
            $data = array('name' => $name, 'phone' => $phone, 'about' => $about)+ $img_data;
            $where = array('id' => $user_id, 'status' => 1);
            $result = $this->Crud->update_row('user', $data, $where);
            $this->session->set_flashdata('success_msg', 'Profile updated Successfully' );
            redirect('user_panel/profile');
        }
    }

    function reset_password(){
        $user_id = $this->session->userdata('user_id');
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

            redirect( base_url('user_panel/profile') );
        }else{
            $where = array('id' => $user_id, 'status' => 1, 'md5_password' => md5($old_pass));
           $data =  $this->Crud->get_count('user', 'id', $where, '', '0', '1');
            if($data ==1 ){
                $data_pass = array('password' => $new_pass, 'md5_password' => md5($new_pass));
                $result = $this->Crud->update_row('user', $data_pass, $where);
                $this->session->set_flashdata('success_alert', 'Password reset successfully');
                redirect( base_url('user_panel/profile') );
            }else{
                $error[] = 'Invalid old password!';
                $this->session->set_flashdata('pass_set_err', $error);
                $this->session->set_flashdata('new_pass', $new_pass);
                $this->session->set_flashdata('old_pass', $old_pass);
                redirect( base_url('user_panel/profile') );
            }
        }
    }
}