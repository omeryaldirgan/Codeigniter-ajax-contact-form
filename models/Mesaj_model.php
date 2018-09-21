<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
*
*/
class Mesaj_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();

	}


function mesaj_gonder($mesaj)
{

return $this->db->insert("mesaj",$mesaj);

}

}


 ?>
