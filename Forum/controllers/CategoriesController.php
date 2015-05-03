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
}