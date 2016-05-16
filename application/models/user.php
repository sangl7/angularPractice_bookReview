<?php
class User extends CI_Model {
	function register($user)
	{
		$query = "INSERT INTO users (name, alias, email, password, created)
			VALUES (?,?,?,?,?)";
		$values = array($user['name'], $user['alias'], $user['email'], $user['password'], date('Y-m-d, H:i:s'));
		return $this->db->query($query, $values);
	}
	function login($user)
	{
		$query = "SELECT id, name, alias, email FROM users WHERE email = '{$user['email']}' AND password = '{$user['password']}' LIMIT 1";
		return $this->db->query($query)->row_array();
	}
	function getUserInfo($user)
	{
		$query = "SELECT users.id, name, alias, email, bookTitle, reviews.id
				FROM reviews
				LEFT JOIN users
				ON users.id = reviews.user_id
				WHERE users.id =" . $this->db->escape($user);
		return $this->db->query($query)->result_array();
	}
}
?>