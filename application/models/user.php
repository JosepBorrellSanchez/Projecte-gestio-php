<?php
Class User extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('id, username, password');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', MD5($password));
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
}
    
 
 function registre()
 {
	$data=array(
		'username'=>$this->input->post('username'),
		'Nomicognoms'=>$this->input->post('nomicognoms'),
		'password'=>md5($this->input->post('password')),
		'Email'=>$this->input->post('email')
  );
  $this->db->insert('users',$data);

 } 
}
