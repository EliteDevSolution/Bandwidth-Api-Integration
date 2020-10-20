<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Model Name: user_model;
 */
class UserModel extends CI_model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_user_list() {
        $this->db->select('*');
        $query = $this->db->get('user');
        return $query->result_array();
    }

    function get_myphonenumber($username)
    {
        $resdata = $this->db->query("select phone from user where name='$username'")->result_array();
        return $resdata[0]['phone'];
    }

    function login_user($user) {
        $this->db->select('*');
        $this->db->where('name', $user['username']);
        $this->db->where('password', $user['password']);
        $result = $this->db->get('user');
        if ($result->num_rows() == 1) {
            $this->db->set('lastloginAt', date("Y-m-d h:i:s"));
            $this->db->where('password', $user['password']);
            $this->db->update('user');
            return true;
        }
        else
        {
            return false;
        }
    }

    function savepostdata($json, $text)
    {
        //$this->db->query("insert  into `testdata` value (NULL,'$text')");
        //messageId:m-ulglnadixjfcikkpzsxdyta,eventType:sms,segmentCount:1,from:+17193777791,text:Moon,time:2019-03-30T14:54:30Z,to:+17209231804,state:received,messageUri:https://api.catapult.inetwork.com/v1/users/u-fue72jsf64pes7ak2g3j52i/messages/m-ulglnadixjfcikkpzsxdyta,applicationId:a-mkectwmqhe4q3xhukexbkjq,direction:in

        //messageId:m-uxuy7jotjwkhgyu463wcc6a,eventType:sms,segmentCount:1,from:+17193777791,text:Boom,time:2019-03-30T15:19:31Z,to:+17209231804,state:received,messageUri:https://api.catapult.inetwork.com/v1/users/u-fue72jsf64pes7ak2g3j52i/messages/m-uxuy7jotjwkhgyu463wcc6a,applicationId:a-mkectwmqhe4q3xhukexbkjq,direction:in

        //0 messageId:m-qsjjscnnzx5wpplw6spr6fq, 0 
        //1  eventType:sms, 
        //2 segmentCount:1, 
        //3  from:+17193777791,
        //4  text:It snowed here last night ,
        //5  time:2019-03-30T15:38:52Z,
        //6  to:+17209231804,
        //7  state:received,
        //8  messageUri:https://api.catapult.inetwork.com/v1/users/u-fue72jsf64pes7ak2g3j52i/messages/m-qsjjscnnzx5wpplw6spr6fq,applicationId:a-mkectwmqhe4q3xhukexbkjq,
        //9   direction:in

        $index = 0;$messageid="";$from="";$text="";$time="";$to="";$state="";$direction="";
        foreach ($json as $value) {
          $key = trim(explode(':', $value)[0]);
          $content = trim(explode(':', $value)[1]);
          if($key == "messageId")
          {
            $messageid = $content;
          } else if($key == "from")
          {
            $from = $content;
          } else if($key == "text")
          {
            $text = $content;
          } else if($key == "time")
          {
            $time = trim(explode(':', $value)[1]).':'.trim(explode(':', $value)[2]).':'.trim(explode(':', $value)[3]);
          } else if($key == "to")
          {
            $to = $content;
          } else if($key == "state")
          {
            $state = $content;
          } else if($key == "direction")
          {
            $direction = $content;
          }
        }
        $res_time = date("Y-m-d h:i:s");
        $query = "insert  into `messages` value (NULL,'$res_time','$from','$to','$text','$state','$direction','1','$messageid')";
        $myphonenumber = $this->session->userdata('myphonenumber');
        if($direction == 'in' && $myphonenumber != $from)
        {
            $replacequery = "replace into testdata value(1,'1')";
             $this->db->set('text', '1');
             $this->db->where('id', 1);
             $this->db->update('testdata');
             $fromnumber = str_replace('+', '', $from);
            $regquery = "replace into phone_register set phonenumber='$fromnumber', datetime='$res_time'";
            $this->db->query($regquery);
            //Inactive Procesing
            $updateQuery = "replace into phone_register values ";
            $keywords = ['remove', 'quit', 'stop', 'spam','fuck', 'fucking'];
            if($text != "")
            {
                foreach ($keywords as $row) {
                    $pos = strpos(mb_strtolower($text), $row);
                    if($pos > -1)
                    {
                        $this->db->set('active', 'inactive');
                        $this->db->set('datetime', $res_time);
                        $this->db->where('phonenumber', $fromnumber);
                        $this->db->update('phone_register');
                        break;
                    }
                }
            }
            $this->db->query($query);
        }
    }

    function getmsgstate()
    {
        $res = $this->db->query("select text from testdata where id=1")->result();
        return $res[0]->text;
    }


    function replacemsgstate()
    {
        $replacequery = "replace into testdata value(1,'1')";
        $this->db->set('text', '0');
        $this->db->where('id', 1);
        $this->db->update('testdata');
    }

    function newmsgpost($data)
    {
        $time = $data['time'];
        $from = $data['from'];
        $to = $data['to'];
        $text = $data['text'];
        $state = $data['state'];
        $direction = $data['direction'];
        $this->db->query("insert into msg_temp set time='$time', fromnumber='$from', to='$to',text='$text',state='$state',
                          direction='$direction',active=1");
    }
	
	function get_searchlist($str)
	{
		$this->db->like('name',$str);
		$this->db->or_like('email',$str);
		$this->db->or_like('country',$str);
		$this->db->or_like('createdAt',$str);
		$result = $this->db->get('user');
		return $result->result_array();
	}
	
    function user_add($user) {
        $this->db->select('*');
        $this->db->where('name',$user['name']);
        $this->db->where('email',$user['email']);
        $result=$this->db->get("user");
        if ($result->num_rows()>0) {
            return false;
        }
        return $this->db->insert('user', $user);
    }

    function user_getid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('user');
        return $query->result_array();
    }

    function delete_user($del_id) {
        $this->db->where('id', $del_id);
        return $this->db->delete('user');
    }
}