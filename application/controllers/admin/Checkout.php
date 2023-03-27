<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	
		public function __construct() {
			parent::__construct(); 
			$this->load->model('Add_model');
			$this->load->model('View_Model');
			$this->load->model('Visitors_model');
			$this->load->model('Visitors_model');
			$this->load->model('Check_model');
		}

		
		public function checks()
	{	
		$data['books']  = $this->Add_model->getAllBooks();
		$data['name of the books'] = "Books List";
		$data['author'] = "Books List";
		$data['no.of books'] = "Books List";
		$this->load->view('adminpanel/addblog',$data);
	}
	
	
	public function create(){
		$data['title'] = "Create Books";
		$this->load->view('adminpanel/creative',$data);
	}	
	public function storeProduct(){
		$data['title'] = $this->input->post('title');
		$data['author'] = $this->input->post('author');

		$this->Add_model->storeProduct($data);
		redirect('addblog');
	}	
	public function edit($id){
		$data['books'] = $this->Add_model->getBooks($id);
		$data['title'] = "Edit Books";
		$data['author'] = "Edit Author";
		
		$this->load->view('adminpanel/editblog',$data);
	}
}
