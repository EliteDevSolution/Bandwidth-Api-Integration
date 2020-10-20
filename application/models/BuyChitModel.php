<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Model Name: WarehouseModel;
 */
class BuyChitModel extends CI_model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_Buy()
    {
        $user = $this->session->userdata('user');
        $query = "SELECT buy_chit.id,buy_chit.chitNum,warehouse.`name` as warehouse,vendor.`name` as vendor,buy_chit.buyDate,`user`.`name`,buy_chit.shipCmp,buy_chit.tracking,buy_chit.payWay,buy_chit.vendorId FROM buy_chit INNER JOIN warehouse ON buy_chit.warehouseId = warehouse.id LEFT JOIN vendor ON buy_chit.vendorId = vendor.vid INNER JOIN `user` ON buy_chit.userId = `user`.id WHERE `user`.email = '".$user['email']."'";

        $result = $this->db->query($query);
        return $result->result_array();
    }

}