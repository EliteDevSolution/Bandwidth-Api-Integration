<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Model Name: user_model;
 */
class UserWarehouseModel extends CI_model
{

    function __construct()
    {
        parent::__construct();
    }
    function setWarehouse($id, $state, $usernum)
	{
		if($state == 'true')
		{
			$this->db->where('userid',$usernum);
			$this->db->where('warehouseid',$id);
			$query = $this->db->get('user_warehouse');
			if($query->num_rows() == 0)
			{
				$warehouse['userId'] = $usernum;
				$warehouse['warehouseId'] = $id;
				return $this->db->insert('user_warehouse',$warehouse);
			}
			
		}
		else if($state == 'false')
		{		
			 $this->db->where('userId', $usernum);
			 $this->db->where('warehouseId', $id);
			 return $this->db->delete('user_warehouse');
		}
    }
	function get_warehouse_checkedlist($id)
	{
		$this->db->where('userid',$id);
		$query = $this->db->get('user_warehouse');
		return $query->result_array();
	}
}