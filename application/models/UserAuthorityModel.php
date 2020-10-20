<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Model Name: user_model;
 */
class UserAuthorityModel extends CI_model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_userAuthority($id) {
        $this->db->where('userId',$id);
        $query = $this->db->get('user_authority');
		if($query->num_rows()==0)
		{
			$authority['userId'] = $id;
			$this->db->insert('user_authority',$authority);
			
			$this->db->where('userId',$id);
			$query = $this->db->get('user_authority');
			return $query->result_array();
		}
		else
		{
			return $query->result_array();
		}
    }
	function set_userAuthority($id,$state,$usernum,$value)
	{
		switch($id)
		{
			case 1:
				$this->db->where('userId',$usernum);
				if($state=='true'){
					$this->db->set("sellerAuthority","sellerAuthority|".$value,False);
					return $this->db->update('user_authority');
				} else if($state=='false'){
					$this->db->set("sellerAuthority","sellerAuthority&".$value,False);
					return $this->db->update('user_authority');
				}
			break;
			case 2:
                $this->db->where('userId',$usernum);
                if($state=='true'){
                    $this->db->set("providerAuthority","providerAuthority|".$value,False);
                    return $this->db->update('user_authority');
                } else if($state=='false'){
                    $this->db->set("providerAuthority","providerAuthority&".$value,False);
                    return $this->db->update('user_authority');
                }
			break;
			case 3:
                $this->db->where('userId',$usernum);
                if($state=='true'){
                    $this->db->set("customerAuthority","customerAuthority|".$value,False);
                    return $this->db->update('user_authority');
                } else if($state=='false'){
                    $this->db->set("customerAuthority","customerAuthority&".$value,False);
                    return $this->db->update('user_authority');
                }
			break;
			case 4:
                $this->db->where('userId',$usernum);
                if($state=='true'){
                    $this->db->set("productAuthority","productAuthority|".$value,False);
                    return $this->db->update('user_authority');
                } else if($state=='false'){
                    $this->db->set("productAuthority","productAuthority&".$value,False);
                    return $this->db->update('user_authority');
                }
			break;
			case 5:
                $this->db->where('userId',$usernum);
                if($state=='true'){
                    $this->db->set("sellsAuthority","sellsAuthority|".$value,False);
                    return $this->db->update('user_authority');
                } else if($state=='false'){
                    $this->db->set("sellsAuthority","sellsAuthority&".$value,False);
                    return $this->db->update('user_authority');
                }
			break;
			case 6:
                $this->db->where('userId',$usernum);
                if($state=='true'){
                    $this->db->set("buyAuthority","buyAuthority|".$value,False);
                    return $this->db->update('user_authority');
                } else if($state=='false'){
                    $this->db->set("buyAuthority","buyAuthority&".$value,False);
                    return $this->db->update('user_authority');
                }
			break;
			case 7:
                $this->db->where('userId',$usernum);
                if($state=='true'){
                    $this->db->set("transferAuthority","transferAuthority|".$value,False);
                    return $this->db->update('user_authority');
                } else if($state=='false'){
                    $this->db->set("transferAuthority","transferAuthority&".$value,False);
                    return $this->db->update('user_authority');
                }
			break;
		}
		
	}
}