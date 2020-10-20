<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Model Name: customer_model;
 */
class CustomerModel extends CI_model
{

    function __construct()
    {
        parent::__construct();
    }
    public function record_count() {
        return $this->db->count_all("customer");
    }
    function get_customer_list($start = 0, $limit = 0, $keyword = '') {
        $key = isset($keyword) ? $keyword : '';

        $this->db->select('*');
        if($key != ''){
            $this->db->like('name', $key);
            $this->db->or_like('street', $key);
            $this->db->or_like('extStreetNumber', $key);
            $this->db->or_like('inStreetNumber', $key);
            $this->db->or_like('complementaryInfo', $key);
            $this->db->or_like('city', $key);
            $this->db->or_like('zipcode', $key);
            $this->db->or_like('country', $key);
            $this->db->or_like('phoneNumber', $key);
            $this->db->or_like('mail', $key);
        }
        $this->db->limit($limit,$start);
        $query = $this->db->get("customer");
        return $query->result_array();
    }
    function get_list() {

        $this->db->select('*');
        $query = $this->db->get("customer");
        return $query->result_array();
    }
    function search_result($key_word) {
        $this->db->select('*');
        $this->db->like('name', $key_word);
        $this->db->or_like('street', $key_word);
        $this->db->or_like('extStreetNumber', $key_word);
        $this->db->or_like('inStreetNumber', $key_word);
        $this->db->or_like('complementaryInfo', $key_word);
        $this->db->or_like('city', $key_word);
        $this->db->or_like('zipcode', $key_word);
        $this->db->or_like('country', $key_word);
        $this->db->or_like('phoneNumber', $key_word);
        $this->db->or_like('mail', $key_word);
        $query = $this->db->get('customer');
        return $query->result_array();
    }

    function customer_add($customer) {
        $this->db->select('*');
        $this->db->where('mail', $customer['mail']);
        $result = $this->db->get('customer');
        if ($result->row() != '') {
            return false;
        }
        return $this->db->insert('customer', $customer);
    }

    function customer_edit($id, $customer) {
        $this->db->where('cid', $id);
        return $this->db->update('customer', $customer);
    }

    function delete_customer($del_id) {
        $this->db->where('cid', $del_id);
        return $this->db->delete('customer');
    }
}