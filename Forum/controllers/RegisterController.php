<?php

class RegisterController extends BaseController {
	private $accountModel;

    public function onInit() {
        $this->title = 'Register';
        $this->accountModel = new AccountModel();
    }

    public function index() {
        // this->renderView();
    }
}