<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Checkouts extends CI_Controller {

	public function __construct() {
		parent::__construct(); 
		$this->load->model('Product_model');
	}

	

	public function checks()
	{	
		$data['books']  = $this->Product_model->getAllBooks();
		$data['name of the books'] = "Books List";
		$data['author'] = "Books List";
		$data['no.of books'] = "Books List";
		$this->load->view('adminpanel/checkout',$data);
	}	
	public function create(){
		$data['title'] = "Create Books";
		$this->load->view('adminpanel/create',$data);
	}	
	public function storeProduct(){
		$data['title'] = $this->input->post('title');
		$data['author'] = $this->input->post('author');

		$this->Add_model->storeProduct($data);
		redirect('blog/addblog');
	}
}	
?>
