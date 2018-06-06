<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

	public function index()
	{
		$data = array();
		$data['active'] = 'dashboard';
		$data['title'] = 'Dashboard';
		$data['sidebar'] = $this->load->view('templates/sidebar', $data, TRUE);
		$data['topnav'] = $this->load->view('templates/topnav', $data, TRUE);
		$data['footer'] = $this->load->view('templates/footer', $data, TRUE);

		$data['book_num'] = $this->global_model->count('books');
		
		$data['date_today'] = date("Y/m/d");
		$data['date_nextweek'] = date("Y/m/d", strtotime("+6 days"));
		$where2 = array('due_date' => $data['date_today']);

		$data['out_num'] = $this->global_model->count('borrowed_books');
		$data['member_num'] = $this->global_model->count('members');
		$data['due_today_num'] = $this->global_model->count('borrowed_books', $where2);

		$this->lms_session->checkSession();
		$this->load->view('dashboard/dashboard', $data);
	}


	public function populateTable()
	{	
		$startDate = date("Y/m/d");
		$endDate = date("Y/m/d", strtotime("+6 days"));

		$arrOfDates = $this->dashboard_model->getRange($startDate, $endDate);

		//print_r($arrOfDates);exit;
		
		$data = [];
		foreach ($arrOfDates as $date) {
			
			$where = array('due_date' => $date);
			$borrowedBooksInfo = $this->global_model->getRecords('borrowed_books', $where);

			foreach ($borrowedBooksInfo as $borrowedBooks) 
			{
				$id = $borrowedBooks->id;
				$book_id = $borrowedBooks->book_id;
				$member_id = $borrowedBooks->member_id;
				$date_borrowed = $borrowedBooks->date_borrowed;
				$due_date = $borrowedBooks->due_date;

        		$bookInfo = $this->global_model->getRow('books', 'book_id', $book_id);

				$title = $bookInfo->book_title;
				$author = $bookInfo->author;

				$memberInfo = $this->global_model->getRow('members', 'member_id', $member_id);

				$first_name = $memberInfo->first_name;
				$last_name = $memberInfo->last_name;

				$borrowedBy = $last_name.', '.$first_name;


				$action = "
	                    <center><button data-toggle='modal' id='return-btn' data-target='#modal-return' class='btn btn-simple return-btn btn-fill btn-info'>Return</button></center>                
	                  ";

				
				$arr = array(
					$id,
			        $title,
			        $author,
			        $borrowedBy,
			        $date_borrowed,
			        $due_date,
			        $action
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

}
