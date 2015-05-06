<?php

class QuestionsController extends BaseController {
	private $questionsModel;
	private $categoriesModel;

    public function onInit() {
        $this->title = 'Questions';
        $this->questionsModel = new QuestionsModel();
        $this->categoriesModel = new CategoriesModel();
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
	
	public function add() {
		$this->categories = $this->categoriesModel->getAll();
		
		//if is logged in smth... if post....
	}
}