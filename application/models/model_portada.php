<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_portada extends CI_Model{
function __construct()
{
parent::__construct();
$this->load->database();
}


		// Tots els gets que consulten les dades a la base dades
		function getcitesdia($diaavui) {
			
			// SELECT MID(DiaHora,6) FROM Agenda
			//SELECT MID(a,6) FROM (SELECT DiaHora as a FROM Agenda WHERE DiaHora LIKE '______24/01/2015%') as b
			//$this->db->select('MID(a,6)');
			//$this->db->from('SELECT DiaHora as a');
			//$this->db->from('Agenda');
			//$this->db->where('DiaHora LIKE "______24/01/2015%"');
			//$this->db->query('SELECT MID(a,6) FROM (SELECT DiaHora as a FROM Agenda WHERE DiaHora LIKE' "______24/01/2015%"') as b');
			
			return $this->db->get()->result_array();
		}
		
		function getcitesdianum($diaavui) {
			
			// SELECT MID(DiaHora,6) FROM Agenda
			//SELECT COUNT(a) FROM (SELECT DiaHora as a FROM Agenda WHERE DiaHora LIKE '______24/01/2015%') as b
			$query = $this->db->query('SELECT COUNT(a) FROM (SELECT DiaHora as a FROM Agenda WHERE DiaHora LIKE "______$diaavui%") as b');
			//$this->db->select('MID(a,6)');
			//$this->db->from('SELECT DiaHora as a');
			//$this->db->from('Agenda');
			//$this->db->where('DiaHora');
			//$this->db->like('______24/01/2015%');
			
			return $this->db->get($query)->row();
		}
		
		

}
?>
