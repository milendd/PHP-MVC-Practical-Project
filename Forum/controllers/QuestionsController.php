<?php

class QuestionsController extends BaseController {
	private $questionsModel;

    public function onInit() {
        $this->title = 'Questions';
        $this->questionsModel = new QuestionsModel();
    }

    public function index() {
        $this->questions = $this->questionsModel->getAll();
    }
}