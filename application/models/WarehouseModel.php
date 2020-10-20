<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Model Name: WarehouseModel;
 */
class WarehouseModel extends CI_model
{
    function __construct()
    {
        parent::__construct();

    }

    function get_warehouse_list() {
        $this->db->select('*');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('phone_register');
        return $query->result_array();
    }
    
    function delete_all()
    {
        $this->db->where('phonenumber !=','17193777791');
        return $this->db->delete('phone_register');
    }

    function multiinsert($insertlst)
    {
        foreach ($insertlst as $value) {
           $data = array(
            'phonenumber' => $value,
            'datetime'  => date("Y-m-d h:i:s"));
            $this->db->replace('phone_register', $data);
        }
    }

    function warehouse_add($warehouse) {
        $this->db->select('*');
        $this->db->where('phonenumber',$warehouse['phonenumber']);
        $result=$this->db->get("phone_register");
        if ($result->num_rows()>0) {
            return false;
        }
        return $this->db->insert('phone_register', $warehouse);
    }

    function delete_warehouse($del_id) {
        $this->db->where('id', $del_id);
        return $this->db->delete('phone_register');
    }
    function warehouse_getid($getid)
    {
        $this->db->select('*');
        $this->db->where('id',$getid);
        $result = $this->db->get("phone_register");
        return $result->result_array();
    }
    function warehouse_edit($id,$editname)
    {
        $this->db->set('phonenumber',$editname);
        $this->db->where('id', $id);
        return $this->db->update('phone_register');
    }
    function get_warehousebyuserid()
    {

    }
    function getinactivelst()
    {
        $this->db->select('*');
        $this->db->where('active','inactive');
        $query = $this->db->get('phone_register');
        return $query->result_array();
     }

    function getmessagelist()
    {
        $this->db->select('fromnumber');
        $this->db->where('state','in');
        $query = $this->db->get('messages');
        return $query->result_array();
    }

}