<?php

class LoginController extends BaseController {
	private $accountModel;

    public function onInit() {
        $this->title = 'Login';
        $this->accountModel = new AccountModel();
    }

    public function index() {
        // this->renderView();
    }
}