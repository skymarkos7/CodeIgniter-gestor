<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductModel extends CI_Model {

	public function list_product() {
		
		$this->db->select('nome_produto');
		$this->db->select('fornecedor_produto');
		$this->db->select('ativo_inativo');

		$result = $this->db->get("produtos")->result();

		return $result;
	}

	public function list_product_activ() {
		
		$this->db->select('nome_produto');
		$this->db->select('fornecedor_produto');
		$this->db->select('ativo_inativo');
		$this->db->where('ativo_inativo', 'ativo');

		$result = $this->db->get("produtos")->result();

		return $result;
	}


	public function insert_product($products) {
		// $data = array(
		// 	'nome_produto' => 'tv smart',
		// 	'fornecedor_produto' => 'LG',
		// 	'ativo_inativo' => 'ativo'
		// );

		 $this->db->insert('produtos', $products);		 
		 header("Location:produtos");
	}


	public function inativo_product() {

		$data = array(
			'ativo_inativo' => 'inativo'
		);
		
		$this->db->where('id', 1);
		$this->db->update('produtos', $data);
	}
}
