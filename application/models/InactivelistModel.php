<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Model Name: WarehouseModel;
 */
class InactivelistModel extends CI_model
{
    function __construct()
    {
        parent::__construct();

    }
    function getListPhoneNumber()
    {
        $this->db->select('*');
        $this->db->where('active','inactive');
        $query = $this->db->get('phone_register');
        return $query->result_array();
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

    function delete_list($del_id) {
        $this->db->where('id', $del_id);
        return $this->db->delete('phone_register');
    }

    function update($msglist)
    {
        $updateQuery = "replace into phone_register values ";
        $keywords = ['remove', 'quit', 'stop', 'spam'];
        foreach($msglist as $value)
        {
            if($value == "") break;
                $state =  explode("/*/*|" ,$value)[4];
                if($state != 'in') continue;
                $time = date("Y-m-d h:i:s");
                $from =  explode("/*/*|" ,$value)[1];
                $text =  strtolower(htmlentities(explode("/*/*|" ,$value)[3]));
             if($text == "Remove ")
                $sad = 1;

            foreach ($keywords as $row) {
                $pos = strpos($text, $row);
                if($pos > -1)
                {
                    $from = str_replace("+", "", $from);
                    //$strquery = "update phone_register set active='inactive', time='$time' where phonenumber = '$from'";
                    //$this->db->query($strquery);
                    $this->db->set('active', 'inactive');
                    $this->db->set('datetime', $time);
                    $this->db->where('phonenumber', $from);
                    $this->db->update('phone_register'); // gives UPDATE `mytable` SET `field` = 'field+1' WHERE `id` = 2
                }
            }
        }
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