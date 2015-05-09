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
                $this->addErrorMessage("Cannot create category. It should be non-empty");
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
            $this->addErrorMessage("Invalid category.");
            $this->redirect("categories");
        }
	
        if ($this->isPost()) {
            $title = $_POST['title'];
            if ($this->categoriesModel->edit($id, $title)) {
                $this->addInfoMessage("category edited.");
                $this->redirect("categories");
            } 
			else {
                $this->addErrorMessage("Cannot edit category.");
            }
        }
    }

    public function delete($id) {
		$this->authorize('You are not allowed to delete category! Login first!');
	
        if ($this->categoriesModel->delete($id)) {
            $this->addInfoMessage("category deleted.");
        } 
		else {
            $this->addErrorMessage("Cannot delete category #" . htmlspecialchars($id) . '.');
        }
        $this->redirect("categories");
    }
}