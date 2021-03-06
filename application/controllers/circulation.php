<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class circulation extends CI_Controller {

	public function index()
	{
		$data = array();
		$data['active'] = 'circulation';
		$data['title'] = 'Members';
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
 		$data["recordSearch"] = $this->global_model->getRecords('members');
 		$data["links"] = $this->pagination->create_links();
		
		$this->lms_session->checkSession();
		$this->load->view('circulation/members', $data);
	}


	public function borrowed_books()
	{
		$data = array();
		$data['active'] = 'circulation';
		$data['title'] = 'Borrowed Books';
		$data['sidebar'] = $this->load->view('templates/sidebar', $data, TRUE);
		$data['topnav'] = $this->load->view('templates/topnav', $data, TRUE);
		$data['footer'] = $this->load->view('templates/footer', $data, TRUE);
		$data['member_id'] = $this->input->post('borrow_id');

		$member = $this->global_model->getRow('members', 'member_id', $data['member_id']);

		$data['member_name'] = $member->first_name.' '.$member->last_name;

		$this->lms_session->checkSession();
		$this->load->view('circulation/borrowed_books', $data);
	}


	public function addMember()
	{
		$data = $this->input->post();
		$date_today = date("Y/m/d");

		$memberInfo = array(
			'member_id' => '' ,
			'first_name' => $data['first_name'],
			'last_name' => $data['last_name'],
			'age' => $data['age'],
			'house_no' => $data['house_no'],
			'street' => $data['street'],
			'barangay' => $data['barangay'],
			'city' => $data['city'],
			'province' => $data['province'],
			'contact_no' => $data['contact_no'],
			'email' => $data['email'],
			'date_joined' => $date_today
		);	

		$this->global_model->insert('members', $memberInfo);

		redirect('/circulation/index') ;
			
	}


	public function add()
	{
		$data = $this->input->post();
		$book_ids = $this->input->post('book_id');

		//print_r($book_ids);exit;

		$date_today = date("Y/m/d");
		$due_date = date("Y/m/d", strtotime("+6 days"));

			foreach ($book_ids as $book_id) {
			
				$borrowedBookInfo = array(
					'id' => '' ,
					'book_id' => $book_id ,
					'member_id' => $data['member_id'] ,
					'date_borrowed' => $date_today,
					'due_date' => $due_date
				);	

				$result = $this->global_model->insert('borrowed_books', $borrowedBookInfo);
			}

		echo json_encode($result);
			
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

			$action = "
                    <center><button data-toggle='modal' id='return-btn' data-target='#modal-return' class='btn btn-simple return-btn btn-fill btn-info'>Return</button></center>                
                  ";

			
			$arr = array(
				$id,
		        $title,
		        $author,
		        $date_borrowed,
		        $due_date,
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
			$copies = $books->copies;
			
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

			if ($available <= 0)
			{
				continue;
			}
			else
			{
				$arr = array(
					$checkbox,
			        $book_id,
			        $title,
			        $author,
			        $availableCopies
			    );

	            $data['data'][] = $arr;
			}
			
		}

		echo json_encode($data);
	}


	public function returnBook()
	{
		$id = $this->input->post('id');
		$table = $this->input->post('table');

		$date_today = date("Y/m/d");

		$borrowed_book = $this->global_model->getRow($table, 'id', $id);
		$book_id = $borrowed_book->book_id;
		$member_id = $borrowed_book->member_id;
		$date_borrowed = $borrowed_book->date_borrowed;

		$returnedBookInfo = array(
					'id' => '',
					'book_id' => $book_id,
					'member_id' => $member_id,
					'date_borrowed' => $date_borrowed,
					'date_returned' => $date_today);

		$this->global_model->insert('returned_books', $returnedBookInfo);
		$where = array('id' => $id );

		$result = $this->global_model->deleteRow($table, $where);
		echo json_encode($result);
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
		$member_id = $this->input->post('set');
		

		$where = array('member_id' => $member_id);	
		$data = $this->input->post();
		unset($data['table']);
		unset($data['set']);

		$result = $this->global_model->update($table, $data, $where);
		echo json_encode($result);
	}

	public function ajaxDeleteRow()
	{
		$tables = $this->input->post('tables');	
		$data = $this->input->post();

		unset($data['tables']);

		$result = $this->circulation_model->deleteRow($tables, $data);
		echo json_encode($result);
	}

	public function all_borrowed()
	{
		$data = array();
		$data['active'] = 'circulation';
		$data['title'] = 'All Borrowed Books';
		$data['sidebar'] = $this->load->view('templates/sidebar', $data, TRUE);
		$data['topnav'] = $this->load->view('templates/topnav', $data, TRUE);
		$data['footer'] = $this->load->view('templates/footer', $data, TRUE);

		// $memberRecords = $this->global_model->getRecords('members');

		// $members = [];
		// foreach ($memberRecords as $member) 
		// {
		// 	$first_name = $member->first_name;
		// 	$last_name = $member->last_name;

		// 	$full_name = $first_name.' '.$last_name;

		// 	$members[] = $full_name;
		// }

		$data['members'] = $this->global_model->getRecords('members');
	
		$this->lms_session->checkSession();
		$this->load->view('circulation/all_borrowed_books', $data);
	}

	public function all_borrowed_populate()
	{
		$table = $this->input->post('table');

		$borrowedBooksInfo = $this->global_model->getRecords($table);

		$data = [];
		foreach ($borrowedBooksInfo as $books) 
		{
			$id = $books->id;
			$member_id = $books->member_id;

			$memberInfo = $this->global_model->getRow('members','member_id', $member_id);
			$borrowed_by = $memberInfo->first_name.' '.$memberInfo->last_name;

			$book_id = $books->book_id;
			$bookInfo = $this->global_model->getRow('books','book_id', $book_id);

			$title = $bookInfo->book_title;
			$author = $bookInfo->author;

			$date_borrowed = $books->date_borrowed;
			$due_date = $books->due_date;

			$action = "
                    <center><button data-toggle='modal' id='return-btn' data-target='#modal-return' class='btn btn-simple return-btn btn-fill btn-info'>Return</button></center>                
                  ";

			
			$arr = array(
				$id,
				$borrowed_by,
		        $title,
		        $author,
		        $date_borrowed,
		        $due_date,
		        $action
		    );

            $data[] = $arr;
		}

		echo json_encode($data);		
	}

}
