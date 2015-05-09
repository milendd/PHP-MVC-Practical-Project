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
	
	public function view($categoryTitle) {
		$this->title = $categoryTitle;
		$this->questions = $this->categoriesModel->getQuestions($categoryTitle);
	}
	
	public function edit($id) {
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

        // Display edit category form
        $this->category = $this->categoriesModel->find($id);
        if (!$this->category) {
            $this->addErrorMessage("Invalid category.");
            $this->redirect("categories");
        }
    }

    public function delete($id) {
        if ($this->categoriesModel->delete($id)) {
            $this->addInfoMessage("category deleted.");
        } 
		else {
            $this->addErrorMessage("Cannot delete category #" . htmlspecialchars($id) . '.');
        }
        $this->redirect("categories");
    }
}