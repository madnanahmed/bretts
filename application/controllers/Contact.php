<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: muhammad adnan
 * Date: 10/9/2016
 * Time: 9:33 PM
 */

class contact extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Crud');
    }
    function index(){
        //		captcha code

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
            'pool' => '0123456789abcdefghijklmnopqrstuvwxyz',
            'img_path' => './captcha_img/',
            'img_url' => base_url('captcha_img/'),
            'word_length'   => 4,
            'img_width' => '150',
            'img_height' => '30',
            'font_size'     => 20,
        );
        $captcha = create_captcha($captcha_config);
        $this->session->set_userdata('captcha_file', $captcha['filename']);
        $this->session->set_userdata('captcha_word', $captcha['word']);
        $data['data'] = array('captcha' => $captcha);

        $this->load->view('Header');
        $this->load->view('Contact', $data);
        $this->load->view('Footer');
    }
}