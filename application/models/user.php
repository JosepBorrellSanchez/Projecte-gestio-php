<?php
Class User extends CI_Model
{
	//fa la funció de login per comprovar que es correcte
 function login($username, $password)
 {
   $this -> db -> select('ID, usuari, contrasenya');
   $this -> db -> from('usuaris');
   $this -> db -> where('usuari', $username);
   $this -> db -> where('contrasenya', $password);
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
}


