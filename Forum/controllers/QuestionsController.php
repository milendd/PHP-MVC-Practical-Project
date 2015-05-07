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
		
		if (!$this->isLoggedIn){
			$this->addErrorMessage("You cannot write questions if you are not logged in.");
			$this->redirect("account", "login");
		}
		
		if ($this->isPost()){
			$title = $_POST['title'];
			$description = $_POST['description'];
			$category = $_POST['category'];
			$tags = $_POST['tags'];
			
			if ($this->questionsModel->add($title, $description, $category, $tags)){
				$this->addInfoMessage("Question added!");
				$this->redirect('questions');
			}
			else {
				$this->addErrorMessage("Could not create question. All the fields should be non empty!");
			}
		}
	}
}