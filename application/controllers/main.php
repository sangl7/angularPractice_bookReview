<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index() {
		$this->load->view('login');
	}
	public function addNewUser() {
		$this->load->model('user');
		$this->load->library("form_validation");
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('alias', 'Alias', 'required|min_length[4]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|matches[passwordConf]');
		if ($this->form_validation->run() === FALSE){
			$errors= validation_errors();
			$errors_list = array(
				'errors' => $errors
				);
			$this->load->view('login', $errors_list);
		}
		else{
			$userInfo = array(
				"name" => $this->input->post('name'),
				"alias" => $this->input->post('alias'),
				"email" => $this->input->post('email'),
				"password" => $this->input->post('password')
			);
			$register = $this->user->register($userInfo);
			if($register === TRUE){
				$login = $this->user->login($userInfo);
				$login['logged_in'] = true;
				$this->session->set_userdata($login);
				redirect('/main/review_home');
			}
		}	
	}

	public function login() {
		$this->load->model('user');
		$this->load->library("form_validation");
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		if($this->form_validation->run() === FALSE){
			$errors = validation_errors();
			$errors_list = array(
				'errors' => $errors
				);
			$this->load->view('login', $errors_list);
		}
		else{
			$userInfo = array(
				"email" => $this->input->post('email'),
				"password" => $this->input->post('password')
			);
			$login = $this->user->login($userInfo);
			if( empty($login)){
				$errors_list = array(
					'errors' => 'Could not find the user with given id/password'
					);
				$this->load->view('login', $errors_list);
			}
			else{
				$login['logged_in'] = true;
				$this->session->set_userdata($login);
				redirect('/main/review_home');
			}
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('/');
	}

	public function review_Home() {
		if($this->session->userdata('logged_in') === true){
			$this->load->model('review');
			$reviews = $this->review->getReviews();
			$data = array(
				'reviews' => $reviews
			);
			$this->load->view('review_home', $data);
		}
		else{
			redirect('/');
		}
	}

	public function addReviewForm() {
		$this->load->model('review');
		$reviews = $this->review->getReviews();
		$data = array(
			'reviews' => $reviews
		);
		$this->load->view('bookReviewForm', $data);
	}

	public function addBookReview() {
		$this->load->model('review');
		$selectedAuthor = $this->input->post('authorNameSelected');
		if($selectedAuthor !== 'Choose One...'){
			$authorName = $selectedAuthor;
		}
		else{
			$authorName = $this->input->post('authorName');
		}
		$review = array(
			"title"	=> $this->input->post('title'),
			"slugTitle" => url_title($this->input->post('title')),
			"author" => $authorName,
			"review" => $this->input->post('review'),
			"rating" => $this->input->post('rating'),
			"user_id" => $this->session->userdata('id'),
		);
		$addReview = $this->review->addNewBook($review);
		if($addReview === true){
			redirect('/main/review_Home');
		}
	}

	public function bookPage($title) {
		$this->load->model('review');
		$reviews = $this->review->getBookReviews($title);
		$data = array(
			"reviews" => $reviews
		);
		$this->load->view('reviewsByBook', $data);
	}

	public function userInfo($userId) {
		$this->load->model('user');
		$userInfo = $this->user->getUserInfo($userId);
		$data = array(
			"userInfo" => $userInfo
		);
		$this->load->view('userInfoPage', $data);
	}

	public function deleteReview($review_id) {
		$this->load->model('review');
		$deleteReview = $this->review->deleteReview($review_id);
		if($deleteReview === true){
			redirect('/main/review_Home');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */