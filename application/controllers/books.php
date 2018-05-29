<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class books extends CI_Controller {

	public function index()
	{
		$data = array();
		$data['active'] = 'books';
		$data['sidebar'] = $this->load->view('templates/sidebar', $data, TRUE);
		$data['topnav'] = $this->load->view('templates/topnav', $data, TRUE);
		$data['footer'] = $this->load->view('templates/footer', $data, TRUE);
		$this->load->view('books/books', $data);
	}

	public function add_error()
	{
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$data = array();
		$data['active'] = 'books';
		$data['sidebar'] = $this->load->view('templates/sidebar', $data, TRUE);
		$data['topnav'] = $this->load->view('templates/topnav', $data, TRUE);
		$data['footer'] = $this->load->view('templates/footer', $data, TRUE);
		$this->load->view('books/books', $data);
	}

	public function add()
	{
		$data = $this->input->post();
		$this->form_validation->set_rules('title', 'Book Title', 'trim|required|min_length[1]|max_length[100]');
		$this->form_validation->set_rules('author', 'Author', 'trim|required|min_length[3]|max_length[40]');
		$this->form_validation->set_rules('copies', 'No. of Copies', 'trim|min_length[1]|max_length[10]');
		$this->form_validation->set_rules('library_section', 'Library Section', 'trim|required|min_length[5]|max_length[40]');
		$this->form_validation->set_rules('genre', 'Genre', 'trim|required|min_length[3]|max_length[50]');


		if ($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
			$this->session->set_flashdata('fd', validation_errors());
			$this->index();
		// }
		// else if ($this->form_validation->run() === TRUE)
		// {
		// 	if(!$this->input->post('genre'))
		// 	{
		//      $this->session->set_flashdata("Please check atleast one(1) genre",);
		//      $this->index();
		//     }
		}else if($this->input->post()) 
		{

				$date_added = date("Y/m/d");

				$genres = $this->input->post('genre');

				$genredb = null;
				foreach ($genres as $genre) {
					if ($genredb == null){
						$genredb = $genre;
					}else{
						$genredb = $genredb.', '.$genre;
					}
				}

				$bookInfo = array(
					'id' => '' ,
					'title' => $this->input->post('title'),
					'author' => $this->input->post('author'),
					'library_section' => $this->input->post('library_section'),
					'copies' => $this->input->post('copies'),
					'genre' => $genredb, 
					'date_added' => $date_added
				);	

				$this->global_model->insert('books', $bookInfo);

		}
	}
}
