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
	
	public function view($id) {
		$this->question = $this->questionsModel->find($id);
		if (!$this->question){
			$this->addErrorMessage("No such question!");
			$this->redirect("home");
		}
	}
}