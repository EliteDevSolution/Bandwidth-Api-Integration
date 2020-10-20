<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Model Name: WarehouseModel;
 */
class MessageModel extends CI_model
{
    function __construct()
    {
        parent::__construct();

    }
    
    function getListPhoneNumber()
    {
        $this->db->select('*');
        $this->db->where('active','inactive');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('phone_register');
        return $query->result_array();
    }

    function get_msg_list($curphonenumber)
    {
        $this->db->select('*');
        if($curphonenumber != "all")
        {
            $this->db->where('fromnumber',$curphonenumber);
            $this->db->or_where('to', $curphonenumber);
        }        
        $this->db->order_by('id', 'DESC');
        return $this->db->get('messages')->result_array();
    }


    function registerMsgList($msglist)
    {
      $this->db->query("TRUNCATE messages");
        $insertQuery = "insert into messages values ";
        $id = 0;
        foreach($msglist as $value)
        {
         if($value == "") break;
         $time = mb_substr(explode("/*/*|" ,$value)[0],0,10);
         $from =  explode("/*/*|" ,$value)[1];
         $to =  explode("/*/*|" ,$value)[2];
         $text =  htmlentities(explode("/*/*|" ,$value)[3]);
         $state =  explode("/*/*|" ,$value)[4];
         $direction =  explode("/*/*|" ,$value)[5];
         $text = str_replace('\'', '`', $text);
         $id++; 
         if(sizeof($msglist) - 1 == $id)
            $insertQuery .= "($id,'$time','$from','$to','$text','$state','$direction',1)";
         else
            $insertQuery .= "($id,'$time','$from','$to','$text','$state','$direction',1),";
        }
        $this->db->query($insertQuery.';');
    }

    function get_warehouse_list() {
        $this->db->select('*');
        $query = $this->db->get('phone_register');
        return $query->result_array();
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
}