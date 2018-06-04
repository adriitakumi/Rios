<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class books extends CI_Controller {

	public function index()
	{
		$data = array();
		$data['active'] = 'books';
		$data['title'] = 'Books';
		$data['sidebar'] = $this->load->view('templates/sidebar', $data, TRUE);
		$data['topnav'] = $this->load->view('templates/topnav', $data, TRUE);
		$data['footer'] = $this->load->view('templates/footer', $data, TRUE);
		$data['genres'] = $this->global_model->getRecords('genres');
		$this->load->view('books/books', $data);
	}

	public function add_error()
	{
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$data = array();
		$data['active'] = 'books';
		$data['title'] = 'Books';
		$data['sidebar'] = $this->load->view('templates/sidebar', $data, TRUE);
		$data['topnav'] = $this->load->view('templates/topnav', $data, TRUE);
		$data['footer'] = $this->load->view('templates/footer', $data, TRUE);
		$this->load->view('books/books', $data);
	}

	public function add()
	{
		$data = $this->input->post();

		if($data) 
		{
			if (isset($data['genre']))
			{

				$date_added = date("Y/m/d");

				$genres = $this->input->post('genre');

				$genredb = null;				
				foreach ($genres as $genre) {

					if ($genredb == null)
					{
						$genredb = $genre;
					}else
					{
						$genredb = $genredb.','.$genre;
					}
				}

				$bookInfo = array(
					'book_id' => '' ,
					'book_title' => $this->input->post('book_title'),
					'author' => $this->input->post('author'),
					'library_section' => $this->input->post('library_section'),
					'copies' => $this->input->post('copies'),
					'genre' => $genredb, 
					'date_added' => $date_added
				);	

				$this->global_model->insert('books', $bookInfo);

				redirect('/books/') ;
			}
			else 
			{
				$this->session->set_flashdata('error', 'Please check atleast one(1) genre.');
				$this->index();
			}
		}
		else
		{
			$this->session->set_flashdata('no_info_submitted', 'There was no info submitted. Please contact developer.');
			$this->index();
		}
	}

	public function populateTable()
	{
		$booksInfo = $this->global_model->getRecords('books');

		$data = [];
		foreach ($booksInfo as $books) 
		{
			$book_id = $books->book_id;
			$title = $books->book_title;
			$author = $books->author;
			$genres = $books->genre;
			$library_section = $books->library_section;
			$copies = $books->copies;
			$date_added = $books->date_added;

			$genre = explode(",", $genres);

			$tableGenre = NULL;
			foreach ($genre as $genre) {
				$genreRecords = $this->global_model->getRow('genres', 'id', $genre);
				//var_dump($genreRecords);

				if ($tableGenre == NULL)
				{
					$tableGenre = $genreRecords->genre;
				}else
				{
					$tableGenre = $tableGenre.', '.$genreRecords->genre;
				}

			}



			$action = "
                    <center><button data-toggle='modal' id='view-btn' data-target='#modal-edit' class='btn btn-default btn-xs view-btn'><span class='fa fa-fw fa-search text-info'></span></button>                  
                    <button data-toggle='modal' id='delete-btn' data-target='#modal-delete' class='btn btn-default btn-xs delete-btn'><span class='fa fa-fw fa-remove text-danger'></span></button></center>                
                  ";

			
			$arr = array(
				$book_id,
		        $title,
		        $author,
		        $tableGenre,
		        $library_section,
		        $copies,
		        $date_added,
		        $action
		    );

            $data['data'][] = $arr;
		}

		echo json_encode($data);
	}


	public function ajaxGetRow()
	{
		$data = $this->input->post();
		$result = $this->global_model->getRow($data['table'], $data['set'], $data['value']);
		echo json_encode($result);
	}

	public function ajaxUpdate()
	{
		$table = $this->input->post('table');		
		$data = $this->input->post();

		// print_r($data);exit;
		unset($data['table']);

		$result = $this->books_model->update($table, $data);
		echo json_encode($result);
	}

	public function ajaxDeleteRow()
	{
		$table = $this->input->post('table');	
		$data = $this->input->post();

		unset($data['table']);

		$result = $this->global_model->deleteRow($table, $data);
		echo json_encode($result);
	}
}
