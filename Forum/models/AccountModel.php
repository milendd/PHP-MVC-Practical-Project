<?php

class AccountModel extends BaseModel {
	public function login($username, $password){
		
	}
	
	public function register($username, $password, $email){
		if (!isset($username) || strlen($username) < 3){
			return false;
		}
	
		$statement = self::$db->prepare("SELECT COUNT(id) FROM users WHERE username = ?");
		$statement->bind_param("s", $username);
		$statement->execute();
		$result = $statement->get_result()->fetch_assoc();
		
		if ($result['COUNT(id)']){
			return false;
		}
		
		$pass_hash = password_hash($password, PASSWORD_BCRYPT);
		
		$registerStatement = self::$db->prepare("INSERT INTO Users (username, pass_hash, email) VALUES (?, ?, ?)");
		$registerStatement->bind_param("sss", $username, $pass_hash, $email);
		$registerStatement->execute();
		
		return true;
	}
}