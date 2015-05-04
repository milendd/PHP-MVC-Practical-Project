<?php

class AccountController extends BaseController {
	private $accountModel;

    public function onInit() {
        $this->accountModel = new AccountModel();
    }
	
	public function register() {
		if ($this->isPost()){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$email = $_POST['email'];
			
			if ($this->accountModel->register($username, $password, $email)){
				$_SESSION['username'] = $username;
				$this->addInfoMessage("registration successfull");
                $this->redirect("home");
			}
			else{
				$this->addErrorMessage("register failed. The username length should be greater than 2");
			}
		}
	}
	
	public function login() {
		if ($this->isPost()){
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			if ($this->accountModel->login($username, $password)){
				$_SESSION['username'] = $username;
				$this->addInfoMessage("login successfull");
                $this->redirect("home");
			}
			else{
				$this->addErrorMessage("login failed.");
			}
		}
	}
	
	public function logout() {
		unset($_SESSION['username']);
		$this->addInfoMessage("logout successfull");
		$this->redirect("home");
	}
}