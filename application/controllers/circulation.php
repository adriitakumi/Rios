<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class circulation extends CI_Controller {

	public function index()
	{
		$data = array();
		$data['active'] = 'circulation';
		$data['sidebar'] = $this->load->view('templates/sidebar', $data, TRUE);
		$data['topnav'] = $this->load->view('templates/topnav', $data, TRUE);
		$data['footer'] = $this->load->view('templates/footer', $data, TRUE);

		$config = array();
 		$config["base_url"] = base_url() . "circulation/index/";
 		$config["total_rows"] = $this->circulation_model->record_count();
 		$config["per_page"] = 4;
 		$config['full_tag_open'] = '<center><ul class="pagination">';
 		$config['full_tag_close'] = '</ul></center>';
 		$config['first_tag_open'] = '<li>';
 		$config['last_tag_open'] = '<li>';
 		$config['next_tag_open'] = '<li>';
 		$config['prev_tag_open'] = '<li>';
 		$config['num_tag_open'] = '<li>';
 		$config['num_tag_close'] = '</li>';
 		$config['first_tag_close'] = '</li>';
 		$config['last_tag_close'] = '</li>';
 		$config['next_tag_close'] = '</li>';
 		$config['prev_tag_close'] = '</li>';
 		$config['cur_tag_open'] = '<li class="active"><span><b>';
 		$config['cur_tag_close'] = '</b></span></li>';
 		$config['next_link'] = 'Next';
 		$config['prev_link'] = 'Previous';

 		$this->pagination->initialize($config);

 		$data["records"] = $this->circulation_model->fetch_members($config["per_page"], $this->uri->segment(3));
 		$data["links"] = $this->pagination->create_links();
		
		$this->load->view('circulation/members', $data);
	}


	public function borrowed_books()
	{
		$data = array();
		$data['active'] = 'circulation';
		$data['sidebar'] = $this->load->view('templates/sidebar', $data, TRUE);
		$data['topnav'] = $this->load->view('templates/topnav', $data, TRUE);
		$data['footer'] = $this->load->view('templates/footer', $data, TRUE);
		$data['member_id'] = $this->input->post('borrow_id');
		$this->load->view('circulation/borrowed_books', $data);
	}


	public function add()
	{
		$data = $this->input->post();
		$book_ids = $this->input->post('book_id');

		//print_r($book_ids);exit;

		$date_today = date("Y/m/d");
		$due_date = date("Y/m/d", strtotime("+7 days"));

			foreach ($book_ids as $book_id) {
			
				$borrowedBookInfo = array(
					'id' => '' ,
					'book_id' => $book_id ,
					'member_id' => $data['member_id'] ,
					'status' => 'Out',
					'date_borrowed' => $date_today,
					'due_date' => $due_date,
					'date_returned' => 'N/A'
				);	

				$this->global_model->insert('borrowed_books', $borrowedBookInfo);
			}
			
	}

	public function populateTable()
	{
		$table = $this->input->post('table');
		$set = $this->input->post('set');
		$member_id = $this->input->post('value');
		$where = array('member_id' => $member_id);

		$borrowedBooksInfo = $this->global_model->getRecords('borrowed_books', $where);

		$data = [];
		foreach ($borrowedBooksInfo as $books) 
		{
			$id = $books->id;
			$book_id = $books->book_id;

			$bookInfo = $this->global_model->getRow('books','book_id', $book_id);

			$title = $bookInfo->book_title;
			$author = $bookInfo->author;

			$date_borrowed = $books->date_borrowed;
			$due_date = $books->due_date;
			$date_returned = $books->date_returned;

			
			$status=null;
        	if($books->status == 'Out'){
        		$status = '<center><span class="badge" style="background-color: red;">'.$books->status.'</span></center>';
        	}
        	else{
        		$status = '<center><span class="badge"  style="background-color: green;">'.$books->status.'</span></center>';	
        	}

			$action = "
                    <center><button data-toggle='modal' id='return-btn' data-target='#modal-return' class='btn btn-simple return-btn btn-fill btn-info'>Return</button></form></center>                
                  ";

			
			$arr = array(
				$id,
		        $title,
		        $author,
		        $date_borrowed,
		        $due_date,
		        $status,
		        $date_returned,
		        $action
		    );

            $data[] = $arr;
		}

		echo json_encode($data);
	}


	public function getBooksTable()
	{
		$booksInfo = $this->global_model->getRecords('books');

		$data = [];
		foreach ($booksInfo as $books) 
		{
			$book_id = $books->book_id;
			$title = $books->book_title;
			$author = $books->author;
			$genres = $books->genre;
			$copies = $books->copies;
			$date_added = $books->date_added;
			
			$where = array('book_id' => $book_id);
			$takenCopies = $this->global_model->count('borrowed_books', $where);

			if ($takenCopies == 0)
			{
				$available = $copies;
				$availableCopies = $copies.'/'.$copies;
			}
			else
			{
				$available = $copies-$takenCopies;
				$availableCopies = $available.'/'.$copies;
			}

			$checkbox = '<input type="checkbox" name="check[]" value="'.$book_id.','.$available.'">';

			
			$arr = array(
				$checkbox,
		        $book_id,
		        $title,
		        $author,
		        $availableCopies
		    );

            $data['data'][] = $arr;
		}

		echo json_encode($data);exit;
	}


	public function returnBook()
	{
		$id = $this->input->post('id');
		$table = $this->input->post('table');

		$date_today = date("Y/m/d");

		$data = array(
					'set' => $id,
					'status' => 'Returned' ,
					'date_returned' => $date_today);

		$result = $this->circulation_model->update($table, $data);
		echo json_encode($result);
	}

}
