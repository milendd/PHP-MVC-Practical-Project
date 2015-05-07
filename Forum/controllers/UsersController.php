<?php

class UsersController extends BaseController {
	private $accountModel;

    public function onInit() {
        $this->usersModel = new UsersModel();
		$this->title = "Users";
    }
	
	public function index() {
		$this->users = $this->usersModel->getAll();
	}
	
	public function view($username) {
		$this->title = "Profile";
		$this->selectedUser = $this->usersModel->find($username);
		if (!isset($this->selectedUser)){
			$this->addErrorMessage("No such user!");
			$this->redirect("users");
		}
	}
}