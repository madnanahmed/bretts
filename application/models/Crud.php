<?php
/**
 * Created by PhpStorm.
 * User: muhammad adnan
 * Date: 10/3/2016
 * Time: 9:39 PM
 */
class Crud extends CI_Model
{
//------- validate --- form data
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

#####################
##  get data ##
#####################
    function get_data( $table, $columns = false, $where = false, $order = false, $start = false, $end = false ){

        if($where != false)
            $this->db->where($where);

        if($order != false)
            $this->db->order_by($order);

        if($start != false)
          $this->db->limit($start, $end);

        $this->db->select($columns)->from($table);
        $query = $this->db->get();
//        print_r($this->db->queries);
        return $query->result();

//        var_dump($this->db);
    }
    function get_count( $table, $columns = false, $where = false, $order = false, $start = false, $end = false ){

        if($where != false)
            $this->db->where($where);

        if($order != false)
            $this->db->order_by($order);

        if($start != false)
            $this->db->limit($start, $end);

        $this->db->select($columns)->from($table);
        $query = $this->db->get();
        return $query->num_rows();

//                var_dump($this->db->queries);
    }
#####################
##    get slider ##
#####################
    function get_slider(){
        $this->db->select()->from('home_slider')->where('status','1')->order_by('id desc');
        $query = $this->db->get();
        return $query->result();
    }
#####################
##  get province ##
#####################
    function get_province(){
        $this->db->select()->from('province')->where('status','1');
        $query = $this->db->get();
        return $query->result();
    }
#########################
##  get property_type ##
#########################
    function get_property_type(){
        $this->db->select('id, title')->from('property_type')->where('status','1');
        $query = $this->db->get();
        return $query->result();
    }
#########################
##  get property_type ##
#########################
    function get_city(){
        $this->db->select('id, title')->from('city')->where( array( 'status' => '1') );
        $query = $this->db->get();
        return $query->result();
    }
#########################
##  get city by province ##
#########################
    function get_city_by_province_id( $province ){
        $this->db->select('id, title')->from('city')->where( array( 'status' => '1', 'province_id' => $province) );
        $query = $this->db->get();
        return $query->result();
    }

#########################
##  search_property ##
#########################
    function search_property($params, $min_price, $max_price, $area_param, $num, $start){
		
        $this->db->select()->from('property')->where('status', 1)->where($params)->where("price between $min_price AND $max_price")->where($area_param)->limit($num, $start);;
        $query = $this->db->get();
//		var_dump($this->db->queries);
        return $query->result();
    }

    function get_count_search($params, $min_price, $max_price, $area_param){
        $this->db->select()->from('property')->where($params)->where("price between $min_price AND $max_price")->where($area_param);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function view_property($id){
        $this->db->select('property.*, property_type.title as type_title'); // Select field
        $this->db->from('property'); // from Table1
        $this->db->join('property_type','property.property_type = property_type.id','INNER'); // Join property with property_type based on the foreign key
        $this->db->where(array('property.status'=>1, 'property_type.status' => 1, 'property.id' => $id )); // Set Fil, ter
        $query = $this->db->get();
        return $query->result();
    }

    function submit_property($data){
        $this->db->insert('property', $data);
//        var_dump($this->db->queries);
        if ($this->db->trans_status() === FALSE) {
            return "error";
        } else {
            return "successful";
        }
    }

//   signup
     function insert_data($table,$data){
         $this->db->insert($table, $data);
//        var_dump($this->db->queries);
         $insert_id = $this->db->insert_id();
         return $insert_id;
     }
    function get_my_property( $id, $order_by , $num, $start, $status){
        $this->db->limit($num, $start);
        $this->db->order_by($order_by);
        $this->db->select('property.*, property_type.title as type_title'); // Select field
        $this->db->from('property'); // from Table1
        $this->db->join('property_type','property.property_type = property_type.id','INNER'); // Join property with property_type based on the foreign key
        $this->db->where(array('property.user_id' => $id, 'property.status' => $status )); // Set Fil, ter
        $query = $this->db->get();
        return $query->result();
    }

//    delete property
    function activeInactiveProperty($where, $data){

// if status 1 active if 2 inactive
        $this->db->where($where);
        $this->db->update('property', $data);

        if ($this->db->affected_rows() == '1') {
            return 'y';
        } else {
           return 'err';
        }

    }
//    delete propert
    function delete_property_update($where, $data){
        $this->db->where($where);
        $this->db->update('property', $data);
        if ($this->db->affected_rows() == '1') {
            return 'y';
        } else {
           return 'err';
        }
    }
    function edit_property($data, $where){

// if status 1 active if 2 inactive
        $this->db->where($where);
        $this->db->update('property', $data);
//        var_dump($this->db->queries);
//        print_r($data);
        if ($this->db->affected_rows() == '1') {
            return 'y';
        } else {
            return 'err';
        }
    }
//    delete image
    function update_row($table, $data, $where){
        $this->db->where( $where );
        $this->db->update($table, $data );
//        print_r($this->db->queries);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    function get_join_data( $table1, $table2, $columns, $join_on, $where = false, $order_by = false, $group_by = false, $limit = false){
       
       if($where)
        $this->db->where( $where ); // Set Fil, ter
        
        if($limit)
        $this->db->limit( $limit );     
        
        if ($group_by)  
            $this->db->group_by( $group_by );
        
        if($order_by)
            $this->db->order_by( $order_by );

        $this->db->select( $columns ); // Select field
        $this->db->from( $table1 ); // from Table1
        $this->db->join( $table2, $join_on,'INNER' ); // Join property with property_type based on the foreign key        
        $query = $this->db->get();
//                print_r($this->db->queries);
        return $query->result();
    }

    function dashboard_chart($where, $groupBy){
//        SELECT COUNT(id), `year` FROM history GROUP BY `year`
        $this->db->where($where);
        $this->db->group_by($groupBy);
        $this->db->order_by($groupBy.' asc');
        $this->db->limit('10');
        $this->db->select('COUNT(id) as total, '.$groupBy.' ')->from('history');
        $query = $this->db->get();
//        print_r($this->db->queries);
        return $query->result();
    }

    function delete($table, $where){
        $this->db->where($where);
        $result =  $this->db->delete($table);
        return $result;
    }


}// end class