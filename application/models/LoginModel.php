<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

	public function list_user() {
		$this->db->select("user", "pass", "level_acess");

		$result = $this->db->get("colaborador")->result();

		return $result;
	}
}
