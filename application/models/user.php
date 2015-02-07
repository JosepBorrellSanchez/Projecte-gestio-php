<?php
Class User extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('id, username, password, foto, email');
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
    
 
 function registre($data)
 {
	
  $this->db->insert('users',$data);

 }
 
 function compusuari($usuari){
 	$this->db->where('username', $usuari);
	$query = $this->db->get('users');
if($query->num_rows >= 1)
{
//ya existeix
return false;
}  
//no existeix, es pot crear
else{
return true;}
}
function compemail($email){
 	$this->db->where('Email', $email);
	$query = $this->db->get('users');
if($query->num_rows >= 1)
{
//ya existeix
return false;
}  
//no existeix, es pot crear
else{
return true;}
}
}
