<?php
class Review extends CI_Model {
	function addNewBook($review) {
		$query = "INSERT INTO reviews (bookTitle, slugTitle, author, review, rating, user_id, created)
			VALUES (?,?,?,?,?,?,?)";
		$values = array($review['title'], $review['slugTitle'], $review['author'], $review['review'], $review['rating'], $review['user_id'], date('Y-m-d, H:i:s'));
		return $this->db->query($query, $values);
	}
	function getReviews() {
		$query = "SELECT bookTitle, slugTitle, author, review, rating, user_id, name, DATE_FORMAT(reviews.created, '%M %D, %Y') as created, reviews.id
			FROM reviews
			LEFT JOIN users
			ON users.id = reviews.user_id";
		return $this->db->query($query)->result_array();
	}
	function getBookReviews($title) {
		$query = "SELECT bookTitle, slugTitle, author, review, rating, user_id, name, DATE_FORMAT(reviews.created, '%M %D, %Y') as created, reviews.id
			FROM reviews
			LEFT JOIN users
			ON users.id = reviews.user_id
			WHERE slugTitle =" . $this->db->escape($title);
		return $this->db->query($query)->result_array();
	}
	function deleteReview($review_id) {
		$query = "DELETE FROM reviews
				  WHERE id =" . $this->db->escape($review_id);
		return $this->db->query($query);
	}
}
?>