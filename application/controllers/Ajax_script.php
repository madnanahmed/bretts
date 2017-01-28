<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: muhammad adnan
 * Date: 10/9/2016
 * Time: 9:33 PM
 */

class Ajax_script extends CI_Controller {

    function __construct()
    {
        parent::__construct();
         $this->load->model('Crud');
    }

    function get_city_by_province_id(){
        $id = $this->input->post('id');
        if(is_numeric($id) && !empty($id)) {
            $data['data'] = $this->Crud->get_city_by_province_id($id);
            echo json_encode($data);
        }
    }

    function get_province_by_country_id(){
        $id = $this->input->post('id');
        if(is_numeric($id) && !empty($id)){
            $data['data'] =  $this->Crud->get_data('province', 'title, id', array('country_id' => $id) );
            echo json_encode($data);
        }

    }

    function submit_property(){
    // load library
        $this->load->library('image_lib');
        $title = $location = $address = $country = $province = $city = $description = $beds = $baths = $area = $furnish = $price = $propertyType = $contractType = $electricity = $sui_gass = $water = $pool = $garden = $balcony = $garage = $air_condition = $boundary_wall = "";

        extract($_POST);
        $error = array();
        if( empty( $title ) ): $error[] = 'Title is Required!'; endif;
        if( empty( $location ) ): $error[] = 'Location is Required!'; endif;
        if( empty( $address ) ): $error[] = 'Address is Required!'; endif;
        if( empty( $country ) ): $error[] = 'Country is Required!'; endif;
        if( empty( $province ) ): $error[] = 'Province is Required!'; endif;
        if( empty( $city ) ): $error[] = 'City is Required!'; endif;
        if( empty( $description ) ): $error[] = 'Description is Required!'; endif;
        if( empty( $beds ) ): $error[] = 'Beds is Required!'; endif;
        if( empty( $baths ) ): $error[] = 'Baths is Required!'; endif;
        if( empty( $area ) ): $error[] = 'Area is Required!'; endif;
        if( empty( $furnish ) ): $error[] = 'Furnish is Required!'; endif;
        if( empty( $price ) ): $error[] = 'Price is Required!'; endif;
        if( empty( $propertyType ) ): $error[] = 'Property type is Required!'; endif;
        if( empty( $contractType ) ): $error[] = 'Contract type is Required!'; endif;
        if( count( $_FILES ) < 1 ): $error[] = 'Photo is Required!'; endif;
        if( count($error) > 0 ){
            echo json_encode(array('errors' => $error));
            return;
        }else{
            $data = array();
            $file_title = "";

            if( !empty($_FILES['photo']['name'])) {
                $filesCount = count($_FILES['photo']['name']);
                $img_1 = $img_2 = $img_3 = $img_4 = $img_5 = $img_6 = $img_7 = $img_8 = "";
                for ($i = 0; $i < $filesCount; $i++) {
                    $_FILES['photos']['name'] = $_FILES['photo']['name'][$i];
                    $_FILES['photos']['type'] = $_FILES['photo']['type'][$i];
                    $_FILES['photos']['tmp_name'] = $_FILES['photo']['tmp_name'][$i];
                    $_FILES['photos']['error'] = $_FILES['photo']['error'][$i];
                    $_FILES['photos']['size'] = $_FILES['photo']['size'][$i];
                    $uploadPath = "assets/images/uploads/property/";
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('photos')) {
                        $fileData = $this->upload->data();
                        if($i == 0) $img_1 = $fileData['file_name'];
                        if($i == 1) $img_2 = $fileData['file_name'];
                        if($i == 2) $img_3 = $fileData['file_name'];
                        if($i == 3) $img_4 = $fileData['file_name'];
                        if($i == 4) $img_5 = $fileData['file_name'];
                        if($i == 5) $img_6 = $fileData['file_name'];
                        if($i == 6) $img_7 = $fileData['file_name'];
                        if($i == 7) $img_8 = $fileData['file_name'];

                        if(file_exists('assets/images/uploads/property/'.$fileData['file_name'])){
                            // ###########  create thumbnail   ##################
                            $config = array(
                                'source_image'      => 'assets/images/uploads/property/'.$fileData['file_name'],
                                'new_image'         => 'assets/images/uploads/thumbnail/',
                                'maintain_ratio'    => false,
                                'width'             => 113,
                                'height'            => 111
                            );
                            //here is the second thumbnail, notice the call for the initialize() function again
                            $this->image_lib->initialize($config);
                            $this->image_lib->resize();
                        }//end if
                    } // end if
                } // end for loop
// filter inputs
                // print_r($_POST);
                $location = $this->Crud->test_input($location);
                $address = $this->Crud->test_input($address);
                $country = $this->Crud->test_input($country);
                $province = $this->Crud->test_input($province);
                $city = $this->Crud->test_input($city);
                $description = $this->Crud->test_input($description);
                $beds = $this->Crud->test_input($beds);
                $baths = $this->Crud->test_input($baths);
                $area = $this->Crud->test_input($area);
                $furnish = $this->Crud->test_input($furnish);
                $price = $this->Crud->test_input($price);
                $propertyType = $this->Crud->test_input($propertyType);
                $contractType = $this->Crud->test_input($contractType);
                $electricity = $this->Crud->test_input($electricity);
                $sui_gass = $this->Crud->test_input($sui_gass);
                $water = $this->Crud->test_input($water);
                $pool = $this->Crud->test_input($pool);
                $garden = $this->Crud->test_input($garden);
                $balcony = $this->Crud->test_input($balcony);
                $garage = $this->Crud->test_input($garage);
                $air_condition = $this->Crud->test_input($air_condition);
                $boundary_wall = $this->Crud->test_input($boundary_wall);
                // create array

                $contractType = ($contractType == 'For Rent')? '2' : '1';

                $submit_data = array(
                    "title" => $title,
                    'user_id' => $this->session->userdata('user_id'),
                    "colony" => $location,
                    "address" => $address,
                    "country_id" => $country,
                    "province" => $province,
                    "city" => $city,
                    "desc" => $description,
                    "beds" => $beds,
                    "baths" => $baths,
                    "area" => $area,
                    "furnish" => $furnish,
                    "price" => $price,
                    "property_type" => $propertyType,
                    "property_category" => $contractType,
                    "electricity" => $electricity,
                    "sui_gas" => $sui_gass,
                    "sweet_water" => $water,
                    "pool" => $pool,
                    "garden" => $garden,
                    "balcony" => $balcony,
                    "garage" => $garage,
                    "conditioning" => $air_condition,
                    "boundary_wall" => $boundary_wall,
                    "date" => date('m/d/y H:i:s'),
                    "year" => date('Y'),
                    "month" => date('m'),
                    "day" => date('d'),
                    "status" => '0',
                    'image_1' => $img_1,
                    'image_2' => $img_2,
                    'image_3' => $img_3,
                    'image_4' => $img_4,
                    'image_5' => $img_5,
                    'image_6' => $img_6,
                    'image_7' => $img_7,
                    'image_8' => $img_8
                );
//   populate history table
                $his_data = array('member_id' => $this->session->userdata('user_id'), 'date' => date('m/d/Y H:i:s'), 'day' => date('d'), 'month' => date('m'), 'year' => date('Y'), 'status' => 1, 'type' => 4);
                $this->Crud->insert_data('history', $his_data);

//                print_r($submit_data);
                $sub_success = $this->session->userdata('sub_success');
                if( !isset( $sub_success ) ) {
                        $data = $this->Crud->submit_property($submit_data);
                    if ($data == 'successful') {
                        $this->session->set_userdata('sub_success', true);
                        echo json_encode(array( 'data' => $data ));
                    }
                }else{
                    echo json_encode(array( 'data' => 'error' ));
                }
            }
        }
        
    }// end function

    function register(){
        $username = $email = $phone = $password = "";
        extract($_POST);
        $error = array();
        if(empty($username))
            $error[] = 'Username is required!';
        if(empty($email)){
            $error[] = 'Email is required!';
        }else{
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error[] = "Invalid email format"; 
             }
        }
        if(empty($phone))
            $error[] = 'Phone is required!';
        if(empty($password))
            $error[] = 'Password is required!';
        if( strlen($password ) < 6 )
            $error[] = 'At least 6 characters required!';
       if(preg_match('/^0[0-9]{10}$/', $phone) == FALSE)
           $error[] = 'Invalid phone!';

        $email = $this->Crud->test_input($email);
        $result = $this->Crud->get_count('user', 'id', $where = array('email' => $email), '', '0', '1');

        if($result > 0 ) {
            echo json_encode(array( 'data' => $result ));
            exit;
        }
        if( count( $error ) > 0 ){
            echo json_encode(array('errors' => $error));
            return;
        }else{
            $param = base64_encode($email).'_'.base64_encode($username).'_'.base64_encode($phone);
            $param = str_replace("=", "", $param);
            $param = trim($param);
            $data = array(
                'name' => $this->Crud->test_input($username),
                'email' => $this->Crud->test_input($email),
                'password' => $this->Crud->test_input($password),
                'md5_password' => md5($password),
                'reg_date' => date('m/d/Y H:i:s'),
                'url' => $param,
                'phone' => $phone,
                'profile_pic' => 'agent.png',
                'status' => '0'
            );

            $data = $this->Crud->insert_data('user', $data);
            if(is_numeric($data)){
// populate history table
                $his_data = array('member_id' => $data, 'date' => date('m/d/Y H:i:s'), 'day' => date('d'), 'month' => date('m'), 'year' => date('Y'), 'status' => 1, 'type' => 2);
                $this->Crud->insert_data('history', $his_data);
                if($_SERVER['SERVER_NAME'] != 'localhost'){
                    $to = $email;
                    $from = "thepakland.com";
                    $subject = "Email Confirmation";
                    $message = "
                    <div style='background-color: #4bb777;
                        height: 150px;
                        width: auto;
                        display: block;
                        color: white;
                        padding: 6px;
                        font-family: monospace;'>
                        <h2> Pakland Real Estate </h2>
                        <p style='font-size:14px'> Click the following link to verify registration. </p>
                        <p style='font-size:14px'> <a href='".base_url('verify/registration/').$param."'>Click here</a>  </p>
                    </div>";
                    $headers = "MIME-Version: 1.0\r\n";
                    $headers .= "Content-type: text/html; charset=iso-8859-1". "\r\n";
                    $headers  .= "From: $from\r\n";
                   $mail =  mail($to, $subject, $message, $headers);
                    if($mail === TRUE){
                        echo json_encode(array('data' => 'successful'));
                    }
                }else{
                    echo json_encode(array('data' => 'successful')); // for local use only
                }
            }else{
                echo json_encode(array('data' => 'error'));
            }
        }
    }// end function

    function is_email_available($email = false){
        if(isset($_POST)) {
            $email = "";
            extract($_POST);
        }
        $email = $this->Crud->test_input($email);
       $result = $this->Crud->get_count('user', 'id', $where = array('email' => $email), '', '', '');
        echo json_encode(array('data' => $result));
    }// end function
    function login(){
        $username = $password = "";
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $username = $this->Crud->test_input($username);
        $where = array('email' => $username, 'md5_password' => md5($password), 'status' => 1);
        $data = $this->Crud->get_data( 'user', 'id, name', $where, '', '1','0' );
        if($data == TRUE){
            $sess = array('user_id'=> $data[0]->id, 'user_name' => $data[0]->name);
            $this->session->set_userdata($sess);
            $his_data = array('member_id' => $data[0]->id, 'date' => date('m/d/Y H:i:s'), 'day' => date('d'), 'month' => date('m'), 'year' => date('Y'), 'status' => 1, 'type' => 3);
            $this->Crud->insert_data('history', $his_data);
            echo 'suc';
        }else{
            echo 'err';
        }

    }

    function inactive_property(){
        $id = "";
        extract($_POST);
        $id = $this->Crud->test_input($id);
        $where = array('id' => $id, 'user_id' => $this->session->userdata('user_id'));
        $data = array('status' => 2);
        $result = $this->Crud->activeInactiveProperty($where, $data);
        echo json_encode(array('data' => $result));
    }
    function active_property(){
        $id = "";
        extract($_POST);
        $id = $this->Crud->test_input($id);
        $where = array('id' => $id, 'user_id' => $this->session->userdata('user_id'));
        $data = array('status' => 1);
        $result = $this->Crud->activeInactiveProperty($where, $data);
        echo json_encode(array('data' => $result));
    }
    function delete_property(){
        $id = "";
        extract($_POST);
        $id = $this->Crud->test_input($id);
        if(is_numeric($id)) {
//      get images
            $where = array('id' => $id, 'user_id' => $this->session->userdata('user_id'), 'status' => 2);
            $data = $this->Crud->get_data('property', 'image_1, image_2, image_3, image_4,image_5, image_6,image_7, image_8, ', $where, '', '', '', '');
            if ($data) {
                $set = array('status' => '-1');
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
                    echo json_encode(array('data' => $result));
                }
            }else{
                echo json_encode(array('data' => 'error'));
            }
        }
    }
    function delete_pending_property(){
        $id = "";
        extract($_POST);
        $id = $this->Crud->test_input($id);
        if(is_numeric($id)) {
//      get images
            $where = array('id' => $id, 'user_id' => $this->session->userdata('user_id'), 'status' => 0);
            $data = $this->Crud->get_data('property', 'image_1, image_2, image_3, image_4,image_5, image_6,image_7, image_8, ', $where, '', '', '', '');
            if ($data) {
                $set = array('status' => '-1');
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
                    echo json_encode(array('data' => $result));
                }
            }else{
                echo json_encode(array('data' => 'error'));
            }
        }
    }


    function edit_property(){
        print_r($_POST);
       $id = $title = $location = $address = $country =  $province = $city = $description = $beds = $baths = $area = $furnish = $price = $propertyType = $contractType = $electricity = $sui_gass = $water = $pool = $garden = $balcony = $garage = $air_condition = $boundary_wall = "";
        extract($_POST);
        $error = array();
        if( empty( $title ) ): $error[] = 'Title is Required!'; endif;
        if( empty( $id ) ): $error[] = 'Unknown Error!'; elseif( !is_numeric($id) ):  $error[] = 'Invalid property id provided';  endif;
        if( empty( $location ) ): $error[] = 'Location is Required!'; endif;
        if( empty( $address ) ): $error[] = 'Address is Required!'; endif;
        if( empty( $province ) ): $error[] = 'Province is Required!';  elseif( !is_numeric($province) ):  $error[] = 'Invalid province provided'; endif;
        if( empty( $city ) ): $error[] = 'City is Required!';elseif( !is_numeric($city) ):  $error[] = 'Invalid city provided'; endif;
        if( empty( $description ) ): $error[] = 'Description is Required!'; endif;
        if( empty( $beds ) ): $error[] = 'Beds is Required!'; elseif( !is_numeric($beds) ):  $error[] = 'Invalid bed provided'; endif;
        if( empty( $baths ) ): $error[] = 'Baths is Required!'; elseif( !is_numeric($baths) ):  $error[] = 'Invalid bath provided'; endif;
        if( empty( $area ) ): $error[] = 'Area is Required!'; elseif( !is_numeric($area) ):  $error[] = 'Invalid area provided'; endif;
        if( empty( $furnish ) ): $error[] = 'Furnish is Required!'; endif;
        if( empty( $price ) ): $error[] = 'Price is Required!'; elseif( !is_numeric($price) ):  $error[] = 'Invalid price provided'; endif;
        if( empty( $propertyType ) ): $error[] = 'Property type is Required!'; elseif( !is_numeric($propertyType) ):  $error[] = 'Invalid property type provided'; endif;
        if( empty( $contractType ) ): $error[] = 'Contract type is Required!'; elseif( $contractType != 'For Sale' && $contractType != 'For Rent'  ):  $error[] = 'Invalid contract type provided'; endif;
//        if( count( $_FILES ) < 1 ): $error[] = 'Photo is Required!'; endif;

        if( count($error) > 0 ){
            echo json_encode(array('errors' => $error));
            return;
        }else {

            $data = array();
            $file_title = "";
//
            // print_r($_POST);
            $location = $this->Crud->test_input($location);
            $address = $this->Crud->test_input($address);
            $province = $this->Crud->test_input($province);
            $city = $this->Crud->test_input($city);
            $description = $this->Crud->test_input($description);
            $beds = $this->Crud->test_input($beds);
            $baths = $this->Crud->test_input($baths);
            $area = $this->Crud->test_input($area);
            $furnish = $this->Crud->test_input($furnish);
            $price = $this->Crud->test_input($price);
            $propertyType = $this->Crud->test_input($propertyType);
            $contractType = $this->Crud->test_input($contractType);
            $electricity = $this->Crud->test_input($electricity);
            $sui_gass = $this->Crud->test_input($sui_gass);
            $water = $this->Crud->test_input($water);
            $pool = $this->Crud->test_input($pool);
            $garden = $this->Crud->test_input($garden);
            $balcony = $this->Crud->test_input($balcony);
            $garage = $this->Crud->test_input($garage);
            $air_condition = $this->Crud->test_input($air_condition);
            $boundary_wall = $this->Crud->test_input($boundary_wall);
            // create array

            $contractType = ($contractType == 'For Rent') ? '2' : '1';
            $submit_data = array(
                "title" => $title,
                'user_id' => $this->session->userdata('user_id'),
                "colony" => $location,
                "address" => $address,
                "country" => $country,
                "province" => $province,
                "city" => $city,
                "desc" => $description,
                "beds" => $beds,
                "baths" => $baths,
                "area" => $area,
                "furnish" => $furnish,
                "price" => $price,
                "property_type" => $propertyType,
                "property_category" => $contractType,
                "electricity" => $electricity,
                "sui_gas" => $sui_gass,
                "sweet_water" => $water,
                "pool" => $pool,
                "garden" => $garden,
                "balcony" => $balcony,
                "garage" => $garage,
                "conditioning" => $air_condition,
                "boundary_wall" => $boundary_wall,
                "date" => date('m/d/y H:i:s'),
                "status" => '0'
            );

                $where = array('id' =>  strrev($id), 'user_id' => $this->session->userdata('user_id'));
                $data = $this->Crud->edit_property($submit_data, $where);
                echo json_encode(array('data' => $data));
        }
    }

    function delete_image( $prop_id = false, $img_id = false, $up_img = false ){

        if(isset($_POST)):
            $prop_id = $img_id = "";

            extract($_POST);
        endif;

        $prop_id = $this->Crud->test_input($prop_id);
        $img_id = $this->Crud->test_input($img_id);

        if(is_numeric($img_id) && is_numeric($prop_id)){
            $data = array('image_'.$img_id => '');
//            print_r($data);
            $where = array('id'=> $prop_id, 'user_id' => $this->session->userdata('user_id'));
            $get_img = $this->Crud->get_data( 'property', 'image_'.$img_id.' as image', $where, '', '','0' );
            $result = $this->Crud->update_row('property', $data, $where);
            if($result){
// delete image from folder also
                if (file_exists(FCPATH.'assets\images\uploads\property'.str_replace('"','','\"').$get_img[0]->image))
                {
                    unlink ( FCPATH.'assets\images\uploads\property'.str_replace('"','','\"'). $get_img[0]->image);
                    unlink ( FCPATH.'assets\images\uploads\thumbnail'.str_replace('"','','\"'). $get_img[0]->image);
                    clearstatcache();
                } //end if
            }else{
                if(!isset($up_img)) {
                    echo json_encode(array('data' => 'err'));
                }
            }
        }else{
            json_encode(array('response' => 'err'));
        }
    }
    function upload_image()
    {

//        delete image if user reselect image
        if (isset($_POST)) {
            $prop_id = $img_id = "";

            extract($_POST);
           $result =  $this->delete_image($prop_id, $img_id, 'up_img');
        }
//exit;
//            print_r($_POST);
            $this->load->library('image_lib');
            if (!empty($_FILES['photo']['name'])) {
                $_FILES['photos']['name'] = $_FILES['photo']['name'];
                $_FILES['photos']['type'] = $_FILES['photo']['type'];
                $_FILES['photos']['tmp_name'] = $_FILES['photo']['tmp_name'];
                $_FILES['photos']['error'] = $_FILES['photo']['error'];
                $_FILES['photos']['size'] = $_FILES['photo']['size'];

                $uploadPath = "assets/images/uploads/property/";
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png';
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('photos')) {

                    $fileData = $this->upload->data();

//  create thumbnail
                    if (file_exists('assets/images/uploads/property/' . $fileData['file_name'])) {
                        // ###########  create thumbnail   ##################
                        $config = array(
                            'source_image' => 'assets/images/uploads/property/' . $fileData['file_name'],
                            'new_image' => 'assets/images/uploads/thumbnail/',
                            'maintain_ratio' => false,
                            'width' => 113,
                            'height' => 111
                        );
                        //here is the second thumbnail, notice the call for the initialize() function again
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                    }
                    //    update image
                    $data = array('image_' . $img_id => $fileData['file_name']);
//            print_r($data);
                    $where = array('id' => $prop_id, 'user_id' => $this->session->userdata('user_id'));

                    $result = $this->Crud->update_row('property', $data, $where);
                    echo json_encode(array('data' => 'y'));

                }//end if
            }
        }
###############   forget password
    function  forget_password()
    {
        $email = '';
        extract($_POST);
        $where = array( 'email' => $email );
        $row = $this->Crud->get_data('user','password, name', $where, '', '', '0');
//        print_r($row[0]->password);
        if($row[0]->password) {
            if ($_SERVER['SERVER_NAME'] != 'localhost') {
                $to = $email;
                $from = "thepakland.com";
                $subject = " Password Recovery ";
                $message = "
                        <div style='background-color: #4bb777;
                            height: 150px;
                            width: auto;
                            display: block;
                            color: white;
                            padding: 6px;
                            font-family: monospace;'>
                            <h2> Pakland Real Estate </h2>
                            <p style='font-size:14px'> Hi <span style='color: coral'>".ucwords($row[0]->name)."</span>  use the following password to login Thepakland.com  </p>
                            <p style='font-size:14px'><span style='color: coral'> ".$row[0]->password."</span>  </p>
                        </div>";
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
                $headers .= "From: $from\r\n";
                $mail = mail($to, $subject, $message, $headers);
                if ($mail === TRUE) {
                    echo json_encode(array('data' => 'succ'));
                }
            }
        }else{
            echo json_encode(array('data'=> 'some_err'));
        }
    }

    function dashboard_chart(){
        // sign up chart
        $year = '';
        if(isset($_POST['year'])){
            
             extract($_POST);
            if(is_numeric($year)){
            $this->session->set_userdata('propChartYear', $year);
              $session_year = $this->session->userdata('propChartYear');
            }
         }else{
          $session_year = $this->session->userdata('propChartYear');
             if(!isset($session_year)){
                $session_year = date('Y');
            }else{
                $session_year = $this->session->userdata('propChartYear');
            }
         }
        $total_users = 0;
        $data =   $this->Crud->dashboard_chart(array('type' => 2, 'year' => $session_year ),'year');
        $chart = "signup_chart_data = [";
        if($data){
            foreach($data as $value){
                $total_users = $total_users + $value->total;
                $chart .= "{ y:'$value->year', a: '$value->total' },";
            }
            $chart =  rtrim( $chart, ',' ) . "];";//
        }else{
            $chart = "signup_chart_data = [{y:".$session_year.", a: 0 }]";
        }
        $path_to_file = FCPATH.'assets/admin/assets/js/signup_charts.js';
        $myfile = fopen($path_to_file, "w") or die("Unable to open file!");
        fwrite($myfile, $chart);
        fclose($myfile);
//         property chart       

        $data =   $this->Crud->dashboard_chart(array('type' => 4, 'year' => $session_year ), 'month');
        $chart = "property_chart_data = [";
        $total_prop = 0;
        foreach($data as $value){
            $total_prop = $total_prop + $value->total;
            $chart .= "{ y:'".date('F', mktime(0, 0, 0, $value->month, 10))."', a: '$value->total' },";
        }

        if($total_prop < 1 ){
            $chart = $chart."{ y:'January', a: '0' },{ y:'February', a: '0' },{ y:'March', a: '0' },{ y:'April', a: '0' },{ y:'May', a: '0' },{ y:'June', a: '0' },{ y:'September', a: '0' },{ y:'October', a: '0' },{ y:'December', a: '0' }";
        }

        $chart =  rtrim( $chart, ',' ) . "];";//
        $path_to_file = FCPATH.'assets/admin/assets/js/property_charts.js';
        $myfile = fopen($path_to_file, "w") or die("Unable to open file!");
        fwrite($myfile, $chart);
        fclose($myfile);

        echo json_encode( array( 'total_user' => $total_users, 'total_property' => $total_prop ) );
    }

    function get_history_alerts(){
        $this->load->helper('date');
        $data = $this->Crud->get_join_data('user', 'history', ',history.date as login_date, history.type, user.name', 'user.id = history.member_id', 'history.type IN (2,4) AND history.status = "1" ', 'history.id DESC', '', '');

        $json = '{"total":'.count( $data ).',"result":[';
        foreach($data as $value){

        $time = timespan( strtotime( $value->login_date ), time());
            $json = $json.'{"login_date":"'.$time .'", "type":"'.$value->type.'", "name":"'.ucwords($value->name).'"},';
        }
        echo rtrim($json, ',').']}';
    }
//    contact agent
    function contact_agent(){
       $c_code =  $this->session->userdata('captcha_word');
        $name = $email = $message = $code = "";
        extract($_POST);
        $err = 0;
        $error = array();
        if( strtolower( $c_code ) != strtolower( $code )){
            $error['captcha_err'] = 1;
            $err = $err+1;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['e_err'] = 1;
            $err = $err+1;
        }
        if(strlen($message) >= 1000){
            $error['m_err'] = 1;
            $err = $err+1;
        }
        if($err >0 ){
            echo json_encode($error);
            exit;
        }else{
            if($_SERVER['SERVER_NAME'] != 'localhost') {
                $get_email = $this->Crud->get_data('user', 'email, name', array('is_email_verify' => 1, 'id' => $this->session->userdata('agent_id')));
                $to = $get_email[0]->email;
                $from = $email;
                $subject = "ThePakLand Property Inquery";
                $message = 'From <strong>'.ucwords($name) ."</strong><br> Hi <strong>". ucwords($get_email[0]->name)."</strong> <br> ".ucfirst($message);
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
                $headers .= "From: $from\r\n";
                $mail = mail($to, $subject, $message, $headers);
                if ($mail === TRUE) {
                    echo json_encode(array('data' => 'y'));
                }else{
                    echo json_encode(array('data' => 'not_send'));
                }
            }else{ // local use only
                echo json_encode(array('data' => 'y'));
            }
        }
    }
    function clear_history()
    {
        $where = 'type IN(2, 4) AND status = "1" ';
        $data = array('status' => 0);
        $result = $this->Crud->update_row('history', $data, $where);
        if($result){
            echo json_encode(array('data' => 1));
        }
    }

    function property_chart(){
//      print_r($_POST);
        $year = "";
        extract($_POST);
        if(is_numeric($year)){
           $this->session->set_userdata('propChartYear', $year);
            $getYear = $this->session->userdata('propChartYear');

            $data =   $this->Crud->dashboard_chart(array('type' => 4, 'year' => $getYear), 'month');
            $chart = "property_chart_data = [";
            $total_prop = 0;
            foreach($data as $value){
                $total_prop = $total_prop + $value->total;
                $chart .= "{ y:'".date('F', mktime(0, 0, 0, $value->month, 10))."', a: '$value->total' },";
            }
            if($total_prop < 1 ){
                $chart = $chart."{ y:'January', a: '0' },{ y:'February', a: '0' },{ y:'March', a: '0' },{ y:'April', a: '0' },{ y:'May', a: '0' },{ y:'June', a: '0' },{ y:'September', a: '0' },{ y:'October', a: '0' },{ y:'December', a: '0' }";
            }
            $chart =  rtrim( $chart, ',' ) . "];";//
            $path_to_file = FCPATH.'assets/admin/assets/js/property_charts.js';
            $myfile = fopen($path_to_file, "w") or die("Unable to open file!");
            fwrite($myfile, $chart);
            fclose($myfile);
            echo json_encode( array( 'total_property' => $total_prop ) );
        }
    }
    function inactive_user(){
        $id = "";
        extract($_POST);
        if(is_numeric($id)){
          $data =  $this->Crud->update_row('user', array('status' => -1), array('id' => $id));
          if($data){
              $this->Crud->update_row('property', array('status' => -1,), array('user_id' => $id));
              echo json_encode(array('data' => '1'));
          }
        }
    }
    function active_user(){
        $id = $status =  "";
        extract($_POST);
        if(is_numeric($id)){
          $data =  $this->Crud->update_row('user', array('status' => 1), array('id' => $id));
          if($data){
              $this->Crud->update_row('property', array('status' => 1,), array('user_id' => $id));
              echo json_encode(array('data' => '1'));
          }
        }
    }
    function refresh_captcha(){
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
            );
            $captcha = create_captcha($captcha_config);
            $this->session->set_userdata('captcha_file', $captcha['filename']);
            $this->session->set_userdata('captcha_word', $captcha['word']);

            echo json_encode(array('file' => $captcha['filename']));
    }
    function contact_us(){
        $c_code =  $this->session->userdata('captcha_word');
        $name = $email = $message = $code = "";
        extract($_POST);
        $err = 0;
        $error = array();
        if( strtolower( $c_code ) != strtolower( $code )){
            $error['captcha_err'] = 1;
            $err = $err+1;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['e_err'] = 1;
            $err = $err+1;
        }
        if(strlen($message) >= 1000){
            $error['m_err'] = 1;
            $err = $err+1;
        }
        if($err >0 ){
            echo json_encode($error);
            exit;
        }else{
            if(!$this->session->userdata('is_email_already')):
                if($_SERVER['SERVER_NAME'] != 'localhost') {
                    $this->session->set_userdata('is_email_already', 'send');
                    $get_email = $this->Crud->get_data('settings', 'contact_email as email');
                    $to = $get_email[0]->email;
                    $from = $email;
                    $subject = "User Message";
                    $message = 'From <strong>'.ucwords($name) ."</strong><br> Hi  <br> ".ucfirst($message);
                    $headers = "MIME-Version: 1.0\r\n";
                    $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
                    $headers .= "From: $from\r\n";
                    $mail = mail($to, $subject, $message, $headers);
                    if ($mail === TRUE) {
                        echo json_encode(array('data' => 'y'));
                    }
                }else{ // local use only
                    echo json_encode(array('data' => 'y'));
                }
            else:
                echo json_encode(array('data' => 'al'));
            endif;
        }
    }
}// end class