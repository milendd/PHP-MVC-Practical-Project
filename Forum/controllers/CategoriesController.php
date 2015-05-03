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
}