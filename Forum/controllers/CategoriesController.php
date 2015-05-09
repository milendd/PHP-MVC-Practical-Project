<?php

class CategoriesController extends BaseController {
	private $categoriesModel;

    public function onInit() {
        $this->title = 'Categories';
        $this->categoriesModel = new CategoriesModel();
    }

    public function index() {
        $this->categories = $this->categoriesModel->getAll();
    }
	
	public function create() {
		$this->authorize('You are not allowed to add category! Login first!');
	
		if ($this->isPost()) {
            $title = $_POST['title'];
            if ($this->categoriesModel->create($title)) {
                $this->addInfoMessage("category created.");
                $this->redirect("categories");
            } 
			else {
                $this->addErrorMessage("Could not create category! It should be non-empty or already exists!");
            }
        }
	}
	
	public function view($categoryId) {
		$category = $this->categoriesModel->find($categoryId);
		if (!$category){
			$this->addErrorMessage("Invalid category!");
			$this->redirect("categories");
		}
		
		$this->title = $category['title'];
		$this->questions = $this->categoriesModel->getQuestions($categoryId);
	}
	
	public function edit($id) {
		$this->authorize('You are not allowed to edit category! Login first!');
	
		$this->category = $this->categoriesModel->find($id);
        if (!$this->category) {
            $this->addErrorMessage("Invalid category!");
            $this->redirect("categories");
        }
	
        if ($this->isPost()) {
            $title = $_POST['title'];
            if ($this->categoriesModel->edit($id, $title)) {
                $this->addInfoMessage("Category edited.");
                $this->redirect("categories");
            } 
			else {
                $this->addErrorMessage("Could not edit category!");
            }
        }
    }

    public function delete($id) {
		$this->authorize('You are not allowed to delete category! Login first!');
	
        if ($this->categoriesModel->delete($id)) {
            $this->addInfoMessage("Category deleted.");
        } 
		else {
            $this->addErrorMessage("Could not delete category #" . htmlspecialchars($id) . '.');
        }
        $this->redirect("categories");
    }
}