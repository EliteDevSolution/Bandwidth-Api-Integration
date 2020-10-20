<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Model Name: Product_model;
 */
class ProductModel extends CI_model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function get_products_list() {
		$this->db->select('*');
		$query = $this->db->get('products');
		return $query->result_array();
	}

	function search_result($key_word) {
		$this->db->select('*');
		$this->db->like('name', $key_word);
		$this->db->or_like('family', $key_word);
		$this->db->or_like('code', $key_word);
		$this->db->or_like('buyPrice', $key_word);
		$this->db->or_like('sellPrice', $key_word);
		$query = $this->db->get('products');
		return $query->result_array();
	}

	function product_add($product) {
		$this->db->select('*');
		$this->db->where('code', $product['code']);
		$result = $this->db->get('products');
		if ($result->row() != '') {
			return 'already_exist';
		}
		return $this->db->insert('products', $product);
	}

	function product_edit($id, $product) {
		$this->db->where('id', $id);
		return $this->db->update('products', $product);
	}

	function delete_product($del_id) {
		$this->db->where('id', $del_id);
		return $this->db->delete('products');
	}
}