<?php
/**
 * @file Global Helper Functions
 *
 */

if(!function_exists('settings'))
{
	function settings($column = false){
		$CI = get_instance();
		$CI->load->model('Crud');
		$row = $CI->Crud->get_data('settings', '*');
		$row = array_shift($row);
		if($column):
			return $row->$column;
		else:
			return $row;
		endif;
	}
}
