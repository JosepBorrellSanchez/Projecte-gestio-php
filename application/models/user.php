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
 
 function registre($nomusuari, $nomicognoms $password, $email)
 {
	 $data = array(
			'username'=> $nomusuari,
			'Nom i cognoms'=> $nomicognoms,
			'password'=> MD5($contrasenya),
			'Email'=> $email
			);
	$this->db->insert('users', $data);
}
?>

