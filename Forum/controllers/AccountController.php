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
				$this->addInfoMessage("registration successfull");
                $this->redirect("home");
			}
			else{
				$this->addErrorMessage("register failed. The username length should be greater than 2");
			}
		}
	}
	
	public function login() {
	
	}
	
	public function logout() {
	
	}
}